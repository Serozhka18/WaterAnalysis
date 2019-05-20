@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <form method="post" action="{{ route('users.update', ['id' => $user->id]) }}">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}" disabled>
                    </div>
                    <div class="form-check">
                        @foreach($roles as $role)
                            <input type="checkbox" class="form-check-input" id="role{{ $role->id }}" name="roles[]" value="{{ $role->id }}" {{ $user->roles->contains($role) ? 'checked' : '' }}>
                            <label class="form-check-label" for="role{{ $role->id }}">{{ $role->title }}</label>
                            <br>
                        @endforeach
                    </div>
                    {{ csrf_field() }}
                    {{ method_field('put') }}
                    <hr>
                    <p class="text-right">
                        <button class="btn btn-primary" type="submit">Update</button>
                    </p>
                </form>
            </div>
        </div>
    </div>
@endsection
