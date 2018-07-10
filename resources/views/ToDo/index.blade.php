@extends('layouts.app')
@section('content')


    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class=" card-header">ToDo Index
                        <center><a href="/home" class="btn btn-primary">Back To Dashboard</a> <a
                                    href="{{url('ToDo/create')}}" class="btn btn-primary">Add ToDo</a></center>
                    </div>
                    <table class="table table-bordered table-responsive-sm table-hover">

                        <thead>
                        <tr>

                            <td>Name</td>
                            <td>Description</td>
                            <td>Progress</td>
                            <td>Due Date</td>
                            <td>Action</td>
                        </tr>
                        </thead>
                        <tbody>
                        @if($all_todos)
                        @foreach($all_todos as $todo)
                            <tr>

                                <td>{{$todo->name}}</td>
                                <td>{{$todo->description}}</td>
                                <td>
                                    <div class="progress">
                                        <div class="progress-bar" role="progressbar" style="width: 25%;" aria-valuenow="{{$todo->progress}}" aria-valuemin="0" aria-valuemax="100">{{$todo->progress}}%</div>
                                    </div>

                                    </td>
                                <td>{{$todo->due_date}}</td>



                                <td>
                                    <a href="{{url('ToDo/'.$todo->id)}}" class="btn btn-success">Show</a>
                                    <a href="{{url('ToDo/'.$todo->id.'/edit')}}" class="btn btn-primary">Edit</a>
                                    <form method="post" action="{{url('ToDo/'.$todo->id)}}"
                                          style="display: inline;">
                                        @csrf
                                        <input type="hidden" name="_method" value="DELETE"/>
                                        <input type="submit" value="delete" class="btn btn-danger"/>
                                    </form>
                                    {{--<a href="{{url('news/destroy/'.$news->id)}}" class="btn btn-danger" role="button">Delete</a>--}}
                                    {{----}}
                                </td>
                            </tr>
                        @endforeach
                            @else
                            <div class="alert alert-dismissible alert-primary">
                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                                <strong>Oh snap! No To Do For You</strong> <a href="url{{'ToDo/create'}}" class="alert-link">Add New To Do </a> and try  again.
                            </div>
                        @endif
                        </tbody>
                    </table>
                </div>
                <center>
                    {{$all_todos->links()}}
                </center>

            </div>

        </div>
    </div>
    </div>







@endsection('content')