@extends('backend/layout')
@section('container')

@php
    $setupinfo = App\Models\Setup\Setup::first();
@endphp

<div class="container-fluid">        
    <div class="page-title">
      <div class="row">
        <div class="col-6">
          <h3>Dashboard</h3>
        </div>
        <div class="col-6">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">                                       
                <svg class="stroke-icon">
                  <use href="{{asset('adminAsset/assets/svg/icon-sprite.svg#stroke-home')}}"></use>
                </svg></a></li>
            <li class="breadcrumb-item">Dashboard</li>
 
          </ol>
        </div>
      </div>
    </div>
  </div>
  

<!-- Container-fluid starts-->
<div class="container-fluid">
<div class="row widget-grid">
<div class="col-xxl-12 col-sm-12 box-col-12"> 
<div class="card profile-box">
<div class="card-body">
<div class="media media-wrapper">
<div class="media-body"> 
<div class="greeting-user">
  <h4 class="f-w-600">Welcome to {{$setupinfo->companyName}}</h4>
  
</div>
</div>

</div>

</div>
</div>
</div>
<div class="col-xxl-4 col-xl-4 col-sm-6 box-col-6"> 
<div class="row"> 
<div class="col-xl-12"> 
<div class="card widget-1">
<div class="card-body"> 
<div class="widget-content">
  <div class="widget-round secondary">
    <div class="bg-round">
      <svg class="svg-fill">
        <use href="{{asset('adminAsset/assets/svg/icon-sprite.svg#cart')}}"> </use>
      </svg>
      <svg class="half-circle svg-fill">
        <use href="{{asset('adminAsset/assets/svg/icon-sprite.svg#halfcircle')}}"></use>
      </svg>
    </div>
  </div>
  <div> 
    <h4>{{$countMembers}}</h4><span class="f-light">Total Members</span>
  </div>
</div>

</div>
</div>

</div>
</div>
</div>
<div class="col-xxl-4 col-xl-4 col-sm-6 box-col-6"> 
<div class="row"> 
<div class="col-xl-12"> 
<div class="card widget-1">
<div class="card-body"> 
<div class="widget-content">
  <div class="widget-round warning">
    <div class="bg-round">
      <svg class="svg-fill">
        <use href="{{asset('adminAsset/assets/svg/icon-sprite.svg#return-box')}}"> </use>
      </svg>
      <svg class="half-circle svg-fill">
        <use href="{{asset('adminAsset/assets/svg/icon-sprite.svg#halfcircle')}}"></use>
      </svg>
    </div>
  </div>
  <div> 
    <h4>{{$countNominee}}</h4><span class="f-light">Total Positions</span>
  </div>
</div>

</div>
</div>
<!--<div class="col-xl-12"> -->
<!--<div class="card widget-1">-->
<!--<div class="card-body"> -->
<!--  <div class="widget-content">-->
<!--    <div class="widget-round success">-->
<!--      <div class="bg-round">-->
<!--        <svg class="svg-fill">-->
<!--          <use href="{{asset('adminAsset/assets/svg/icon-sprite.svg#rate')}}"> </use>-->
<!--        </svg>-->
<!--        <svg class="half-circle svg-fill">-->
<!--          <use href="{{asset('adminAsset/assets/svg/icon-sprite.svg#halfcircle')}}"></use>-->
<!--        </svg>-->
<!--      </div>-->
<!--    </div>-->
<!--    <div> -->
<!--      <h4>5700</h4><span class="f-light">Purchase rate</span>-->
<!--    </div>-->
<!--  </div>-->
<!--  <div class="font-success f-w-500"><i class="icon-arrow-up icon-rotate me-1"></i><span>+70%</span></div>-->
<!--</div>-->
<!--</div>-->
<!--</div>-->
</div>
</div>
</div>
<div class="col-xxl-4 col-xl-4 col-sm-6 box-col-6"> 
<div class="card widget-1">
<div class="card-body"> 
  <div class="widget-content">
    <div class="widget-round primary">
      <div class="bg-round">
        <svg class="svg-fill">
          <use href="{{asset('adminAsset/assets/svg/icon-sprite.svg#tag')}}"> </use>
        </svg>
        <svg class="half-circle svg-fill">
          <use href="{{asset('adminAsset/assets/svg/icon-sprite.svg#halfcircle')}}"></use>
        </svg>
      </div>
    </div>
    <div> 
      <h4>{{$countCandidate}}</h4><span class="f-light">Total Candidate</span>
    </div>
  </div>
  
