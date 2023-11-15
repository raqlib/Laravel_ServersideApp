@extends ('layouts.main')

@section('content')
    <h2>Olá, sou todos os utilizadores</h2>

    <!--<h5>Nome: {{$cesaeInfo['name']}}</h5>
    <h5>Morada:{{$cesaeInfo['address']}} </h5>
    <h5>Email: {{$cesaeInfo['email']}} </h5>-->

    <table class="table">
        <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Nome</th>
                <th scope="col">Morada</th>
                <th scope="col">Email</th>
                <th scope="col">Password</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <th scope="row">{{ $user->id }}</th>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->address }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->password }}</td>
                    <td><a href ="{{route('users.view', $user->id)}}" type="button" class="btn btn-info">Ver</a>
                        <a href ="{{route('delete_contact', $user->id)}}" type="button" class="btn btn-danger">Apagar</a>
                    </td>
                </tr>
            @endforeach

        </tbody>
    </table>

@endsection
