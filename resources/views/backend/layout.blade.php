@php
    $setupinfo = App\Models\Setup\Setup::first();
@endphp
<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="Cuba admin is super flexible, powerful, clean &amp; modern responsive bootstrap 5 admin template with unlimited possibilities.">
<meta name="keywords" content="admin template, Cuba admin template, dashboard template, flat admin template, responsive admin template, web app">
<meta name="author" content="pixelstrap">
<!--<link rel="icon" href="{{asset('adminAsset/assets/images/favicon.png')}}" type="image/x-icon">-->
<!--<link rel="shortcut icon" href="{{asset('adminAsset/assets/images/favicon.png')}}" type="image/x-icon">-->
<title>Evoting Admin Panel</title>
<!-- Google font-->
<link href="https://fonts.googleapis.com/css?family=Rubik:400,400i,500,500i,700,700i&amp;display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i,900&amp;display=swap" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="{{asset('adminAsset/assets/css/font-awesome.css')}}">
<!-- ico-font-->
<link rel="stylesheet" type="text/css" href="{{asset('adminAsset/assets/css/vendors/icofont.css')}}">
<!-- Themify icon-->
<link rel="stylesheet" type="text/css" href="{{asset('adminAsset/assets/css/vendors/themify.css')}}">
<!-- Flag icon-->
<link rel="stylesheet" type="text/css" href="{{asset('adminAsset/assets/css/vendors/flag-icon.css')}}">
<!-- Feather icon-->
<link rel="stylesheet" type="text/css" href="{{asset('adminAsset/assets/css/vendors/feather-icon.css')}}">
<!-- Plugins css start-->
<link rel="stylesheet" type="text/css" href="{{asset('adminAsset/assets/css/vendors/slick.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('adminAsset/assets/css/vendors/slick-theme.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('adminAsset/assets/css/vendors/scrollbar.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('adminAsset/assets/css/vendors/animate.css')}}">
<!-- Plugins css Ends-->

<link rel="stylesheet" type="text/css" href="{{asset('adminAsset/assets/css/vendors/datatables.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('adminAsset/assets/css/vendors/datatable-extension.css')}}">

<!-- Bootstrap css-->
<link rel="stylesheet" type="text/css" href="{{asset('adminAsset/assets/css/vendors/bootstrap.css')}}">
<!-- App css-->
<link rel="stylesheet" type="text/css" href="{{asset('adminAsset/assets/css/style.css')}}">
<link id="color" rel="stylesheet" href="{{asset('adminAsset/assets/css/color-1.css')}}" media="screen">
<!-- Responsive css-->
<link rel="stylesheet" type="text/css" href="{{asset('adminAsset/assets/css/responsive.css')}}">
<link
  rel="stylesheet"
  href="https://cdn.jsdelivr.net/npm/jquery-datetimepicker/build/jquery.datetimepicker.min.css"
/>
<style>
    .simplebar-mask {
    top: 185px;
}
</style>
</head>
<body> 
<!-- loader starts-->
<div class="loader-wrapper">
<div class="loader-index"> <span></span></div>
<svg>
<defs></defs>
<filter id="goo">
  <fegaussianblur in="SourceGraphic" stddeviation="11" result="blur"></fegaussianblur>
  <fecolormatrix in="blur" values="1 0 0 0 0  0 1 0 0 0  0 0 1 0 0  0 0 0 19 -9" result="goo"> </fecolormatrix>
