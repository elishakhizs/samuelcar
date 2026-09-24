<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Car Giveaway</title>
    
    </head>
<body>
<div><div><div><div><div><div><div><div><div><div><div><div>
    <header class="top-bar transparent" id="navbar">
    <div class="logo"><a href="http://localhost/WEBSITES/samuelcar/public"><img src="images/logo.png" width="80" height="80"></a>
    RBS</div>

    <nav class="nav-links">
        <a href="{{ route('Home') }}">Home</a>
        <a href="{{ route('Giveaway') }}">Giveaways</a>
        <a href="{{ url('/#about') }}">About Us</a>
        <a href="{{ url('/#site-footer') }}">Contact</a>
        <a href="{{ route('shop.index') }}">Shop</a>
        <a href="{{ route('auth-page') }}" style="justify-content: center;"><img src="images/log-in.png" width="50" height="50"></a>
        <a href="{{ route('basket.index') }}" style="justify-content: center;"><img src="images/shopping.png" width="50" height="50"></a>
        <a href="{{ route('Pay') }}" class="cta">Enter Now</a>
    </nav>

    <div class="hamburger" id="hamburger">
            <span></span>
            <span></span>
            <span></span>
    </div>

    <!-- Mobile Navigation -->
    <nav class="mobile-nav" id="mobileNav">
        <a href="{{ route('Home') }}">Home</a>
        <a href="{{ route('Giveaway') }}">Giveaways</a>
        <a href="{{ url('/#about') }}">About Us</a>
        <a href="{{ route('Contact') }}">Contact</a>
        <a href="{{ route('auth-page') }}">Login</a>
        <a href="{{ route('shop.index') }}">Shop</a>
        <a href="{{ route('auth-page') }}" style="justify-content: center;"><img src="images/log-in.png" width="50" height="50"></a>
        <a href="{{ route('basket.index') }}" style="justify-content: center;"><img src="images/shopping.png" width="50" height="50"></a>
        <a href="{{ route('Pay') }}" class="cta">Enter Now</a>
    </nav>
</header>
</div></div></div></div></div></div></div></div></div></div></div></div>


<main>
    @yield('content')
</main>

<footer id="site-footer" class="site-footer">
    <div class="footer-container">

        <!-- NAVIGATION -->
        <div class="footer-section">
            <h4>Navigation</h4>
            <ul>
                <li><a href="/">home</a></li>
                <li><a href="{{ route("Giveaway") }}">Giveaway</a></li>
                <li><a href="{{ route("Contact") }}">Contact</a></li>
            </ul>
        </div>

        <!-- SOCIALS -->
        <div class="footer-section">
            <h4>Follow Us</h4>
            <div class="social-icons">
                <a href="https://www.facebook.com/share/14ZPsSycWKs/"><img src="images/Facebook.png"></a>
                <a href="https://www.threads.com/@revvedbysam1"><img src="images/threads.png"></a>
                <a href="https://www.instagram.com/revvedbysam1?igsh=NGplbzdnczQ2cjk3"><img src="images/instagram.png"></a>
                <a href="https://youtube.com/@revvedbysam?si=xJTuacyGmAk9ZlvM"><img src="images/youtube.png"></a>
                <a href="https://www.tiktok.com/@revvedbysam?_r=1&_t=ZS-95WxisZOnPJ"><img src="images/tiktok_logo.png"></a>
                <a href="#"><img src="images/whatapp.png"></a>
            </div>
        </div>

        <!-- BOOK -->
        <div class="footer-section">
            <h4>Book</h4>
            <a href="/book" class="footer-btn">Book Now</a>
        </div>
    </div>
<br><br>
    <center><p>© {{ date('Y') }} RBS Giveaway. All Rights Reserved.</p></center>
</footer>

<script>
    window.addEventListener('scroll', function () {
        const navbar = document.getElementById('navbar');

        if (window.scrollY > 80) {
            navbar.classList.remove('transparent');
            navbar.classList.add('scrolled');
        } else {
            navbar.classList.remove('scrolled');
            navbar.classList.add('transparent');
        }
    });
</script>

<script>
    const hamburger = document.getElementById('hamburger');
    const mobileNav = document.getElementById('mobileNav');

    hamburger.addEventListener('click', () => {
        mobileNav.classList.toggle('show');
    });
</script>

<script>
  document.addEventListener("DOMContentLoaded", () => {
    const section = document.getElementById("howItWorks");
    const steps = document.querySelectorAll(".animate-step");
    const lines = document.querySelectorAll(".flow-line");

    const observer = new IntersectionObserver(
        entries => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    steps.forEach((step, index) => {
                        setTimeout(() => {
                            step.classList.add("active");

                            // Activate line after each step (except last)
                            if (lines[index]) {
                                lines[index].classList.add("active");
                            }
                        }, index * 500);
                    });
                }
            });
        },
        { threshold: 0.35 }
    );

    observer.observe(section);
});
</script>

</body>
</html>
