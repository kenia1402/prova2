@extends('layouts.app')

@section('content')
    <h1>Lista de Filmes</h1>

    <ul>
        @foreach ($filmes as $filme)
            <li>
                <a href="{{ route('filmes.edit', $filme->id) }}">{{ $filme->nome }}</a>
            </li>
        @endforeach
    </ul>
@endsection