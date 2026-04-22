<?php

namespace App\Http\Controllers;

use App\Models\Aviso;
use Illuminate\Http\Request;

class AvisoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $avisos = Aviso::all();
        return view('avisos.index', compact('avisos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('avisos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'avi_descricao' => 'required|string|max:255',
            'avi_datacadastro' => 'required|date',
        ], [
            'avi_descricao.required' => 'A descrição do aviso é obrigatória.',
            'avi_descricao.max' => 'A descrição não pode ter mais de 255 caracteres.',
            'avi_datacadastro.required' => 'A data de cadastro é obrigatória.',
            'avi_datacadastro.date' => 'A data de cadastro deve ser uma data válida.',
        ]);

        Aviso::create($validated);

        return redirect()->route('avisos.index')
                        ->with('success', 'Aviso cadastrado com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Aviso $aviso)
    {
        return view('avisos.show', compact('aviso'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Aviso $aviso)
    {
        return view('avisos.edit', compact('aviso'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Aviso $aviso)
    {
        $validated = $request->validate([
            'avi_descricao' => 'required|string|max:255',
            'avi_datacadastro' => 'required|date',
        ], [
            'avi_descricao.required' => 'A descrição do aviso é obrigatória.',
            'avi_descricao.max' => 'A descrição não pode ter mais de 255 caracteres.',
            'avi_datacadastro.required' => 'A data de cadastro é obrigatória.',
            'avi_datacadastro.date' => 'A data de cadastro deve ser uma data válida.',
        ]);

        $aviso->update($validated);

        return redirect()->route('avisos.index')
                        ->with('success', 'Aviso atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Aviso $aviso)
    {
        $aviso->delete();

        return redirect()->route('avisos.index')
                        ->with('success', 'Aviso deletado com sucesso!');
    }
}
