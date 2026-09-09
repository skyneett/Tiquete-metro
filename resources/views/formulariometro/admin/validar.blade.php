@extends('formulariometro.admin.layout')

@section('content')
<div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-2 mb-4">
    <div>
        <div class="d-flex align-items-center gap-2 mb-1">
            <a href="{{ route('admin.metro.solicitudes') }}" class="btn btn-outline-secondary btn-sm">
                <i class="bi bi-arrow-left"></i> Volver a Solicitudes
            </a>
            <h3 class="fw-bold text-dark mb-0">
                Revisión: {{ trim("{$solicitud->primer_nombre} {$solicitud->segundo_nombre} {$solicitud->primer_apellido} {$solicitud->segundo_apellido}") }}
            </h3>
        </div>
        <p class="text-muted small mb-0 ms-md-4 ps-md-3">
            Documento: <strong>{{ $solicitud->documento }}</strong> ({{ $solicitud->tipoDocumento->descripcion ?? 'CC' }}) | Radicado #{{ $solicitud->id }} | Fecha: {{ $solicitud->fecha_registro ?? 'N/A' }}
        </p>
    </div>
    <div class="d-flex align-items-center gap-2">
        <span class="text-muted small">Estado Validación:</span>
        <span id="badgeEstadoValidacionGeneral" class="badge {{ $solicitud->estado_validacion === 'ACEPTADA' ? 'bg-success' : ($solicitud->estado_validacion === 'RECHAZADA' ? 'bg-danger' : 'bg-warning text-dark') }} fs-6 px-3 py-2">
            {{ $solicitud->estado_validacion ?? 'PENDIENTE' }}
        </span>
    </div>
</div>

@if (session('success'))
    <div class="alert alert-success alert-dismissible fade show shadow-sm py-2" role="alert">
        <i class="bi bi-check-circle-fill me-2"></i> {{ session('success') }}
        <button type="button" class="btn-close py-2" data-bs-dismiss="alert"></button>
    </div>
@endif

@if (session('error'))
    <div class="alert alert-danger alert-dismissible fade show shadow-sm py-2" role="alert">
        <i class="bi bi-exclamation-circle-fill me-2"></i> {{ session('error') }}
        <button type="button" class="btn-close py-2" data-bs-dismiss="alert"></button>
    </div>
@endif

