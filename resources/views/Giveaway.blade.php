@vite(entrypoints: 'resources/css/app.css')
@vite(entrypoints: 'resources/js/app.js')
@vite(entrypoints: 'resources/css/home.css')
@extends('layout.Default')

@section('content')

<section class="pay"><br><br>
    <h2> STAND A CHANCE TO WIN MERCEDES C200 WK202</h2>
</section><br><br><br>

<section class="car-showcase">
    <div class="car-card">
        <img src="images/Mercedes.jpg" alt="Car">
        <center><h3>Mercedes AMG</h3></center>
        <center><p>Power • Comfort • Style</p></center><br>
    </div>

    <div class="car-card">
        <video autoplay muted loop playsinline>
            <source src="{{ asset('images/comingsoon.mp4') }}" type="video/mp4">
        </video>
         <div class="hero-overlays"></div>
    </div>
</section>

<section class="how-it-works">
    <h2>How It Works</h2><br>
    <div class="steps">
        <div class="step">1️⃣ Sign Up</div>
        <div class="step">2️⃣ Enter Giveaway</div>
        <div class="step">3️⃣ Win the Car</div><br>
        <div class="step">Follow our social media platform</div>
    </div>
</section>

@endsection
