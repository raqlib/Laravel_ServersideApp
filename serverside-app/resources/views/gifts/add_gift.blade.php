@extends ('layouts.main')

@section('content')
<div class="container">

        <h2>Olá, aqui podes adicionar prendas</h2>


    <!--Formulário-->
    <form method="POST" action="{{ route('gifts.store') }}">
        @csrf

        <div class="mb-3">
            <input  name= "name" value= "" type="text" class="form-control">
            <label for="exampleInputEmail1" class="form-label">Name</label>
            @error('name')
                Coloque um nome
            @enderror
        </div>

        <div class="mb-3">
            <input  name= "estimated_cost" value= "" type="number" class="form-control">
            <label for="exampleInputDate" class="form-label">Custo estimado</label>
            @error('estimated_cost')
                <div class="alert-danger">
                    Insira o custo estimado
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <input  name= "real_cost" value= "" type="number" class="form-control">
            <label for="exampleInputDate" class="form-label">Custo Real</label>
            @error('real_cost')
                <div class="alert-danger">
                    Insira o custo real
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
