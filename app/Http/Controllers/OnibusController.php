<?php

namespace App\Http\Controllers;

use App\Models\Onibus;
use Illuminate\Http\Request;

class OnibusController extends Controller
{
    public function index()
    {
        $onibus = Onibus::all();
        return view('onibus.index', compact('onibus'));
    }

    public function create()
    {
        return view('onibus.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'oni_placa' => 'required|string|max:255',
            'oni_renavan' => 'required|string|max:255',
            'oni_modelo' => 'required|string|max:35',
        ], [
            'oni_placa.required' => 'A placa do ônibus é obrigatória.',
            'oni_renavan.required' => 'O renavam é obrigatório.',
            'oni_modelo.required' => 'O modelo é obrigatório.',
            'oni_modelo.max' => 'O modelo não pode ter mais de 35 caracteres.',
        ]);

        Onibus::create($request->all());

        return redirect()->route('onibus.index')
            ->with('success', 'Ônibus cadastrado com sucesso!');
    }

    public function show(Onibus $onibus)
    {
        return view('onibus.show', compact('onibus'));
    }

    public function edit(Onibus $onibus)
    {
        return view('onibus.edit', compact('onibus'));
    }

    public function update(Request $request, Onibus $onibus)
    {
        $validated = $request->validate([
            'oni_placa' => 'required|string|max:255',
            'oni_renavan' => 'required|string|max:255',
            'oni_modelo' => 'required|string|max:35',
        ], [
            'oni_placa.required' => 'A placa do ônibus é obrigatória.',
            'oni_renavan.required' => 'O renavam é obrigatório.',
            'oni_modelo.required' => 'O modelo é obrigatório.',
            'oni_modelo.max' => 'O modelo não pode ter mais de 35 caracteres.',
        ]);

        $onibus->update($validated);

        return redirect()->route('onibus.index')
            ->with('success', 'Ônibus atualizado com sucesso!');
    }

    public function destroy(Onibus $onibus)
    {
        $onibus->delete();

        return redirect()->route('onibus.index')
            ->with('success', 'Ônibus deletado com sucesso!');
    }
}
