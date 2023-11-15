@extends ('layouts.main')

@section('content')

<h2>Todas as prendas</h2>

<table class="table table-striped">
    <thead>
      <tr>
        <th scope="col">Nome</th>
        <th scope="col">Custo Estimado</th>
        <th scope="col">Custo Real</th>
        <th scope="col">Pessoa</th>

      </tr>
    </thead>
    <tbody>
    @foreach ($gifts as $gift)
      <tr>
        <td>{{$gift->name}}</td>
        <td>{{$gift->estimated_cost}}</td>
        <td>{{$gift->real_cost}}</td>
        <td>{{$gift->resname}}</td>
        <td><a href ="{{route('gifts.view', $gift->id)}}" type="button" class="btn btn-info">Ver/Editar</a>
        </td>

      </tr>
    @endforeach

    </tbody>
  </table>


@endsection
