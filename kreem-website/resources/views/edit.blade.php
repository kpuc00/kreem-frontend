@extends('layouts.layout')

@section('title', 'My profile')

@section('page_header', 'Edit profile')

@section('content')
<div class="row">
    <div class="col-12 d-flex justify-content-center mx-auto mt-3">
        <div class="avatar-wrapper">
            <img src="img/account-sketch.svg" alt="" class="profile-picture">
            <button id="change-picture">
                <img src="/img/edit-minibutton.svg" />
            </button>
        </div>
    </div>
</div>
<div class="edit-form-wrapper mx-auto">
    <div class="row align-items-center m-0 p-20px border-bottom">
            <div class="col-6">
                <h5 class="h5">Full name</h5>
            </div>
            <div class="col-6">
                <h6 class="h6">Placeholder</h6>
            </div>
    </div>
    <div class="row align-items-center m-0 p-20px border-bottom">
            <div class="col-6">
                <h5 class="h5">Personal email</h5>
            </div>
            <div class="col-6">
                <h6 class="h6">Placeholder</h6>
                <button class="change" id="change-email"><h6 class="h6 h6-prompt">Change email</h6></button>
            </div>
    </div>
    <div class="row align-items-center m-0 p-20px border-bottom">
            <div class="col-6">
                <h5 class="h5">Address</h5>
            </div>
            <div class="col-6">
                <h6 class="h6">Placeholder</h6>
                <button class="change" id="change-address"><h6 class="h6 h6-prompt">Change address</h6></button>
            </div>
    </div>
    <div class="row align-items-center m-0 p-20px border-bottom">
            <div class="col-6">
                <h5 class="h5">Phone</h5>
            </div>
            <div class="col-6">
                <h6 class="h6">Placeholder</h6>
                <button class="change" id="change-phone"><h6 class="h6 h6-prompt">Change phone</h6></button>
            </div>
    </div>
    <div class="row align-items-center m-0 p-20px">
            <div class="col-6">
                <h5 class="h5">Password</h5>
            </div>
            <div class="col-6">
                <button class="change" id="change-password"><h6 class="h6 h6-prompt">Change password</h6></button>
            </div>
    </div>
</div>
@endsection