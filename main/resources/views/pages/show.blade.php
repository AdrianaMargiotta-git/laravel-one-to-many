@extends('layouts.main-layout')

@section('section')
    <h1>Task information:</h1>
    <ul>
        <li>Name task: {{$task['title']}}</li>
        <li>Task description: {{$task['description']}}</li>
        <li>Task priority: {{$task['priority']}}</li>
        <li><a href="{{route('edit', $task['id'])}}">Edit a task</a></li>
    </ul>
    <h3>Typologies of task:</h3>
    <ul>
        @foreach ($task -> typologies as $type)
            <a href="{{route('typologies-show', $type -> id)}}">
                <li>{{$type -> name}}</li>
            </a>
        @endforeach
    </ul>
    @if ($task -> employee_id === NULL)
        <h3>Not assigned yet.</h3>
    @else
        <h3>Assigned to: {{$task -> employee -> name}} {{$task -> employee -> lastname}}</h3>
        <a href="{{route('employees-show', $task -> employee -> id)}}">
            Show me details
        </a>
    @endif
@endsection