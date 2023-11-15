@extends('layouts.main')

@section('content')
    <h2>Aqui vês utilizadores</h2>

    <h6>Name:{{$user->name}}</h6>
    <h6>Address: {{$user->address}}</h6>
    <h6>Password: {{$user->password}}</h6>

@endsection
