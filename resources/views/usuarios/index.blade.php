

@extends('estrutura')

@section('content')
    <div style="padding: 20px;">
        <h1>Lista de Usuários</h1>

        @if (session('success'))
            <div style="color: green; margin-bottom: 15px;">
                {{ session('success') }}
            </div>
        @endif

        <a href="{{ route('usuarios.create') }}" style="background: #007bff; color: white; padding: 10px; text-decoration: none; border-radius: 5px;">
            + Novo Usuário
        </a>

        <table border="1" style="width: 100%; margin-top: 20px; border-collapse: collapse;">
            <thead>
            <tr style="background: #eee;">
                <th style="padding: 10px;">ID</th>
                <th>Nome</th>
                <th>E-mail</th>
                <th>Ações</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($users as $user)
                <tr>
                    <td style="padding: 10px; text-align: center;">{{ $user->usu_id }}</td>
                    <td>{{ $user->usu_nome }}</td>
                    <td>{{ $user->usu_email }}</td>
                    <td style="text-align: center;">
                        <a href="{{ route('usuarios.edit', $user->usu_id) }}">Editar</a> |
                        <form action="{{ route('usuarios.destroy', $user->usu_id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" style="color: red; border: none; background: none; cursor: pointer;" onclick="return confirm('Excluir este usuário?')">
                                Excluir
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
