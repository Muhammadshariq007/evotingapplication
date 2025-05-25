@extends('backend/layout')
@section('container')

<div class="container-fluid">        
<div class="page-title">
<div class="row">
<div class="col-6">
<h3>Chapter Wise Reporting</h3>
</div>
<div class="col-6">
<ol class="breadcrumb">
<li class="breadcrumb-item"><a href="{{url('/admin/nominee')}}">                                       
<svg class="stroke-icon">
  <use href="{{asset('adminAsset/assets/svg/icon-sprite.svg#stroke-home')}}"></use>
</svg></a></li>
<li class="breadcrumb-item">Chapter Wise Reporting</li>

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
            <th>Chapter Name</th>
            <th>Count</th>
          </tr>
        </thead>
        <tbody>
         
         @foreach($MembersChapterwise as $chapterwise)
            <tr>
                <td>{{$chapterwise->Chaptername}}</td>
                <td>{{$chapterwise->ballotpaper_count}}</td>
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