@extends('layouts.app') 

@section('content')

<div class="container">
  
    <h2>Edit List</h2><br>
    {!! Form::open(['action' => ['ListsController@update', $showList->id], 'method' => 'POST']) !!} 
    {{ csrf_field() }}
    <div class="form-group">
         {{Form::label('title', 'Title')}}
         {{Form::text('title', $showList->title, ['class' => 'form-control', 'placeholder' => 'Title', 'required' => 'autofocus'])}}
        </div>
        <div class="form-group"> 
          {{Form::label('body', 'Body')}}
          {!!Form::textarea('body', $showList->body, ['id' => 'ckeditor', 'class' => 'form-control', 'placeholder' => 'Body Text', 'required' => 'autofocus'])!!}
        </div>
        
          {{Form::hidden('_method', 'PUT')}}
          {{Form::submit('Submit', ['class' =>'btn btn-outline-primary'])}}
    {!! Form::close() !!} 
</div>
@endsection
