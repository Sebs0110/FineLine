@extends('estrutura')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card" style="background-color: #13293A; border: none;">
                    <div class="card-header" style="border-bottom: 1px solid #f39c12;">
                        <h4 class="text-warning mb-0"><i class="bi bi-pencil me-2"></i>Editar Rota</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('rotas.update', $rota->rot_id) }}" method="POST" id="formRota">
                            @csrf
                            @method('PUT')

                            <div class="mb-3">
                                <label for="rot_nome" class="form-label text-white">Nome da Rota <span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('rot_nome') is-invalid @enderror" id="rot_nome" name="rot_nome" value="{{ old('rot_nome', $rota->rot_nome) }}" required style="background-color: #0f2438; color: #fff; border-color: #f39c12;">
                                @error('rot_nome') <div class="invalid-feedback d-block">{{ $message }}</div> @enderror
                            </div>

                            <div class="mb-3">
                                <label for="rot_origem" class="form-label text-white">Origem <span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('rot_origem') is-invalid @enderror" id="rot_origem" name="rot_origem" value="{{ old('rot_origem', $rota->rot_origem) }}" required style="background-color: #0f2438; color: #fff; border-color: #f39c12;">
                                @error('rot_origem') <div class="invalid-feedback d-block">{{ $message }}</div> @enderror
                            </div>

                            <div class="mb-3">
                                <label for="rot_destino" class="form-label text-white">Destino <span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('rot_destino') is-invalid @enderror" id="rot_destino" name="rot_destino" value="{{ old('rot_destino', $rota->rot_destino) }}" required style="background-color: #0f2438; color: #fff; border-color: #f39c12;">
                                @error('rot_destino') <div class="invalid-feedback d-block">{{ $message }}</div> @enderror
                            </div>

                            <div class="mb-3">
                                <label for="rot_duracao_estimada" class="form-label text-white">Duração Estimada <span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('rot_duracao_estimada') is-invalid @enderror" id="rot_duracao_estimada" name="rot_duracao_estimada" value="{{ old('rot_duracao_estimada', $rota->rot_duracao_estimada) }}" required style="background-color: #0f2438; color: #fff; border-color: #f39c12;">
                                @error('rot_duracao_estimada') <div class="invalid-feedback d-block">{{ $message }}</div> @enderror
                            </div>

                            <div class="row mt-4">
                                <div class="col-md-6">
                                    <button type="submit" class="btn btn-warning w-100" id="btnSalvar">
                                        <i class="bi bi-check-circle me-2"></i>Atualizar
                                    </button>
                                </div>
                                <div class="col-md-6">
                                    <a href="{{ route('rotas.index') }}" class="btn btn-secondary w-100">
                                        <i class="bi bi-arrow-left me-2"></i>Voltar
                                    </a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script type="module">
        $(document).ready(function(){
            $('#formRota').on('submit', function(e){
                if(!$('#rot_nome').val() || !$('#rot_origem').val() || !$('#rot_destino').val() || !$('#rot_duracao_estimada').val()){
                    e.preventDefault();
                    alert('Por favor, preencha todos os campos obrigatórios.');
                    return false;
                }
                $('#btnSalvar').prop('disabled', true).html('<span class="spinner-border spinner-border-sm me-2"></span>Atualizando...');
            });
        });
    </script>

    <style>
        .form-control:focus { background-color: #0f2438 !important; color: #fff !important; border-color: #f39c12 !important; box-shadow: 0 0 0 0.2rem rgba(243, 156, 18, 0.25) !important; }
        .btn-warning { background-color: #f39c12; border-color: #f39c12; font-weight: 500; }
        .btn-secondary { background-color: #6c757d; border-color: #6c757d; font-weight: 500; }
    </style>
@endsection
