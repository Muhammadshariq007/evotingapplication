<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Members\Members;
use App\Models\Nominee\Nominee;
use App\Models\Ballotpaper\Ballotpaper;
use App\Models\Setup\Setup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Mail;
use Session;
use DB;


class Frontcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $memberStatus = Session::get('memberStatus');
        if($memberStatus == 'true'){
            return redirect('/otp');
        }else if($memberStatus == 'false'){
            return redirect('/ballot-paper');
        }else{
            
            $Setup = Setup::first();
            $votingstarttime = Carbon::parse($Setup->votingstart, 'Asia/Karachi'); 
            $votingendtime = Carbon::parse($Setup->votingend, 'Asia/Karachi');
            
            $currentDatetime = Carbon::now('Asia/Karachi');
           
          
            if ($currentDatetime->greaterThanOrEqualTo($votingendtime)) {
                $status = 'closed';
                $remainingTime=0;
            } elseif ($currentDatetime->greaterThanOrEqualTo($votingstarttime)) {
                $status = 'open';
                $remainingTime=0;
            } else {
                $status = 'waiting';
                $remainingTime = $votingstarttime->diffInSeconds($currentDatetime);
            }
            
            return view('frontend.index')->with(['status'=>$status,'remainingTime'=>$remainingTime]);   
        }
      
    }
    
    public function otp(Request $request)
    {
         $memberStatus = Session::get('memberStatus');
         $expires_at = Session::get('expires_at');
        
        if(!$memberStatus == 'true'){
            return redirect('/');
        }else if($memberStatus == 'false'){
            return redirect('/ballot-paper');
        }else{
            return view('frontend.otp');
        }
        
    }
    
    public function Thankyou(){
        
         return view('frontend.thankyou');
        
    }
    
    public function ballotpaper(Request $request)
    {
        $memberStatus = Session::get('memberStatus');
        if($memberStatus == 'false'){
            
            $Nomineedata = Nominee::with(['getCandidatesdetails' => function ($query){
                $query->orderBy('candidateName', 'asc')->get();
            } ,])->where(['status'=>'active'])->orderBy('sorting', 'asc')->get();
            return view('frontend.ballotpaper')->with(['Nomineedata'=>$Nomineedata]);
            
        }else{
            return redirect('/');
        }
        
    }
    
    public function votecastcheck(Request $request){
        
        if($request->votetype == 'local'){
            $check = Members::where(['memberMobile'=>$request->mobileNo,'progressStatus'=>'pending'])->first();
        } else{
            $check = Members::where(['memberEmail'=>$request->memberEmail,'progressStatus'=>'pending'])->first();
        }
       
        
       
        $otpCode = mt_rand(11111111,99999999);
        
        if($check){
            if($check->status == 'inactive'){
                $request->session()->flash('message','Oops! Your Member Account is Inactive Please Contact Administrator!');
                return redirect('/');
            }else{
                
                if($request->votetype == 'local'){
                    $updateStatus = Members::where(['id'=>$check->id,'memberMobile'=>$request->mobileNo])->update(['otpCode'=>$otpCode,'progressStatus'=>'inprocess']);
                }else{
                    $updateStatus = Members::where(['id'=>$check->id,'memberEmail'=>$request->memberEmail])->update(['otpCode'=>$otpCode,'progressStatus'=>'inprocess']);
                }
                
               
               if($updateStatus){
                   
                   $expiresAt = now('Asia/Karachi')->addMinutes(5); // OTP valid for 5 minutes
                   
                    Session::put('memberStatus','true');
                    Session::put('memberid',$check->id);
                    Session::put('expires_at',$expiresAt);
                    
                    $data = ['otpCode' => $otpCode];
                   
                    if(!empty($check->memberEmail)){
                        
                        Mail::html('<h2>Your Evoting OTP is ' . $data['otpCode'] . '</h2><p>It is valid for 5 minutes. Please enter this code to verify your identity and securely cast your vote.</p>', function ($message) use($check) {
                        $message->to($check->memberEmail)
                        ->subject('Your OTP Code');
                        });
                        
                    }else{}
                    
                    if($request->votetype == 'local'){
                        
                        //sms gateway api code
                        $username='Waems';
                        $password='S3Nh87Rp1';
                        $sender='shariq';
                        $mobile="92$request->mobileNo";
                        $message=$otpCode;
                        $post ="action=sendmessage&username=$username&password=$password&sender=".urlencode($sender)."&mobile=".urlencode($mobile)."&recipient=$mobile&otpcode=".urlencode($message)."&format=json";
                        $url = "https://gateway.its.com.pk/api/otp";
                        $ch = curl_init();
                        $timeout = 0; // no timeout
                        curl_setopt($ch, CURLOPT_URL, $url);
                        curl_setopt($ch, CURLOPT_POST, 1);
                        curl_setopt($ch, CURLOPT_POSTFIELDS,$post);
                        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                        curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
                        curl_exec($ch);
                        
                    }else{
                        
                    }
                    
                    return redirect('/otp');
                }else{
                    
                }
                
            }
        }else{
            
             $checkagain = Members::where(['memberMobile'=>$request->mobileNo])->first();
             if($checkagain){
                if($checkagain->progressStatus == 'inprocess'){
                    $request->session()->flash('message','Apologies, the member was unavailable to cast their vote. Kindly refrain from using their name again for this purpose.');
                    return redirect('/');
                }else if($checkagain->progressStatus == 'complete'){
                    $request->session()->flash('message','Apologies, but you have already submitted your vote!');
                    return redirect('/');
                }else{
                    $request->session()->flash('message','No valid information found.');
                    return redirect('/');
                }
             }else{
                 $request->session()->flash('message','No valid information found.');
                    return redirect('/');
             }
            
            
        }
        
    }
    
    public function verificationcheck(Request $request){
        $otpcode = $request->otpcode;
        
        $verifyCode = implode('', $otpcode);
        $checkcode = Members::where(['otpCode'=>$verifyCode])->first();
        if($checkcode){
            Session::put('memberStatus','false');
            return redirect('/ballot-paper');
        }else{
            $request->session()->flash('message','Invalid OTP. Please check the code and try again.');
            return redirect('/otp');
        }
    }
    
    public function ballotdone(Request $request){
        
        $nomineeIds = $request->nominee_ids;
        $candidateSelections = $request->candidateselection;
        $memberId = Session::get('memberid');
        $msg = "";
        $data = false;
        
        // Step 1: Normalize selections into an array per nominee
        $results = [];
        
        foreach ($candidateSelections as $nomineeId => $candidateIds) {
            $results[$nomineeId] = is_array($candidateIds)
                ? $candidateIds        // multiple selections as array
                : [$candidateIds];     // wrap single selection in array
        }
        
        // Step 2: Process votes for each nominee
        foreach ($nomineeIds as $nomineeId) {
            if (isset($results[$nomineeId])) {
                $selectedCandidates = $results[$nomineeId]; // always an array
        
                // Prevent double vote
                $checkBallotpaper = Ballotpaper::where([
                    'memberId' => $memberId,
                    'nomineeId' => $nomineeId
                ])->exists();
        
                if ($checkBallotpaper) {
                    $msg = "You have already cast your vote!";
                } else {
                    foreach ($selectedCandidates as $candidateId) {
                        $Insert = new Ballotpaper();
                        $Insert->nomineeId = $nomineeId;
                        $Insert->candidateId = $candidateId;
                        $Insert->memberId = $memberId;
                        $Insert->status = 'active';
                        $data = $Insert->save();
                    }
        
                    $msg = "Thank you! Your vote has been recorded successfully.";
                    session()->forget('memberStatus');
                }
            }
        }
        
        // Step 3: Final response
        if ($data) {
            Members::where(['id' => $memberId])->update(['progressStatus' => 'complete']);
            $request->session()->flash('message', $msg);
            return redirect('/thankyou');
        } else {
            // You can optionally add a fallback error message
            return back()->with('error', 'Vote could not be processed.');
        }

    }
    
    public function smsgateway(){
        
            $username='Waems';
            $password='S3Nh87Rp1';
            $sender='shariq';
            $mobile='923350209033';
            $message=99000000;
            $action = "";
            $post ="action=sendmessage&username=$username&password=$password&sender=".urlencode($sender)."&mobile=".urlencode($mobile)."&recipient=$mobile&otpcode=".urlencode($message)."&format=json";
            $url = "https://gateway.its.com.pk/api/otp";
            $ch = curl_init();
            $timeout = 0; // no timeout
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS,$post);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
            echo $content = curl_exec($ch);
            
            
    }
    
    
    
    
    
    
}