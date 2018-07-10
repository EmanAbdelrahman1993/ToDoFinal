<?php

namespace App\Http\Controllers;

use App\todo;
use App\images;
use App\files;
use Validator;
use Illuminate\Http\Request;

class TodoController extends Controller
{

    public function index()
    {
        $user_id = auth()->user()->id;
        $all_todos = todo::where('user_id',$user_id)->paginate(5);
        return view('ToDo.index')->with('all_todos',$all_todos);
    }


    public function create()
    {
        return view('ToDo.create');
    }


    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'progress' => 'required',
            'files' => 'required|file|array',
            'files.*' => 'file|mimes:doc,pdf,docx,zip',
            'description' => 'required',
            'images' => 'required|image|array',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048|array'
        ]);

        $todo = new todo();
        $todo->user_id = auth()->user()->id;
        $todo->name = $request->name;
        $todo->progress = $request->progress;
        $todo->description = $request->description;
        $todo->due_date = $request->due_date;
        $todo->save();
        //dd($todo->id);
        //dd($getID->);

        if ($request->hasFile('images')) {
            $images = $request->file('images');
            //dd($images);
            foreach($images as $image) {
               // dd($image);
                $name = time() . '.' . $image->getClientOriginalExtension();

                $destinationPath = public_path('/images');
                $image->move($destinationPath, $name);

                $Image_row = new images();
                $Image_row->todo_id = $todo->id;

                $Image_row->image = $name;
                //dd($Image_row);

                $Image_row->save();
            }
        }

        if ($request->hasFile('files')) {
            $files = $request->file('files');
            //dd($files);
            foreach($files as $file) {
                $name = time() . '.' . $file->getClientOriginalExtension();
                $destinationPath = public_path('/files');
                $file->move($destinationPath, $name);
                $File_row = new files();
                $File_row->todo_id = $todo->id;
                $File_row->file = $name;
                $File_row->save();

            }


        }

        session()->flash('success', 'ToDo Added Successfully');
        return redirect('ToDo');
    }


    public function show($id)
    {
        $images = images::where('todo_id',$id)->get();
        $files = files::where('todo_id',$id)->get();
        //dd($images);

        $todo = todo::find($id);
        return view('ToDo.show',['todo'=>$todo,'images'=>$images,'files'=>$files]);
    }


    public function edit($id)
    {
        $todo = todo::find($id);
        $images = images::where('todo_id',$id)->get();
        $files = files::where('todo_id',$id)->get();
        return view('ToDo.edit', ['todo' => $todo, 'images' =>$images,'files' => $files]);

    }


    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'progress' => 'required',
            'files' => 'required|file|array',
            'files.*' => 'file|mimes:doc,pdf,docx,zip',
            'description' => 'required',
            'images' => 'required|image|array',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048|array'
        ]);

        $todo = todo::find($id);
        $todo->user_id = auth()->user()->id;
        $todo->name = $request->name;
        $todo->progress = $request->progress;
        $todo->description = $request->description;
        $todo->due_date = $request->due_date;
        $todo->save();
        //dd($todo->id);
        //dd($getID->);

        if ($request->hasFile('images')) {
            $images = $request->file('images');
            //dd($images);
            foreach($images as $image) {
                // dd($image);
                $name = time() . '.' . $image->getClientOriginalExtension();

                $destinationPath = public_path('/images');
                $image->move($destinationPath, $name);

                $Image_row = new images();
                $Image_row->todo_id = $todo->id;

                $Image_row->image = $name;
                //dd($Image_row);

                $Image_row->save();
            }
        }

        if ($request->hasFile('files')) {
            $files = $request->file('files');
            //dd($files);
            foreach($files as $file) {
                $name = time() . '.' . $file->getClientOriginalExtension();
                $destinationPath = public_path('/files');
                $file->move($destinationPath, $name);
                $File_row = new files();
                $File_row->todo_id = $todo->id;
                $File_row->file = $name;
                $File_row->save();

            }


        }

        session()->flash('success', 'ToDo Added Successfully');
        return redirect('ToDo');


    }


    public function destroy($id)
    {
        todo::find($id)->delete();


        session()->flash('success', 'ToDo Deleted Successfully');
        return redirect('/ToDo');
    }
}
