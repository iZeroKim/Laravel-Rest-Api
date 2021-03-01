<?php

namespace App\Http\Controllers;

use App\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{

    public function index(){
        $tasks = Task::orderBy('created_at', 'desc')->get();

        return view('home', compact('tasks'));

    }

    public function create(){

        return view('admin.newblog');
    }

    public function edit($id){
        $task = Task::find($id);
        return view('edittask', compact('task'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'startLat'=>'required',
            'endLat'=>'required',
            'startLong' =>'required',
            'startLat' =>'required',
            'file' => 'required|image|mimes:png,jpg,jpeg,gif,svg|max:2048'

        ]);

        $task = Task::find($id);
        $task->startLat = $request->startLat;
        $task->startLong = $request->startLong;
        $task->endLat = $request->endLat;
        $task->endLong = $request->endLong;
        $task->task_description = $request->task_description;

        if ($request->hasFile('file')) {


            $file = $request->file('file');
            $destinationPath = 'public/img/';
            $originalFile = $file->getClientOriginalName();
            $file->move($destinationPath, $originalFile);
            $task->shopping_list_image_path = $originalFile;
        }



        $task->save();
        return back()->with('success', 'Task successfully edited.');

    }
    public function store(Request $request){


        $request->validate([
            'startLat'=>'required',
            'endLat'=>'required',
            'startLong' =>'required',
            'startLat' =>'required',
            'file' => 'image|mimes:png,jpg,jpeg,gif,svg|max:2048'

        ]);

        $task = new Task();
        $task->startLat = $request->startLat;
        $task->startLong = $request->startLong;
        $task->endLat = $request->endLat;
        $task->endLong = $request->endLong;
        $task->task_description = $request->task_description;

        if ($request->hasFile('file')) {


            $file = $request->file('file');
            $destinationPath = 'public/img/';
            $originalFile = $file->getClientOriginalName();
            $file->move($destinationPath, $originalFile);
            $task->shopping_list_image_path = $originalFile;
        }



        $task->save();
        return back()->with('success', 'Task successfully created.');
    }
    public function status(){

    }

    public function show($id){
        $task = Task::find($id);
        return view('show', compact('post'));
    }

    public function delete($id){
        $task = Task::find($id);
        $task->delete();
        return back()->with('success', 'Task successfully deleted.');
    }

}
