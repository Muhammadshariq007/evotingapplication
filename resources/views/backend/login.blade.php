@php
    $setupinfo = App\Models\Setup\Setup::first();
@endphp
<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

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
<!-- Plugins css Ends-->
<!-- Bootstrap css-->
<link rel="stylesheet" type="text/css" href="{{asset('adminAsset/assets/css/vendors/bootstrap.css')}}">
<!-- App css-->
<link rel="stylesheet" type="text/css" href="{{asset('adminAsset/assets/css/style.css')}}">
<link id="color" rel="stylesheet" href="{{asset('adminAsset/assets/css/color-1.css')}}" media="screen">
<!-- Responsive css-->
<link rel="stylesheet" type="text/css" href="{{asset('adminAsset/assets/css/responsive.css')}}">
<META NAME="ROBOTS" CONTENT="NOINDEX, NOFOLLOW">
</head>
<body>
<!-- login page start-->
<div class="container-fluid p-0">
<div class="row m-0">
<div class="col-12 p-0">    
<div class="login-card login-dark">
<div>
<div><a class="logo" href="#"><img class="img-fluid for-light" src="{{asset('storage/companyLogo/'.$setupinfo->companyLogo)}}" alt="looginpage" width="230"><img class="img-fluid for-dark" src="{{asset('storage/companyLogo/'.$setupinfo->companyLogo)}}" alt="looginpage"></a></div>
<div class="login-main"> 
<form class="theme-form" method="post" action="{{route('admin.login')}}">
 @csrf
  <div class="form-group">
    <label class="col-form-label">Username</label>
    <input class="form-control" type="text" required="" placeholder="Enter Username" name="username">
  </div>
  <div class="form-group">
    <label class="col-form-label">Password</label>
    <div class="form-input position-relative">
      <input class="form-control" type="password" name="password" required="" placeholder="*********">
      <div class="show-hide"><span class="show"></span></div>
    </div>
  </div>
  <div class="form-group mb-0">
    <div class="text-end mt-3">
      <button class="btn btn-primary btn-block w-100" type="submit">Sign in</button>
    </div>
  </div>
 
</form>
</div>
</div>
</div>
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
<!-- Sidebar jquery-->
<script src="{{asset('adminAsset/assets/js/config.js')}}"></script>
<!-- Plugins JS start-->
<!-- Plugins JS Ends-->
<!-- Theme js-->
<script src="{{asset('adminAsset/assets/js/script.js')}}"></script>
<!-- Plugin used-->
</div>
</body>
</html>