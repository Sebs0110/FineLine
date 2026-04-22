<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    // Mostra todos os usuários
    public function index()
    {
        $users = User::all();
        return view('usuarios.index', compact('users'));
    }

    // Mostra a tela de cadastro
    public function create()
    {
        return view('usuarios.create');
    }

    // Recebe os dados do formulário e grava no banco
    public function store(Request $request)
    {
        $request->validate([
            'usu_nome' => 'required|string|max:300',
            'usu_email' => 'required|string|email|max:255|unique:usuarios,usu_email',
            'usu_senha' => 'required|string|min:8',
        ]);

        User::create([
            'usu_nome' => $request->usu_nome,
            'usu_email' => $request->usu_email,
            'usu_senha' => Hash::make($request->usu_senha),
            'usu_tipousuario_id' => 1, // Definindo um valor padrão temporário
        ]);

        return redirect()->route('usuarios.index')->with('success', 'Usuário criado com sucesso!');
    }

    // Mostra um usuário específico
    public function show(User $usuario)
    {
        return view('usuarios.show', compact('usuario'));
    }

    //Mostra a tela para alterar dados
    public function edit(User $usuario)
    {
        return view('usuarios.edit', compact('usuario'));
    }

    // Salva as alterações feitas na edição
    public function update(Request $request, User $usuario)
    {
        $request->validate([
            'usu_nome' => 'required|string|max:300',
            'usu_email' => 'required|string|email|max:255|unique:usuarios,usu_email,' . $usuario->usu_id . ',usu_id',
        ]);

        $usuario->update([
            'usu_nome' => $request->usu_nome,
            'usu_email' => $request->usu_email,
        ]);

        if ($request->filled('usu_senha')) {
            $usuario->update(['usu_senha' => Hash::make($request->usu_senha)]);
        }

        return redirect()->route('usuarios.index')->with('success', 'Usuário atualizado!');
    }

    //  Remove o usuário do banco
    public function destroy(User $usuario)
    {
        $usuario->delete();
        return redirect()->route('usuarios.index')->with('success', 'Usuário excluído!');
    }
}
