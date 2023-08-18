@extends('layouts.app')

@section('content')
    <h1>Galeria de Filmes</h1>
    
    <form action="{{ route('user.movies.index') }}" method="get">
        <label for="year">Filtrar por Ano:</label>
        <input type="text" name="year" id="year">
        <label for="category">Filtrar por Categoria:</label>
        <select name="category" id="category">
            <option value="">Todas</option>
            <option value="Action">Ação</option>
            <option value="Drama">Drama</option>
            <option value="Comedy">Comédia</option>
            <option value="Sci-Fi">Sci-Fi</option>
        </select>
        <button type="submit">Filtrar</button>
    </form>
    
    <div class="movie-gallery">
        @foreach($movies as $movie)
            <div class="movie-item">
                <img src="{{ $movie->cover_image }}" alt="{{ $movie->name }}">
                <h2>{{ $movie->name }}</h2>
                <p>{{ $movie->year }}</p>
                <p>{{ $movie->category }}</p>
                <a href="{{ route('user.movies.show', $movie->id) }}">Detalhes</a>
            </div>
        @endforeach
    </div>
@endsection
