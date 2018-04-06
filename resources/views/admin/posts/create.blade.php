@extends('layouts.admin')

@section('content')

    <h1>Create post</h1>

    {!!  Form::open(['method'=>'POST','action'=>'AdminPostsController@store', 'files'=>true]) !!}

        <div class="form-group">
            {!! Form::label('title', 'Title') !!}
            {!! Form::text('title', null, ['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('body', 'Body') !!}
            {!! Form::textarea('body', null, ['class'=>'form-control', 'rows'=>3]) !!}
        </div>

        <div class="form-group">
            {!! Form::label('category_id', 'Categorie') !!}
            {!! Form::select('category_id', array('Kies catagorie'=>'Options') + $categories, null, ['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('photo_id', 'Foto bijvoegen') !!}
            {!! Form::file('photo_id', null, ['class'=>'form-control']) !!}
        </div>

    <div class="form-group">
        {!! Form::submit('Create Post', ['class'=>'btn btn-primary']) !!}
    </div>

    {!! Form::close() !!}

    @include('includes.form_error')

@stop