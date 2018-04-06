@extends('layouts.admin')



@section('content')

    <h1>Edit user</h1>

    <div class="col-sm-3">

        <div class="row">
            <img src="{{$user->photo ? $user->photo->file_path : '/images/dog.jpg'}}" alt="" class="img-responsive img-rounded">
        </div>
        <div class="row">
            @include('includes.form_error')
        </div>
    </div>

    <div class="col-sm-9">

    {!!  Form::model($user, (['method'=>'PATCH','action'=>['AdminUsersController@update', $user->id], 'files'=>true])) !!}

    <div class="form-group">
        {!! Form::label('name', 'Naam') !!}
        {!! Form::text('name', null, ['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('email', 'E-Mail') !!}
        {!! Form::email('email', null, ['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('password', 'Wachtwoord') !!}<br>
        {!! Form::password('password', null, ['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('photo_id', 'Upload profielfoto') !!}
        {!! Form::file('photo_id', null, ['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('role_id', 'Rol') !!}
        {!! Form::select('role_id', $roles , null, ['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('is_active', 'Status') !!}
        {!! Form::select('is_active', array(1 =>'Actief', 0 => 'Niet actief'),  null, ['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::submit('Wijzigingen opslaan', ['class'=>'btn btn-primary col-sm-6']) !!}
    </div>

        {!! Form::close() !!}




    {!! Form::open(['method'=>'DELETE', 'action'=>['AdminUsersController@destroy', $user->id]]) !!}

            {!! Form::submit('Verwijder gebruiker', ['class'=>'btn btn-danger col-sm-6']) !!}

            {!! Form::close() !!}

    </div>

@stop
