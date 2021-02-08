@extends('layouts.main-layout')

@section('section')

  <h1>Create a new tipology task:</h1>
  <a href="{{route('typologies-index')}}">Tipologies list</a>

  <form action="{{route('typologies-update', $typology -> id)}}" method="post">

    @csrf
    @method('POST')

    <label for="name">Insert a name:</label>
    <input type="text" name="name" value="{{$typology -> name}}">
    <br><br>
    <label for="description">Insert the description:</label>
    <textarea name="description" id="" cols="40" rows="10">{{$typology -> description}}</textarea>
    <br><br>

    <label for="taskassociate">Which tasks? (you can select more than one task)</label>
    <select name="taskassociate[]" multiple="multiple">
        @foreach ($tasks as $task)
            <option value="{{$task -> id}}" 
              @if ($typology -> task -> contains($task -> id))
                selected
              @endif>
                {{$task -> title}}
            </option>
        @endforeach
    </select>
    <br><br>

    <input type="submit" name="" value="Update">

  </form>

@endsection