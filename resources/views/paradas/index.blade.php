@extends('estrutura')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="text-warning"><i class="bi bi-signpost me-2"></i>Gerenciar Paradas</h1>
        <a href="{{ route('paradas.create') }}" class="btn btn-warning fw-bold">
            <i class="bi bi-plus-circle me-1"></i> Nova Parada
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show bg-success text-white border-0" role="alert">
            <i class="bi bi-check-circle me-2"></i> {{ session('success') }}
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="card border-0 shadow-sm" style="background-color: #13293A;">
        <div class="card-body p-0">
            @if($paradas->count() > 0)
                <div class="table-responsive">
                    <table class="table table-dark table-hover align-middle mb-0">
                        <thead class="text-warning" style="background-color: #0f2438;">
                            <tr>
                                <th class="ps-4">ID</th>
                                <th>Nome</th>
                                <th>Endereço</th>
                                <th class="text-center">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($paradas as $parada)
                                <tr>
                                    <td class="ps-4">{{ $parada->par_id }}</td>
                                    <td>{{ $parada->par_nome }}</td>
                                    <td>{{ $parada->par_endereco }}</td>
                                    <td class="text-center">
                                        <div class="btn-group">
                                            <a href="{{ route('paradas.show', $parada->par_id) }}" class="btn btn-sm btn-outline-info border-0">
                                                <i class="bi bi-eye fs-5"></i>
                                            </a>
                                            <a href="{{ route('paradas.edit', $parada->par_id) }}" class="btn btn-sm btn-outline-warning border-0">
                                                <i class="bi bi-pencil fs-5"></i>
                                            </a>
                                            <button type="button" class="btn btn-sm btn-outline-danger border-0" 
                                                    data-bs-toggle="modal" data-bs-target="#deleteModal{{ $parada->par_id }}">
                                                <i class="bi bi-trash fs-5"></i>
                                            </button>
                                        </div>

                                        <!-- Modal de Exclusão -->
                                        <div class="modal fade" id="deleteModal{{ $parada->par_id }}" tabindex="-1" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content bg-dark text-white border-secondary">
                                                    <div class="modal-header border-secondary">
                                                        <h5 class="modal-title text-warning">Confirmar Exclusão</h5>
                                                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body text-start">
                                                        Deseja realmente excluir a parada <strong>{{ $parada->par_nome }}</strong>?
                                                    </div>
                                                    <div class="modal-footer border-secondary">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                                        <form action="{{ route('paradas.destroy', $parada->par_id) }}" method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger">Excluir</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <div class="p-5 text-center">
                    <div class="alert alert-info bg-transparent border-info text-info d-inline-block px-5" role="alert">
                        <i class="bi bi-info-circle me-2"></i> Nenhuma parada cadastrada. 
                        <a href="{{ route('paradas.create') }}" class="alert-link text-decoration-none fw-bold">Clique aqui para cadastrar.</a>
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection
