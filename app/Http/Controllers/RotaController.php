<?php

namespace App\Http\Controllers;

use App\Models\Rota;
use Illuminate\Http\Request;

class RotaController extends Controller
{
    public function index()
    {
        $rotas = Rota::all();
        return view('rotas.index', compact('rotas'));
    }

    public function create()
    {
        return view('rotas.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'rot_nome' => 'required|string|max:255',
            'rot_origem' => 'required|string|max:255',
            'rot_destino' => 'required|string|max:255',
            'rot_duracao_estimada' => 'required|string|max:255',
        ], [
            'rot_nome.required' => 'O nome da rota é obrigatório.',
            'rot_origem.required' => 'A origem da rota é obrigatória.',
            'rot_destino.required' => 'O destino da rota é obrigatório.',
            'rot_duracao_estimada.required' => 'A duração estimada da rota é obrigatória.',
        ]);

        Rota::create($validated);

        return redirect()->route('rotas.index')
            ->with('success', 'Rota cadastrada com sucesso!');
    }

    public function show(Rota $rota)
    {
        return view('rotas.show', compact('rota'));
    }

    public function edit(Rota $rota)
    {
        return view('rotas.edit', compact('rota'));
    }

    public function update(Request $request, Rota $rota)
    {
        $validated = $request->validate([
            'rot_nome' => 'required|string|max:255',
            'rot_origem' => 'required|string|max:255',
            'rot_destino' => 'required|string|max:255',
            'rot_duracao_estimada' => 'required|string|max:255',
        ], [
            'rot_nome.required' => 'O nome da rota é obrigatório.',
            'rot_origem.required' => 'A origem da rota é obrigatória.',
            'rot_destino.required' => 'O destino da rota é obrigatória.',
            'rot_duracao_estimada.required' => 'A duração estimada da rota é obrigatória.',
        ]);

        $rota->update($validated);

        return redirect()->route('rotas.index')
            ->with('success', 'Rota atualizada com sucesso!');
    }

    public function destroy(Rota $rota)
    {
        $rota->delete();

        return redirect()->route('rotas.index')
            ->with('success', 'Rota deletada com sucesso!');
    }
}