<!-- Pestañas de Navegación -->
<div class="card shadow-sm border-0">
    <div class="card-header bg-white border-bottom p-0">
        <ul class="nav nav-tabs card-header-tabs m-0 px-3 pt-2" id="tabsValidacion" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active fw-semibold" id="tab-formulario-tab" data-bs-toggle="tab" data-bs-target="#tab-formulario" type="button" role="tab">
                    <i class="bi bi-file-earmark-text me-1 text-primary"></i> Revisar Formulario
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link fw-semibold" id="tab-adjuntos-tab" data-bs-toggle="tab" data-bs-target="#tab-adjuntos" type="button" role="tab">
                    <i class="bi bi-paperclip me-1 text-success"></i> Revisar Adjuntos
                </button>
            </li>
        </ul>
    </div>

    <div class="card-body p-4">
        <div class="tab-content" id="tabsValidacionContent">
            <!-- PESTAÑA 1: REVISAR FORMULARIO (IFRAME) -->
            <div class="tab-pane fade show active" id="tab-formulario" role="tabpanel">
                <div class="d-flex justify-content-between align-items-center py-2 px-1 mb-2">
                    <span class="small text-muted fw-semibold">
                        <i class="bi bi-file-earmark-person me-1"></i> Formulario de postulación del estudiante
                    </span>
                    <a href="{{ route('admin.metro.ver-formulario', $solicitud->id) }}" target="_blank" class="btn btn-outline-secondary btn-sm" style="font-size: 0.75rem;">
                        <i class="bi bi-box-arrow-up-right me-1"></i> Abrir en ventana independiente
                    </a>
                </div>
                <div class="border rounded overflow-hidden shadow-sm">
                    <iframe src="{{ route('admin.metro.ver-formulario', $solicitud->id) }}" 
                            style="width: 100%; height: 850px; border: none;" 
                            title="Formulario del Estudiante"></iframe>
                </div>
            </div>

            <!-- PESTAÑA 2: REVISAR ADJUNTOS -->
            <div class="tab-pane fade" id="tab-adjuntos" role="tabpanel">
                <div class="table-responsive mb-4">
                    <table class="table table-bordered align-middle">
                        <thead class="table-light">
                            <tr>
                                <th style="width: 25%;">Documento</th>
                                <th style="width: 15%;" class="text-center">Archivo</th>
                                <th style="width: 35%;">Observaciones</th>
                                <th style="width: 25%;" class="text-center">Dictamen y Estado</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $tieneDiscapacidad = (strtoupper($solicitud->discapacidadRel->descripcion ?? '') === 'SI' || (int)$solicitud->discapacidad === 1);
                                $adjuntos = [
                                    [
                                        'titulo' => 'Documento de Identidad',
                                        'campo' => 'archivo_documento_identidad',
                                        'archivo' => $solicitud->archivo_documento_identidad,
                                        'estado' => $solicitud->estado_archivo_identidad,
                                        'obs' => $solicitud->obs_archivo_identidad,
                                        'icon' => 'bi-person-badge',
                                    ],
                                    [
                                        'titulo' => 'Servicios Públicos Domiciliarios',
                                        'campo' => 'archivo_servicios_publicos',
                                        'archivo' => $solicitud->archivo_servicios_publicos,
                                        'estado' => $solicitud->estado_archivo_servicios,
                                        'obs' => $solicitud->obs_archivo_servicios,
                                        'icon' => 'bi-receipt',
                                    ],
                                    [
                                        'titulo' => 'Tarjeta Cívica Personalizada',
                                        'campo' => 'archivo_tarjeta_civica',
                                        'archivo' => $solicitud->archivo_tarjeta_civica,
                                        'estado' => $solicitud->estado_archivo_civica,
                                        'obs' => $solicitud->obs_archivo_civica,
                                        'icon' => 'bi-credit-card',
                                    ],
                                ];

                                if ($tieneDiscapacidad) {
                                    $adjuntos[] = [
                                        'titulo' => 'Certificado de Discapacidad',
                                        'campo' => 'archivo_certificado_discapacidad',
                                        'archivo' => $solicitud->archivo_certificado_discapacidad,
                                        'estado' => $solicitud->estado_archivo_discapacidad,
                                        'obs' => $solicitud->obs_archivo_discapacidad,
                                        'icon' => 'bi-file-medical',
                                    ];
                                }
                            @endphp

                            @foreach ($adjuntos as $adj)
                                <tr id="fila-{{ $adj['campo'] }}">
                                    <td>
                                        <div class="fw-semibold text-dark">
                                            <i class="bi {{ $adj['icon'] }} me-1 text-secondary"></i> {{ $adj['titulo'] }}
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        @if ($adj['archivo'])
                                            <a href="{{ Storage::url($adj['archivo']) }}" target="_blank" class="btn btn-outline-primary btn-sm">
                                                <i class="bi bi-box-arrow-up-right me-1"></i> Ver Archivo
                                            </a>
                                        @else
                                            <span class="badge bg-light text-muted border">No adjuntado</span>
                                        @endif
                                    </td>
                                    <td>
                                        <textarea id="obs-{{ $adj['campo'] }}" 
                                                  class="form-control form-control-sm" 
                                                  rows="2" 
                                                  placeholder="Observación sobre este documento...">{{ $adj['obs'] }}</textarea>
                                    </td>
                                    <td>
                                        <div class="d-flex flex-column align-items-center gap-2">
                                            <!-- Indicador visual de estado actual -->
                                            <div id="indicador-{{ $adj['campo'] }}">
                                                @if ($adj['estado'] === 'ACEPTADO')
                                                    <span class="badge bg-success"><i class="bi bi-check-circle me-1"></i> Aceptado</span>
                                                @elseif ($adj['estado'] === 'RECHAZADO')
                                                    <span class="badge bg-danger"><i class="bi bi-x-circle me-1"></i> Rechazado</span>
                                                @else
                                                    <span class="badge bg-secondary text-white"><i class="bi bi-clock me-1"></i> Pendiente</span>
                                                @endif
                                            </div>

                                            <!-- Botones de Acción -->
                                            <div class="btn-group btn-group-sm w-100">
                                                <button type="button" 
                                                        class="btn btn-outline-success" 
                                                        onclick="guardarRevisionAdjunto('{{ $adj['campo'] }}', 'ACEPTADO')">
                                                    <i class="bi bi-check-lg"></i> Aceptar
                                                </button>
                                                <button type="button" 
                                                        class="btn btn-outline-danger" 
                                                        onclick="guardarRevisionAdjunto('{{ $adj['campo'] }}', 'RECHAZADO')">
                                                    <i class="bi bi-x-lg"></i> Rechazar
                                                </button>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                @php
                    $todosRevisadosInicial = true;
                    foreach ($adjuntos as $adj) {
                        if ($adj['estado'] === null || $adj['estado'] === '') {
                            $todosRevisadosInicial = false;
                            break;
                        }
                    }
                @endphp

                <!-- Panel de Control y Finalización de Revisión -->
                <div class="card border-0 shadow-sm p-3 mb-4" style="background-color: #f1f5f9; border-left: 4px solid #0d6efd !important;">
                    <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3">
                        <div>
                            <div class="d-flex align-items-center gap-2 mb-1">
                                <span class="fw-bold text-dark">Estado de la Solicitud:</span>
                                <span id="badgeEstadoCalculadoAdjuntos" class="badge {{ $solicitud->estado_validacion === 'ACEPTADA' ? 'bg-success' : ($solicitud->estado_validacion === 'RECHAZADA' ? 'bg-danger' : 'bg-warning text-dark') }} fs-6 px-3 py-1">
                                    {{ $solicitud->estado_validacion ?? 'PENDIENTE' }}
                                </span>
                                @if ($solicitud->decision_manual)
                                    <span id="badgeTipoDecision" class="badge bg-secondary" style="font-size: 0.7rem;">Manual</span>
                                @else
                                    <span id="badgeTipoDecision" class="badge bg-primary-subtle text-primary border border-primary-subtle" style="font-size: 0.7rem;">Automático</span>
                                @endif
                            </div>
                            <small id="textoEstadoRevisados" class="text-muted">
                                {{ $todosRevisadosInicial ? '✓ Todos los documentos requeridos han sido revisados. Ya puedes finalizar la revisión.' : 'ℹ Debes revisar todos los documentos adjuntos (Aceptar o Rechazar) para habilitar la finalización.' }}
                            </small>
                        </div>
                        <div class="d-flex gap-2">
                            <button type="button" 
                                    id="btnFinalizarRevision" 
                                    class="btn btn-success fw-semibold px-4 py-2 shadow-sm" 
                                    {{ $todosRevisadosInicial ? '' : 'disabled' }}
                                    onclick="finalizarRevision()">
                                <i class="bi bi-check-circle-fill me-1"></i> Finalizar revisión
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Dictamen Final de la Solicitud -->
                <div class="card bg-light border-0 p-4 rounded-3">
                    <h5 class="fw-bold text-dark mb-2">Panel de Dictamen Final (Sobrescritura Manual)</h5>
                    <p class="text-muted small mb-3">
                        El sistema calcula el estado automáticamente a partir de los documentos adjuntos. Si lo requieres, puedes forzar una decisión manual o restablecer el cálculo automático.
                    </p>

                    <form action="{{ route('admin.metro.guardar-decision', $solicitud->id) }}" method="POST">
                        @csrf
                        <div class="row align-items-center g-3">
                            <div class="col-md-6">
                                <label class="form-label fw-semibold small">Decisión para esta postulación:</label>
                                <select name="estado_validacion" id="selectEstadoValidacion" class="form-select">
                                    <option value="AUTOMATICO" {{ !$solicitud->decision_manual ? 'selected' : '' }}>🔄 Volver a automático (según resultado de adjuntos)</option>
                                    <option value="ACEPTADA" {{ ($solicitud->decision_manual && $solicitud->estado_validacion === 'ACEPTADA') ? 'selected' : '' }}>🟢 ACEPTADA (Manual: Cumple todos los requisitos)</option>
                                    <option value="RECHAZADA" {{ ($solicitud->decision_manual && $solicitud->estado_validacion === 'RECHAZADA') ? 'selected' : '' }}>🔴 RECHAZADA (Manual: Inconsistencias o soportes inválidos)</option>
                                    <option value="PENDIENTE" {{ ($solicitud->decision_manual && $solicitud->estado_validacion === 'PENDIENTE') ? 'selected' : '' }}>🟡 PENDIENTE (Manual: Requiere validación posterior)</option>
                                </select>
                            </div>
                            <div class="col-md-6 d-flex gap-2 align-items-end pt-md-4">
                                <button type="submit" class="btn btn-dark fw-semibold px-4">
                                    <i class="bi bi-save me-1"></i> Guardar Decisión
                                </button>
                                <a href="{{ route('admin.metro.solicitudes') }}" class="btn btn-outline-secondary">
                                    Regresar a Bandeja
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
function actualizarBadgeEstado(estado) {
    const badgeGeneral = document.getElementById('badgeEstadoValidacionGeneral');
    const badgeCalculado = document.getElementById('badgeEstadoCalculadoAdjuntos');

    let badgeClass = 'badge fs-6 px-3 py-1 ';
    if (estado === 'ACEPTADA') {
        badgeClass += 'bg-success';
    } else if (estado === 'RECHAZADA') {
        badgeClass += 'bg-danger';
    } else {
        badgeClass += 'bg-warning text-dark';
    }

    if (badgeGeneral) {
        badgeGeneral.className = badgeClass;
        badgeGeneral.textContent = estado || 'PENDIENTE';
    }
    if (badgeCalculado) {
        badgeCalculado.className = badgeClass;
        badgeCalculado.textContent = estado || 'PENDIENTE';
    }
}

