@extends ('layouts.main')

@section('content')

    <h2>Página Inicial</h2>
    <hr>
    <ul>

        <li><a href = "{{route('users.all') }}">Todos os utilizadores</a></li>
        <li><a href = "{{route('users.add') }}">Adicionar utilizador</a></li>
        <li><a href = "{{route('tasks.all') }}">Todas as tarefas</a></li>
        <li><a href = "{{route('tasks.add') }}">Adicionar tarefa</a></li>
        <li><a href = "{{route('gifts.all') }}">Todas as prendas</a></li>
        <li><a href = "{{route('gifts.add') }}">Adicionar prenda</a></li>
    </ul>


@endsection
