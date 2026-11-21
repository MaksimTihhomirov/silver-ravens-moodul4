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

</main>

@endsection