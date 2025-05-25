@extends('backend/layout')
@section('container')

<div class="container-fluid">        
<div class="page-title">
<div class="row">
<div class="col-6">
<h3>Add New Members</h3>
</div>
<div class="col-6">
<ol class="breadcrumb">
<li class="breadcrumb-item"><a href="{{url('/admin/members/add')}}">                                       
<svg class="stroke-icon">
<use href="{{asset('adminAsset/assets/svg/icon-sprite.svg#stroke-home')}}"></use>
</svg></a></li>
<li class="breadcrumb-item">Add New Members</li>

</ol>
</div>
</div>
</div>
</div>


<div class="container-fluid">
<div class="row">
<div class="col-sm-12">

@if(Session::has('message'))

<div class="alert txt-success border-success outline-2x alert-dismissible fade show alert-icons" role="alert">
  <p>{{ Session::get('message') }}</p>
  <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
</div>

@endif

    
<div class="card">

<form class="form theme-form" method="post" action="{{$singleMembers == '' ? route('members.insert') : route('members.update')}}" enctype="multipart/form-data">
@csrf
<div class="card-body">
  <div class="row">
    <div class="col">
      <div class="mb-3">
        <label class="form-label" for="exampleFormControlInput1">Name*</label>
        <input class="form-control" name="name" id="exampleFormControlInput1" type="text" placeholder="Enter Name" value="{{old('name')}}{{$singleMembers == '' ? '' : $singleMembers->memberName}}" required>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col">
      <div class="mb-3">
        <label class="form-label" for="exampleInputPassword2">Email</label>
        <input class="form-control" name="memberEmail" id="exampleInputPassword2" type="email" placeholder="Enter Email Address" value="{{old('memberEmail')}}{{$singleMembers == '' ? '' : $singleMembers->memberEmail}}" >
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col">
      <div class="mb-3">
        <label class="form-label" for="exampleInputPassword2">Mobile #</label>
        <input class="form-control" name="mobileno" id="exampleInputPassword2" type="number" placeholder="Enter Mobile #" value="{{old('mobileno')}}{{$singleMembers == '' ? '' : $singleMembers->memberMobile}}" >
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col">
      <div class="mb-3">
        <label class="form-label" for="exampleInputPassword2">City Name*</label>
        <input class="form-control" name="city" id="exampleInputPassword2" type="text" placeholder="Enter City Name" value="{{old('city')}}{{$singleMembers == '' ? '' : $singleMembers->memberCity}}" required>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col">
      <div class="mb-3">
        <label class="form-label" for="exampleInputPassword2">Chapter Name*</label>
        <select class="form-control" name="chaptername" required>
            <option value="">Select Chapter</option>
            @foreach($Chapter as $itemchapter)
            @if($singleMembers == '')
             <option value="{{$itemchapter->id}}">{{$itemchapter->Chaptername}}</option>
            @else
                @if($singleMembers->memberChapter == $itemchapter->id)
                <option value="{{$itemchapter->id}}" selected>{{$itemchapter->Chaptername}}</option>
                @else
                <option value="{{$itemchapter->id}}">{{$itemchapter->Chaptername}}</option>
                @endif
            @endif
           
            @endforeach
        </select>
        <!--<input class="form-control" name="chaptername" id="exampleInputPassword2" type="text" placeholder="Enter Chapter Name" value="{{old('chaptername')}}{{$singleMembers == '' ? '' : $singleMembers->memberChapter}}" required>-->
      </div>
    </div>
  </div>
  
  @if($singleMembers == '')
  @else
  
  <div class="row">
    <div class="col">
      <div class="mb-3">
        <label class="form-label" for="exampleInputPassword2">Status</label>
        <select class="form-control" name="status">
            <option value="">Select Status</option>
            <option value="active" @if($singleMembers->status == 'active') selected @else @endif>Active</option>
            <option value="inactive" @if($singleMembers->status == 'inactive') selected @else @endif>Inactive</option>
        </select>
      </div>
    </div>
  </div>
  
  @endif
  
  

</div>
<div class="card-footer text-end">
    <input type="hidden" name="id" value="{{$singleMembers == '' ? '' : $singleMembers->id}}">
  <button class="btn btn-primary" type="submit">Submit</button>
  <input class="btn btn-light" type="reset" value="Cancel">
</div>
</form>
</div>

</div>
</div>
</div>


@endsection