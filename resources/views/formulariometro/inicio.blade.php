@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-11 col-xl-10">
        <!-- Encabezado Institucional -->
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center border-bottom pb-3 mb-4">
            <div>
                <h4 class="fw-bold text-dark mb-1">Portal de Servicios</h4>
                <p class="text-muted small mb-0">Agencia de Educación Postsecundaria de Medellín - Sapiencia</p>
            </div>
            <div class="mt-2 mt-md-0 text-md-end">
                <span class="text-secondary small d-block">Identificación: <strong>{{ $cedula }}</strong></span>
                @if (session('es_admin'))
                    <span class="badge bg-secondary text-white" style="font-size: 0.75rem;">Rol: Administrador</span>
                @else
                    <span class="badge bg-light text-dark border" style="font-size: 0.75rem;">Rol: Estudiante</span>
                @endif
            </div>
        </div>

        <!-- Mensajes del sistema -->
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show py-2" role="alert">
                <i class="bi bi-check-circle me-1"></i> {{ session('success') }}
                <button type="button" class="btn-close py-2" data-bs-dismiss="alert"></button>
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger alert-dismissible fade show py-2" role="alert">
                <i class="bi bi-exclamation-circle me-1"></i> {{ session('error') }}
                <button type="button" class="btn-close py-2" data-bs-dismiss="alert"></button>
            </div>
        @endif

        @if (session('info'))
            <div class="alert alert-info alert-dismissible fade show py-2" role="alert">
                <i class="bi bi-info-circle me-1"></i> {{ session('info') }}
                <button type="button" class="btn-close py-2" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <!-- Card de Bienvenida y Navegación -->
        <div class="card shadow-sm border-0 mb-4">
            <div class="card-body p-4">
                <div class="d-flex align-items-start gap-3">
                    <div class="text-secondary fs-3 mt-1">
                        <i class="bi bi-layout-text-window-reverse"></i>
                    </div>
                    <div>
                        <h6 class="fw-bold text-dark mb-1">Bienvenido al sistema</h6>
                        <p class="text-muted small mb-0">
                            Utiliza el menú lateral izquierdo para acceder a los formularios, convocatorias y módulos correspondientes a tu perfil.
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Estado del Trámite: Tiquete Metro -->
        <div class="card shadow-sm border-0 mb-4">
            <div class="card-header bg-light py-2 px-3 border-bottom d-flex justify-content-between align-items-center">
                <span class="fw-semibold text-dark small">
                    <i class="bi bi-file-earmark-text me-1 text-secondary"></i> Estado de Solicitud - Tiquete Metro
                </span>
                @if ($registroExistente)
                    @switch((int)$registroExistente->estado)
                        @case(1)
                            <span class="badge bg-primary">Radicada / En proceso</span>
                            @break
                        @case(2)
                            <span class="badge bg-warning text-dark">En revisión</span>
                            @break
                        @case(3)
                            <span class="badge bg-success">Aprobada (Beneficiario)</span>
                            @break
                        @case(4)
                            <span class="badge bg-danger">Rechazada</span>
                            @break
                        @case(0)
                            <span class="badge bg-secondary">Anulada</span>
                            @break
                        @default
                            <span class="badge bg-info">Registrada</span>
                    @endswitch
                @else
                    <span class="badge bg-secondary">Sin radicar</span>
                @endif
            </div>
            <div class="card-body p-4">
                @if ($registroExistente)
                    <div class="table-responsive">
                        <table class="table table-sm table-bordered align-middle mb-3" style="font-size: 0.85rem;">
                            <tbody class="table-group-divider">
                                <tr>
                                    <th class="bg-light text-muted" style="width: 25%;">Número de radicado</th>
                                    <td class="fw-semibold">#{{ $registroExistente->id }}</td>
                                </tr>
                                <tr>
                                    <th class="bg-light text-muted">Estado del trámite</th>
                                    <td>
                                        @switch((int)$registroExistente->estado)
                                            @case(1)
                                                <span class="text-primary fw-semibold"><i class="bi bi-clock-history"></i> Radicada (En espera de validación)</span>
                                                @break
                                            @case(2)
                                                <span class="text-warning-emphasis fw-semibold"><i class="bi bi-search"></i> En revisión de documentos y requisitos</span>
                                                @break
                                            @case(3)
                                                <span class="text-success fw-semibold"><i class="bi bi-check-circle"></i> Aprobada (Beneficiario activo)</span>
                                                @break
                                            @case(4)
                                                <span class="text-danger fw-semibold"><i class="bi bi-x-circle"></i> Rechazada (No cumple requisitos o soportes pendientes)</span>
                                                @break
                                            @case(0)
                                                <span class="text-secondary fw-semibold"><i class="bi bi-slash-circle"></i> Solicitud anulada</span>
                                                @break
                                            @default
                                                <span class="text-dark">Registrada</span>
                                        @endswitch
                                    </td>
                                </tr>
                                <tr>
                                    <th class="bg-light text-muted">Postulante</th>
                                    <td>{{ trim("{$registroExistente->primer_nombre} {$registroExistente->segundo_nombre} {$registroExistente->primer_apellido} {$registroExistente->segundo_apellido}") }}</td>
                                </tr>
                                <tr>
                                    <th class="bg-light text-muted">Fecha de radicación</th>
                                    <td>{{ $registroExistente->fecha_registro ?? 'N/A' }}</td>
                                </tr>
                                <tr>
                                    <th class="bg-light text-muted">Correo registrado</th>
                                    <td>{{ $registroExistente->correo ?? 'N/A' }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="d-flex gap-2">
                        <a href="{{ route('metro.create') }}" class="btn btn-outline-dark btn-sm">
                            <i class="bi bi-eye me-1"></i> Consultar / Modificar formulario
                        </a>
                    </div>
                @else
                    <p class="text-muted small mb-3">
                        No se encuentra ninguna postulación activa vinculada a tu documento de identidad para el programa Tiquete Metro.
                    </p>
                    <a href="{{ route('metro.create') }}" class="btn btn-dark btn-sm">
                        <i class="bi bi-pencil-square me-1"></i> Diligenciar formulario de inscripción
                    </a>
                @endif
            </div>
        </div>

        <!-- Módulo Administrativo (visible si es admin) -->
        @if (session('es_admin'))
            <div class="card shadow-sm border-0">
                <div class="card-header bg-light py-2 px-3 border-bottom">
                    <span class="fw-semibold text-dark small">
                        <i class="bi bi-shield-lock me-1 text-secondary"></i> Gestión Administrativa
                    </span>
                </div>
                <div class="card-body p-4">
                    <p class="text-muted small mb-3">
                        Tu cuenta cuenta con permisos de administrador. Puedes consultar la totalidad de solicitudes recibidas, auditar postulaciones y verificar documentos adjuntos.
                    </p>
                    <a href="{{ route('admin.metro.solicitudes') }}" class="btn btn-outline-secondary btn-sm">
                        <i class="bi bi-table me-1"></i> Consultar reporte de solicitudes
                    </a>
                </div>
            </div>
        @endif
    </div>
</div>
@endsection
