
@extends('layouts.app')

@section('tittle')
    Home
@endsection
<style>
    body, html {
      height: 100%;
      margin: 0;
    }
    
    .bg {
      /* The image used */
      background-image: url("/images/background.jpg");
    
      /* Full height */
      height: 100%; 
    
      /* Center and scale the image nicely */
      background-position: center;
      background-repeat: no-repeat;
      background-size: cover;
    }
</style>
@section('content')
<div class="bg">
    <div class="centered" style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); color:white; font-size:120px; ">WebShop</div>
</div>
@endsection
