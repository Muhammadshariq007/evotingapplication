@extends('backend/layout')
@section('container')

<div class="container-fluid">        
<div class="page-title">
<div class="row">
<div class="col-6">
<h3>Add New Candidate</h3>
</div>
<div class="col-6">
<ol class="breadcrumb">
<li class="breadcrumb-item"><a href="{{url('/admin/candidate/add')}}">                                       
<svg class="stroke-icon">
<use href="{{asset('adminAsset/assets/svg/icon-sprite.svg#stroke-home')}}"></use>
</svg></a></li>
<li class="breadcrumb-item">Add New Candidate</li>

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

<form class="form theme-form" method="post" action="{{$singleCandidate == '' ? route('candidate.insert') : route('candidate.update')}}" enctype="multipart/form-data">
@csrf
<div class="card-body">
  <div class="row">
    <div class="col">
      <div class="mb-3">
        <label class="form-label" for="exampleFormControlInput1">Nominee*</label>
        <select class="form-control" name="nomineeid" required>
            <option>Select Nominee</option>
            @foreach($Nominee as $item)
            @if($singleCandidate == '')
            <option value="{{$item->id}}">{{$item->nomineeName}}</option>
            @else
                @if($singleCandidate->nomineeId == $item->id)
                <option value="{{$item->id}}" selected>{{$item->nomineeName}}</option>
                @else
                <option value="{{$item->id}}">{{$item->nomineeName}}</option>
                @endif
            
            @endif
            
            @endforeach
        </select>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col">
      <div class="mb-3">
        <label class="form-label" for="exampleFormControlInput1">Name*</label>
        <input class="form-control" name="name" id="exampleFormControlInput1" type="text" placeholder="Enter Name" value="{{old('name')}}{{$singleCandidate == '' ? '' : $singleCandidate->candidateName}}" required>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col">
      <div class="mb-3">
        <label class="form-label" for="exampleInputPassword2">Mobile #*</label>
        <input class="form-control" name="mobileno" id="exampleInputPassword2" type="number" placeholder="Enter Mobile #" value="{{old('mobileno')}}{{$singleCandidate == '' ? '' : $singleCandidate->candidatePhone}}" required>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col">
      <div class="mb-3">
        <label class="form-label" for="exampleInputPassword2">City Name*</label>
        <input class="form-control" name="city" id="exampleInputPassword2" type="text" placeholder="Enter City Name" value="{{old('city')}}{{$singleCandidate == '' ? '' : $singleCandidate->candidateCity}}" required>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col">
      <div class="mb-3">
        <label class="form-label" for="exampleInputPassword2">Chapter Name*</label>
        <input class="form-control" name="chaptername" id="exampleInputPassword2" type="text" placeholder="Enter Chapter Name" value="{{old('chaptername')}}{{$singleCandidate == '' ? '' : $singleCandidate->candidateChaptername}}" required>
      </div>
    </div>
  </div>
  
  <div class="form-group">
    <label>Choose Picture</label>
    <input type="file" name="picture" class="form-control">
    @if(empty($singleCandidate))
    @else
    <img src="{{asset('storage/Candidatepicture/'.$singleCandidate->candidatePicture)}}" alt="" class="img-fluid" width="120">
    @endif
    
    </div>

</div>
<div class="card-footer text-end">
    <input type="hidden" name="id" value="{{$singleCandidate == '' ? '' : $singleCandidate->id}}">
  <button class="btn btn-primary" type="submit">Submit</button>
  <input class="btn btn-light" type="reset" value="Cancel">
</div>
</form>
</div>

</div>
</div>
</div>


@endsection