</filter>
</svg>
</div>
<!-- loader ends-->
<!-- tap on top starts-->
<div class="tap-top"><i data-feather="chevrons-up"></i></div>
<!-- tap on tap ends-->
<!-- page-wrapper Start-->
<div class="page-wrapper compact-wrapper" id="pageWrapper">
<!-- Page Header Start-->
<div class="page-header">
<div class="header-wrapper row m-0">
  <!--<form class="form-inline search-full col" action="#" method="get">-->
  <!--  <div class="form-group w-100">-->
  <!--    <div class="Typeahead Typeahead--twitterUsers">-->
  <!--      <div class="u-posRelative">-->
  <!--        <input class="demo-input Typeahead-input form-control-plaintext w-100" type="text" placeholder="Search Cuba .." name="q" title="" autofocus>-->
  <!--        <div class="spinner-border Typeahead-spinner" role="status"><span class="sr-only">Loading...</span></div><i class="close-search" data-feather="x"></i>-->
  <!--      </div>-->
  <!--      <div class="Typeahead-menu"></div>-->
  <!--    </div>-->
  <!--  </div>-->
  <!--</form>-->
  <div class="header-logo-wrapper col-auto p-0">
    <div class="logo-wrapper"><a href="#"><img class="img-fluid" src="{{asset('storage/companyLogo/'.$setupinfo->companyLogo)}}" alt="" width="100"></a></div>
    <div class="toggle-sidebar"><i class="status_toggle middle sidebar-toggle" data-feather="align-center"></i></div>
  </div>
  <div class="left-header col-xxl-5 col-xl-6 col-lg-5 col-md-4 col-sm-3 p-0">
    <div class="notification-slider">
      <div class="d-flex h-100"> <img src="{{asset('adminAsset/assets/images/giftools.gif')}}" alt="gif">
        <h6 class="mb-0 f-w-400"><span class="font-primary">{{$setupinfo->companyName}}</span></h6>
      </div>
      <div class="d-flex h-100"><img src="{{asset('adminAsset/assets/images/giftools.gif')}}" alt="gif">
        <h6 class="mb-0 f-w-400"><span class="f-light">Election Coming Soon! </span></h6>
      </div>
    </div>
  </div>
  <div class="nav-right col-xxl-7 col-xl-6 col-md-7 col-8 pull-right right-header p-0 ms-auto">
    <ul class="nav-menus">
      
      <li class="profile-nav onhover-dropdown pe-0 py-0">
        <div class="media profile-media"><img class="b-r-10" src="{{asset('adminAsset/assets/images/dashboard/profile.png')}}" alt="">
          <div class="media-body"><span>{{$setupinfo->companyName}}</span>
            <p class="mb-0 font-roboto">Admin <i class="middle fa fa-angle-down"></i></p>
          </div>
        </div>
        <ul class="profile-dropdown onhover-show-div">
          <li><a href="{{url('/logout')}}"><i data-feather="log-in"> </i><span>Logout</span></a></li>
        </ul>
      </li>
    </ul>
  </div>
  <script class="result-template" type="text/x-handlebars-template">
    <div class="ProfileCard u-cf">                        
    <div class="ProfileCard-avatar"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-airplay m-0"><path d="M5 17H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-1"></path><polygon points="12 15 17 21 7 21 12 15"></polygon></svg></div>
    <div class="ProfileCard-details">
    <div class="ProfileCard-realName">asdasdas</div>
    </div>
    </div>
  </script>
  <script class="empty-template" type="text/x-handlebars-template"><div class="EmptyMessage">Your search turned up 0 results. This most likely means the backend is down, yikes!</div></script>
