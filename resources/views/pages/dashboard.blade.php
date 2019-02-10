@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Your Lists</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <a href="/lists/create" class="btn btn-outline-primary">Create List</a><br><br>
                    <h4>Your Lists</h4>
                        @if(count($mylists) > 0)

                        <table class="table table-striped">
                                <tr>
                                    <th>Title</th>
                                    <th>Date</th>
                                    <th>Action</th>
                                    <th></th>
                                </tr>

                            @foreach ($mylists as $mylist)
                                <tr>
                                    <td>{{$mylist->title}}</td>
                                    <td>{{$mylist->created_at}}</td>
                                    <td><a class="btn btn-outline-success" href="/lists/{{$mylist->id}}/edit">Edit</td>
                                    <td>
                                        {!!Form::open(['action' => ['ListsController@destroy', $mylist->id], 'method' => 'POST'])!!}
                                       {{Form::hidden('_method', 'DELETE')}}
                                       {{Form::submit('Delete', ['class' => 'btn btn-outline-danger'])}}
                                        {!!Form::close()!!}
                                    </td>
                                   {{-- If you want to add Edit and Delete buttons --}}
                                   
                                    {{-- <td><a href="#{{$mylist->id}}/edit" class="btn btn-outline-success">Edit</a></td>
                                    <td>
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
        </div>
    </div>
</div>
@endsection
