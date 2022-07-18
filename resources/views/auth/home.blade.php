<!DOCTYPE html>
<html>
<head>
<title>home</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet">
<style>
#customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #04AA6D;
  color: white;
}
</style>
</head>
<body>
<nav class="navbar navbar-light navbar-expand-lg mb-5" style="background-color: #e3f2fd;">
<div class="container">
<a class="navbar-brand mr-auto" href="#">GetOmnify</a>
<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
<span class="navbar-toggler-icon"></span>
</button>
<div class="collapse navbar-collapse" id="navbarNav">
<ul class="navbar-nav">
@guest
<li class="nav-item">
<a class="nav-link" href="{{ route('login') }}">Login</a>
</li>
<li class="nav-item">
<a class="nav-link" href="{{ route('register-user') }}">Register</a>
</li>
@else
<li class="nav-item">
<a class="nav-link" href="{{ route('signout') }}">Logout</a>
</li>
<li class="nav-item">
<a class="nav-link" href="{{ route('event') }}">Add Event</a>
</li>
@endguest
</ul>
</div>
</div>
</nav>
<!-- @yield('content') -->

<h1> Scheduled Table</h1>

<table id="customers">
  <tr>
    <th>Event Name</th>
    <th>Start Time</th>
    <th>End Time</th>
  </tr>
  
    @foreach($data as $d)
    <tr>
    <td>{{$d['event_name']}}</td>
    <td>{{$d['start_time']}}</td>
    <td>{{$d['end_time']}}</td>
  </tr>
        
    @endforeach
    
</body>
</html>