@extends('layouts.app')


@section('content')
    <form action="{{ route('user.update', ['user' => $user]) }}" method="POST">
        @method('PATCH')
        <div class="form-group">
            <label for="exampleInputEmail1">first name</label>
            <input name="first_name" type="first_name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter first name" value="{{ old('first_name') ?? $user->first_name}}">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">last name</label>
            <input name="last_name" type="last_name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter last name" value="{{ old('last_name') ?? $user->last_name}}">
        </div>
        <div class="form-group">
        <label for="exampleInputEmail1">Email address</label>
        <input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" value="{{ old('email') ?? $user->email }}">
        </div>
        <div class="form-check">
        <input type="checkbox" class="form-check-input" id="exampleCheck1">
        <label class="form-check-label" for="exampleCheck1">Check me out</label>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
        @csrf
    </form>
@endsection

