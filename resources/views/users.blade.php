@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Users</div>

                    <div class="card-body">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Email</th>
                                <th scope="col">Name</th>
                                <th scope="col">Date</th>
                                <th scope="col">Roles</th>
                                <th scope="col">#</th>
                                <th scope="col">#</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <th scope="row">{{ $user->id }}</th>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ date('Y-m-d', time($user->created_at)) }}</td>
                                    <td>
                                        @if(count($user->roles))
                                            <ul>
                                                @foreach($user->roles as $role)
                                                    <li>{{ $role->title }}</li>
                                                @endforeach
                                            </ul>
                                            @else
                                            -
                                        @endif
                                    </td>
                                    <td><a href="{{ route('users.edit', ['id' => $user->id]) }}">Edit</a></td>
                                    <td><a href="{{ route('users.delete', ['id' => $user->id]) }}">Delete</a></td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