function guardarRevisionAdjunto(campo, estado) {
    const obsTextarea = document.getElementById('obs-' + campo);
    const observacion = obsTextarea ? obsTextarea.value.trim() : '';
    const indicador = document.getElementById('indicador-' + campo);

    if (indicador) {
        indicador.innerHTML = '<span class="badge bg-light text-dark border">Guardando...</span>';
    }

    fetch("{{ route('admin.metro.revisar-adjunto', $solicitud->id) }}", {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': '{{ csrf_token() }}',
            'Accept': 'application/json'
        },
        body: JSON.stringify({
            campo: campo,
            estado: estado,
            observacion: observacion
        })
    })
    .then(res => res.json())
    .then(data => {
        if (data.success) {
            // 1. Actualizar indicador del documento
            if (indicador) {
                if (estado === 'ACEPTADO') {
                    indicador.innerHTML = '<span class="badge bg-success"><i class="bi bi-check-circle me-1"></i> Aceptado</span>';
                } else if (estado === 'RECHAZADO') {
                    indicador.innerHTML = '<span class="badge bg-danger"><i class="bi bi-x-circle me-1"></i> Rechazado</span>';
                } else {
                    indicador.innerHTML = '<span class="badge bg-secondary"><i class="bi bi-clock me-1"></i> Pendiente</span>';
                }
            }

            // 2. Actualizar badges de estado en tiempo real
            if (data.estado_validacion) {
                actualizarBadgeEstado(data.estado_validacion);
            }

            // 3. Habilitar o deshabilitar botón "Finalizar revisión"
            const btnFinalizar = document.getElementById('btnFinalizarRevision');
            const textoRevisados = document.getElementById('textoEstadoRevisados');

            if (data.todos_revisados) {
                if (btnFinalizar) btnFinalizar.removeAttribute('disabled');
                if (textoRevisados) {
                    textoRevisados.className = 'text-success fw-semibold';
                    textoRevisados.innerHTML = '✓ Todos los documentos requeridos han sido revisados. Ya puedes finalizar la revisión.';
                }
            } else {
                if (btnFinalizar) btnFinalizar.setAttribute('disabled', 'disabled');
                if (textoRevisados) {
                    textoRevisados.className = 'text-muted';
                    textoRevisados.innerHTML = 'ℹ Debes revisar todos los documentos adjuntos (Aceptar o Rechazar) para habilitar la finalización.';
                }
            }

            // 4. Actualizar badge de tipo de decisión (Manual vs Auto)
            const badgeTipo = document.getElementById('badgeTipoDecision');
            if (badgeTipo) {
                if (data.decision_manual) {
                    badgeTipo.className = 'badge bg-secondary';
                    badgeTipo.textContent = 'Manual';
                } else {
                    badgeTipo.className = 'badge bg-primary-subtle text-primary border border-primary-subtle';
                    badgeTipo.textContent = 'Automático';
                }
            }
        } else {
            alert('Error al guardar la revisión: ' + (data.message || 'Intente nuevamente.'));
        }
    })
    .catch(err => {
        console.error(err);
        alert('Error de comunicación con el servidor.');
    });
}