</div>
</div>
<!-- Page Header Ends                              -->
<!-- Page Body Start-->
<div class="page-body-wrapper">
<!-- Page Sidebar Start-->
<div class="sidebar-wrapper" sidebar-layout="stroke-svg">
  <div>
    <div class="logo-wrapper"><a href="#"><img class="img-fluid for-light" src="{{asset('storage/companyLogo/'.$setupinfo->companyLogo)}}" alt="" width="130"><img class="img-fluid for-dark" src="{{asset('storage/companyLogo/'.$setupinfo->companyLogo)}}" alt="" width="50"></a>
      <div class="back-btn"><i class="fa fa-angle-left"></i></div>
      <div class="toggle-sidebar"><i class="status_toggle middle sidebar-toggle" data-feather="grid"> </i></div>
    </div>
    <div class="logo-icon-wrapper"><a href="#"><img class="img-fluid" src="{{asset('storage/companyLogo/'.$setupinfo->companyLogo)}}" alt="" width="50"></a></div>
    <nav class="sidebar-main">
      <div class="left-arrow" id="left-arrow"><i data-feather="arrow-left"></i></div>
      <div id="sidebar-menu">
        <ul class="sidebar-links" id="simple-bar">
          <li class="back-btn"><a href="#"><img class="img-fluid" src="{{asset('adminAsset/assets/images/logo/logo-icon.png')}}" alt=""></a>
            <div class="mobile-back text-end"><span>Back</span><i class="fa fa-angle-right ps-2" aria-hidden="true"></i></div>
          </li>
          <li class="pin-title sidebar-main-title">
            <div> 
              <h6>Pinned</h6>
            </div>
          </li>
          <!--<li class="sidebar-main-title">-->
          <!--  <div>-->
          <!--    <h6 class="lan-1">General</h6>-->
          <!--  </div>-->
          <!--</li>-->
          <li class="sidebar-list"><i class="fa fa-thumb-tack"></i>
           <a class="sidebar-link sidebar-title" href="{{url('/admin/dashboard')}}">
              <svg class="stroke-icon">
                <use href="{{asset('adminAsset/assets/svg/icon-sprite.svg#stroke-home')}}"></use>
              </svg>
              <svg class="fill-icon">
                <use href="{{asset('adminAsset/assets/svg/icon-sprite.svg#fill-home')}}"></use>
              </svg><span class="lan-3">Dashboard </span></a>
          
          </li>
          <li class="sidebar-list"><i class="fa fa-thumb-tack"></i><a class="sidebar-link sidebar-title" href="#">
              <svg class="stroke-icon">
                <use href="{{asset('adminAsset/assets/svg/icon-sprite.svg#stroke-members')}}"></use>
              </svg>
              <svg class="fill-icon">
                <use href="{{asset('adminAsset/assets/svg/icon-sprite.svg#fill-members')}}"></use>
              </svg><span class="lan-10">Members </span></a>
            <ul class="sidebar-submenu">
              <li><a href="{{url('/admin/members/add')}}">Add</a></li>
              <li><a href="{{url('/admin/members')}}">View</a></li>
              <li><a href="{{url('/admin/members/bulk')}}">Bulk Uploading</a></li>
            </ul>
          </li>
          
          <li class="sidebar-list"><i class="fa fa-thumb-tack"></i><a class="sidebar-link sidebar-title" href="#">
              <svg class="stroke-icon">
                <use href="{{asset('adminAsset/assets/svg/icon-sprite.svg#stroke-candidate')}}"></use>
              </svg>
              <svg class="fill-icon">
                <use href="{{asset('adminAsset/assets/svg/icon-sprite.svg#fill-candidate')}}"></use>
              </svg><span class="lan-10">Candidate </span></a>
            <ul class="sidebar-submenu">
              <li><a href="{{url('/admin/candidate/add')}}">Add</a></li>
              <li><a href="{{url('/admin/candidate')}}">View</a></li>
            </ul>
          </li>
          
           <li class="sidebar-list"><i class="fa fa-thumb-tack"></i><a class="sidebar-link sidebar-title" href="#">
              <svg class="stroke-icon">
                <use href="{{asset('adminAsset/assets/svg/icon-sprite.svg#stroke-nominee')}}"></use>
              </svg>
              <svg class="fill-icon">
                <use href="{{asset('adminAsset/assets/svg/icon-sprite.svg#fill-nominee')}}"></use>
              </svg><span class="lan-10">Position </span></a>
            <ul class="sidebar-submenu">
              <li><a href="{{url('/admin/nominee/add')}}">Add</a></li>
              <li><a href="{{url('/admin/nominee')}}">View</a></li>
            </ul>
          </li>
          
           <li class="sidebar-list"><i class="fa fa-thumb-tack"></i><a class="sidebar-link sidebar-title" href="#">
              <svg class="stroke-icon">
                <use href="{{asset('adminAsset/assets/svg/icon-sprite.svg#stroke-nominee')}}"></use>
              </svg>
              <svg class="fill-icon">
                <use href="{{asset('adminAsset/assets/svg/icon-sprite.svg#fill-chapter')}}"></use>
              </svg><span class="lan-10">Chapter </span></a>
            <ul class="sidebar-submenu">
              <li><a href="{{url('/admin/chapter/add')}}">Add</a></li>
              <li><a href="{{url('/admin/chapter')}}">View</a></li>
            </ul>
          </li>
          
          <li class="sidebar-list"><i class="fa fa-thumb-tack"></i>
           <a class="sidebar-link sidebar-title" href="{{url('/admin/setup')}}">
              <svg class="stroke-icon">
                <use href="{{asset('adminAsset/assets/svg/icon-sprite.svg#stroke-setup')}}"></use>
              </svg>
              <svg class="fill-icon">
                <use href="{{asset('adminAsset/assets/svg/icon-sprite.svg#fill-setup')}}"></use>
              </svg><span class="lan-14">Setup </span></a>
          
          </li>
          
          <li class="sidebar-list"><i class="fa fa-thumb-tack"></i><a class="sidebar-link sidebar-title" href="#">
              <svg class="stroke-icon">
                <use href="{{asset('adminAsset/assets/svg/icon-sprite.svg#stroke-nominee')}}"></use>
              </svg>
              <svg class="fill-icon">
                <use href="{{asset('adminAsset/assets/svg/icon-sprite.svg#fill-reporting')}}"></use>
              </svg><span class="lan-10">Reporting </span></a>
            <ul class="sidebar-submenu">
              <li><a href="{{url('/admin/report/city-wise')}}">City Wise</a></li>
              <li><a href="{{url('/admin/report/chapter-wise')}}">Chapter Wise</a></li>
              <li><a href="{{url('/admin/report/candidate-wise')}}">Candidate Wise</a></li>
              <li><a href="{{url('/admin/report/position-wise')}}">Position Wise</a></li>
              <li><a href="{{url('/admin/report/audit-report')}}">Audit Report</a></li>
            </ul>
          </li>
       
        </ul>
      </div>
      <div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
    </nav>
  </div>
