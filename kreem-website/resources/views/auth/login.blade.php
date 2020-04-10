@extends('layouts.main')

@section('title', 'Media Bazaar Login')

@section('styles')
    <link href="{{ asset('css/login.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="login">

    <p class="login-title">Log in</p>

    <form method="POST" action="{{ route('login') }}" >
        @csrf
        <!-- Email -->
        <div class="form-group mb-4">
            <input type="email" class="form-control @error('email') is-invalid @enderror" required
                   placeholder="Email" id="email" name="email" value="{{ old('email') }}">
            @error('email')
                <span class="invalid-feedback lead" role="alert"> {{ $message }} </span>
            @enderror
        </div>

        <!-- Password -->
        <div class="form-group mb-4">
            <input type="password" class="form-control @error('password') is-invalid @enderror" name="password"
                   required autocomplete="current-password" placeholder="Password" id="password">
            @error('password')
                <span class="invalid-feedback strong" role="alert"> {{ $message }} </span>
            @enderror
        </div>

        <!-- Remember me -->
        <div class="custom-control custom-checkbox mb-3">
            <input type="checkbox" class="custom-control-input" id="remember"
                   name="remember" {{ old('remember') ? 'checked' : '' }} >
            <label class="custom-control-label" for="remember">Remember me</label>
        </div>

        <!-- Submit -->
        <button type="submit" class="btn btn-primary">Log in</button>

        <!-- Forgot password -->
        @if (Route::has('password.request'))
            <a class="btn btn-link" href="{{ route('password.request') }}">
                Forgot Your Password?
            </a>
        @endif
    </form>

</div>
@endsection
