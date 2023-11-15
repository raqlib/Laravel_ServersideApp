@extends('layouts.main')

@section('content')
    <h2>Aqui vês tarefas</h2>

    <form method= "POST" action="{{route('tasks.update')}}">
        @csrf
        <input type="hidden" name="tasks_id" value="{{ $tasks->id}}">
        <label for="">Nome</label>
        <input type="text" name="name" value="{{$tasks->name }}">
        <hr>
        <label for="">Descrição</label>
        <input type="text" name="description" value="{{$tasks->description }}">
        <hr>
        <label for="">Data de Conclusão</label>
        <input type="date" name="date" value="{{$tasks->due_at}}">
        <hr>
        <label for="">Nome do responsável</label>
        <select name="user_id">
            @foreach ($users as $user)
            <!--este if serve para que apareça por defeito o utilizador que já está seleccionado-->

                <option value="{{ $user->id }}"
                @if ($user->id == $tasks->user_id) selected

                @endif>{{$user->name}}
                </option>
            @endforeach
        </select>
        <button tyoe="submit">Atualizar</button>

    </form>

@endsection
