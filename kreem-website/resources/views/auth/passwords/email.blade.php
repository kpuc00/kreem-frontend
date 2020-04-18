@extends('layouts.guests')

@section('title', 'Reset password')

@section('content')

<p class="title">Reset password</p>

<form method="POST" action="{{ route('password.email') }}">
    @csrf
    
    <div class="form-group mb-4">
        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Email" value="{{ old('email') }}" required autocomplete="email" autofocus>
        
        @error('email')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
    
    <button type="submit" class="btn btn-primary">
        {{ __('Reset') }}
    </button>
    
</form>

@endsection