@extends('layouts.app') 

@section('content')
    <a href="/lists" class="btn btn-outline-secondary">Go Back</a><br><br>
    <h2>{{$showList->title}}</h2>
    
    <div>
      <h5>{!!$showList->body!!}</h5>
    </div>
    <hr>
    <small>Written on {{$showList->created_at}} by {{$showList->user['name']}}</small>
    <hr>
    @if(!Auth::guest())
      @if (Auth::user()->id == $showList->user_id) 

      <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
          <div class="btn-group" role="group" aria-label="First group">
           <button class="btn btn-outline-success"><a href="/lists/{{$showList->id}}/edit" class="">Edit</a></button>
          </div>
          
          <div class="btn-group" role="group" aria-label="Second group">
                  {!!Form::open(['action' => ['ListsController@destroy', $showList->id], 'method' => 'POST'])!!}
                    {{Form::hidden('_method', 'DELETE')}}
                    {{Form::submit('Delete', ['class' => 'btn btn-outline-danger'])}}
                  {!!Form::close()!!}
          </div>
      </div>
      @endif
    @endif
  
@endsection
