@extends('layouts.main-layout')

@section('section')
  
    <h1>Insert a new type of task</h1>
    <form action="{{route('typologies-store')}}" method="POST">
        
        @csrf
        @method('POST')

        <label for="name">Insert a name:</label>
        <input type="text" name="name" value="">
        <br><br>
        <label for="description">Insert the description:</label>
        <textarea name="description" id="" cols="40" rows="10"></textarea>
        <br><br>

        <input type="submit" value="Create">

        <br><br>

    </form>

@endsection