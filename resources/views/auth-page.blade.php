@vite(entrypoints: 'resources/css/app.css')
@vite(entrypoints: 'resources/js/app.js')
@vite(entrypoints: 'resources/css/home.css')
@vite(entrypoints: 'resources/css/auth-page.css')
@extends('layout.Default')

@section('content')
<div><div><div><div><div><div><div><div><div>
    <section class="pay"><br><br>
        <h2> ACCOUNT</h2>
    </section>
</div></div></div></div></div></div></div></div></div>

<diV><div><div><DIV><div><div><div><div><div><div><div><div><div><div><div><div>
    <div class="auth-wrapper">

    <div class="auth-container">

        <!-- Login -->
        <div class="auth-box">
            <h2>Welcome Back</h2>
            <form method="POST" action="{{ route('login') }}">
                @csrf

                <input type="email" name="email" placeholder="Email Address" required>
                <input type="password" name="password" placeholder="Password" required>

                <button type="submit" class="btn-primary">Login</button>
            </form>
        </div>

        <!-- Divider -->
        <div class="divider"></div>

        <!-- Register -->
        <div class="auth-box">
            <h2>Create Account</h2>
            <form method="POST" action="{{ route('register') }}">
                @csrf

                <input type="text" name="name" placeholder="Full Name" required>
                <input type="email" name="email" placeholder="Email Address" required>
                <input type="password" name="password" placeholder="Password" required>
                <input type="password" name="password_confirmation" placeholder="Confirm Password" required>

                <button type="submit" class="btn-primary">Register</button>
            </form>
        </div>

    </div>
    @if(session('success'))
        <div class="popup-success">
            {{ session('success') }}
        </div>
    @endif
    @if(session('error'))
        <div class="popup-error">
            {{ session('error') }}
        </div>
    @endif

</div><br><br><br>
</div></div></DIV></div></diV></diV></diV></diV></diV></diV></diV></diV></diV></diV>

@endsection 