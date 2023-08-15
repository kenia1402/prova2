<!-- resources/views/filmes/edit.blade.php -->
@extends('layouts.app')

@section('content')
    <h1>Editar Filme</h1>

    <form action="{{ route('filmes.update', $filme->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <label for="nome">Nome do Filme:</label>
        <input type="text" name="nome" value="{{ $filme->nome }}" required>
        <!-- Outros campos do formulário -->

        <button type="submit">Atualizar</button>
    </form>
@endsection
