<?php

namespace App\Http\Controllers\formulariometro;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\formulariometro\MotivoDiligenciarFormulario;
use App\Models\formulariometro\TipoDocumento;
use App\Models\formulariometro\Genero;
use App\Models\formulariometro\Municipio;
use App\Models\formulariometro\Estrato;
use App\Models\formulariometro\Sisben;
use App\Models\formulariometro\Discapacidad;
use App\Models\formulariometro\NivelAcademico;
use App\Models\formulariometro\Grado;
use App\Models\formulariometro\Fondo;
use App\Models\formulariometro\TipoVia;
use App\Models\formulariometro\Orientacion;
use App\Models\formulariometro\Sino;
use App\Models\formulariometro\TipoDiscapacidad;
use App\Models\formulariometro\Comuna;
use App\Models\formulariometro\Barrio;
use App\Models\formulariometro\MetroDatosPersonalesActual;

class TiqueteMetroController extends Controller
{
    public function create()
    {
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
            'orientaciones'
        ));
    }

    public function getBarriosPorComuna($comunaId)
    {
        $barrios = Barrio::where('comuna_id', $comunaId)->where('estado', '1')->get(['id', 'descripcion']);
        return response()->json($barrios);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'motivo' => 'required|exists:t1_motivo_diligenciar_formulario,id',
            'tipo_documento' => 'required|exists:t1_tipo_documento,id',
            'documento' => 'required|string|max:20',
            'genero' => 'required|exists:t1_genero,id',
            'cual_genero' => 'nullable|string|max:45',
            'primer_nombre' => 'required|string',
            'segundo_nombre' => 'nullable|string',
            'primer_apellido' => 'required|string',
            'segundo_apellido' => 'nullable|string',
            'civica' => 'nullable|string|max:20',
            'nombre_civica' => 'nullable|string|max:100',
            'fecha_nacimiento' => 'required|date|after_or_equal:' . now()->subYears(100)->format('Y-m-d') . '|before_or_equal:' . now()->subYears(15)->format('Y-m-d'),
            'edad' => 'required|string',

            'dirCampo1' => 'nullable|exists:t1_tipo_via,id',
            'dirCampo2' => 'nullable|string|max:20',
            'dirCampo3' => 'nullable|string|max:20',
            'dirCampo4' => 'nullable|exists:t1_orientacion,id',
            'dirCampo5' => 'nullable|string|max:20',
            'dirCampo6' => 'nullable|string|max:20',
            'dirCampo7' => 'nullable|exists:t1_orientacion,id',
            'dirCampo8' => 'nullable|string|max:20',
            'dirCampo9' => 'nullable|string',

            'municipio' => 'required|exists:t1_municipio,id',
            'comuna' => 'nullable|exists:t1_comuna,id',
            'barrio' => 'nullable|exists:t1_barrio,id',
            'OtroBarrio' => 'nullable|string|max:200',
            'estrato' => 'required|exists:t1_estrato,id',
            'puntajeSisben' => 'nullable|exists:t1_sisben,id',
            'discapacidad' => 'required|exists:t1_sino,id',
            'tipo_discapacidad' => 'nullable|exists:t1_tipo_discapacidad,id',

            'correo' => 'required|email',
            'celular' => 'required|string',
            'telefonoFijo' => 'nullable|string',

            'nivel_academico' => 'required|exists:t1_nivel_academico,id',
            'grado' => 'nullable|exists:t1_grado,id',
            'semestre' => 'nullable|integer',
            'fondo' => 'required|exists:t1_fondo,id',

            'acepta' => 'required',

            'archivo_documento_identidad' => 'nullable|file|mimes:pdf,jpg,jpeg|max:2048',
            'archivo_servicios_publicos' => 'nullable|file|mimes:pdf,jpg,jpeg|max:2048',
            'archivo_tarjeta_civica' => 'nullable|file|mimes:pdf,jpg,jpeg|max:2048',
            'archivo_certificado_discapacidad' => 'nullable|file|mimes:pdf,jpg,jpeg|max:2048',
        ]);

        // Construir dirección completa concatenada (texto legible)
        $direccion = trim(implode(' ', array_filter([
            $request->dirCampo2, $request->dirCampo3, $request->dirCampo5,
            $request->dirCampo6, $request->dirCampo8, $request->dirCampo9,
        ])));

        // Guardar archivos si vienen adjuntos
        $rutaIdentidad = $request->hasFile('archivo_documento_identidad')
            ? $request->file('archivo_documento_identidad')->store('documentos', 'public')
            : null;

        $rutaServicios = $request->hasFile('archivo_servicios_publicos')
            ? $request->file('archivo_servicios_publicos')->store('documentos', 'public')
            : null;

        $rutaCivica = $request->hasFile('archivo_tarjeta_civica')
            ? $request->file('archivo_tarjeta_civica')->store('documentos', 'public')
            : null;

        $rutaCertificado = $request->hasFile('archivo_certificado_discapacidad')
            ? $request->file('archivo_certificado_discapacidad')->store('documentos', 'public')
            : null;

        MetroDatosPersonalesActual::create([
            'periodo' => $request->periodo,
            'motivo' => $request->motivo,
            'tipo_documento' => $request->tipo_documento,
            'documento' => $request->documento,
            'genero' => $request->genero,
            'cual_genero' => $request->cual_genero,
            'primer_nombre' => $request->primer_nombre,
            'segundo_nombre' => $request->segundo_nombre,
            'primer_apellido' => $request->primer_apellido,
            'segundo_apellido' => $request->segundo_apellido,
            'civica' => $request->civica,
            'nombre_civica' => $request->nombre_civica,
            'fecha_nacimiento' => $request->fecha_nacimiento,
            'edad' => $request->edad,

            'dirCampo1' => $request->dirCampo1,
            'dirCampo2' => $request->dirCampo2,
            'dirCampo3' => $request->dirCampo3,
            'dirCampo4' => $request->dirCampo4,
            'dirCampo5' => $request->dirCampo5,
            'dirCampo6' => $request->dirCampo6,
            'dirCampo7' => $request->dirCampo7,
            'dirCampo8' => $request->dirCampo8,
            'dirCampo9' => $request->dirCampo9,
            'direccion' => $direccion,

            'municipio' => $request->municipio,
            'comuna' => $request->comuna,
            'barrio' => $request->barrio,
            'OtroBarrio' => $request->OtroBarrio,
            'estrato' => $request->estrato,
            'puntajeSisben' => $request->puntajeSisben,
            'discapacidad' => $request->discapacidad,
            'tipo_discapacidad' => $request->tipo_discapacidad,

            'correo' => $request->correo,
            'celular' => $request->celular,
            'telefonoFijo' => $request->telefonoFijo,

            'nivel_academico' => $request->nivel_academico,
            'grado' => $request->grado,
            'semestre' => $request->semestre,
            'fondo' => $request->fondo,

            'fecha_registro' => now()->format('Y-m-d H:i:s'),
            'acepta' => $request->acepta,
            'estado' => 1,

            'archivo_documento_identidad' => $rutaIdentidad,
            'archivo_servicios_publicos' => $rutaServicios,
            'archivo_tarjeta_civica' => $rutaCivica,
            'archivo_certificado_discapacidad' => $rutaCertificado,
        ]);

        return redirect()->route('metro.create')->with('success', '¡Solicitud enviada correctamente!');
    }
}
