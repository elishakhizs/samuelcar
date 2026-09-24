@vite(entrypoints: 'resources/css/app.css')
@vite(entrypoints: 'resources/js/app.js')
@vite(entrypoints: 'resources/css/home.css')
@extends('layout.Default')

@section('content')
<div><div><div><div><div><div><div><div><div><div><div><div><div><div><div><div>
    <section class="hero">
        <div class="hero-slider" id="heroSlider">
            <!-- SLIDE 1 -->
            <div class="hero-slide">
                <video autoplay muted loop playsinline>
                    <source src="{{ asset('images/dodge.mp4') }}" type="video/mp4">
                </video>

                <div class="hero-overlay">
                    <h1>WIN A LUXURY CAR</h1>
                    <p>Enter today for your chance to drive home a brand-new car.</p>
                    <a href="Pay" class="hero-btn">Enter Giveaway</a>
                </div>
            </div>

            <!-- SLIDE 2 -->
            <div class="hero-slide">
                <video autoplay muted loop playsinline>
                    <source src="{{ asset('images/advert.mp4') }}" type="video/mp4">
                </video>

                <div class="hero-overlay">
                    <h1>SHOP WATCHES & CLOTHING</h1>
                    <p>Discover premium fashion and accessories.</p>
                    <a href="shop" class="hero-btn">Shop Now</a>
                </div>
            </div>
        </div>
    </section>`
<br><br>
    <section class="compete" id="compete">
        
        <section class="car-showcase">
            <div class="car-card">
                <img src="images/Mercedes.jpg">
                <div id="countdown" class="countdown-wrapper"></div>
                <h3>Mercedes AMG</h3>
                <p>Power • Comfort • Style</p><br>
                <a href="Pay" class="Enter">Enter Now</a><br><br>
            </div>
            
            <div class="car-card">
                <div class="ads">
                    <div class="slider" id="slider">
                        <img src="images/luxury watch.jpeg" class="slide active">
                        <img src="images/allClothes.png" class="slide">
                        <img src="images/SimoleQuarzip.png"class="slide">
                        <img src="images/Hoodies.png" class="slide">
                    </div>
                </div><br><br><br>
                <a href="{{ route('shop.index') }}"class="Enter">SHOP NOW</a><br><br>
            </div>
        </section>
    </section>
  

 <section class="how-it-works" id="howItWorks">
    <h2>How It Works</h2><br>
    <p class="how-subtitle">Four simple steps to drive away a winner</p><br><br>

    <div class="flow-container">
        <div class="flow-step animate-step">
            <div class="flow-icon"></div>
            <h3>Create Account</h3>
            <p>Sign up securely to participate.</p>
        </div>

        <div class="flow-line animate-line"></div>

        <div class="flow-step animate-step">
            <div class="flow-icon"></div>
            <h3>Enter Giveaway</h3>
            <p>Select your giveaway and enter.</p>
        </div>

        <div class="flow-line animate-line"></div>

        <div class="flow-step animate-step">
            <div class="flow-icon"></div>
            <h3>Live Draw</h3>
            <p>Winner is chosen transparently.</p>
        </div>

        <div class="flow-line animate-line"></div>

        <div class="flow-step animate-step">
            <div class="flow-icon"></div>
            <h3>Social Media </h3>
            <p>Ensure you follow us on our social media handles </p>
        </div>

        <div class="flow-line animate-line"></div>

        <div class="flow-step animate-step">
            <div class="flow-icon"></div>
            <h3>Win the Car</h3>
            <p>Drive away a winner 🎉</p>
        </div>
    </div>
 </section>
 
 <section id="about">
    <div class="Brief">
        <h2>Welcome to Revved by Sam!<br><br></h2>
        <p>
            At RBS, we’re car lovers just like you. We know how special a car or bike can be 
            whether it’s the one you’ve dreamed about for years or the pride you feel every time you turn the key. 
            That connection is something real.<br>
            That’s exactly why we created Revved by Sam  to give everyone the chance to experience that dream without 
            spending a fortune. Imagine getting behind the wheel of your dream car for less than the cost of your daily coffee.  
        </p>
    </div>
 </section>
</div></div></div></div></div></div></div></div></div></div></div></div></div></div></div>
  

@endsection
