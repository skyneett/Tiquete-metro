<?php

namespace App\Http\Controllers\formulariometro;

use App\Http\Controllers\Controller;
use App\Models\formulariometro\MetroDatosPersonalesActual;
use App\Models\formulariometro\MotivoDiligenciarFormulario;
use App\Models\formulariometro\TipoDocumento;
use App\Models\formulariometro\Genero;
use App\Models\formulariometro\Municipio;
use App\Models\formulariometro\Comuna;
use App\Models\formulariometro\Barrio;
use App\Models\formulariometro\Estrato;
use App\Models\formulariometro\Sisben;
use App\Models\formulariometro\Discapacidad;
use App\Models\formulariometro\TipoDiscapacidad;
use App\Models\formulariometro\NivelAcademico;
use App\Models\formulariometro\Grado;
use App\Models\formulariometro\Fondo;
use App\Models\formulariometro\TipoVia;
use App\Models\formulariometro\Orientacion;
use App\Models\formulariometro\Sino;
use Illuminate\Http\Request;

class AdminMetroController extends Controller
{
    public function index(Request $request)
    {
        // TODO: reemplazar esta validación por un middleware de autenticación y roles real (ej: auth, role:admin o Spatie)
        if (!session('cedula_usuario')) {
            return redirect()->route('metro.login')->with('info', 'Por favor ingresa tu número de documento para acceder.');
        }

        if (!session('es_admin')) {
            return redirect()->route('metro.inicio')->with('error', 'Acceso denegado: este módulo es exclusivo para administradores.');
        }

        $totalSolicitudes = MetroDatosPersonalesActual::count();

        return view('formulariometro.admin.solicitudes', compact('totalSolicitudes'));
    }

    public function listadoJson()
    {
        if (!session('cedula_usuario') || !session('es_admin')) {
            return response()->json(['error' => 'No autorizado'], 403);
        }

        $registros = MetroDatosPersonalesActual::with([
            'tipoDocumento',
            'generoRel',
            'municipioRel',
            'comunaRel',
            'barrioRel',
            'estratoRel',
            'sisbenRel',
            'discapacidadRel',
            'tipoDiscapacidadRel',
            'nivelAcademicoRel',
            'gradoRel',
            'fondoRel',
            'motivoRel'
        ])
        ->orderByDesc('id')
        ->get();

        $data = $registros->map(function ($r) {
            $nombreCompleto = trim("{$r->primer_nombre} {$r->segundo_nombre} {$r->primer_apellido} {$r->segundo_apellido}");
            $esMedellin = str_contains(strtoupper($r->municipioRel->descripcion ?? ''), 'MEDELL');
            $barrioTexto = $esMedellin ? ($r->barrioRel->descripcion ?? '-') : ($r->OtroBarrio ?? '-');
            $gradoSemestre = $r->semestre ? ("Semestre {$r->semestre}") : ($r->gradoRel->descripcion ?? '-');

            return [
                'id' => $r->id,
                'fecha_registro' => $r->fecha_registro ?? ($r->created_at ? $r->created_at->format('Y-m-d H:i:s') : '-'),
                'documento' => $r->documento,
                'nombre' => $nombreCompleto,
                'comuna' => $r->comunaRel->descripcion ?? '-',
                'secretaria_fondo' => $r->fondoRel->descripcion ?? '-',
                'estado_registro' => 'COMPLETO',
                'estado_validacion' => $r->estado_validacion ?? 'PENDIENTE',
                'tipo_documento' => $r->tipoDocumento->descripcion ?? '-',
                'civica' => $r->civica ?? '-',
                'fecha_nacimiento' => $r->fecha_nacimiento ?? '-',
                'edad' => $r->edad ?? '-',
                'genero' => $r->generoRel->descripcion ?? '-',
                'direccion' => $r->direccion ?? '-',
                'municipio' => $r->municipioRel->descripcion ?? '-',
                'barrio' => $barrioTexto,
                'estrato' => $r->estratoRel->descripcion ?? '-',
                'sisben' => $r->sisbenRel->descripcion ?? 'NO TIENE',
                'discapacidad' => $r->discapacidadRel->descripcion ?? 'NO',
                'correo' => $r->correo ?? '-',
                'celular' => $r->celular ?? '-',
                'telefono' => $r->telefonoFijo ?? '-',
                'nivel_academico' => $r->nivelAcademicoRel->descripcion ?? '-',
                'grado_semestre' => $gradoSemestre,
                'motivo' => $r->motivoRel->descripcion ?? '-',
            ];
        });

        return response()->json($data);
    }

