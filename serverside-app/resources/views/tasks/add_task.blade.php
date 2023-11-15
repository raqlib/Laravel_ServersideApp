@extends ('layouts.main')

@section('content')
<div class="container">

        <h2>Olá, aqui podes adicionar tarefas</h2>


    <!--Formulário-->
    <form method="POST" action="{{ route('tasks.store') }}">
        @csrf

        <div class="mb-3">
            <input  name= "name" value= "" type="text" class="form-control">
            <label for="exampleInputEmail1" class="form-label">Name</label>
            @error('name')
                Pf coloque um nome
            @enderror
        </div>

        <div class="mb-3">
            <input  name= "description" value= "" type="text" class="form-control">
            <label for="exampleInputDate" class="form-label">Descrição</label>
            @error('description')
                <div class="alert-danger">
                    Insira uma descrição
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <input  name= "date" value= "" type="date" class="form-control">
            <label for="exampleInputDate" class="form-label">Data de Conclusão</label>
            @error('date')
                <div class="alert-danger">
                    Insira uma data de conclusão
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="pet-select">Seleccione um utilizador:</label>
                <select name="user_id">
                    <option value="">--Please choose an option--</option>

                    @foreach ($users as $item)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach

                </select>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection
