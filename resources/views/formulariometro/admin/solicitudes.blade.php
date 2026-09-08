@extends('formulariometro.admin.layout')

@section('content')
<div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3 mb-3">
    <div>
        <h4 class="fw-bold mb-1 text-dark">Bandeja de Solicitudes - Tiquete Metro</h4>
        <p class="text-muted small mb-0">Base de datos consolidada para revisión y auditoría</p>
    </div>
    <div class="d-flex align-items-center gap-2">
        <span class="badge bg-dark fs-6 px-3 py-2">
            Total Solicitudes: {{ $totalSolicitudes ?? 0 }}
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

<div class="card shadow-sm border-0 mb-4">
    <div class="card-body p-2">
        <!-- Contenedor Handsontable -->
        <div id="tablaHandsontable" style="width: 100%; height: 560px; overflow: hidden;"></div>
    </div>
</div>
@endsection

@section('scripts')
<style>
    /* Estilo del encabezado idéntico a la imagen institucional */
    .handsontable thead th {
        background-color: #581d7f !important;
        color: #ffffff !important;
        font-weight: 600 !important;
        text-align: center !important;
        vertical-align: middle !important;
        border-color: #4a156e !important;
        font-size: 0.82rem !important;
        height: 38px !important;
        padding: 4px 6px !important;
    }
    .handsontable thead th .changeType,
    .handsontable thead th .htDropdownMenu {
        color: #ffffff !important;
    }

    /* Estilo de las filas de datos con fondo verde suave */
    .handsontable tbody tr td {
        background-color: #e2f3e8 !important;
        color: #212529 !important;
        font-size: 0.8125rem !important;
        vertical-align: middle !important;
        border-color: #ceeade !important;
        padding: 4px 6px !important;
    }
    .handsontable tbody tr:hover td {
        background-color: #d1ecdc !important;
    }

    /* Columna de numeración (1, 2, 3...) con fondo blanco y alineación perfecta */
    .handsontable tbody tr td.col-numero {
        background-color: #ffffff !important;
        color: #495057 !important;
        font-weight: 500 !important;
        border-color: #e2e8f0 !important;
        text-align: center !important;
        user-select: none;
    }

    .handsontable td.htCenter {
        text-align: center !important;
    }
    .handsontable td.htMiddle {
        vertical-align: middle !important;
    }

    /* Botón profesional 'Ir a Validar' con letra blanca garantizada */
    .btn-validar-metro {
        background-color: #0d6efd !important;
        color: #ffffff !important;
        font-weight: 600 !important;
        font-size: 0.75rem !important;
        padding: 4px 12px !important;
        line-height: 1.2 !important;
        border-radius: 4px !important;
        border: 1px solid #0d6efd !important;
        text-decoration: none !important;
        display: inline-block !important;
        text-align: center !important;
        box-shadow: 0 1px 2px rgba(0, 0, 0, 0.12) !important;
        white-space: nowrap !important;
    }
    .btn-validar-metro:hover {
        background-color: #0b5ed7 !important;
        color: #ffffff !important;
        border-color: #0a58ca !important;
    }
    .handsontable tbody tr td a.btn-validar-metro,
    .handsontable tbody tr td a.btn-validar-metro * {
        color: #ffffff !important;
    }
