<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tavolo;

class TavoloController extends Controller
{
    public function index()
    {
        $tavoli = Tavolo::all();
        return view('tavoli.index', compact('tavoli'));
    }

    public function create()
    {
        return view('tavoli.create');
    }

    public function store(Request $request)
    {
        // Validazione dei dati
        $request->validate([
            'numero' => 'required|string|max:255',
            'posti' => 'required|integer',
        ]);

    
        //Creazione di un nuovo tavolo
        Tavolo::create($request->all());
        return redirect()->route('tavoli.index');
    }
}

