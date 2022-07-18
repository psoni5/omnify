@extends('layout')
@push('css')
<link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css" >
@endpush
@push('js')
<script src="{{ asset('js/app.js') }}"></script>
@endpush
@section('content')

<body id="particles-js"></body>
<div class="animated bounceInDown">
  <div class="container">
    <span class="error animated tada" id="msg"></span>
    <form name="form1" class="box" method="POST" action="{{ route('login.custom') }}" onsubmit="return checkStuff()">
    @csrf 
     <h4>GetOmnify <span>Dashboard</span></h4>
      <h5 style=" margin-bottom: 0px;">Sign in to your account.</h5>
      
        <input type="text" name="email" placeholder="Email"  required autofocus>
        
        <i class="typcn typcn-eye" id="eye"></i>
        <input type="password" name="password" placeholder="Passsword" required id="pwd" autocomplete="off">
        
        <!-- <label>
          <input type="checkbox">
          <span></span>
          <small class="rmb">Remember me</small>
        </label> -->
        <a href="#" class="forgetpass">Forget Password?</a>
        <input type="submit" value="Sign in" class="btn1">
      </form>
        <a href="/registration" class="dnthave">Don’t have an account? Sign up</a>
  </div> 
       <div class="footer">
      
    </div>
</div>
@endsection