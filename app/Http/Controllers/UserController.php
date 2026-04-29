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

    // --- ALTERAÇÃO AQUI: Carrega o motorista junto com o usuário ---
    public function edit(User $usuario)
    {
        $usuario->load('motorista'); // Isso permite que a View veja os dados da CNH
        return view('usuarios.edit', compact('usuario'));
    }

    // --- ALTERAÇÃO AQUI: Salva os dados do usuário E do motorista ---
    public function update(Request $request, User $usuario)
    {
        $request->validate([
            'usu_nome' => 'required|string|max:300',
            'usu_email' => 'required|string|email|max:255|unique:usuarios,usu_email,' . $usuario->usu_id . ',usu_id',
            // Validações para os campos de motorista (opcionais)
            'mot_numerocarteira' => 'nullable|string|max:20',
            'mot_validade' => 'nullable|date',
        ]);

        // Atualiza dados básicos do usuário
        $usuario->update([
            'usu_nome' => $request->usu_nome,
            'usu_email' => $request->usu_email,
        ]);

        if ($request->filled('usu_senha')) {
            $usuario->update(['usu_senha' => Hash::make($request->usu_senha)]);
        }

        // Lógica Inteligente: Se preencheu a CNH, salva ou cria o registro de motorista
        if ($request->filled('mot_numerocarteira')) {
            $usuario->motorista()->updateOrCreate(
                ['mot_usuario_id' => $usuario->usu_id],
                [
                    'mot_numerocarteira' => $request->mot_numerocarteira,
                    'mot_validade' => $request->mot_validade
                ]
            );
        }

        return redirect()->route('usuarios.index')->with('success', 'Usuário e dados de motorista atualizados!');
    }

    //  Remove o usuário do banco
    public function destroy(User $usuario)
    {
        $usuario->delete();
        return redirect()->route('usuarios.index')->with('success', 'Usuário excluído!');
    }
}
