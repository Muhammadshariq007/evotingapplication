@extends('backend/layout')
@section('container')

<div class="container-fluid">        
<div class="page-title">
<div class="row">
<div class="col-6">
<h3>Member Bulk Uploading</h3>
</div>
<div class="col-6">
<ol class="breadcrumb">
<li class="breadcrumb-item"><a href="{{url('/admin/members')}}">                                       
<svg class="stroke-icon">
<use href="{{asset('adminAsset/assets/svg/icon-sprite.svg#stroke-home')}}"></use>
</svg></a></li>
<li class="breadcrumb-item">Members Bulk Uploading</li>

</ol>
</div>
</div>
</div>
</div>


<div class="container-fluid">
<div class="row">
<div class="col-sm-12">
<a href="{{asset('adminAsset/samplemembersheet.csv')}}" download class="mb-3 btn btn-primary btn-sm">Sample Sheet Download</a>
@if(Session::has('message'))

<div class="alert txt-success border-success outline-2x alert-dismissible fade show alert-icons" role="alert">
  <p>{{ Session::get('message') }}</p>
  <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
</div>

@endif

    
<div class="card">

<form class="form theme-form" method="post" action="{{route('members.bulk')}}" enctype="multipart/form-data">
@csrf
<div class="card-body">
  <div class="row">
    <div class="col">
      <div class="mb-3">
        <label class="form-label" for="exampleFormControlInput1">Sheet Upload*</label>
        <input class="form-control" name="bulkfile" id="exampleFormControlInput1" type="file" placeholder="" value="" required>
      </div>
    </div>
  </div>

</div>
<div class="card-footer text-end">
   
  <button class="btn btn-primary" type="submit">Submit</button>
  <input class="btn btn-light" type="reset" value="Cancel">
</div>
</form>
</div>

</div>
</div>
</div>


@endsection