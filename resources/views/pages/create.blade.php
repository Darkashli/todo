@extends('layouts.app')

@section('content')

<div class="container">
    <h2>Create List</h2><br>
    {!! Form::open(['action' => 'ListsController@store', 'method' => 'POST']) !!}
    @csrf
    <div class="form-group">
         {{Form::label('title', 'Title')}}
         {{Form::text('title','', ['class' => 'form-control', 'placeholder' => 'Title', 'required' => 'autofocus'])}}
        </div>
        <div class="form-group">
          {{Form::label('body', 'Body')}}
          {!!Form::textarea('body','', ['id' => 'ckeditor', 'class' => 'form-control editor', 'placeholder' => 'Body Text', 'required' => 'autofocus'])!!}
        </div>
          {{Form::submit('Submit', ['class' =>'btn btn-outline-primary'])}}
    {!! Form::close() !!}
</div>

@endsection
