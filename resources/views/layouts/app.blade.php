<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'The Silver Ravens')</title>

    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

    <header class="header container">

        <a href="{{ route('home') }}" class="logo">
            <img src="{{ asset('assets/images/SilverRavens-logo.svg') }}"
                 alt="The Silver Ravens logo">
        </a>

        <nav class="navigation" aria-label="Main navigation">
            <a href="{{ route('home') }}">HOME</a>
            <a href="{{ route('shop') }}">SHOP</a>
            <a href="{{ route('contact') }}">CONTACT</a>
            <a href="{{ route('cart') }}">CART</a>
        </nav>

    </header>

    @yield('content')

    <footer class="footer container">

        <div class="footer-top">

            <div class="footer-brand">

                <a href="{{ route('home') }}">
                    <img src="{{ asset('assets/images/SilverRavens-logo.svg') }}"
                         alt="The Silver Ravens logo"
                         class="footer-logo">
                </a>

                <div class="footer-brand-text">
                    <h2>THE SILVER RAVENS</h2>
                    <p>Official merchandise store</p>
                </div>

            </div>

            <nav class="footer-navigation" aria-label="Footer navigation">
                <a href="{{ route('home') }}">HOME</a>
                <a href="{{ route('shop') }}">SHOP</a>
                <a href="{{ route('contact') }}">CONTACT</a>
                <a href="{{ route('cart') }}">CART</a>
            </nav>

        </div>

        <div class="footer-bottom">
            <p>© 2026 The Silver Ravens. All rights reserved.</p>
        </div>

    </footer>

    @yield('scripts')

</body>
</html>