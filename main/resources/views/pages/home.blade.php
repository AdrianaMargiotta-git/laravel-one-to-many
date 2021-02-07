@extends('layouts.main-layout')

@section('section')
    <h1>Lista Tasks:</h1>
    <a href="{{route('create')}}">create a new task</a>
    <ol>
        @foreach ($tasks as $task)
            <li>
                Task: {{$task['title']}}<br>
                Employee: {{$task -> employee -> name}} {{$task -> employee -> lastname}} <br>
                <a href="{{route('show', $task['id'])}}">Show details</a> <br>
                <a href="{{route('delete', $task['id'])}}">Delete task</a>
            </li>
            
        @endforeach
    </ol>
@endsection