    public function validar($id)
    {
        if (!session('cedula_usuario') || !session('es_admin')) {
            return redirect()->route('metro.inicio')->with('error', 'No tienes permisos de administrador.');
        }

        $solicitud = MetroDatosPersonalesActual::with([
            'tipoDocumento',
            'generoRel',
            'municipioRel',
            'comunaRel',
            'barrioRel',
            'estratoRel',
            'sisbenRel',
            'discapacidadRel',
            'tipoDiscapacidadRel',
            'nivelAcademicoRel',
            'gradoRel',
            'fondoRel',
            'motivoRel'
        ])->findOrFail($id);

        return view('formulariometro.admin.validar', compact('solicitud'));
    }

    public function verFormulario($id)
    {
        if (!session('cedula_usuario') || !session('es_admin')) {
            abort(403, 'Acceso no autorizado.');
        }

        $registroExistente = MetroDatosPersonalesActual::findOrFail($id);
        $cedula = $registroExistente->documento;

        $motivos = MotivoDiligenciarFormulario::all();
        $tiposDocumento = TipoDocumento::all();
        $generos = Genero::all();
        $municipios = Municipio::all();
        $comunas = Comuna::where('estado', '1')->get();
        $estratos = Estrato::all();
        $sisbenes = Sisben::all();
        $sinos = Sino::where('estado', '1')->get();
        $tiposDiscapacidad = TipoDiscapacidad::where('estado', '1')->get();
        $nivelesAcademicos = NivelAcademico::all();
        $grados = Grado::all();
        $fondos = Fondo::all();
        $tiposVia = TipoVia::all();
        $orientaciones = Orientacion::all();

        $soloConsulta = true;
        $sinSidebar = true;

        return view('formulariometro.formulario', compact(
            'motivos',
            'tiposDocumento',
            'generos',
            'municipios',
            'comunas',
            'estratos',
            'sisbenes',
            'sinos',
            'tiposDiscapacidad',
            'nivelesAcademicos',
            'grados',
            'fondos',
            'tiposVia',
            'orientaciones',
            'registroExistente',
            'cedula',
            'soloConsulta',
            'sinSidebar'
        ));
    }

    public function revisarAdjunto(Request $request, $id)
    {
        if (!session('cedula_usuario') || !session('es_admin')) {
            return response()->json(['error' => 'No autorizado'], 403);
        }

        $request->validate([
            'campo' => 'required|string|in:archivo_documento_identidad,archivo_servicios_publicos,archivo_tarjeta_civica,archivo_certificado_discapacidad',
            'estado' => 'required|string|in:ACEPTADO,RECHAZADO,PENDIENTE',
            'observacion' => 'nullable|string',
        ]);

        $solicitud = MetroDatosPersonalesActual::findOrFail($id);

        $mapeo = [
            'archivo_documento_identidad' => ['estado' => 'estado_archivo_identidad', 'obs' => 'obs_archivo_identidad'],
            'archivo_servicios_publicos' => ['estado' => 'estado_archivo_servicios', 'obs' => 'obs_archivo_servicios'],
            'archivo_tarjeta_civica' => ['estado' => 'estado_archivo_civica', 'obs' => 'obs_archivo_civica'],
            'archivo_certificado_discapacidad' => ['estado' => 'estado_archivo_discapacidad', 'obs' => 'obs_archivo_discapacidad'],
        ];

        $colEstado = $mapeo[$request->campo]['estado'];
        $colObs = $mapeo[$request->campo]['obs'];

        $solicitud->$colEstado = $request->estado;
        $solicitud->$colObs = $request->observacion;

        // Si no se ha forzado una decisión manual, se calcula automáticamente
        if (!$solicitud->decision_manual) {
            $solicitud->estado_validacion = $this->calcularEstadoAutomatico($solicitud);

            if ($solicitud->estado_validacion === 'ACEPTADA') {
                $solicitud->estado = 3;
            } elseif ($solicitud->estado_validacion === 'RECHAZADA') {
                $solicitud->estado = 4;
            } elseif ($solicitud->estado_validacion === 'PENDIENTE') {
                $solicitud->estado = 2;
            }
        }

        $solicitud->save();

        return response()->json([
            'success' => true,
            'mensaje' => 'Revisión de adjunto guardada exitosamente.',
            'campo' => $request->campo,
            'estado' => $request->estado,
            'observacion' => $request->observacion,
            'estado_validacion' => $solicitud->estado_validacion,
            'decision_manual' => (bool)$solicitud->decision_manual,
            'todos_revisados' => $this->sonTodosRevisados($solicitud),
        ]);
    }