</div>
<!-- Page Sidebar Ends-->
<div class="page-body">
 
    @section('container')
    @show
  
</div>
<!-- footer start-->
<footer class="footer">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12 footer-copyright text-center">
        <p class="mb-0">Copyright {{date("Y")}} © Evoting Develop by Fifth Thought  </p>
      </div>
    </div>
  </div>
</footer>
</div>
</div>



<!-- latest jquery-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<!-- Bootstrap js-->
<script src="{{asset('adminAsset/assets/js/bootstrap/bootstrap.bundle.min.js')}}"></script>
<!-- feather icon js-->
<script src="{{asset('adminAsset/assets/js/icons/feather-icon/feather.min.js')}}"></script>
<script src="{{asset('adminAsset/assets/js/icons/feather-icon/feather-icon.js')}}"></script>
<!-- scrollbar js-->
<script src="{{asset('adminAsset/assets/js/scrollbar/simplebar.js')}}"></script>
<script src="{{asset('adminAsset/assets/js/scrollbar/custom.js')}}"></script>
<!-- Sidebar jquery-->
<script src="{{asset('adminAsset/assets/js/config.js')}}"></script>
<!-- Plugins JS start-->
<script src="{{asset('adminAsset/assets/js/sidebar-menu.js')}}"></script>
<script src="{{asset('adminAsset/assets/js/clock.js')}}"></script>
<script src="{{asset('adminAsset/assets/js/slick/slick.min.js')}}"></script>
<script src="{{asset('adminAsset/assets/js/slick/slick.js')}}"></script>
<script src="{{asset('adminAsset/assets/js/header-slick.js')}}"></script>

 <script src="{{asset('adminAsset/assets/js/datatable/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('adminAsset/assets/js/datatable/datatable-extension/dataTables.buttons.min.js')}}"></script>
    <script src="{{asset('adminAsset/assets/js/datatable/datatable-extension/jszip.min.js')}}"></script>
    <script src="{{asset('adminAsset/assets/js/datatable/datatable-extension/buttons.colVis.min.js')}}"></script>
    <script src="{{asset('adminAsset/assets/js/datatable/datatable-extension/pdfmake.min.js')}}"></script>
    <script src="{{asset('adminAsset/assets/js/datatable/datatable-extension/vfs_fonts.js')}}"></script>
    <script src="{{asset('adminAsset/assets/js/datatable/datatable-extension/dataTables.autoFill.min.js')}}"></script>
    <script src="{{asset('adminAsset/assets/js/datatable/datatable-extension/dataTables.select.min.js')}}"></script>
    <script src="{{asset('adminAsset/assets/js/datatable/datatable-extension/buttons.bootstrap4.min.js')}}"></script>
    <script src="{{asset('adminAsset/assets/js/datatable/datatable-extension/buttons.html5.min.js')}}"></script>
    <script src="{{asset('adminAsset/assets/js/datatable/datatable-extension/buttons.print.min.js')}}"></script>
    <script src="{{asset('adminAsset/assets/js/datatable/datatable-extension/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('adminAsset/assets/js/datatable/datatable-extension/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('adminAsset/assets/js/datatable/datatable-extension/responsive.bootstrap4.min.js')}}"></script>
    <script src="{{asset('adminAsset/assets/js/datatable/datatable-extension/dataTables.keyTable.min.js')}}"></script>
    <script src="{{asset('adminAsset/assets/js/datatable/datatable-extension/dataTables.colReorder.min.js')}}"></script>
    <script src="{{asset('adminAsset/assets/js/datatable/datatable-extension/dataTables.fixedHeader.min.js')}}"></script>
    <script src="{{asset('adminAsset/assets/js/datatable/datatable-extension/dataTables.rowReorder.min.js')}}"></script>
    <script src="{{asset('adminAsset/assets/js/datatable/datatable-extension/dataTables.scroller.min.js')}}"></script>
    <script src="{{asset('adminAsset/assets/js/datatable/datatable-extension/custom.js')}}"></script>


