@extends('frontend/layout')
@section('container')
<style>
.backtowebsite {
    background: #00742D;
    width: fit-content;
    padding: 10px 30px;
    border-radius: 7px;
    text-decoration: none;
    color: #fff;
    margin: auto;
    margin-top: 20px;
}

.backtowebsite:hover {
    color: #fff;
}
</style>

<div class="mainBg">
    <div class="innerform">
        <h1 class="text-center fs-3 fw-bold">Electronic Voting System</h1>
        <img src="{{asset('frontAsset/img/tick-circle.png')}}" width="70" class="d-block m-auto mt-2" />
        <p class="m-0 text-center pt-2">Thank you! Your vote has been recorded successfully and securely.</p>
        <a href="{{url('/')}}" class="backtowebsite">Back to Website</a>
    </div>
</div>

@endsection