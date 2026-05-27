@extends('estrutura')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card" style="background-color: #13293A; border: none; color: white;">
                    <div class="card-header border-warning">
                        <h3 class="text-warning mb-0"><i class="bi bi-pencil me-2"></i>Editar Itinerário</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('itinerarios.update', $itinerario->iti_id) }}" method="POST" id="itinerarioForm">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="iti_rota_id" class="form-label">Rota</label>
                                <select class="form-select @error('iti_rota_id') is-invalid @enderror" id="iti_rota_id" name="iti_rota_id" style="background-color: #1a3a52; color: white; border-color: #2c5e86;">
                                    <option value="">Selecione uma rota</option>
                                    @foreach($rotas as $rota)
                                        <option value="{{ $rota->rot_id }}" {{ (old('iti_rota_id', $itinerario->iti_rota_id) == $rota->rot_id) ? 'selected' : '' }}>
                                            {{ $rota->rot_nome }} ({{ $rota->rot_origem }} -> {{ $rota->rot_destino }})
                                        </option>
                                    @endforeach
                                </select>
                                @error('iti_rota_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="iti_horariosaida" class="form-label">Horário de Saída</label>
                                <input type="time" class="form-control @error('iti_horariosaida') is-invalid @enderror" id="iti_horariosaida" name="iti_horariosaida" value="{{ old('iti_horariosaida', \Carbon\Carbon::parse($itinerario->iti_horariosaida)->format('H:i')) }}" style="background-color: #1a3a52; color: white; border-color: #2c5e86;">
                                @error('iti_horariosaida')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="iti_diadasemana" class="form-label">Dia da Semana</label>
                                <select class="form-select @error('iti_diadasemana') is-invalid @enderror" id="iti_diadasemana" name="iti_diadasemana" style="background-color: #1a3a52; color: white; border-color: #2c5e86;">
                                    <option value="">Selecione o dia</option>
                                    @foreach($diasSemana as $dia)
                                        <option value="{{ $dia }}" {{ (old('iti_diadasemana', $itinerario->iti_diadasemana) == $dia) ? 'selected' : '' }}>{{ $dia }}</option>
                                    @endforeach
                                </select>
                                @error('iti_diadasemana')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="d-flex justify-content-between mt-4">
                                <a href="{{ route('itinerarios.index') }}" class="btn btn-secondary">
                                    <i class="bi bi-arrow-left me-2"></i>Voltar
                                </a>
                                <button type="submit" class="btn btn-warning" id="btnSubmit">
                                    <i class="bi bi-check-circle me-2"></i>Atualizar Itinerário
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#itinerarioForm').on('submit', function() {
                $('#btnSubmit').html('<span class="spinner-border spinner-border-sm me-2" role="status" aria-hidden="true"></span>Atualizando...');
                $('#btnSubmit').prop('disabled', true);
            });
        });
    </script>

    <style>
        .form-control:focus, .form-select:focus {
            background-color: #1a3a52;
            color: white;
            border-color: #f39c12;
            box-shadow: 0 0 0 0.25rem rgba(243, 156, 18, 0.25);
        }
        .invalid-feedback { color: #ff6b6b; }
    </style>
@endsection
