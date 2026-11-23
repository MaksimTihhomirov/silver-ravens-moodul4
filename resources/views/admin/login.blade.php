@extends('layouts.app')

@section('title', 'Admin Login | The Silver Ravens')

@section('content')

<main class="container admin-login-page">

    <div class="admin-login-card">

        <img src="{{ asset('assets/images/SilverRavens-logo.svg') }}"
             alt="Silver Ravens"
             class="admin-login-logo">

        <h1>ADMIN LOGIN</h1>

        <p>Sign in to manage your store.</p>

        <form method="POST" action="{{ route('admin.login.store') }}">

            @csrf

            <div class="form-group">

                <label for="email">EMAIL ADDRESS</label>

                <input type="email"
                       id="email"
                       name="email"
                       value="{{ old('email') }}"
                       placeholder="Enter your email"
                       required>

                @error('email')
                    <p class="form-error">{{ $message }}</p>
                @enderror

            </div>

            <div class="form-group">

                <label for="password">PASSWORD</label>

                <input type="password"
                       id="password"
                       name="password"
                       placeholder="Enter your password"
                       required>

            </div>

            <button type="submit" class="button send-message">
                SIGN IN
            </button>

        </form>

    </div>

</main>

@endsection