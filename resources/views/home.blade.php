@extends('layouts.app')

@section('title', 'The Silver Ravens')

@section('content')

<main class="container">

    <section class="hero">
        <div class="hero-content">
            <h1>THE SILVER<br> RAVENS</h1>
            <p>Official Silver Ravens merchandise</p>

            <a href="{{ route('shop') }}" class="button">
                SHOP NOW
            </a>
        </div>

        <img class="hero-logo"
             src="{{ asset('assets/images/SilverRavens-logo.svg') }}"
             alt="Silver Ravens emblem">
    </section>

    <section class="featured-products">

        <div class="section-header">
            <h2>FEATURED PRODUCTS</h2>

            <div class="slider-controls">
                <button class="slider-button" id="prev-product"
                        aria-label="Previous products">
                    &#10094;
                </button>

                <button class="slider-button" id="next-product"
                        aria-label="Next products">
                    &#10095;
                </button>
            </div>
        </div>

        <div class="product-grid" id="featured-grid">

            @foreach ($products as $product)

                @php
                    $images = $product->images['Black']
    ?? collect($product->images)->first();
                    $image = $images[0] ?? null;
                @endphp

                <a href="{{ route('product.show', $product->slug) }}"
                   class="product-card">

                    @if ($image)
                        <img src="{{ asset('assets/images/' . $image) }}"
                             alt="{{ $product->name }}">
                    @endif

                    <h3>{{ $product->name }}</h3>

                    <p class="product-price">
                        ${{ number_format($product->price, 2) }}
                    </p>

                </a>

            @endforeach

        </div>

        <div class="view-products">
            <a href="{{ route('shop') }}" class="button">
                VIEW ALL PRODUCTS
            </a>
        </div>

    </section>

    <section class="team-section">

        <h2 class="section-title">MEET OUR TEAM</h2>

        <div class="team-grid">

            <article class="team-card">
                <img src="{{ asset('assets/images/team1.png') }}"
                     alt="Alex Morgan">

                <div class="team-info">
                    <h3>RAVEN</h3>
                    <p>Alex Morgan</p>
                    <span>TEAM CAPTAIN</span>
                </div>
            </article>

            <article class="team-card">
                <img src="{{ asset('assets/images/team2.png') }}"
                     alt="Daniel Brooks">

                <div class="team-info">
                    <h3>SHADOW</h3>
                    <p>Daniel Brooks</p>
                    <span>ENTRY FRAGGER</span>
                </div>
            </article>

            <article class="team-card">
                <img src="{{ asset('assets/images/team3.png') }}"
                     alt="Lucas Bennett">

                <div class="team-info">
                    <h3>VORTEX</h3>
                    <p>Lucas Bennett</p>
                    <span>SNIPER</span>
                </div>
            </article>

            <article class="team-card">
                <img src="{{ asset('assets/images/team4.png') }}"
                     alt="Ethan Walker">

                <div class="team-info">
                    <h3>PHANTOM</h3>
                    <p>Ethan Walker</p>
                    <span>SUPPORT PLAYER</span>
                </div>
            </article>

        </div>

    </section>

    <section class="games-section">

        <h2 class="section-title">OUR GAMES</h2>

        <div class="games-grid">

            <article class="game-card">
                <img src="{{ asset('assets/images/valorant.png') }}"
                     alt="Valorant">
                <h3>VALORANT</h3>
            </article>

            <article class="game-card">
                <img src="{{ asset('assets/images/cs.png') }}"
                     alt="Counter-Strike 2">
                <h3>COUNTER-STRIKE 2</h3>
            </article>

            <article class="game-card">
                <img src="{{ asset('assets/images/league.png') }}"
                     alt="League of Legends">
                <h3>LEAGUE OF LEGENDS</h3>
            </article>

            <article class="game-card">
                <img src="{{ asset('assets/images/dota.png') }}"
                     alt="Dota 2">
                <h3>DOTA 2</h3>
            </article>

            <article class="game-card">
                <img src="{{ asset('assets/images/rl.png') }}"
                     alt="Rocket League">
                <h3>ROCKET LEAGUE</h3>
            </article>

        </div>

    </section>

    <section class="results-section">

        <h2 class="section-title">LATEST RESULTS</h2>

        <div class="results-list">

            <article class="match-card">
                <span class="match-date">18 MAY 2026</span>
                <span class="match-game">COUNTER-STRIKE 2</span>
                <h3 class="match-teams">Silver Ravens vs G2 Esports</h3>

                <div class="match-score win">
                    <strong>2:1</strong>
                    <span>WIN</span>
                </div>

                <button class="match-button">MATCH DETAILS</button>
            </article>

            <article class="match-card">
                <span class="match-date">08 JUN 2026</span>
                <span class="match-game">VALORANT</span>
                <h3 class="match-teams">Silver Ravens vs Team Liquid</h3>

                <div class="match-score loss">
                    <strong>1:2</strong>
                    <span>LOSS</span>
                </div>

                <button class="match-button">MATCH DETAILS</button>
            </article>

            <article class="match-card">
                <span class="match-date">27 JUN 2026</span>
                <span class="match-game">LEAGUE OF LEGENDS</span>
                <h3 class="match-teams">Silver Ravens vs Fnatic</h3>

                <div class="match-score win">
                    <strong>3:0</strong>
                    <span>WIN</span>
                </div>

                <button class="match-button">MATCH DETAILS</button>
            </article>

            <article class="match-card">
                <span class="match-date">24 JUL 2026</span>
                <span class="match-game">DOTA 2</span>
                <h3 class="match-teams">Silver Ravens vs Team Spirit</h3>

                <div class="match-score win">
                    <strong>3:2</strong>
                    <span>WIN</span>
                </div>

                <button class="match-button">MATCH DETAILS</button>
            </article>

            <article class="match-card">
                <span class="match-date">12 SEP 2026</span>
                <span class="match-game">COUNTER-STRIKE 2</span>
                <h3 class="match-teams">Silver Ravens vs Team Vitality</h3>

                <div class="match-score win">
                    <strong>2:0</strong>
                    <span>WIN</span>
                </div>

                <button class="match-button">MATCH DETAILS</button>
            </article>

        </div>

    </section>

</main>

@endsection

@section('scripts')

<script src="{{ asset('js/script.js') }}"></script>

@endsection