@extends('layouts.app') 

@section('content')
    <h2>Create List</h2><br>
    {!! Form::open(['action' => 'ListsController@store', 'method' => 'POST']) !!} 
    {{ csrf_field() }}
    <div class="form-group">
         {{Form::label('title', 'Title')}}
         {{Form::text('title','', ['class' => 'form-control', 'placeholder' => 'Title', 'required' => 'autofocus'])}}
        </div>
        <div class="form-group">
          {{Form::label('body', 'Body')}}
          {!!Form::textarea('body','', ['id' => 'ckeditor', 'class' => 'form-control editor', 'placeholder' => 'Body Text', 'required' => 'autofocus'])!!}
        </div>
        <div class="form-group">
          {{Form::file('cover_image')}}
        </div>
          {{Form::submit('Submit', ['class' =>'btn btn-outline-primary'])}}
    {!! Form::close() !!} 
    
    
@endsection