</style>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const container = document.getElementById('tablaHandsontable');

    container.innerHTML = '<div class="text-center py-5 text-muted"><div class="spinner-border text-primary spinner-border-sm me-2" role="status"></div>Cargando base de datos en tabla dinámica...</div>';

    fetch("{{ route('admin.metro.solicitudes.data') }}")
        .then(response => {
            if (!response.ok) {
                throw new Error('Error al consultar datos');
            }
            return response.json();
        })
        .then(data => {
            container.innerHTML = '';

            // Generar numeración consecutiva para cada fila
            const dataConNumeros = data.map((item, index) => {
                return {
                    num: index + 1,
                    ...item
                };
            });

            const hot = new Handsontable(container, {
                data: dataConNumeros,
                colHeaders: [
                    '',
                    'Fecha Registro',
                    'Tipo Doc',
                    'Documento',
                    'Nombre',
                    'Fecha Nacimiento',
                    'Edad',
                    'Género',
                    'Cívica',
                    'Municipio',
                    'Comuna',
                    'Barrio',
                    'Dirección',
                    'Estrato',
                    'Sisbén',
                    'Nivel Académico',
                    'Grado / Semestre',
                    'Secretaria',
                    'Motivo',
                    'Discapacidad',
                    'Correo',
                    'Celular',
                    'Teléfono Fijo',
                    'Estado Registro',
                    'Estado Actual',
                    'Validar'
                ],
                columns: [
                    // 1. Numeración
                    { data: 'num', readOnly: true, width: 45, className: 'htCenter htMiddle col-numero' },
                    
                    // 2. Identificación del postulante
                    { data: 'fecha_registro', readOnly: true, width: 145, className: 'htCenter htMiddle' },
                    { data: 'tipo_documento', readOnly: true, width: 80, className: 'htCenter htMiddle' },
                    { data: 'documento', readOnly: true, width: 115, className: 'htCenter htMiddle' },
                    { data: 'nombre', readOnly: true, width: 250, className: 'htMiddle' },
                    { data: 'fecha_nacimiento', readOnly: true, width: 125, className: 'htCenter htMiddle' },
                    { data: 'edad', readOnly: true, width: 65, className: 'htCenter htMiddle' },
                    { data: 'genero', readOnly: true, width: 105, className: 'htCenter htMiddle' },
                    { data: 'civica', readOnly: true, width: 110, className: 'htCenter htMiddle' },

                    // 3. Ubicación y Vivienda
                    { data: 'municipio', readOnly: true, width: 120, className: 'htMiddle' },
                    { data: 'comuna', readOnly: true, width: 145, className: 'htMiddle' },
                    { data: 'barrio', readOnly: true, width: 160, className: 'htMiddle' },
                    { data: 'direccion', readOnly: true, width: 280, className: 'htMiddle' },
                    { data: 'estrato', readOnly: true, width: 75, className: 'htCenter htMiddle' },
                    { data: 'sisben', readOnly: true, width: 120, className: 'htCenter htMiddle' },

                    // 4. Académico y Programa Sapiencia
                    { data: 'nivel_academico', readOnly: true, width: 140, className: 'htMiddle' },
                    { data: 'grado_semestre', readOnly: true, width: 130, className: 'htMiddle' },
                    { data: 'secretaria_fondo', readOnly: true, width: 160, className: 'htMiddle' },
                    { data: 'motivo', readOnly: true, width: 180, className: 'htMiddle' },
                    { data: 'discapacidad', readOnly: true, width: 105, className: 'htCenter htMiddle' },

                    // 5. Contacto
                    { data: 'correo', readOnly: true, width: 220, className: 'htMiddle' },
                    { data: 'celular', readOnly: true, width: 120, className: 'htCenter htMiddle' },
                    { data: 'telefono', readOnly: true, width: 120, className: 'htCenter htMiddle' },

                    // 6. Auditoría y Validación Final
                    { data: 'estado_registro', readOnly: true, width: 125, className: 'htCenter htMiddle' },
                    { 
                        data: 'estado_validacion', 
                        readOnly: true, 
                        width: 130,
                        className: 'htCenter htMiddle',
                        renderer: function (instance, td, row, col, prop, value, cellProperties) {
                            Handsontable.renderers.BaseRenderer.apply(this, arguments);
                            td.className = 'htCenter htMiddle';
                            const val = (value || 'PENDIENTE').toUpperCase();
                            let badgeClass = 'bg-warning text-dark';
                            if (val === 'ACEPTADA') badgeClass = 'bg-success';
                            else if (val === 'RECHAZADA') badgeClass = 'bg-danger';
                            td.innerHTML = `<span class="badge ${badgeClass}" style="font-size: 0.75rem; font-weight: 600; padding: 4px 8px;">${val}</span>`;
                        }
                    },
                    {
                        data: 'id',
                        readOnly: true,
                        width: 125,
                        className: 'htCenter htMiddle',
                        renderer: function (instance, td, row, col, prop, value, cellProperties) {
                            Handsontable.renderers.BaseRenderer.apply(this, arguments);
                            td.className = 'htCenter htMiddle';
                            const url = `{{ url('/admin/validar-solicitud') }}/${value}`;
                            td.innerHTML = `<a href="${url}" class="btn-validar-metro">Ir a Validar</a>`;
                        }
                    }
                ],
                filters: true,
                dropdownMenu: true,
                rowHeaders: false,
                rowHeights: 38,
                autoRowSize: false,
                height: 550,
                licenseKey: 'non-commercial-and-evaluation',
                readOnly: true
            });
        })
        .catch(err => {
            console.error('Error cargando Handsontable:', err);
            container.innerHTML = '<div class="alert alert-danger m-3"><i class="bi bi-exclamation-triangle-fill me-2"></i> Error al cargar los registros en la tabla dinámica.</div>';
        });
});
</script>
@endsection
