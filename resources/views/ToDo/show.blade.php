@extends('layouts.app')
@section('content')
    <div class="content">
        <div class="container">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h2 class="panel-title">{{$todo->name}}
                    </h2>
                </div>


                <div class="panel-body">


                    <h2>
                        Due Date:{{$todo->date}}
                    </h2>
                    </br>
                    <h3>
                        Progress: {{$todo->progress}}
                        </br>

                        Description:<p>{{$todo->description}}</p>
                        Files :
                        @foreach($files as $file)
                            {{$file->file}}-
                        @endforeach
                    </h3>
                    @foreach($images as $img)
                        <img src="{{url('/images/'.$img->image)}}" height="150px" width="150px"/>
                    @endforeach

                    <a class="pull-right" href="/ToDo" class="btn btn-link">Back</a>


                </div>

            </div>
        </div>
    </div>
    </div>
    </div>
    </div>
@endsection