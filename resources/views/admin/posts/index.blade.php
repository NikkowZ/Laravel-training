@extends('layouts.admin')

@section('content')

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Eigenaar</th>
                <th>Rol</th>
                <th>Categorie</th>
                <th>Photo</th>
                <th>Titel</th>
                <th>Body</th>
                <th>Created at</th>
                <th>Updated at</th>
            </tr>
        </thead>

        <tbody>

        @if($posts)

            @foreach($posts as $post)
                <tr>
                    <td>{{$post->id}}</td>
                    <td>{{$post->user->name}}</td>
                    <td>{{$post->user->role->name}}</td>
                    <td>{{$post->category ? $post->category->name : 'Geen catagorie'}}</td>
                    <td><img height="50px" src="{{$post->photo ? $post->photo->file_path : ''}}" alt=""></td>
                    <td>{{$post->title}}</td>
                    <td>{{$post->body}}</td>
                    <td>{{$post->created_at}}</td>
                    <td>{{$post->updated_at}}</td>
                </tr>
            @endforeach

        @endif

        </tbody>

    </table>


    @stop