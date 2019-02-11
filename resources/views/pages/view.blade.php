@extends('layouts.app') 

@section('content')
    <a href="/lists" class="btn btn-outline-secondary">Go Back</a>
    <h2>{!!$showList->title!!}</h2>
    
    <div>
      <h5>{!!$showList->body!!}</h5>
    </div>
    <hr>
    <small>Written on {{$showList->created_at}} by {{$showList->user['name']}}</small>
    <hr>

      <div class="list-group">
          <a href="#" class="list-group-item list-group-item-action flex-column align-items-start active">
            <div class="d-flex w-100 justify-content-between">
              <h5 class="mb-1"></h5>
              <small class="text-muted"></small>
            </div>
            <p class="mb-1">Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget risus varius blandit.</p>
            <small class="text-muted"></small>
          </a>
          <a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
            <div class="d-flex w-100 justify-content-between">
              <h5 class="mb-1">List group item heading</h5>
              <small class="text-muted"></small>
            </div>
            <p class="mb-1">Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget risus varius blandit.</p>
            <small class="text-muted">}</small>
          </a>
          <a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
            <div class="d-flex w-100 justify-content-between">
              <h5 class="mb-1">List group item heading</h5>
              <small class="text-muted"></small>
            </div>
            <p class="mb-1">Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget risus varius blandit.</p>
            <small class="text-muted">Donec id elit non mi porta.</small>
          </a>
        </div>
        <br>

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
