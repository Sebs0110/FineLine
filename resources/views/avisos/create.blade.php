@extends('estrutura')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card" style="background-color: #1a3a52; border-color: #f39c12;">
                <div class="card-header" style="background-color: #13293A; border-color: #f39c12;">
                    <h4 class="text-warning mb-0">
                        <i class="bi bi-cone-striped me-2"></i>Cadastro de Avisos
                    </h4>
                </div>
                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>Erro ao validar o formulário:</strong>
                            <ul class="mb-0 mt-2">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <form action="{{ route('avisos.store') }}" method="POST" id="formAvisos">
                        @csrf

                        <!-- Campo Descrição -->
                        <div class="mb-3">
                            <label for="avi_descricao" class="form-label text-white">
                                <i class="bi bi-file-text me-2"></i>Descrição do Aviso
                                <span class="text-danger">*</span>
                            </label>
                            <textarea 
                                class="form-control @error('avi_descricao') is-invalid @enderror" 
                                id="avi_descricao" 
                                name="avi_descricao" 
                                rows="5" 
                                placeholder="Digite a descrição do aviso..." 
                                required
                                style="background-color: #0f2438; color: #fff; border-color: #f39c12;">{{ old('avi_descricao') }}</textarea>
                            @error('avi_descricao')
                                <div class="invalid-feedback d-block">
                                    {{ $message }}
                                </div>
                            @enderror
                            <small class="text-muted d-block mt-2">
                                <i class="bi bi-info-circle me-1"></i>Máximo de 255 caracteres
                            </small>
                        </div>

                        <!-- Campo Data de Cadastro -->
                        <div class="mb-3">
                            <label for="avi_datacadastro" class="form-label text-white">
                                <i class="bi bi-calendar-event me-2"></i>Data de Cadastro
                                <span class="text-danger">*</span>
                            </label>
                            <input 
                                type="date" 
                                class="form-control @error('avi_datacadastro') is-invalid @enderror" 
                                id="avi_datacadastro" 
                                name="avi_datacadastro" 
                                required
                                value="{{ old('avi_datacadastro', date('Y-m-d')) }}"
                                style="background-color: #0f2438; color: #fff; border-color: #f39c12;">
                            @error('avi_datacadastro')
                                <div class="invalid-feedback d-block">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <!-- Botões de Ação -->
                        <div class="row mt-4">
                            <div class="col-md-6">
                                <button type="submit" class="btn btn-warning w-100" id="btnSalvar">
                                    <i class="bi bi-check-circle me-2"></i>Salvar Aviso
                                </button>
                            </div>
                            <div class="col-md-6">
                                <a href="{{ route('avisos.index') }}" class="btn btn-secondary w-100">
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
        
        // Validação do formulário
        $('#formAvisos').on('submit', function(e){
            const descricao = $('#avi_descricao').val().trim();
            const dataCadastro = $('#avi_datacadastro').val();
            
            if(!descricao || descricao.length === 0){
                e.preventDefault();
                alert('Por favor, preencha a descrição do aviso.');
                $('#avi_descricao').focus();
                return false;
            }
            
            if(!dataCadastro){
                e.preventDefault();
                alert('Por favor, selecione a data de cadastro.');
                $('#avi_datacadastro').focus();
                return false;
            }
            
            // Desabilitar botão de envio para evitar duplicação
            $('#btnSalvar').prop('disabled', true);
            $('#btnSalvar').html('<span class="spinner-border spinner-border-sm me-2"></span>Salvando...');
        });

        // Limitar caracteres da descrição
        $('#avi_descricao').on('keyup', function(){
            const maxChars = 255;
            const currentChars = $(this).val().length;
            
            if(currentChars > maxChars){
                $(this).val($(this).val().substring(0, maxChars));
            }
        });

        // Adicionar feedback visual de caracteres
        $('#avi_descricao').after('<small class="text-muted d-block mt-1"><span id="charCount">0</span>/255 caracteres</small>');
        
        $('#avi_descricao').on('keyup', function(){
            $('#charCount').text($(this).val().length);
        });

        // Inicializar contagem de caracteres
        $('#charCount').text($('#avi_descricao').val().length);
    });
</script>

<style>
    .form-control:focus {
        background-color: #0f2438 !important;
        color: #fff !important;
        border-color: #f39c12 !important;
        box-shadow: 0 0 0 0.2rem rgba(243, 156, 18, 0.25) !important;
    }

    .form-control::placeholder {
        color: #7a8fa3;
    }

    .card {
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.3);
    }

    .btn-warning {
        background-color: #f39c12;
        border-color: #f39c12;
        font-weight: 500;
    }

    .btn-warning:hover {
        background-color: #e67e22;
        border-color: #e67e22;
    }

    .btn-secondary {
        background-color: #6c757d;
        border-color: #6c757d;
        font-weight: 500;
    }

    .btn-secondary:hover {
        background-color: #5a6268;
        border-color: #5a6268;
    }

    .text-danger {
        font-weight: bold;
    }

    .invalid-feedback {
        color: #ff6b6b !important;
        font-size: 0.875rem;
    }

    .form-label {
        font-weight: 500;
        margin-bottom: 0.5rem;
    }
</style>
@endsection
