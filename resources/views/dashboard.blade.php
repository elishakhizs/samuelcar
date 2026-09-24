@vite(entrypoints: 'resources/css/app.css')
@vite(entrypoints: 'resources/js/app.js')
@vite(entrypoints: 'resources/css/home.css')
@extends('layout.Default')
 
@section('content')
<div style="padding: 40px;">
    <h1>Welcome to your Dashboard</h1>
    <p>You are logged in 🎉</p>
</div>
@endsection