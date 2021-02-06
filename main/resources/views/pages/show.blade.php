@extends('layouts.main-layout')

@section('section')
    <h1>Task information:</h1>
    <ul>
        <li>Name task: {{$task['title']}}</li>
        <li>Task description: {{$task['description']}}</li>
        <li>Task priority: {{$task['priority']}}</li>
        <li><a href="{{route('edit', $task['id'])}}">Edit a task</a></li>
    </ul>
@endsection