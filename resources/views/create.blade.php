<!-- resources/views/filmes/create.blade.php -->
@extends('layouts.app')

@section('content')
    <h1>Inserir Filme</h1>

    <form action="{{ route('filmes.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <label for="nome">Nome do Filme:</label>
        <input type="text" name="nome" required>
        <!-- Outros campos do formulário -->

        <button type="submit">Inserir</button>
    </form>
@endsection
