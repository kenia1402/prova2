@extends('layouts.app')

@section('content')
    <h1>Detalhes do Filme</h1>
    
    <div class="movie-details">
        <img src="{{ $movie->cover_image }}" alt="{{ $movie->name }}">
        <h2>{{ $movie->name }}</h2>
        <p>Ano: {{ $movie->year }}</p>
        <p>Categoria: {{ $movie->category }}</p>
        <p>Sinopse: {{ $movie->synopsis }}</p>
        <a href="{{ $movie->trailer_link }}" target="_blank">Assistir ao Trailer</a>
    </div>
    
    <a href="{{ route('user.movies.index') }}">Voltar para a Galeria</a>
@endsection
