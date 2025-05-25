<?php

namespace App\Http\Controllers\Members;

use App\Http\Controllers\Controller;
use App\Models\Members\Members;
use App\Models\Chapter\Chapter;

use Illuminate\Http\Request;
use File;
use Validator;

class Memberscontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $status = $request->status;
        
      
        if($status == ''){
            $Members = Members::with(['getChapterdetails' => function ($query){
            $query->orderBy('id', 'desc')->get();
        } ,])->get();
        }else{
           Members::query()->update(['status'=>$status]);  
           $Members = Members::with(['getChapterdetails' => function ($query){
            $query->orderBy('id', 'desc')->get();
        } ,])->get();
        }
        
       return view('backend.Members.view')->with(['Members'=>$Members,'status'=>$status]);

    }
    
    public function bulk(Request $request){
        return view('backend.Members.bulk');
    }
    
    public function create($id='')
    {
        if(empty($id)){$singleMembers="";}else{
            $singleMembers = Members::where(['id'=>$id])->first();
        }
        $Chapter = Chapter::where(['status'=>'active'])->get();
        return view('backend.Members.add')->with(['singleMembers'=>$singleMembers,'Chapter'=>$Chapter]);
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
            'name'=>'required',
            // 'memberEmail'=>'required',
            // 'mobileno'=>'required',
            'city'=>'required',
            'chaptername'=>'required',
        ]);
        
        $Insert=new Members();
      
        $Insert->memberName = $request->post('name');
        $Insert->memberEmail = $request->post('memberEmail');
        $Insert->memberMobile = $request->post('mobileno');
        $Insert->memberCity = $request->post('city');
        $Insert->memberChapter = $request->post('chaptername');
        $Insert->status = 'inactive'; 
        
        $data = $Insert->save();
        
        if($data){
        $request->session()->flash('message','New Members Created Successfully!');
        return redirect('admin/members/add');
        }else{
        $request->session()->flash('message','Something Wrong Please Try Again!');
        return redirect('admin/members/add');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admin\Login  $login
     * @return \Illuminate\Http\Response
     */
    public function show(Members $members)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin\Login  $login
     * @return \Illuminate\Http\Response
     */
    public function edit(Members $members)
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
    public function update(Request $request, Members $members)
    {
        
        $request->validate([
            'name'=>'required',
            // 'memberEmail'=>'required',
            // 'mobileno'=>'required',
            'city'=>'required',
            'chaptername'=>'required',
        ]);
        
        $update=Members::find($request->post('id'));
        
       
        $update->memberName = $request->post('name');
        $update->memberEmail = $request->post('memberEmail');
        $update->memberMobile = $request->post('mobileno');
        $update->memberCity = $request->post('city');
        $update->memberChapter = $request->post('chaptername');
        $update->status = $request->post('status');
      
        $data = $update->save();

        if($data){
            $request->session()->flash('message','Information Updated Successfully!');
            return redirect('admin/members');
        }else{
            $request->session()->flash('message','Something Wrong Please Try Again!');
            return redirect('admin/members');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin\Login  $login
     * @return \Illuminate\Http\Response
     */
    public function destroy(Members $members , $id)
    {
        $fetch = Members::findOrFail($id);
        $fetch->delete();
        
        session()->flash('message','Record Deleted Successfully!');
        return redirect('admin/members');
    }
    
    
    public function bulkstore(Request $request){
        
        $request->validate([
            'bulkfile'=>'required',
        ]);
        
        $path = $request->file('bulkfile');
        $csvData = fopen($path,'r');
        while($data = fgetcsv($csvData)){
            
            if($data[0] == 'memberName' || $data[1] == 'memberMobile' || $data[2] == 'memberCity' || $data[3] == 'memberChapter' || $data[4] == 'memberEmail'){
            }else{
                
                $checkChapter = Chapter::where(['Chaptername'=>$data[3]])->first();
                $idchapter=0;
               
                if($checkChapter){
                    
                    $idchapter = $checkChapter->id;
                    
                }else{
                    $Inserts=new Chapter();
                    
                    $Inserts->Chaptername = $data[3];
                    $Inserts->status = 'active'; 
                    $Inserts->save();
                    
                   $idchapter = $Inserts->id;

                }
                $membersheet = Members::create([
                    'memberName' => preg_replace("/[^a-zA-Z0-9\s.,!?]/", "", $data[0]),
                    'memberMobile' => substr($data[1], 0, 1) !== '0' ? "0".$data[1] : $data[1],
                    'memberCity' => preg_replace("/[^a-zA-Z0-9\s.,!?]/", "", $data[2]),
                    'memberChapter' => $idchapter,
                    'status'=>'inactive',
                    'memberEmail' => preg_replace("/[^a-zA-Z0-9\s.,!?]/", "", $data[4]),
                 ]);
            }
            
           
        }
        
        if($membersheet){
            session()->flash('message','Bulk Member Uploaded Successfully!');
            return redirect('admin/members');
        }
        
    }
    
}