@extends('layouts.main-layout')

@section('section')

  <h1>Edit a task:</h1>

  <form action="{{route('update', $task['id'])}}" method="post">

    @csrf
    @method('POST')

    <label for="title">Insert a title:</label>
    <input type="text" name="title" value="{{$task['title']}}">
    <br>
    <label for="description">Insert the description:</label>
    <input type="text" name="description" value="{{$task['description']}}">
    <br>
    <label for="priority">Insert the priority (1-5):</label>
    <input type="number" name="priority" value="{{$task['priority']}}">
    <br>

    <label for="employee_id">Employee</label>
    <select name="employee_id">
        @foreach ($employees as $employee)
            <option value="{{$employee['id']}}" 
            @if ($employee['id'] == $task -> employee_id)
                selected
            @endif>
                {{$employee['lastname']}}
            </option>
        @endforeach
    </select>
    <br>

    <input type="submit" name="" value="Update">

  </form>

@endsection