<?php

namespace App\Http\Controllers\Candidate;

use App\Http\Controllers\Controller;
use App\Models\Candidate\Candidate;
use App\Models\Nominee\Nominee;
use Illuminate\Http\Request;
use File;
use Validator;

class Candidatecontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $Candidate = Candidate::with(['getNomineedetails' => function ($query){
            $query->orderBy('id', 'desc')->get();
        } ,])->where(['status'=>'active'])->get();
       return view('backend.Candidate.view')->with(['Candidate'=>$Candidate]);
    }
    
    public function create($id='')
    {
        if(empty($id)){$singleCandidate="";}else{
            $singleCandidate = Candidate::where(['id'=>$id,'status'=>'active'])->first();
        }
        $Nominee = Nominee::where(['status'=>'active'])->get();
        return view('backend.Candidate.add')->with(['singleCandidate'=>$singleCandidate,'Nominee'=>$Nominee]);
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
            'nomineeid'=>'required',
            'name'=>'required',
            'mobileno'=>'required',
            'city'=>'required',
            'chaptername'=>'required',
            
        ]);
        
        $Insert=new Candidate();
        
        if($request->hasFile("picture")){
            $image = $request->file("picture");
            $ext = $image->extension();
            $image_name=time().'.'.$ext;
            $image->storeAs('/public/Candidatepicture/',$image_name);
        }else{
            $image_name="-";
        }
        
        $Insert->nomineeId = $request->post('nomineeid');
        $Insert->candidateName = $request->post('name');
        $Insert->candidatePhone = $request->post('mobileno');
        $Insert->candidateCity = $request->post('city');
        $Insert->candidateChaptername = $request->post('chaptername');
        $Insert->candidatePicture = $image_name;
        $Insert->status = 'active'; 
        
        $data = $Insert->save();
        
        if($data){
        $request->session()->flash('message','New Candidate Created Successfully!');
        return redirect('admin/candidate/add');
        }else{
        $request->session()->flash('message','Something Wrong Please Try Again!');
        return redirect('admin/candidate/add');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admin\Login  $login
     * @return \Illuminate\Http\Response
     */
    public function show(Candidate $candidate)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin\Login  $login
     * @return \Illuminate\Http\Response
     */
    public function edit(Candidate $candidate)
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
    public function update(Request $request, Candidate $candidate)
    {
        
        $request->validate([
            'nomineeid'=>'required',
            'name'=>'required',
            'mobileno'=>'required',
            'city'=>'required',
            'chaptername'=>'required',
        ]);
        
        $update=Candidate::find($request->post('id'));
        
        if($request->hasFile("picture")){
            $image = $request->file("picture");
            $ext = $image->extension();
            $image_name=time().'.'.$ext;
            $image->storeAs('/public/Candidatepicture/',$image_name);
        }else{
            $image_name=$update->candidatePicture;
        }
        
       
        $update->nomineeId = $request->post('nomineeid');
        $update->candidateName = $request->post('name');
        $update->candidatePhone = $request->post('mobileno');
        $update->candidateCity = $request->post('city');
        $update->candidateChaptername = $request->post('chaptername');
        $update->candidatePicture = $image_name;
      
        $data = $update->save();

        if($data){
            $request->session()->flash('message','Information Updated Successfully!');
            return redirect('admin/candidate');
        }else{
            $request->session()->flash('message','Something Wrong Please Try Again!');
            return redirect('admin/candidate');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin\Login  $login
     * @return \Illuminate\Http\Response
     */
    public function destroy(Candidate $candidate , $id)
    {
        $fetch = Candidate::findOrFail($id);
        $fetch->delete();
        
        session()->flash('message','Record Deleted Successfully!');
        return redirect('admin/candidate');
    }
}