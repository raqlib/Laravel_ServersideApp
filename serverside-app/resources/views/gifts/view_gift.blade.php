@extends('layouts.main')

@section('content')
    <h2>Aqui vês as prendas e fazes o seu update</h2>

    <form method= "POST" action="{{route('gifts.update')}}">
        @csrf

        <input type="hidden" name="gift_id" value="{{ $gifts->id}}">
        <label for="">Nome</label>
        <input type="text" name="name" value="{{$gifts->name }}">
        <hr>
        <label for="">Custo Estimado</label>
        <input type="number" name="estimated_cost" value="{{$gifts->estimated_cost }}">
        <hr>
        <label for="">Custo Real</label>
        <input type="number" name="real_cost" value="{{$gifts->real_cost}}">
        <hr>
        <label for="">Nome da pessoa</label>
        <select name="user_id">
            @foreach ($users as $user)
            <!--if para que apareça por defeito o utilizador que já está seleccionado-->
                <option value="{{ $user->id }}"
                @if ($user->id == $gifts->user_id) selected

                @endif>{{$user->name}}
                </option>
            @endforeach
        </select>
        <button type="submit">Atualizar</button>

    </form>

@endsection
