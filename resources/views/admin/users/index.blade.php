@extends('layouts.admin')

@section('content')

    @if(Session::has('deleted'))

        <p class="bg-danger">{{session('deleted')}}</p>

        @endif


    <h1>Users</h1>
    <table class="table">
        <thead>
        <tr>
            <th>ID</th>
            <th>Status</th>
            <th>Naam</th>
            <th>Foto</th>
            <th>Rol</th>
            <th>Email</th>
            <th>Created</th>
            <th>Updated</th>
        </tr>
        </thead>
        <tbody>
        @if($users)

            @foreach($users as $user)

                <tr>
                    <td>{{$user->id}}</td>
                    <td>{{$user->is_active == 1 ? 'Actief':'Niet actief'}}</td>
                    <td><a href="{{route('admin.users.edit', $user->id)}}">{{$user->name}}</a></td>
                    <td><img height="50px" src="{{$user->photo ? $user->photo->file_path : '/images/dog.jpg'}}"></td>
                    <td>{{$user->role->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->created_at->diffForHumans()}}</td>
                    <td>{{$user->updated_at->diffForHumans()}}</td>
                </tr>

            @endforeach

        @endif
        </tbody>


    </table>

@stop