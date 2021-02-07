@extends('layouts.main-layout')

@section('section')
  <h2>Tasks' typologies</h2>
  <ul>
    @foreach ($typologies as $typology)
      <li>
        <a href="{{route('typologies-show', $typology -> id)}}">{{$typology -> name}}</a>
      </li>
    @endforeach
  </ul>
@endsection