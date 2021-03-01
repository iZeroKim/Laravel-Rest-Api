@extends('layouts.app')
@section('title')
    Home | admin
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <h2 id="recent"><b><u> Manage Deliveries.</u></b></h2>
            <table class="table table-special shadow-lg">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>StartLat</th>
                        <th>StartLong</th>
                        <th>EndLat</th>
                        <th>EndLong</th>
                        <th>Task Description</th>
                        <th>Status</th>
                        <th>Shopping List</th>
                        <th>Created at</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tasks as $task)
                    <tr>

                        <td>{{ $task->id }}</td>
                        <td>{{ $task->startLat }}</td>
                        <td>{{ $task->startLong }}</td>
                        <td>{{ $task->endLat }}</td>
                        <td>{{ $task->endLong }}</td>
                        <td>{{ $task->task_description }}</td>
                        <td>{{ $task->status}}</td>

                        <td>
                            <img src="{{ asset('public/img/'.$task->shopping_list_image_path) }}" height="30px" width="30px" alt="" srcset="">
                        </td>
                        <td>{{ $task->created_at }}</td>
                        <td>
                            <a href="#">View</a> | <a href="#">Edit</a> | <a href="#">Delete</a>
                        </td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
@endsection

