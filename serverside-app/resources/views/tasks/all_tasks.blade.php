@extends ('layouts.main')

@section('content')
<h2>Todas as tarefas</h2>

<table class="table table-striped">
    <thead>

      <tr>

        <th scope="col">Nome</th>
        <th scope="col">Status</th>
        <th scope="col">Data de conclusão</th>
        <th scope="col">Pessoa responsável</th>
      </tr>
    </thead>
    <tbody>
    @foreach ($tasks as $tarefa)
      <tr>
        <td>{{$tarefa->name}}</td>
        <td>{{$tarefa->status}}</td>
        <td>{{$tarefa->due_at}}</td>
        <td>{{$tarefa->resname}}</td>
        <td><a href ="{{route('tasks.all_task', $tarefa->id)}}" type="button" class="btn btn-info">Ver</a>
            <a href ="{{route('delete_task', $tarefa->id)}}" type="button" class="btn btn-danger">Apagar</a>
        </td>
      </tr>
    @endforeach

    </tbody>
  </table>


@endsection
