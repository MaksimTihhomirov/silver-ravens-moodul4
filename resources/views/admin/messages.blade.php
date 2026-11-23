@extends('layouts.app')

@section('title', 'Messages | The Silver Ravens')

@section('content')

<main class="container admin-page">

    <div class="admin-heading">

        <div>
            <h1>CONTACT MESSAGES</h1>
            <p>View messages from your customers.</p>
        </div>

        <a href="{{ route('admin.dashboard') }}" class="button">
            BACK TO DASHBOARD
        </a>

    </div>

    <section class="admin-messages">

        @forelse ($messages as $message)

            <article class="admin-message-card">

                <h2>{{ $message->subject }}</h2>

                <p><strong>Name:</strong> {{ $message->name }}</p>

                <p><strong>Email:</strong> {{ $message->email }}</p>

                <p class="admin-message-date">
                    {{ $message->created_at->format('d.m.Y H:i') }}
                </p>

                <div class="admin-message-text">
                    {{ $message->message }}
                </div>

            </article>

        @empty

            <p>No messages received yet.</p>

        @endforelse

    </section>

</main>

@endsection