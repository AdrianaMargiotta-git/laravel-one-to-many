@extends('layouts.main-layout')

@section('section')

<ol>
    @foreach ($tasks as $task)
        <li>
            Task: {{$task['title']}}<br>
            Employee: {{$task -> employee -> name}} {{$task -> employee -> lastname}} <br>
        </li>
        
    @endforeach
</ol>