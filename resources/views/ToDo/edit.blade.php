@extends('layouts.app')
@section('content')


    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">ToDo Edi</div>
                    <div class="panel-body">
                        <a href="{{url('ToDo')}}" class="btn btn-primary for pull-right">Back</a>
                        </br>
                        <form class="form-control" method="post" action="{{url('ToDo/'.$todo->id)}}" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="_method" value="PUT"/>

                            <div class="form-control">
                                <label>ToDo Name</label>
                                <input type="text" class="form-control" name="name" value="{{$todo->name}}" required/>
                            </div>

                            <div class="form-control">
                                <label>Description</label>
                                <textarea class="form-control" name="description" required>{{$todo->description}}</textarea>
                            </div>

                            <div class="form-control">
                                <label>Progress</label>
                                <input type="number" class="form-control" name="progress" value="{{$todo->progress}}" required/>
                            </div>


                            <div class="form-control">
                                <label>Due Date</label>
                                <input type="date" class="form-control" name="due_date" value="{{$todo->due_date}}" required/>
                            </div>

                            <div class="form-control">
                                <label>File</label>
                                <div>@foreach($files as $file)
                                        {{$file->file}}-
                                    @endforeach
                                </div>
                                <input type="file" class="form-control" name="files[]" multiple required/>
                            </div>

                            <div class="form-control">
                                <label>Image</label>
                                @foreach($images as $img)
                                    <img src="{{url('/images/'.$img->image)}}" height="150px" width="150px"/>
                                @endforeach
                                <input type="file" class="form-control" name="images[]"  multiple required/>
                            </div>




                            <input type="submit" class="btn btn-success form-control" value="Add" />



                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>






@endsection('content')


