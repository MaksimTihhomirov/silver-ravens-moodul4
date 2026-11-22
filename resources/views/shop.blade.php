@extends('layouts.app')

@section('title', 'Shop | The Silver Ravens')

@section('content')

<main class="container shop-page">

    <section class="shop-heading">

        <h1>OFFICIAL MERCH</h1>

        <p>
            Represent The Silver Ravens with our
            exclusive merchandise.
        </p>

    </section>

    <form class="shop-filters"
          action="{{ route('shop') }}"
          method="GET">

        <select name="category"
                aria-label="Filter by category"
                onchange="this.form.submit()">

            <option value="all">All Categories</option>

            <option value="clothing"
                @selected(request('category') === 'clothing')>
                Clothing
            </option>

            <option value="accessories"
                @selected(request('category') === 'accessories')>
                Accessories
            </option>

            <option value="gaming"
                @selected(request('category') === 'gaming')>
                Gaming
            </option>

        </select>

        <select name="sort"
                aria-label="Sort by price"
                onchange="this.form.submit()">

            <option value="default">Sort by: Price</option>

            <option value="low"
                @selected(request('sort') === 'low')>
                Price: Low to High
            </option>

            <option value="high"
                @selected(request('sort') === 'high')>
                Price: High to Low
            </option>

        </select>

    </form>

    <section class="product-grid shop-grid">

        @forelse ($products as $product)

            @php
                $images = collect($product->images)->first();
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

        @empty

            <p>No products found.</p>

        @endforelse

    </section>

</main>

@endsection