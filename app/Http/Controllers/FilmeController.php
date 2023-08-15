<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Filme;

class FilmeController extends Controller
{
    public function store(Request $request)
    {
        // Valide os dados do formulário
        $validatedData = $request->validate([
            'nome' => 'required|string',
            'sinopse' => 'required|string',
            'ano' => 'required|integer',
            'categoria' => 'required|string',
            'imagem_capa' => 'required|image|mimes:jpeg,png,jpg,gif',
            'trailer_link' => 'required|string',
        ]);
    
        // Upload da imagem da capa
        $imagemCapaPath = $request->file('imagem_capa')->store('imagens_capa', 'public');
    
        // Crie um novo filme
        $filme = new Filme();
        $filme->nome = $validatedData['nome'];
        $filme->sinopse = $validatedData['sinopse'];
        $filme->ano = $validatedData['ano'];
        $filme->categoria = $validatedData['categoria'];
        $filme->imagem_capa = $imagemCapaPath;
        $filme->trailer_link = $validatedData['trailer_link'];
        $filme->save();
    
        return redirect()->route('filmes.index')->with('success', 'Filme inserido com sucesso!');
    }
    public function index()
    {
         $filmes = Filme::all();
         return view('filmes.index', compact('filmes'));
    }
    public function edit($id)
    {
        $filme = Filme::findOrFail($id);
        return view('filmes.edit', compact('filme'));
    }
    public function update(Request $request, $id)
    {
    
        $filme = Filme::findOrFail($id);

        $validatedData = $request->validate([
            'nome' => 'required|string',
            'sinopse' => 'required|string',
            'ano' => 'required|integer',
            'categoria' => 'required|string',
            'imagem_capa' => 'nullable|image|mimes:jpeg,png,jpg,gif',
            'trailer_link' => 'required|string',
         ]);

         if ($request->hasFile('imagem_capa')) {
            $imagemCapaPath = $request->file('imagem_capa')->store('imagens_capa', 'public');
            $filme->imagem_capa = $imagemCapaPath;
        }

        $filme->nome = $validatedData['nome'];
        $filme->sinopse = $validatedData['sinopse'];
        $filme->ano = $validatedData['ano'];
        $filme->categoria = $validatedData['categoria'];
        $filme->trailer_link = $validatedData['trailer_link'];
        $filme->save();

        return redirect()->route('filmes.index')->with('success', 'Filme atualizado com sucesso!');
    }
    public function destroy($id)
    {
        $filme = Filme::findOrFail($id);
        $filme->delete();

        return redirect()->route('filmes.index')->with('success', 'Filme excluído com sucesso!');
    }

}
