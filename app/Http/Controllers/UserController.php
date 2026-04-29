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

    // --- ALTERAÇÃO AQUI: Agora salva Usuário e Motorista juntos ---
    public function store(Request $request)
    {
        $request->validate([
            'usu_nome' => 'required|string|max:300',
            'usu_email' => 'required|string|email|max:255|unique:usuarios,usu_email',
            'usu_senha' => 'required|string|min:8',
            'usu_tipousuario_id' => 'required',
            // Só obriga a CNH se o tipo selecionado for 2 (Motorista)
            'mot_numerocarteira' => 'required_if:usu_tipousuario_id,2',
            'mot_validade' => 'required_if:usu_tipousuario_id,2',
        ]);

        // 1. Cria o Usuário básico
        $user = User::create([
            'usu_nome' => $request->usu_nome,
            'usu_email' => $request->usu_email,
            'usu_senha' => Hash::make($request->usu_senha),
            'usu_tipousuario_id' => $request->usu_tipousuario_id,
        ]);

        // 2. Se o tipo for Motorista (ID 2), cria os dados na tabela de motoristas
        if ($request->usu_tipousuario_id == 2) {
            $user->motorista()->create([
                'mot_numerocarteira' => $request->mot_numerocarteira,
                'mot_validade' => $request->mot_validade,
            ]);
        }

        return redirect()->route('usuarios.index')->with('success', 'Usuário cadastrado com sucesso!');
    }

    // Mostra um usuário específico
    public function show(User $usuario)
    {
        return view('usuarios.show', compact('usuario'));
    }

    //Mostra a tela para alterar dados
    public function edit(User $usuario)
    {
        $usuario->load('motorista');
        return view('usuarios.edit', compact('usuario'));
    }

    // Salva as alterações feitas na edição
    public function update(Request $request, User $usuario)
    {
        $request->validate([
            'usu_nome' => 'required|string|max:300',
            'usu_email' => 'required|string|email|max:255|unique:usuarios,usu_email,' . $usuario->usu_id . ',usu_id',
            'mot_numerocarteira' => 'nullable|string|max:20',
            'mot_validade' => 'nullable|date',
        ]);

        $usuario->update([
            'usu_nome' => $request->usu_nome,
            'usu_email' => $request->usu_email,
        ]);

        if ($request->filled('usu_senha')) {
            $usuario->update(['usu_senha' => Hash::make($request->usu_senha)]);
        }

        // Atualiza ou cria os dados de motorista na edição
        if ($request->filled('mot_numerocarteira')) {
            $usuario->motorista()->updateOrCreate(
                ['mot_usuario_id' => $usuario->usu_id],
                [
                    'mot_numerocarteira' => $request->mot_numerocarteira,
                    'mot_validade' => $request->mot_validade
                ]
            );
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
