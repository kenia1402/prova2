<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $query = Filme::query();

    if ($request->has('year')) {
        $query->where('ano', $request->year);
    }
    
    if ($request->has('category')) {
        $query->where('categoria', $request->category);
    }

    $filmes = $query->get();
    
    return view('user.movies.index', compact('filmes'));
    }

    public function show($id)
    {
        $filme = Filme::findOrFail($id);
    return view('user.movies.show', compact('filme'));
    }
}
