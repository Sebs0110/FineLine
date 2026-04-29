<?php

namespace App\Http\Controllers;

use App\Models\Motorista;
use App\Models\User;
use Illuminate\Http\Request;

class MotoristaController extends Controller
{
    public function index()
    {
        // Busca todos os motoristas e traz junto os dados do usuário vinculado
        $motoristas = Motorista::with('usuario')->get();
        return view('motoristas.index', compact('motoristas'));
    }

    public function create()
    {
        // Busca usuários que ainda não são motoristas para listar no formulário
        $usuarios = User::doesntHave('motorista')->get();
        return view('motoristas.create', compact('usuarios'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'mot_usuario_id' => 'required|exists:usuarios,usu_id|unique:motoristas,mot_usuario_id',
            'mot_numerocarteira' => 'required|string|max:20',
            'mot_validade' => 'required|date',
        ]);

        Motorista::create($request->all());

        return redirect()->route('motoristas.index')->with('success', 'Motorista cadastrado com sucesso!');
    }

    public function edit(Motorista $motorista)
    {
        return view('motoristas.edit', compact('motorista'));
    }

    public function update(Request $request, Motorista $motorista)
    {
        $request->validate([
            'mot_numerocarteira' => 'required|string|max:20',
            'mot_validade' => 'required|date',
        ]);

        $motorista->update($request->only(['mot_numerocarteira', 'mot_validade']));

        return redirect()->route('motoristas.index')->with('success', 'Dados do motorista atualizados!');
    }

    public function destroy(Motorista $motorista)
    {
        $motorista->delete();
        return redirect()->route('motoristas.index')->with('success', 'Motorista removido!');
    }
}

