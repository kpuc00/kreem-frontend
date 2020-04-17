@extends('layouts.layout')
@section('content')
<div class="row">
    <div class="col-3 mt-3 p-0">
        <div class="information-card mb-3 w-100">
            <div class="avatar-wrapper pt-3 mx-auto">
                <img src="img/account-sketch.svg" alt="" class="profile-picture">
            </div>
            <h5 class="h5 pt-3">{{ $user->first_name . " " . $user->last_name }}</h5>
            <p class="subtitle1 pt-3">{{ $user->role }}</p>
            <div class="row">
                <div class="col-12">
                    <p class="subtitle1">{{ $user->houlry_wage ?? '0' }}<img class="pr-2"src="img/money.svg" alt=""></p>
                </div>
            </div>
            <span class="divider mx-auto mt-3"></span>
            <div class="profile-information mt-3 subtitle1">
                <p class="m-0">Email address</p>
                <p class="pt-1">{{ $user->email }}</p>
                <p class="m-0">Phone</p>
                <p class="pt-1">{{ $user->phone ?? 'no phone submited' }}</p>
                <p class="m-0">Address</p>
                <p class="pt-1">{{ $user->phone ?? 'no address submited' }}</p>
            </div>
        </div>
    </div>
    <div class="col-9 mt-3 p-0">
        <div class="calendar ml-3 mr-3 mb-3">
            <h1>Section 2</h1>
        </div>
    </div>
</div>
@endsection
