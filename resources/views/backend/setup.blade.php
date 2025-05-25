@extends('backend/layout')
@section('container')

<div class="container-fluid">        
<div class="page-title">
<div class="row">
<div class="col-6">
<h3>Setup</h3>
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

@if ($errors->any())
<div class="alert alert-danger alert-dismissible fade show">

@foreach ($errors->all() as $error)
<svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="mr-2"><polygon points="7.86 2 16.14 2 22 7.86 22 16.14 16.14 22 7.86 22 2 16.14 2 7.86 7.86 2"></polygon><line x1="15" y1="9" x2="9" y2="15"></line><line x1="9" y1="9" x2="15" y2="15"></line></svg><strong>Error!</strong> {{ $error }} <br>
@endforeach
<button type="button" class="close h-100" data-dismiss="alert" aria-label="Close"><span><i class="mdi mdi-close"></i></span>
</button>
</div>
@endif

    
<div class="card">

<form class="form theme-form" method="post" action="{{route('setup.update')}}" enctype="multipart/form-data">
@csrf
<div class="card-body">
 
  <div class="row">
    <div class="col">
      <div class="mb-3">
        <label class="form-label" for="exampleFormControlInput1">Company Name*</label>
        <input class="form-control" name="companyname" id="exampleFormControlInput1" type="text" placeholder="Enter Company Name" value="{{old('companyname')}}{{$Setup == '' ? '' : $Setup->companyName}}" required>
      </div>
    </div>
  </div>
  
  
  <div class="form-group">
    <label>Choose Logo</label>
    <input type="file" name="picturelogo" class="form-control">
   @if(empty($Setup))
    @else
    <img src="{{asset('storage/companyLogo/'.$Setup->companyLogo)}}" alt="" class="img-fluid" width="120">
    @endif
    </div>
    
    <div class="row pt-4">
    <div class="col">
      <div class="mb-3">
        <label class="form-label" for="exampleFormControlInput1">Voting Start Time</label>
        <input class="form-control" name="votingstart" id="eventstart" type="text" value="{{old('votingstart')}}{{$Setup == '' ? '' : $Setup->votingstart}}" placeholder="Enter Event Start Time">
      </div>
    </div>
  </div>
  
   <div class="row">
    <div class="col">
      <div class="mb-3">
        <label class="form-label" for="exampleFormControlInput1">Voting End Time</label>
        <input class="form-control" name="votingend" id="votingend" type="text" value="{{old('votingend')}}{{$Setup == '' ? '' : $Setup->votingend}}" placeholder="Enter Event End Time">
      </div>
    </div>
  </div>

</div>

<div class="card-footer text-end">
    <input type="hidden" name="id" value="">
  <button class="btn btn-primary" type="submit">Update</button>
  <input class="btn btn-light" type="reset" value="Cancel">
</div>
</form>
</div>

</div>
</div>
</div>

<script src="https://cdn.jsdelivr.net/npm/jquery"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-datetimepicker/build/jquery.datetimepicker.full.min.js"></script>

<script>
    $("#eventstart").datetimepicker({
        format: "Y-m-d H:i",
        step: 30,
        dayOfWeekStart: 1,
        timepicker: true,
        hours24: true,
      });
      
      $("#votingend").datetimepicker({
        format: "Y-m-d H:i",
        step: 30,
        dayOfWeekStart: 1,
        timepicker: true,
        hours24: true,
      });
</script>

@endsection