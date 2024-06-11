@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1>Editar Pokémon</h1>
    <form action="{{ route('pokemon.update', $pokemon->pokemon_id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $pokemon->name }}" required>
        </div>
        <div class="mb-3">
            <label for="url_image" class="form-label">URL de la imagen</label>
            <input type="text" class="form-control" id="url_image" name="url_image" value="{{ $pokemon->url_image }}" required>
        </div>
        <div class="mb-3">
            <label for="type1" class="form-label">Tipo 1</label>
            <input type="text" class="form-control" id="type1" name="type1" value="{{ $pokemon->type1 }}" required>
        </div>
        <div class="mb-3">
            <label for="type2" class="form-label">Tipo 2</label>
            <input type="text" class="form-control" id="type2" name="type2" value="{{ $pokemon->type2 }}">
        </div>
        <div class="mb-3">
            <label for="generation" class="form-label">Generación</label>
            <input type="text" class="form-control" id="generation" name="generation" value="{{ $pokemon->generation }}" required>
        </div>
        <div class="mb-3">
            <label for="entry" class="form-label">Entrada</label>
            <textarea class="form-control" id="entry" name="entry" rows="3" required>{{ $pokemon->entry }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Actualizar</button>
    </form>
</div>
@endsection
