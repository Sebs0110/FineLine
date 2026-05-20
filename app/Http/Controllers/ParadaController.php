<?php

namespace App\Http\Controllers;

use App\Models\Parada;
use Illuminate\Http\Request;

class ParadaController extends Controller
{
    public function index()
    {
        $paradas = Parada::all();
        return view('paradas.index', compact('paradas'));
    }

    public function create()
    {
        return view('paradas.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'par_nome' => 'required|string|max:255',
            'par_endereco' => 'required|string|max:255',
            'par_latitude' => 'nullable|string|max:50',
            'par_longitude' => 'nullable|string|max:50',
        ], [
            'par_nome.required' => 'O nome da parada é obrigatório.',
            'par_endereco.required' => 'O endereço é obrigatório.',
        ]);

        Parada::create($validated);

        return redirect()->route('paradas.index')
            ->with('success', 'Parada cadastrada com sucesso!');
    }

    public function show(Parada $parada)
    {
        return view('paradas.show', compact('parada'));
    }

    public function edit(Parada $parada)
    {
        return view('paradas.edit', compact('parada'));
    }

    public function update(Request $request, Parada $parada)
    {
        $validated = $request->validate([
            'par_nome' => 'required|string|max:255',
            'par_endereco' => 'required|string|max:255',
            'par_latitude' => 'nullable|string|max:50',
            'par_longitude' => 'nullable|string|max:50',
        ], [
            'par_nome.required' => 'O nome da parada é obrigatório.',
            'par_endereco.required' => 'O endereço é obrigatório.',
        ]);

        $parada->update($validated);

        return redirect()->route('paradas.index')
            ->with('success', 'Parada atualizada com sucesso!');
    }

    public function destroy(Parada $parada)
    {
        $parada->delete();

        return redirect()->route('paradas.index')
            ->with('success', 'Parada deletada com sucesso!');
    }
}
