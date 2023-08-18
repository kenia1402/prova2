<!-- resources/views/filmes/create.blade.php -->
@extends('layouts.app')

@section('content')
    <h1>Inserir Filme</h1>

    <form action="{{ route('filmes.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
       <label for="imagem_capa">Imagem da Capa:</label>
       <input type="file" name="imagem_capa" id="imagem_capa">


        <button type="submit">Inserir</button>
    </form>
@endsection
