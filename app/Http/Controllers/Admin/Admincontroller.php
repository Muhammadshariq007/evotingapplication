<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Login;
use App\Models\Setup\Setup;
use App\Models\Members\Members;
use App\Models\Nominee\Nominee;
use App\Models\Candidate\Candidate;
use App\Models\Ballotpaper\Ballotpaper;
use Illuminate\Http\Request;
use File;
use Validator;
use DB;

class Admincontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(session()->get('ADMIN_ID')){
            return redirect('admin/dashboard');
        }else{
            return view('backend.login');
        } 
       
    }
    
    public function fileStorage($filename){
        
        // $path = storage_path('app/companyLogo/' . $filename);

        // if (!file_exists($path)) {
        //     abort(404);
        // }

        // $file = file_get_contents($path);
        // $type = mime_content_type($path);

        // return response($file, 200)
        //     ->header('Content-Type', $type);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function dashboard()
    {
        $countMembers = Members::count();
        $countNominee = Nominee::count();
        $countCandidate = Candidate::count();
        $countBallotpaper = Ballotpaper::distinct('memberId')->count('memberId');
        
        if(session()->get('ADMIN_ID')){
            
            return view('backend.dashboard')->with(['countMembers'=>$countMembers,'countNominee'=>$countNominee,'countCandidate'=>$countCandidate,'countBallotpaper'=>$countBallotpaper]);
            
        }else{
            return redirect('admin');
        }
        
        
    }
    
    public function setup(){
        
        $Setup = Setup::first();
        
        return view('backend.setup')->with(['Setup'=>$Setup]);
    }
    
    public function updatesetup(Request $request){
        
        $update=Setup::first();
        
        if($request->hasFile("picturelogo")){
            $image = $request->file("picturelogo");
            $ext = $image->extension();
            $image_name=time().'.'.$ext;
            $image->storeAs('/public/companyLogo/',$image_name);
        }else{
            $image_name=$update->companyLogo;
        }
        
       
        $update->companyName = $request->post('companyname');
        $update->companyLogo = $image_name;
        $update->votingstart = $request->post('votingstart');
        $update->votingend = $request->post('votingend');
      
        $data = $update->save();

        if($data){
            $request->session()->flash('message','Information Updated Successfully!');
            return redirect('admin/setup');
        }else{
            $request->session()->flash('message','Something Wrong Please Try Again!');
            return redirect('admin/setup');
        }
        
    }
    
    public function loginstore(Request $request){
        
        $request->validate([
            'username'=>'required',
            'password'=>'required',
        ]);

        $result=Login::where(['username'=>$request->post('username'),'password'=>$request->post('password')])->first();
           
        if(isset($result->id)){
            session()->put('ADMIN_ID',$result->id);
            session()->put('ADMIN_NAME',$result->adminName);
            session()->put('ADMIN_USERNAME',$result->username);
            session()->put('ADMIN_TYPE','Super Admin');
            return redirect('/admin/dashboard');
        }else{
            $request->session()->flash('message','Please Enter Valid Login Details');
            return redirect('/admin');
        }
        
    }
    
    public function Citywise(){
        
        $Memberscitywise = Members::join('table_admin_ballotpaper', 'table_admin_members.id', '=', 'table_admin_ballotpaper.memberId')
    ->select('table_admin_members.memberCity', DB::raw('COUNT(DISTINCT table_admin_ballotpaper.memberId) as ballotpaper_count'))
    ->groupBy('table_admin_members.memberCity')
    ->get();
        
        return view('backend.reporting.citywise')->with(['Memberscitywise'=>$Memberscitywise]);

    }
    
    public function Chapterwise(){
        
        $MembersChapterwise = Members::join('table_admin_ballotpaper', 'table_admin_members.id', '=', 'table_admin_ballotpaper.memberId')
    ->join('table_admin_chapter', 'table_admin_chapter.id', '=', 'table_admin_members.memberChapter')
    ->select('table_admin_chapter.Chaptername', DB::raw('COUNT(DISTINCT table_admin_ballotpaper.memberId) as ballotpaper_count'))
    ->groupBy('table_admin_chapter.Chaptername')
    ->orderByDesc('ballotpaper_count') // Optional: sorts from most to fewest
    ->get();
        
        return view('backend.reporting.chapterwise')->with(['MembersChapterwise'=>$MembersChapterwise]);
    }
    
    public function Candidatewise(){
        
        $Candidatewise = Candidate::join('table_admin_ballotpaper', 'table_admin_candidate.id', '=', 'table_admin_ballotpaper.candidateId')->join('table_admin_nominee', 'table_admin_nominee.id', '=', 'table_admin_ballotpaper.nomineeId')->select('table_admin_candidate.candidateName','table_admin_nominee.nomineeName', DB::raw('COUNT(table_admin_ballotpaper.candidateId) as ballotpaper_count'))
        ->groupBy('table_admin_candidate.candidateName','table_admin_ballotpaper.nomineeId')
        ->get();
   
        return view('backend.reporting.candidatewise')->with(['Candidatewise'=>$Candidatewise]);
    }
    
    public function Positionwise(){
        
        $Positionwise = Nominee::join('table_admin_ballotpaper', 'table_admin_nominee.id', '=', 'table_admin_ballotpaper.nomineeId') 
        ->select('table_admin_nominee.nomineeName', DB::raw('COUNT(table_admin_ballotpaper.nomineeId) as ballotpaper_count'))
        ->groupBy('table_admin_nominee.nomineeName')
        ->get();
        
        return view('backend.reporting.positionwise')->with(['Positionwise'=>$Positionwise]);
    }
    
    public function Auditreport(){
       
           $results = DB::select("
    SELECT
        m.memberMobile AS `No`,
        m.otpCode AS `OTP`,
        m.memberEmail AS `Email`,
        
        MAX(CASE WHEN b.nomineeId = 6 THEN c.candidateName END) AS `PREELECT`,
        MAX(CASE WHEN b.nomineeId = 7 THEN c.candidateName END) AS `VPKPK`,
        MAX(CASE WHEN b.nomineeId = 5 THEN c.candidateName END) AS `VPPunjab`,
        
        (
            SELECT GROUP_CONCAT(c2.candidateName ORDER BY c2.candidateName SEPARATOR ', ')
            FROM table_admin_ballotpaper b2
            JOIN table_admin_candidate c2 ON b2.candidateId = c2.id
            WHERE b2.memberId = b.memberId AND b2.nomineeId = 8
        ) AS `VPSindh`,
        
        MAX(CASE WHEN b.nomineeId = 9 THEN c.candidateName END) AS `SG`,
        MAX(CASE WHEN b.nomineeId = 11 THEN c.candidateName END) AS `TREASURER`,
        
        (
            SELECT GROUP_CONCAT(c3.candidateName ORDER BY c3.candidateName SEPARATOR ', ')
            FROM table_admin_ballotpaper b3
            JOIN table_admin_candidate c3 ON b3.candidateId = c3.id
            WHERE b3.memberId = b.memberId AND b3.nomineeId = 12
        ) AS `EXEMEM`

    FROM
        table_admin_ballotpaper b
    JOIN
        table_admin_members m ON b.memberId = m.id
    JOIN
        table_admin_candidate c ON b.candidateId = c.id
    GROUP BY
        b.memberId, m.otpCode
    ORDER BY
        `No`
");
      
        return view('backend.reporting.auditreport')->with(['results'=>$results]);
    }
    
    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'username'=>'required',
            'password'=>'required',
        ]);

        // $result=Login::where(['username'=>$request->post('username'),'password'=>$request->post('password')])->first();
           
        // if(isset($result->id)){
        //     session()->put('ADMIN_ID',$result->id);
        //     session()->put('ADMIN_NAME',$result->adminName);
        //     session()->put('ADMIN_USERNAME',$result->username);
        //     session()->put('ADMIN_TYPE','Super Admin');
        //     return redirect('/admin/dashboard');
        // }else{
        //     $request->session()->flash('message','Please Enter Valid Login Details');
        //     return redirect('/admin');
        // }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admin\Login  $login
     * @return \Illuminate\Http\Response
     */
    public function show(Login $login)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin\Login  $login
     * @return \Illuminate\Http\Response
     */
    public function edit(Login $login)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Admin\Login  $login
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Login $login)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin\Login  $login
     * @return \Illuminate\Http\Response
     */
    public function destroy(Login $login)
    {
        //
    }
}