<!--<script src="{{asset('adminAsset/assets/js/chart/apex-chart/apex-chart.js')}}"></script>-->
<!--<script src="{{asset('adminAsset/assets/js/chart/apex-chart/stock-prices.js')}}"></script>-->
<!--<script src="{{asset('adminAsset/assets/js/chart/apex-chart/moment.min.js')}}"></script>-->
<!--<script src="{{asset('adminAsset/assets/js/notify/bootstrap-notify.min.js')}}"></script>-->
<script src="{{asset('adminAsset/assets/js/dashboard/default.js')}}"></script>
<script src="{{asset('adminAsset/assets/js/notify/index.js')}}"></script>
<!--<script src="{{asset('adminAsset/assets/js/typeahead/handlebars.js')}}"></script>-->
<!--<script src="{{asset('adminAsset/assets/js/typeahead/typeahead.bundle.js')}}"></script>-->
<!--<script src="{{asset('adminAsset/assets/js/typeahead/typeahead.custom.js')}}"></script>-->
<!--<script src="{{asset('adminAsset/assets/js/typeahead-search/handlebars.js')}}"></script>-->
<!--<script src="{{asset('adminAsset/assets/js/typeahead-search/typeahead-custom.js')}}"></script>-->
<script src="{{asset('adminAsset/assets/js/height-equal.js')}}"></script>
<script src="{{asset('adminAsset/assets/js/animation/wow/wow.min.js')}}"></script>
<!-- Plugins JS Ends-->

    <script src="{{asset('adminAsset/assets/js/tooltip-init.js')}}"></script>
<!-- Theme js-->
<script src="{{asset('adminAsset/assets/js/script.js')}}"></script>
<!--<script src="{{asset('adminAsset/assets/js/theme-customizer/customizer.js')}}"></script>-->
<!-- Plugin used-->
<script>new WOW().init();</script>


<script>
$(document).ready(function(){
    
     
    
    $(document).on('change','.memberstatus',function(){
       
       var memberstatus = $(this).val();
       if(memberstatus == null || memberstatus == ''){
           window.location.href='members'
       }else{
           window.location.href='members?status='+memberstatus
       }
       
        
    });
     
});
</script>

</body>
</html>