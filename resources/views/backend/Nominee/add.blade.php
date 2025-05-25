@extends('backend/layout')
@section('container')

<div class="container-fluid">        
<div class="page-title">
<div class="row">
<div class="col-6">
<h3>Add New Position</h3>
</div>
<div class="col-6">
<ol class="breadcrumb">
<li class="breadcrumb-item"><a href="{{url('/admin/nominee/add')}}">                                       
<svg class="stroke-icon">
<use href="{{asset('adminAsset/assets/svg/icon-sprite.svg#stroke-home')}}"></use>
</svg></a></li>
<li class="breadcrumb-item">Add New Position</li>

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

<form class="form theme-form" method="post" action="{{$singleNominee == '' ? route('nominee.insert') : route('nominee.update')}}" enctype="multipart/form-data">
@csrf
<div class="card-body">
  <div class="row">
    <div class="col">
      <div class="mb-3">
        <label class="form-label" for="exampleFormControlInput1">Position Name*</label>
        <input class="form-control" name="nomineeName" id="exampleFormControlInput1" type="text" placeholder="Enter Position Name" value="{{old('name')}}{{$singleNominee == '' ? '' : $singleNominee->nomineeName}}" required>
      </div>
    </div>
  </div>

</div>
<div class="card-footer text-end">
    <input type="hidden" name="id" value="{{$singleNominee == '' ? '' : $singleNominee->id}}">
  <button class="btn btn-primary" type="submit">Submit</button>
  <input class="btn btn-light" type="reset" value="Cancel">
</div>
</form>
</div>

</div>
</div>
</div>


@endsection