@extends('layouts.app')

@section('title', 'Admin Dashboard | The Silver Ravens')

@section('content')

<main class="container admin-page">

    <div class="admin-heading">

        <div>
            <h1>ADMIN DASHBOARD</h1>
            <p>Welcome, {{ auth()->user()->name }}!</p>
        </div>

        <form method="POST" action="{{ route('admin.logout') }}">
            @csrf
            <button type="submit" class="button">
                LOG OUT
            </button>
        </form>

    </div>

    <section class="admin-stats">

        <div class="admin-stat-card">
            <h2>TOTAL PRODUCTS</h2>
            <strong>{{ $productCount }}</strong>
        </div>

        <div class="admin-stat-card">
            <h2>TOTAL MESSAGES</h2>
            <strong>{{ $messageCount }}</strong>
        </div>

    </section>
    <div class="admin-actions">

    <a href="{{ route('admin.products.index') }}" class="button">
        MANAGE PRODUCTS
    </a>

</div>

</main>

@endsection