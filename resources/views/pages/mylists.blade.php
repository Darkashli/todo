@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Your Lists</div>

                <div class="card-body">
                    {{-- @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif --}}
                    <a href="/lists/create" class="btn btn-outline-primary">Create List</a><br><br>

                    <h4>Your Lists</h4>
                    @if($mylists)
                        <table class="table table-striped">
                                <tr>
                                    <th>Title</th>
                                    <th>Date</th>
                                    <th></th>
                                    <th></th>
                                </tr>

                            @foreach ($mylists as $mylist)
                                <tr>
                                    <td><a href="/lists/view/{{$mylist->id}}">{{$mylist->title}}</a>
                                    <td>{{$mylist->created_at}}</td>
                                   
                                    <td><a href="#{{$mylist->id}}/edit" class="btn btn-outline-success">Edit</a></td>
                                    {{-- <td>
                                        {!!Form::open(['action' => ['ListsController@destroy', $mylist->id], 'method' => 'POST'])!!}
                                        {{Form::hidden('_method', 'DELETE')}}
                                        {{Form::submit('Delete', ['class' => 'btn btn-outline-danger btnDelete'])}}
                                        {!!Form::close()!!}
                                    </td> --}}
                                    
                                </tr> 
                            @endforeach
                        </table> 
                        @else
                        <p>You have no lists</p> 
                    @endif
                </div>
            </div>
            <br>
            {{$mylists->links()}}

        </div>
    </div>
</div>
@endsection
