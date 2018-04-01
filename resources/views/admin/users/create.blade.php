@extends('layouts.admin')



@section('content')

    <h1>Create user</h1>

            {!!  Form::open(['method'=>'POST','action'=>'AdminUsersController@store', 'files'=>true]) !!}

                <div class="form-group">
                    {!! Form::label('name', 'Naam') !!}
                    {!! Form::text('name', null, ['class'=>'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('email', 'E-Mail') !!}
                    {!! Form::email('email', null, ['class'=>'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('password', 'Wachtwoord') !!}
                    {!! Form::password('password', null, ['class'=>'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('file', 'Upload profielfoto') !!}
                    {!! Form::file('file', null, ['class'=>'form-control']) !!}
                 </div>

                <div class="form-group">
                    {!! Form::label('role_id', 'Rol') !!}
                    {!! Form::select('role_id', array('Kies een rol') + $roles , null, ['class'=>'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('is_active', 'Status') !!}
                    {!! Form::select('is_active', array(1 =>'Actief', 0 => 'Niet actief'),  0, ['class'=>'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::submit('Gebruiker aanmaken', ['class'=>'btn btn-primary']) !!}
                </div>

                    {!! Form::close() !!}

        @include('includes.form_error')

    @stop
