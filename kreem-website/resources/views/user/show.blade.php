<div>
    <p>{{$user->first_name}}</p>

    <a href="{{ route('user.edit', ['user' => $user]) }}" class="btn btn-primary">Edit</a>
</div>