</div>
</div>
</div>
<div class="col-xxl-4 col-xl-4 col-sm-6 box-col-6"> 
<div class="card widget-1">
<div class="card-body"> 
  <div class="widget-content">
    <div class="widget-round primary">
      <div class="bg-round">
        <svg class="svg-fill">
          <use href="{{asset('adminAsset/assets/svg/icon-sprite.svg#tag')}}"> </use>
        </svg>
        <svg class="half-circle svg-fill">
          <use href="{{asset('adminAsset/assets/svg/icon-sprite.svg#halfcircle')}}"></use>
        </svg>
      </div>
    </div>
    <div> 
      <h4>{{$countMembers}}</h4><span class="f-light">Total Vote</span>
    </div>
  </div>
  
</div>
</div>
</div>
<div class="col-xxl-4 col-xl-4 col-sm-6 box-col-6"> 
<div class="card widget-1">
<div class="card-body"> 
  <div class="widget-content">
    <div class="widget-round primary">
      <div class="bg-round">
        <svg class="svg-fill">
          <use href="{{asset('adminAsset/assets/svg/icon-sprite.svg#tag')}}"> </use>
        </svg>
        <svg class="half-circle svg-fill">
          <use href="{{asset('adminAsset/assets/svg/icon-sprite.svg#halfcircle')}}"></use>
        </svg>
      </div>
    </div>
    <div> 
      <h4>{{$countBallotpaper}}</h4><span class="f-light">Cast Vote</span>
    </div>
  </div>
  
</div>
</div>
</div>
<div class="col-xxl-4 col-xl-4 col-sm-6 box-col-6"> 
<div class="card widget-1">
<div class="card-body"> 
  <div class="widget-content">
    <div class="widget-round primary">
      <div class="bg-round">
        <svg class="svg-fill">
          <use href="{{asset('adminAsset/assets/svg/icon-sprite.svg#tag')}}"> </use>
        </svg>
        <svg class="half-circle svg-fill">
          <use href="{{asset('adminAsset/assets/svg/icon-sprite.svg#halfcircle')}}"></use>
        </svg>
      </div>
    </div>
    <div> 
      <h4>{{$countMembers - $countBallotpaper}}</h4><span class="f-light">Balance Vote</span>
    </div>
  </div>
  
</div>
</div>
</div>


<!--<div class="col-xxl-4 col-xl-12 col-sm-6 box-col-6">-->
<!--<div class="row"> -->
<!--<div class="col-xxl-12 col-xl-6 box-col-12">-->
<!--<div class="card widget-1 widget-with-chart">-->
<!--<div class="card-body"> -->
<!--<div> -->
<!--  <h4 class="mb-1">1,80k</h4><span class="f-light">Orders</span>-->
<!--</div>-->
<!--<div class="order-chart"> -->
<!--  <div id="orderchart"></div>-->
<!--</div>-->
<!--</div>-->
<!--</div>-->
<!--</div>-->
<!--<div class="col-xxl-12 col-xl-6 box-col-12">-->
<!--<div class="card widget-1 widget-with-chart">-->
<!--<div class="card-body"> -->
<!--<div> -->
<!--  <h4 class="mb-1">6,90k</h4><span class="f-light">Profit</span>-->
<!--</div>-->
<!--<div class="profit-chart"> -->
<!--  <div id="profitchart"></div>-->
<!--</div>-->
<!--</div>-->
<!--</div>-->
<!--</div>-->
<!--</div>-->
<!--</div>-->

</div>

<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12">
        <h3 class="py-3">Live Vote Caste Report</h3>
        <table class="table table-bordered table-striped table-responsive">
            <thead>
                <tr>
                    <th>Members</th>
                    <th>Email Address</th>
                    <th>Positions</th>
                    <th>Candidates</th>
                    <th>Total Votes</th>
                    <th>Votes Casted</th>
                    <th>Remaining Votes</th>
                </tr>
            </thead>
        </table>
    </div>
</div>

</div>
<!-- Container-fluid Ends-->

@endsection