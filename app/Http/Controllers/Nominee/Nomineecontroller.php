<?php

namespace App\Http\Controllers\Nominee;

use App\Http\Controllers\Controller;
use App\Models\Nominee\Nominee;
use Illuminate\Http\Request;
use File;
use Validator;

class Nomineecontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Nominee = Nominee::where(['status'=>'active'])->get();
       return view('backend.Nominee.view')->with(['Nominee'=>$Nominee]);
    }
    
    public function create($id='')
    {
        if(empty($id)){$singleNominee="";}else{
            $singleNominee = Nominee::where(['id'=>$id,'status'=>'active'])->first();
        }
        return view('backend.Nominee.add')->with(['singleNominee'=>$singleNominee]);
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
            'nomineeName'=>'required',
        ]);
        
        $Insert=new Nominee();
      
        $Insert->nomineeName = $request->post('nomineeName');
        $Insert->status = 'active'; 
        
        $data = $Insert->save();
        
        if($data){
        $request->session()->flash('message','New Nominee Created Successfully!');
        return redirect('admin/nominee/add');
        }else{
        $request->session()->flash('message','Something Wrong Please Try Again!');
        return redirect('admin/nominee/add');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admin\Login  $login
     * @return \Illuminate\Http\Response
     */
    public function show(Nominee $nominee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin\Login  $login
     * @return \Illuminate\Http\Response
     */
    public function edit(Nominee $nominee)
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
    public function update(Request $request, Nominee $nominee)
    {
        
        $request->validate([
            'nomineeName'=>'required',
        ]);
        
        $update=Nominee::find($request->post('id'));
        
       
        $update->nomineeName = $request->post('nomineeName');
      
        $data = $update->save();

        if($data){
            $request->session()->flash('message','Information Updated Successfully!');
            return redirect('admin/nominee');
        }else{
            $request->session()->flash('message','Something Wrong Please Try Again!');
            return redirect('admin/nominee');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin\Login  $login
     * @return \Illuminate\Http\Response
     */
    public function destroy(Nominee $nominee , $id)
    {
        $fetch = Nominee::findOrFail($id);
        $fetch->delete();
        
        session()->flash('message','Record Deleted Successfully!');
        return redirect('admin/nominee');
    }
}