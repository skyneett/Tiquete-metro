@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6 col-lg-5">
        <div class="card shadow-sm border-0 mt-5">
            <div class="card-header text-white text-center py-4" style="background-color: #0f172a;">
                <div class="mb-2">
                    <span class="badge bg-primary px-3 py-1 text-uppercase" style="letter-spacing: 0.05em; font-size: 0.7rem;">
                        Módulo Administrativo
                    </span>
                </div>
                <h4 class="mb-0 fw-bold">Sapiencia - Tiquete Metro</h4>
                <small class="text-white-50">Panel de Auditoría y Validación de Solicitudes</small>
            </div>
            <div class="card-body p-4">
                @if (session('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <i class="bi bi-exclamation-triangle-fill me-1"></i> {{ session('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif

                @if (session('info'))
                    <div class="alert alert-info alert-dismissible fade show" role="alert">
                        <i class="bi bi-info-circle-fill me-1"></i> {{ session('info') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif

                <p class="text-muted text-center small mb-4">
                    Ingresa tu número de documento autorizado para acceder a la bandeja de solicitudes y dictamen de documentos.
                </p>

                <form action="{{ route('admin.metro.login.post') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="documento" class="form-label fw-semibold">Documento de Administrador</label>
                        <input type="text" 
                               name="documento" 
                               id="documento" 
                               class="form-control form-control-lg @error('documento') is-invalid @enderror" 
                               placeholder="Ej: 1001663829" 
                               value="{{ old('documento') }}" 
                               required 
                               autofocus>
                        @error('documento')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="d-grid gap-2 mt-4">
                        <button type="submit" class="btn btn-dark btn-lg fw-semibold shadow-sm" style="background-color: #0f172a; border-color: #0f172a;">
                            <i class="bi bi-shield-lock-fill me-1"></i> Ingresar al Panel
                        </button>
                    </div>
                </form>

                <div class="border-top mt-4 pt-3 text-center">
                    <small class="text-muted">
                        ¿Eres postulante? 
                        <a href="{{ route('metro.login') }}" class="text-success text-decoration-none fw-semibold">
                            Ir al portal de estudiantes
                        </a>
                    </small>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
