<?php

namespace App\Http\Controllers;

use App\Models\Piatto;
use Illuminate\Http\Request;

class PiattoController extends Controller
{
    public function index()
    {
        $piatti = Piatto::all();
        return view('piatti.index', compact('piatti'));
    }

    public function create()
    {
        return view('piatti.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'prezzo' => 'required|numeric|min:0',
        ]);

        Piatto::create($request->all());
        return redirect()->route('piatti.index');
    }

    public function show($id)
    {
        $piatto = Piatto::findOrFail($id);
        return view('piatti.show', compact('piatto'));
    }

    public function edit($id)
    {
        $piatto = Piatto::findOrFail($id);
        return view('piatti.edit', compact('piatto'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'prezzo' => 'required|numeric|min:0',
        ]);

        $piatto = Piatto::findOrFail($id);
        $piatto->update($request->all());
        return redirect()->route('piatti.index');
    }

    public function destroy($id)
    {
        $piatto = Piatto::findOrFail($id);
        $piatto->delete();

        return redirect()->route('piatti.index');
    }
}

