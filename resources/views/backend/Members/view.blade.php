@extends('backend/layout')
@section('container')

<div class="container-fluid">        
<div class="page-title">
<div class="row">
<div class="col-6">
<h3>Members</h3>
</div>
<div class="col-6">
<ol class="breadcrumb">
<li class="breadcrumb-item"><a href="{{url('/admin/members')}}">                                       
<svg class="stroke-icon">
  <use href="{{asset('adminAsset/assets/svg/icon-sprite.svg#stroke-home')}}"></use>
</svg></a></li>
<li class="breadcrumb-item">Members</li>

</ol>
</div>
</div>
</div>
</div>


<div class="container-fluid">
<div class="row">

<div class="col-sm-12">
   <div class="row">
     <div class="col-md-3">
          <div class="form-group mb-3">
        <select class="form-control memberstatus">
            <option value="">Select Status</option>
            @if($status == '' || $status == null)
                
                <option value="inactive">All Inactive</option>
            <option value="active">All Active</option>
            
            @else
            
            <option value="inactive" @if($status == 'inactive') selected @else @endif>All Inactive</option>
            <option value="active" @if($status == 'active') selected @else @endif>All Active</option>
            
            @endif
            
        </select>
    </div>
     </div>
 </div>
<div class="card">
 
 
 
  <div class="card-body">
    <div class="dt-ext table-responsive">
      <table class="display" id="export-button">
        <thead>
          <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Mobile #</th>
            <th>City</th>
            <th>Chapter Name</th>
            <th>Status</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach($Members as $item)
          <tr>
            <td>{{$item->memberName}}</td>
            <td>{{$item->memberEmail}}</td>
            <td>{{$item->memberMobile}}</td>
            <td>{{$item->memberCity}}</td>
            <td>{{$item->getChapterdetails == null ? '' : $item->getChapterdetails->Chaptername}}</td>
            <td>
                @if($item->status == 'active')
                <span class="badge badge-light-primary">
                @else
                <span class="badge badge-light-danger">
                @endif
                {{$item->status}}</span></td>
            <td> 
              <ul class="action"> 
                <li class="edit"> <a href="{{url('/admin/members/add')}}/{{$item->id}}"><i class="icon-pencil-alt"></i></a></li>
                <li class="delete"><a href="{{url('/admin/members/delete')}}/{{$item->id}}"><i class="icon-trash"></i></a></li>
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