function finalizarRevision() {
    const btnFinalizar = document.getElementById('btnFinalizarRevision');
    if (btnFinalizar) {
        btnFinalizar.disabled = true;
        btnFinalizar.innerHTML = '<span class="spinner-border spinner-border-sm me-1" role="status"></span> Procesando...';
    }

    fetch("{{ route('admin.metro.finalizar-revision', $solicitud->id) }}", {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': '{{ csrf_token() }}',
            'Accept': 'application/json'
        }
    })
    .then(res => res.json())
    .then(data => {
        if (data.success) {
            const estado = data.estado_validacion;
            let icono = 'info';
            let titulo = 'Revisión Finalizada';
            let colorBoton = '#0d6efd';

            if (estado === 'ACEPTADA') {
                icono = 'success';
                titulo = '¡Solicitud ACEPTADA!';
                colorBoton = '#198754';
            } else if (estado === 'RECHAZADA') {
                icono = 'error';
                titulo = 'Solicitud RECHAZADA';
                colorBoton = '#dc3545';
            } else {
                icono = 'warning';
                titulo = 'Solicitud PENDIENTE';
                colorBoton = '#ffc107';
            }

            Swal.fire({
                title: titulo,
                html: `El estado de validación para esta postulación ha quedado confirmado como: <br><strong class="fs-5">${estado}</strong>`,
                icon: icono,
                confirmButtonText: 'Regresar a Bandeja',
                confirmButtonColor: colorBoton,
                allowOutsideClick: false
            }).then(() => {
                window.location.href = "{{ route('admin.metro.solicitudes') }}";
            });
        } else {
            Swal.fire({
                title: 'Error',
                text: data.error || 'No fue posible finalizar la revisión.',
                icon: 'error',
                confirmButtonColor: '#0d6efd'
            });
            if (btnFinalizar) {
                btnFinalizar.disabled = false;
                btnFinalizar.innerHTML = '<i class="bi bi-check-circle-fill me-1"></i> Finalizar revisión';
            }
        }
    })
    .catch(err => {
        console.error(err);
        Swal.fire({
            title: 'Error de Red',
            text: 'Ocurrió un error al intentar comunicarse con el servidor.',
            icon: 'error',
            confirmButtonColor: '#0d6efd'
        });
        if (btnFinalizar) {
            btnFinalizar.disabled = false;
            btnFinalizar.innerHTML = '<i class="bi bi-check-circle-fill me-1"></i> Finalizar revisión';
        }
    });
}
</script>
@endsection

