@extends('layouts.app')

@section('title', 'Shopping Cart | The Silver Ravens')

@section('content')

<main class="container cart-page">

    <h1>SHOPPING CART</h1>

    <section id="cart-items" class="cart-items"
             aria-label="Shopping cart items">
    </section>

    <section class="cart-summary">

        <div class="cart-total">
            <h2>TOTAL</h2>
            <strong id="cart-total">$0.00</strong>
        </div>

        <a href="{{ route('shop') }}" class="button">
            CONTINUE SHOPPING
        </a>

    </section>

</main>

@endsection

@section('scripts')

<script src="{{ asset('js/cart.js') }}" defer></script>

@endsection