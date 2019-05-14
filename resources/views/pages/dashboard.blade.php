@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card">
                <div class="card-header">Your Lists</div>

                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif

                    <a href="/lists/create" class="btn btn-outline-primary">Create List</a><br><br>
                    <h4>Your Lists</h4>
                        @if(count($mylists) > 0)

                        <table class="table table-striped">
                                <tr>
                                    <th>Title</th>
                                    <th>Date</th>
                                    <th class="text-right">Action</th>
                                </tr>

                            @foreach ($mylists as $mylist)
                                <tr>
                                    <td><a href="/lists/view/{{$mylist->id}}">{{$mylist->title}}</a></td>
                                    <td>{{$mylist->created_at}}</td>
                                    <td>
                                    <div class="row row-fix">
                                    <a class="btn btn-outline-success a-fix-table" href="/lists/{{$mylist->id}}/edit">Edit</a>
                    
                                        {!!Form::open(['action' => ['ListsController@destroy', $mylist->id], 'method' => 'POST'])!!}
                                        @csrf
                                       {{Form::hidden('_method', 'DELETE')}}
                                       {{Form::submit('Delete', ['class' => 'btn btn-outline-danger'])}}
                                        {!!Form::close()!!}
                                    </div>
                                  </td>
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
