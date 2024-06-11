@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1>Crear Nuevo Pokémon</h1>
    <form action="{{ route('pokemon.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="mb-3">
            <label for="url_image" class="form-label">URL de la imagen</label>
            <input type="text" class="form-control" id="url_image" name="url_image">
        </div>
        <div class="mb-3">
            <label for="type1" class="form-label">Tipo 1</label>
            <input type="text" class="form-control" id="type1" name="type1" required>
        </div>
        <div class="mb-3">
            <label for="type2" class="form-label">Tipo 2</label>
            <input type="text" class="form-control" id="type2" name="type2">
        </div>
        <div class="mb-3">
            <label for="generation" class="form-label">Generación</label>
            <input type="text" class="form-control" id="generation" name="generation" required>
        </div>
        <div class="mb-3">
            <label for="entry" class="form-label">Entrada</label>
            <textarea class="form-control" id="entry" name="entry" rows="3" required></textarea>
        </div>
        <div class="mb-3">
            <label for="pokemon_id" class="form-label">ID de Pokémon</label>
            <input type="number" class="form-control" id="pokemon_id" name="pokemon_id" required>
        </div>
        <button type="submit" class="btn btn-primary">Crear Pokémon</button>
    </form>
</div>
@endsection
