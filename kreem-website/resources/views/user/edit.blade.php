

@extends('layouts.layout')

@section('content')

<form action="{{ route('user.update', ['user' => $user]) }}" method="POST">
    @method("PATCH")
    <div class="row">
        <div class="col-12 d-flex justify-content-center mx-auto">
            <div class="avatar-wrapper mt-5 ">
                <img src="img/account-sketch.svg" alt="" class="profile-picture">
                <button id="change-picture">
                    <img src="/img/edit-minibutton.svg" />
                </button>
            </div>

    </div>
    <div class="edit-form-wrapper mx-auto">
        <div class="row align-items-center m-0 p-20px border-bottom">
            <div class="col-6">
                <h5 class="h5">Full name</h5>
            </div>
            <div class="col-6">
                <h6 class="h6">{{ $user->first_name . " " . $user->last_name }}</h6>
            </div>
        </div>
        <div class="row align-items-center m-0 p-20px border-bottom">
            <div class="col-6">
                <h5 class="h5">Personal email</h5>
            </div>
            <div class="col-6">
                <input type="text" class="h6" id="email"  name="personal_email" value="{{ old('personal_email') ?? $user->personal_email }}">
                <button class="change" id="change-email" type="submit"><h6 class="h6 h6-prompt">Change email</h6></button>
                @if($errors->has('personal_email'))
                    <div class="alert-warning" role="alert">{{ $errors->first('personal_email') }}</div>
                @endif
            </div>
        </div>
        <div class="row align-items-center m-0 p-20px border-bottom">
            <div class="col-6">
                <h5 class="h5">Address</h5>
            </div>
            <div class="col-6" >
                <input type="text" class="h6" id="address" name="address" value="{{ old('address') ?? $user->address }}">
                <button class="change" id="change-address" type="submit"><h6 class="h6 h6-prompt">Change address</h6></button>
                @if($errors->has('address'))
                    <div class="alert-warning" role="alert">{{ $errors->first('address') }}</div>
                @endif
            </div>
        </div>
        <div class="row align-items-center m-0 p-20px border-bottom">
            <div class="col-6">
                <h5 class="h5">Phone</h5>
            </div>
            <div class="col-6">
                <input type="text" class="h6" id="phone_number" name="phone_number" value="{{ old('phone_number') ?? $user->phone_number }}">
                <button class="change" id="change-phone" type="submit"><h6 class="h6 h6-prompt">Change phone</h6></button>
                @if($errors->has('phone_number'))
                    <div class="alert-warning" role="alert">{{ $errors->first('phone_number') }}</div>
                @endif
            </div>
        </div>
        <div class="row align-items-center m-0 p-20px">
            <div class="col-6">
                <h5 class="h5">Password</h5>
            </div>
            <div class="col-6">
                <a href="{{ route('password.change')}}" class="btn btn-primary">Change Password</a>
            </div>
        </div>
    </div>
    @csrf
</form>
@endsection

