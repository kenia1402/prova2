@extends('layouts.app')

@section('content')
    <h1>Lista de Filmes</h1>
    <table>
        <thead>
            <tr>
                <th>Nome</th>
                <th>Ano</th>
                <th>Categoria</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($filmes as $filme)
                <tr>
                    <td>{{ $filme->nome }}</td>
                    <td>{{ $filme->ano }}</td>
                    <td>{{ $filme->categoria }}</td>
                    <td>
                        <a href="{{ route('filmes.edit', $filme->id) }}">Editar</a>
                        <form action="{{ route('filmes.destroy', $filme->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Excluir</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
