<?php


namespace App\Http\Controllers;

use App\Models\Ordine;
use App\Models\Tavolo;
use App\Models\Piatto;
use Illuminate\Http\Request;

class OrdineController extends Controller
{
    public function index()
    {
        $ordini = Ordine::with('tavolo', 'piatti')->get();
        return view('ordini.index', compact('ordini'));
    }

    public function create()
    {
        $tavoli = Tavolo::all();
        $piatti = Piatto::all();
        return view('ordini.create', compact('tavoli', 'piatti'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'tavolo_id' => 'required|exists:tavoli,id',
            'piatti' => 'required|array',
            'piatti.*.id' => 'exists:piatti,id',
            'piatti.*.quantita' => 'required|integer|min:1',
        ]);

        $ordine = Ordine::create(['tavolo_id' => $request->tavolo_id]);

        foreach ($request->piatti as $piatto) {
            $ordine->piatti()->attach($piatto['id'], ['quantita' => $piatto['quantita']]);
        }

        return redirect()->route('ordini.index');
    }

    public function show($id)
    {
        $ordine = Ordine::with('tavolo', 'piatti')->findOrFail($id);
        return view('ordini.show', compact('ordine'));
    }

    public function edit($id)
    {
        $ordine = Ordine::with('piatti')->findOrFail($id);
        $tavoli = Tavolo::all();
        $piatti = Piatto::all();
        return view('ordini.edit', compact('ordine', 'tavoli', 'piatti'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'tavolo_id' => 'required|exists:tavoli,id',
            'piatti' => 'required|array',
            'piatti.*.id' => 'exists:piatti,id',
            'piatti.*.quantita' => 'required|integer|min:1',
        ]);

        $ordine = Ordine::findOrFail($id);
        $ordine->update(['tavolo_id' => $request->tavolo_id]);

        $ordine->piatti()->detach();
        foreach ($request->piatti as $piatto) {
            $ordine->piatti()->attach($piatto['id'], ['quantita' => $piatto['quantita']]);
        }

        return redirect()->route('ordini.index');
    }

    public function destroy($id)
    {
        $ordine = Ordine::findOrFail($id);
        $ordine->piatti()->detach();
        $ordine->delete();

        return redirect()->route('ordini.index');
    }
}

