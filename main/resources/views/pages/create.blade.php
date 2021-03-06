@extends('layouts.main-layout')

@section('section')

  <h1>Insert a new task:</h1>

  <form action="{{route('store')}}" method="post">

    @csrf
    @method('POST')

    <label for="title">Insert a title:</label>
    <input type="text" name="title" value="">
    <br>
    <label for="description">Insert the description:</label>
    <input type="text" name="description" value="">
    <br>
    <label for="priority">Insert the priority (1-5):</label>
    <input type="number" name="priority" value="">
    <br>

    <label for="employee_id">Employee</label>
    <select name="employee_id">
        @foreach ($employees as $employee)
            <option value="{{$employee['id']}}">{{$employee['lastname']}}</option>
        @endforeach
    </select>
    <br><br>

    <label for="typologies[]">Typologies</label><br>
    @foreach ($typologies as $typology)
      <input name='typologies[]' type="checkbox" value="{{$typology -> id}}">
        {{$typology -> name}} <br>
    @endforeach
    
    <br><br>
    
    <input type="submit" name="" value="Create">

  </form>

@endsection