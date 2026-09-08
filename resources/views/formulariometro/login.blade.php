@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6 col-lg-5">
        <div class="card shadow-sm border-0 mt-4">
            <div class="card-header bg-success text-white text-center py-3">
                <h4 class="mb-0 fw-bold">Perfil Estudiantil - Tiquete Metro</h4>
                <small class="text-white-50">Consulta y diligenciamiento de formulario</small>
            </div>
            <div class="card-body p-4">
                @if (session('info'))
                    <div class="alert alert-info alert-dismissible fade show" role="alert">
                        {{ session('info') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif

                <p class="text-muted text-center mb-4">
                    Ingresa tu número de documento de identidad para ingresar o continuar tu registro.
                </p>

                <form action="{{ route('metro.login.post') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="documento" class="form-label fw-semibold">Número de Documento</label>
                        <input type="text" 
                               name="documento" 
                               id="documento" 
                               class="form-control form-control-lg @error('documento') is-invalid @enderror" 
                               placeholder="Ej: 101010" 
                               value="{{ old('documento') }}" 
                               required 
                               autofocus>
                        @error('documento')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="d-grid gap-2 mt-4">
                        <button type="submit" class="btn btn-success btn-lg fw-semibold">
                            Ingresar al Formulario
                        </button>
                    </div>
                </form>

                <div class="alert alert-light border mt-4 mb-0 small text-muted">
                    <i class="bi bi-info-circle"></i>
                    <strong>Nota:</strong> Si tu documento ya está registrado, cargaremos tu información previa para que puedas editarla. Si es tu primera vez, ingresarás con el formulario en blanco.
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
