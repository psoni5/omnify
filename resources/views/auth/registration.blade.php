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
   
    <form name="form1" style="top: 50px;" class="box" action="{{ route('register.custom') }}" method="POST" onsubmit="return checkStuff()">
    @csrf 
     <h4>GetOmnify <span>Dashboard</span></h4>
      <h5 style=" margin-bottom: 0px;">Register your account.</h5>
      <input type="text" placeholder="Fist Name" id="name"  name="first_name"
            required autofocus>
        


<input type="text" placeholder="Last Name" id="name"  name="last_name"
required autofocus>

        <input type="text" name="email" placeholder="Email"  required autofocus>
        
        
        <i class="typcn typcn-eye" id="eye"></i>
        <input type="password" name="password" placeholder="Passsword" required id="pwd" autocomplete="off">
        
        
        
        <input type="submit" style="top:81%" value="Sign up" class="btn1">
      </form>
        <a href="/login" class="dnthave">have an account? Sign in</a>
  </div> 
       <div class="footer">
      
    </div>
</div>
@endsection