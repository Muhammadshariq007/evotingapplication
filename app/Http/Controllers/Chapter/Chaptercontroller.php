<?php

namespace App\Http\Controllers\Chapter;

use App\Http\Controllers\Controller;
use App\Models\Chapter\Chapter;
use Illuminate\Http\Request;
use File;
use Validator;

class Chaptercontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Chapter = Chapter::where(['status'=>'active'])->get();
       return view('backend.Chapter.view')->with(['Chapter'=>$Chapter]);
    }
    
    public function create($id='')
    {
        if(empty($id)){$singleChapter="";}else{
            $singleChapter = Chapter::where(['id'=>$id,'status'=>'active'])->first();
        }
        return view('backend.Chapter.add')->with(['singleChapter'=>$singleChapter]);
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
            'chapterName'=>'required',
        ]);
        
        $Insert=new Chapter();
      
        $Insert->Chaptername = $request->post('chapterName');
        $Insert->status = 'active'; 
        
        $data = $Insert->save();
        
        if($data){
        $request->session()->flash('message','New Chapter Created Successfully!');
        return redirect('admin/chapter/add');
        }else{
        $request->session()->flash('message','Something Wrong Please Try Again!');
        return redirect('admin/chapter/add');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admin\Login  $login
     * @return \Illuminate\Http\Response
     */
    public function show(Chapter $chapter)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin\Login  $login
     * @return \Illuminate\Http\Response
     */
    public function edit(Chapter $chapter)
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
    public function update(Request $request, Chapter $chapter)
    {
        
        $request->validate([
            'chapterName'=>'required',
        ]);
        
        $update=Chapter::find($request->post('id'));
        
       
        $update->Chaptername = $request->post('chapterName');
      
        $data = $update->save();

        if($data){
            $request->session()->flash('message','Information Updated Successfully!');
            return redirect('admin/chapter');
        }else{
            $request->session()->flash('message','Something Wrong Please Try Again!');
            return redirect('admin/chapter');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin\Login  $login
     * @return \Illuminate\Http\Response
     */
    public function destroy(Chapter $chapter , $id)
    {
        $fetch = Chapter::findOrFail($id);
        $fetch->delete();
        
        session()->flash('message','Record Deleted Successfully!');
        return redirect('admin/chapter');
    }
}