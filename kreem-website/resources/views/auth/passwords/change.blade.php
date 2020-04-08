@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"> Change your password</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('password.change') }}">
                            @csrf
                            @method('patch')
                            <input type="hidden" name="redirectTo" value="{{ \Illuminate\Support\Facades\Session::get('redirectTo', 'home') }}">
                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right"> Current password </label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control @error('old-password') is-invalid @enderror" name="old-password" required autocomplete="current-password">

                                    @error('old-password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">New password</label>

                                <div class="col-md-6">
                                    <input id="new-password" type="password" class="form-control @error('new-password') is-invalid @enderror" name="new-password" required autocomplete="current-password">

                                    @error('new-password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">New password</label>

                                <div class="col-md-6">
                                    <input id="new-password_confirmation" type="password" class="form-control @error('new-password_confirmation') is-invalid @enderror" name="new-password_confirmation" required autocomplete="current-password">

                                    @error('new-password_confirmation')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>



                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Login') }}
                                    </button>

                                    @if (Route::has('password.request'))
                                        <a class="btn btn-link" href="{{ route('password.request') }}">
                                            {{ __('Forgot Your Password?') }}
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
