@extends('layouts.app')

@section('title', $product->name . ' | The Silver Ravens')

@section('content')

<main class="container product-page">

    <div class="breadcrumbs">
        <a href="{{ route('home') }}">Home</a> /
        <a href="{{ route('shop') }}">Shop</a> /
        {{ \Illuminate\Support\Str::title(\Illuminate\Support\Str::after($product->name, 'SILVER RAVENS ')) }}
    </div>

    <section class="product-layout">

        <div class="product-gallery">

            <img id="main-product-image"
                 class="main-product-image"
                 alt="{{ $product->name }}">

            <div class="product-thumbnails"
                 id="product-thumbnails"></div>

        </div>

        <div class="product-details">

            <h1>{{ $product->name }}</h1>

            <p class="detail-price">
                ${{ number_format($product->price, 2) }}
            </p>

            <p class="product-description">
                {{ $product->description }}
            </p>

            @if (!empty($product->sizes))

                <div class="product-options">
                    <h2>SELECT SIZE</h2>
                    <div class="size-options" id="size-options"></div>
                </div>

            @endif

            <div class="product-options">
                <h2>SELECT COLOR</h2>
                <div class="color-options" id="color-options"></div>
            </div>

            <button type="button"
                    class="button add-to-cart"
                    id="add-to-cart">
                ADD TO CART
            </button>

        </div>

    </section>

</main>

@endsection

@section('scripts')

<script>
    const product = @json($product);
    const imagePath = @json(asset('assets/images'));
    const cartUrl = @json(route('cart'));
</script>

<script src="{{ asset('js/product.js') }}"></script>

@endsection