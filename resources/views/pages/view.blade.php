@extends('layouts.app') 

@section('content')
<a href="/lists" class="btn btn-outline-secondary">Go Back</a>
<br><br>

  @foreach($showList as $list)
      <div>
        <h2>{!!$list->title!!}</h2>
      </div>
      <div>
        <h5>{!!$list->body!!}</h5>
      </div>
      <hr>
        <small>Written on {{$list->created_at}} by {{$list->user['name']}}</small>
      <hr>

          <ul class="list-group">
              @foreach($list->tasks as $task)
              <li class="list-group-item d-flex justify-content-between align-items-center">
                  {!!$task['title']!!}
                <span class="badge badge-primary badge-pill">14</span>
              </li>
              <li class="list-group-item d-flex justify-content-between align-items-center">
                  {!!$task['body']!!}
                <span class="badge badge-primary badge-pill">2</span>
              </li>
              <li class="list-group-item d-flex justify-content-between align-items-center">
                  {!!$task['created_at']!!}
                <span class="badge badge-primary badge-pill">1</span>
              </li>
              @endforeach
            </ul>
          <br>
          <div>
              <div class="btn-group" role="group" aria-label="First group">
                  <button class="btn btn-outline-success"><a href="/lists/{{$list->id}}/edit" class="">Edit</a></button>
              </div>
              <div class="btn-group" role="group" aria-label="Second group">
                  {!!Form::open(['action' => ['ListsController@destroy', $list->id], 'method' => 'POST'])!!}
                    {{Form::hidden('_method', 'DELETE')}}
                    {{Form::submit('Delete', ['class' => 'btn btn-outline-danger'])}}
                  {!!Form::close()!!}
              </div>
          </div>
          
           {{-- @if(!Auth::guest()) --}}
           {{-- @if (Auth::user()->id == $list->user_id) --}}
           {{-- @endif --}}
           {{-- @endif --}}
   @endforeach
@endsection
