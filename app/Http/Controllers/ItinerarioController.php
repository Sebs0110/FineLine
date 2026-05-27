<?php

namespace App\Http\Controllers;

use App\Models\Itinerario;
use App\Models\Rota;
use Illuminate\Http\Request;

class ItinerarioController extends Controller
{
    public function index()
    {
        $itinerarios = Itinerario::with('rota')->get();
        return view('itinerarios.index', compact('itinerarios'));
    }

    public function create()
    {
        $rotas = Rota::all();
        $diasSemana = ['Segunda-feira', 'Terça-feira', 'Quarta-feira', 'Quinta-feira', 'Sexta-feira', 'Sábado', 'Domingo'];
        return view('itinerarios.create', compact('rotas', 'diasSemana'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'iti_rota_id' => 'required|exists:rotas,rot_id',
            'iti_horariosaida' => 'required',
            'iti_diadasemana' => 'required|in:Segunda-feira,Terça-feira,Quarta-feira,Quinta-feira,Sexta-feira,Sábado,Domingo',
        ], [
            'iti_rota_id.required' => 'A rota é obrigatória.',
            'iti_rota_id.exists' => 'A rota selecionada é inválida.',
            'iti_horariosaida.required' => 'O horário de saída é obrigatório.',
            'iti_diadasemana.required' => 'O dia da semana é obrigatório.',
            'iti_diadasemana.in' => 'O dia da semana selecionado é inválido.',
        ]);

        Itinerario::create($validated);

        return redirect()->route('itinerarios.index')
            ->with('success', 'Itinerário cadastrado com sucesso!');
    }

    public function show(Itinerario $itinerario)
    {
        return view('itinerarios.show', compact('itinerario'));
    }

    public function edit(Itinerario $itinerario)
    {
        $rotas = Rota::all();
        $diasSemana = ['Segunda-feira', 'Terça-feira', 'Quarta-feira', 'Quinta-feira', 'Sexta-feira', 'Sábado', 'Domingo'];
        return view('itinerarios.edit', compact('itinerario', 'rotas', 'diasSemana'));
    }

    public function update(Request $request, Itinerario $itinerario)
    {
        $validated = $request->validate([
            'iti_rota_id' => 'required|exists:rotas,rot_id',
            'iti_horariosaida' => 'required',
            'iti_diadasemana' => 'required|in:Segunda-feira,Terça-feira,Quarta-feira,Quinta-feira,Sexta-feira,Sábado,Domingo',
        ], [
            'iti_rota_id.required' => 'A rota é obrigatória.',
            'iti_rota_id.exists' => 'A rota selecionada é inválida.',
            'iti_horariosaida.required' => 'O horário de saída é obrigatório.',
            'iti_diadasemana.required' => 'O dia da semana é obrigatório.',
            'iti_diadasemana.in' => 'O dia da semana selecionado é inválido.',
        ]);

        $itinerario->update($validated);

        return redirect()->route('itinerarios.index')
            ->with('success', 'Itinerário atualizado com sucesso!');
    }

    public function destroy(Itinerario $itinerario)
    {
        $itinerario->delete();

        return redirect()->route('itinerarios.index')
            ->with('success', 'Itinerário deletado com sucesso!');
    }
}
