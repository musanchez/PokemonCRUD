@extends('layouts.app')

@section('content')

<div class="container mt-5">
    <div id="carouselExampleIndicators" class="carousel slide">
        @php
            $pokemon = $pokemon->sortBy('pokemon_id');
        @endphp
        <div class="carousel-indicators" style="margin-bottom: 20px;">
            @for ($i = 0; $i < ceil(count($pokemon) / 3); $i++)
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="{{ $i }}"
                    class="{{ $i == 0 ? 'active' : '' }}"></button>
            @endfor
        </div>
        <div class="carousel-inner">
            @for ($i = 0; $i < ceil(count($pokemon) / 3); $i++)
                <div class="carousel-item {{ $i == 0 ? 'active' : '' }}">
                    <div class="d-flex justify-content-around">
                        @foreach ($pokemon->slice($i * 3, 3) as $p)
                            <div class="card" style="width: 20%; background-color: #f8f9fa; margin-bottom: 20px;">
                                <div class="card-body text-center">
                                    <img src="{{ $p->url_image }}" class="card-img-top mx-auto" alt="{{ $p->name }}"
                                        style="width: 60%; height: auto;">
                                    <div class="card-body text-center">
                                        <h5 class="card-title">{{ $p->name }}</h5>
                                        @if ($p->type2 == null)
                                            <p class="card-text">Tipo: {{ $p->type1 }}</p>
                                        @else
                                            <p class="card-text">Tipo: {{ $p->type1 }}/{{ $p->type2 }}</p>
                                        @endif
                                        <p class="card-text">Número de Pokedex: {{ $p->pokemon_id }}</p>
                                        <p class="card-text">Generación: {{ $p->generation }}</p>
                                        <p class="card-text">{{ $p->entry }}</p>
                                        <!-- Botones de edición y eliminación -->
                                        <div class="mt-3">
                                            <form action="{{ route('pokemon.edit', $p) }}" method="GET" class="d-inline">
                                                @csrf
                                                @method('GET')
                                                <button class="btn btn-primary">Editar</button>
                                            </form>
                                            
                                            <form action="{{ route('pokemon.destroy', $p->pokemon_id) }}" method="POST"
                                                class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Eliminar</button>
                                            </form>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endfor
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev"
            style="width: auto; left: 0; top: 50%; transform: translateY(-50%);">
            <span class="carousel-control-prev-icon" aria-hidden="true" style="background-color: #333;"></span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next"
            style="width: auto; right: 0; top: 50%; transform: translateY(-50%);">
            <span class="carousel-control-next-icon" aria-hidden="true" style="background-color: #333;"></span>
        </button>
    </div>
</div>

@endsection

@push('styles')
    <style>
        .carousel-item {
            display: flex;
            justify-content: center;
        }
    </style>
@endpush

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var myCarousel = document.querySelector('#carouselExampleIndicators');
            var carousel = new bootstrap.Carousel(myCarousel, {
                interval: false
            });
        });
    </script>
@endpush
