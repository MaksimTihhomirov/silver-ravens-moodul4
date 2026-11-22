@extends('layouts.app')

@section('title', 'Contact | The Silver Ravens')

@section('content')

<main class="container contact-page">

    <section class="contact-heading">

        <h1>CONTACT US</h1>

        <p>
            Have a question or want to get in touch?<br>
            Send us a message and we'll get back to you!
        </p>

    </section>

    <form class="contact-form"
          method="POST"
          action="{{ route('contact.store') }}">

        @csrf

        <div class="form-group">

            <label for="name">FULL NAME</label>

            <input type="text"
                   id="name"
                   name="name"
                   value="{{ old('name') }}"
                   placeholder="Enter your full name"
                   maxlength="255"
                   required>

            @error('name')
                <p class="form-error">{{ $message }}</p>
            @enderror

        </div>

        <div class="form-group">

            <label for="email">EMAIL ADDRESS</label>

            <input type="email"
                   id="email"
                   name="email"
                   value="{{ old('email') }}"
                   placeholder="Enter your email address"
                   maxlength="255"
                   required>

            @error('email')
                <p class="form-error">{{ $message }}</p>
            @enderror

        </div>

        <div class="form-group">

            <label for="subject">SUBJECT</label>

            <input type="text"
                   id="subject"
                   name="subject"
                   value="{{ old('subject') }}"
                   placeholder="Enter subject"
                   maxlength="255"
                   required>

            @error('subject')
                <p class="form-error">{{ $message }}</p>
            @enderror

        </div>

        <div class="form-group">

            <label for="message">MESSAGE</label>

            <textarea id="message"
                      name="message"
                      placeholder="Write your message here..."
                      maxlength="5000"
                      required>{{ old('message') }}</textarea>

            @error('message')
                <p class="form-error">{{ $message }}</p>
            @enderror

        </div>

        <button type="submit" class="button send-message">
            SEND MESSAGE
        </button>

        @if (session('success'))
            <p class="form-success" role="status">
                {{ session('success') }}
            </p>
        @endif

    </form>

</main>

@endsection