    public function guardarDecision(Request $request, $id)
    {
        if (!session('cedula_usuario') || !session('es_admin')) {
            return redirect()->route('metro.inicio')->with('error', 'No autorizado.');
        }

        $request->validate([
            'estado_validacion' => 'required|in:PENDIENTE,ACEPTADA,RECHAZADA,AUTOMATICO',
        ]);

        $solicitud = MetroDatosPersonalesActual::findOrFail($id);

        if ($request->estado_validacion === 'AUTOMATICO') {
            $solicitud->decision_manual = false;
            $solicitud->estado_validacion = $this->calcularEstadoAutomatico($solicitud);
            $mensaje = "Decisión restablecida a cálculo automático: Solicitud {$solicitud->estado_validacion}.";
        } else {
            $solicitud->decision_manual = true;
            $solicitud->estado_validacion = $request->estado_validacion;
            $mensaje = "Decisión manual guardada con éxito: Solicitud {$request->estado_validacion}.";
        }

        if ($solicitud->estado_validacion === 'ACEPTADA') {
            $solicitud->estado = 3;
        } elseif ($solicitud->estado_validacion === 'RECHAZADA') {
            $solicitud->estado = 4;
        } elseif ($solicitud->estado_validacion === 'PENDIENTE') {
            $solicitud->estado = 2;
        }
        $solicitud->save();

        return redirect()->back()->with('success', $mensaje);
    }

    public function finalizarRevision(Request $request, $id)
    {
        if (!session('cedula_usuario') || !session('es_admin')) {
            return response()->json(['error' => 'No autorizado'], 403);
        }

        $solicitud = MetroDatosPersonalesActual::findOrFail($id);

        // Si no es manual, aseguramos cálculo automático actualizado
        if (!$solicitud->decision_manual) {
            $solicitud->estado_validacion = $this->calcularEstadoAutomatico($solicitud);
            if ($solicitud->estado_validacion === 'ACEPTADA') {
                $solicitud->estado = 3;
            } elseif ($solicitud->estado_validacion === 'RECHAZADA') {
                $solicitud->estado = 4;
            } elseif ($solicitud->estado_validacion === 'PENDIENTE') {
                $solicitud->estado = 2;
            }
            $solicitud->save();
        }

        return response()->json([
            'success' => true,
            'mensaje' => 'Revisión finalizada correctamente.',
            'estado_validacion' => $solicitud->estado_validacion,
            'decision_manual' => (bool)$solicitud->decision_manual,
            'todos_revisados' => $this->sonTodosRevisados($solicitud),
        ]);
    }

    private function calcularEstadoAutomatico($solicitud): string
    {
        $estados = [
            $solicitud->estado_archivo_identidad,
            $solicitud->estado_archivo_servicios,
            $solicitud->estado_archivo_civica,
        ];

        // Solo cuenta si el archivo de discapacidad existe
        if (!empty($solicitud->archivo_certificado_discapacidad)) {
            $estados[] = $solicitud->estado_archivo_discapacidad;
        }

        // Si alguno es RECHAZADO -> RECHAZADA
        if (in_array('RECHAZADO', $estados, true)) {
            return 'RECHAZADA';
        }

        // Si todos los aplicables son ACEPTADO -> ACEPTADA
        $todosAceptados = true;
        foreach ($estados as $est) {
            if ($est !== 'ACEPTADO') {
                $todosAceptados = false;
                break;
            }
        }

        if ($todosAceptados) {
            return 'ACEPTADA';
        }

        // Si falta alguno por revisar (null o pendiente) -> PENDIENTE
        return 'PENDIENTE';
    }

    private function sonTodosRevisados($solicitud): bool
    {
        $estados = [
            $solicitud->estado_archivo_identidad,
            $solicitud->estado_archivo_servicios,
            $solicitud->estado_archivo_civica,
        ];

        if (!empty($solicitud->archivo_certificado_discapacidad)) {
            $estados[] = $solicitud->estado_archivo_discapacidad;
        }

        foreach ($estados as $est) {
            if ($est === null || $est === '') {
                return false;
            }
        }

        return true;
    }

    public function cambiarEstado(Request $request, $id)
    {
        if (!session('cedula_usuario') || !session('es_admin')) {
            return redirect()->route('metro.inicio')->with('error', 'No tienes permisos para realizar esta acción.');
        }

        $request->validate([
            'estado' => 'required|in:0,1,2,3,4',
        ]);

        $solicitud = MetroDatosPersonalesActual::findOrFail($id);
        $solicitud->estado = (int)$request->estado;
        $solicitud->save();

        $estadosNombres = [
            1 => 'Radicado / En proceso',
            2 => 'En revisión',
            3 => 'Aprobado',
            4 => 'Rechazado',
            0 => 'Anulado',
        ];
        $nombreEstado = $estadosNombres[$solicitud->estado] ?? 'Actualizado';

        return redirect()->back()->with('success', "Estado de la solicitud #{$solicitud->id} (Doc: {$solicitud->documento}) actualizado a \"{$nombreEstado}\".");
    }
}
