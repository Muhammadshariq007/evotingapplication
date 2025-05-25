@extends('backend/layout')
@section('container')

<div class="container-fluid">        
<div class="page-title">
<div class="row">
<div class="col-6">
<h3>Candidate</h3>
</div>
<div class="col-6">
<ol class="breadcrumb">
<li class="breadcrumb-item"><a href="{{url('/admin/candidate')}}">                                       
<svg class="stroke-icon">
  <use href="{{asset('adminAsset/assets/svg/icon-sprite.svg#stroke-home')}}"></use>
</svg></a></li>
<li class="breadcrumb-item">Candidate</li>

</ol>
</div>
</div>
</div>
</div>


<div class="container-fluid">
<div class="row">

<div class="col-sm-12">
<div class="card">

  <div class="card-body">
    <div class="dt-ext table-responsive">
      <table class="display" id="export-button">
        <thead>
          <tr>
            <th>Npminee Name</th>
            <th>Name</th>
            <th>Phone #</th>
            <th>City</th>
            <th>Chapter Name</th>
            <th>Status</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach($Candidate as $item)
          <tr>
            <td>{{$item->getNomineedetails == null || $item->getNomineedetails == '' ? '' : $item->getNomineedetails->nomineeName}}</td>
            <td>{{$item->candidateName}}</td>
            <td>{{$item->candidatePhone}}</td>
            <td>{{$item->candidateCity}}</td>
            <td>{{$item->candidateChaptername}}</td>
            <td><span class="badge badge-light-primary">{{$item->status}}</span></td>
            <td> 
              <ul class="action"> 
                <li class="edit"> <a href="{{url('/admin/candidate/add')}}/{{$item->id}}"><i class="icon-pencil-alt"></i></a></li>
                <li class="delete"><a href="{{url('/admin/candidate/delete')}}/{{$item->id}}"><i class="icon-trash"></i></a></li>
              </ul>
            </td>
          </tr>
          @endforeach
        </tbody>
       
      </table>
    </div>
  </div>
</div>
</div>

</div>
</div>


@endsection