@extends('layouts.app')

@section('content')

<h2 class="text-center mb-4">SOLICITUD PERFIL ESTUDIANTIL (TIQUETE METRO)</h2>

<div class="card mb-4">
    <div class="card-body">
        <p>Si cumples con estos requisitos puedes aplicar al beneficio:</p>
        <ul>
            <li>Si eres beneficiario de Sapiencia, ya sea por medio de Fondos en programas de pregrado o posgrado, o a través de la Matrícula Cero, tienes la posibilidad de acceder al perfil preferencial estudiantil en tu tarjeta cívica del Metro de Medellín.</li>
            <li>Residir en viviendas de estratos 1, 2 y 3.</li>
            <li>Tener entre 10 y hasta 28 años en el momento de la inscripción, o ser una persona con discapacidad.</li>
        </ul>

        <p>Es importante aclarar que, dentro de los medios de transporte que cubre este beneficio, se encuentran todos aquellos en los cuales se hace uso de la tarjeta cívica de los vehículos del sistema de Transporte masivo, de la Empresa Metro de Medellín Ltda:</p>
        <ul>
            <li>Metro</li>
            <li>Metro Cable</li>
            <li>MetroPlus</li>
            <li>Rutas Alimentadoras</li>
            <li>Tranvía</li>
        </ul>
        <p>Se exceptúan las rutas integradas, las cuales hacen un recorrido desde los barrios hasta las estaciones de la red Metro. No aplican dado que éstos pertenecen a empresas privadas que prestan el servicio de articulación a la red del sistema Metro.</p>

        <p class="fst-italic small">Nota: Sapiencia solo hace el reporte de la presente solicitud a la SECRETARIA DE EDUCACIÓN DEL DISTRITO ESPECIAL DE CIENCIA, TECNOLOGÍA E INNOVACIÓN DE MEDELLÍN y posteriormente son ellos quienes hacen la validación final de requisitos y reportan oficialmente al METRO. CIRCULAR NÚMERO 202460000077 DE 02/04/2024</p>

        <h5>Formulario de solicitud</h5>
        <p>Es indispensable para la solicitud del beneficio diligenciar completamente este formulario.</p>
    </div>
</div>

@if (session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

@if ($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('metro.store') }}" method="POST" enctype="multipart/form-data" id="formularioMetro">
    @csrf
    <input type="hidden" name="periodo" value="17">

    <div class="mb-3">
        <label class="form-label">¿Por qué vas a diligenciar el formulario?</label>
        <select name="motivo" class="form-select" required>
            <option value="">Seleccionar</option>
            @foreach ($motivos as $motivo)
                <option value="{{ $motivo->id }}" {{ old('motivo') == $motivo->id ? 'selected' : '' }}>{{ $motivo->descripcion }}</option>
            @endforeach
        </select>
    </div>

    <div class="row mb-3">
        <div class="col-md-4">
            <label class="form-label">Tipo de documento</label>
            <select name="tipo_documento" class="form-select" required>
                <option value="">Seleccionar</option>
                @foreach ($tiposDocumento as $td)
                    <option value="{{ $td->id }}" {{ old('tipo_documento') == $td->id ? 'selected' : '' }}>{{ $td->descripcion }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-md-8">
            <label class="form-label">Número de documento de identidad</label>
            <input type="text" name="documento" class="form-control" value="{{ old('documento') }}" required>
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-md-3">
            <label class="form-label">Primer nombre</label>
            <input type="text" name="primer_nombre" class="form-control" value="{{ old('primer_nombre') }}" required>
        </div>
        <div class="col-md-3">
            <label class="form-label">Segundo nombre</label>
            <input type="text" name="segundo_nombre" class="form-control" value="{{ old('segundo_nombre') }}">
        </div>
        <div class="col-md-3">
            <label class="form-label">Primer apellido</label>
            <input type="text" name="primer_apellido" class="form-control" value="{{ old('primer_apellido') }}" required>
        </div>
        <div class="col-md-3">
            <label class="form-label">Segundo apellido</label>
            <input type="text" name="segundo_apellido" class="form-control" value="{{ old('segundo_apellido') }}">
        </div>
    </div>

    <div class="mb-3">
        <label class="form-label">NOMBRES Y APELLIDOS (como esta marcada la CÍVICA)</label>
        <input type="text" name="nombre_civica" class="form-control" value="{{ old('nombre_civica') }}">
    </div>

    <div class="row mb-3">
        <div class="col-md-6">
            <label class="form-label">Género</label>
            <select name="genero" id="genero" class="form-select" required>
                <option value="">Seleccionar</option>
                @foreach ($generos as $g)
                    <option value="{{ $g->id }}" data-desc="{{ strtoupper($g->descripcion) }}" {{ old('genero') == $g->id ? 'selected' : '' }}>{{ $g->descripcion }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-md-6" id="cual_genero_wrapper" style="display:none;">
            <label class="form-label">¿Cuál?</label>
            <input type="text" name="cual_genero" id="cual_genero" class="form-control" value="{{ old('cual_genero') }}">
        </div>
    </div>

    <h6 class="mt-4">Dirección de residencia</h6>
    <div class="row mb-3">
        <div class="col-md-4">
            <label class="form-label">Vía principal</label>
            <select name="dirCampo1" class="form-select">
                <option value="">Seleccione</option>
                @foreach ($tiposVia as $tv)
                    <option value="{{ $tv->id }}" {{ old('dirCampo1') == $tv->id ? 'selected' : '' }}>{{ $tv->descripcion }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-md-4">
            <label class="form-label">Número</label>
            <input type="text" name="dirCampo2" class="form-control" value="{{ old('dirCampo2') }}">
        </div>
        <div class="col-md-4">
            <label class="form-label">Prefijo</label>
            <input type="text" name="dirCampo3" class="form-control" value="{{ old('dirCampo3') }}">
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-md-4">
            <label class="form-label">Nombre vía</label>
            <select name="dirCampo4" class="form-select">
                <option value="">Seleccione</option>
                @foreach ($orientaciones as $o)
                    <option value="{{ $o->id }}" {{ old('dirCampo4') == $o->id ? 'selected' : '' }}>{{ $o->descripcion }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-md-4">
            <label class="form-label">Vía secundaria</label>
            <input type="text" name="dirCampo5" class="form-control" value="{{ old('dirCampo5') }}">
        </div>
        <div class="col-md-4">
            <label class="form-label">Prefijo</label>
            <input type="text" name="dirCampo6" class="form-control" value="{{ old('dirCampo6') }}">
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-md-4">
            <label class="form-label">Cuadrante</label>
            <select name="dirCampo7" class="form-select">
                <option value="">Seleccione</option>
                @foreach ($orientaciones as $o)
                    <option value="{{ $o->id }}" {{ old('dirCampo7') == $o->id ? 'selected' : '' }}>{{ $o->descripcion }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-md-4">
            <label class="form-label">Placa</label>
            <input type="text" name="dirCampo8" class="form-control" value="{{ old('dirCampo8') }}">
        </div>
        <div class="col-md-4">
            <label class="form-label">Complemento</label>
            <input type="text" name="dirCampo9" class="form-control" value="{{ old('dirCampo9') }}">
        </div>
    </div>

    <div class="mb-3">
        <label class="form-label">Municipio de residencia</label>
        <select name="municipio" class="form-select" required>
            <option value="">Seleccionar</option>
            @foreach ($municipios as $m)
                <option value="{{ $m->id }}" {{ old('municipio') == $m->id ? 'selected' : '' }}>{{ $m->descripcion }}</option>
            @endforeach
        </select>
    </div>

    <div class="row mb-3">
        <div class="col-md-6">
            <label class="form-label">Fecha de nacimiento</label>
            <input type="date" name="fecha_nacimiento" id="fecha_nacimiento" class="form-control" value="{{ old('fecha_nacimiento') }}" required>
        </div>
        <div class="col-md-6">
            <label class="form-label">Edad</label>
            <input type="text" name="edad" id="edad" class="form-control" value="{{ old('edad') }}" readonly>
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-md-4">
            <label class="form-label">Estrato socioeconómico</label>
            <select name="estrato" class="form-select" required>
                <option value="">Seleccionar</option>
                @foreach ($estratos as $e)
                    <option value="{{ $e->id }}" {{ old('estrato') == $e->id ? 'selected' : '' }}>{{ $e->descripcion }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-md-4">
            <label class="form-label">Nivel o puntaje del Sisben</label>
            <select name="puntajeSisben" class="form-select">
                <option value="">Seleccionar</option>
                @foreach ($sisbenes as $s)
                    <option value="{{ $s->id }}" {{ old('puntajeSisben') == $s->id ? 'selected' : '' }}>{{ $s->descripcion }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-md-4">
            <label class="form-label">Teléfono Celular</label>
            <input type="text" name="celular" class="form-control" value="{{ old('celular') }}" required>
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-md-6">
            <label class="form-label">Teléfono fijo</label>
            <input type="text" name="telefonoFijo" class="form-control" value="{{ old('telefonoFijo') }}">
        </div>
        <div class="col-md-6">
            <label class="form-label">Correo electrónico</label>
            <input type="email" name="correo" class="form-control" value="{{ old('correo') }}" required>
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-md-4">
            <label class="form-label">Nivel académico</label>
            <select name="nivel_academico" id="nivel_academico" class="form-select" required>
                <option value="">Seleccionar</option>
                @foreach ($nivelesAcademicos as $na)
                    <option value="{{ $na->id }}" data-desc="{{ strtoupper($na->descripcion) }}" {{ old('nivel_academico') == $na->id ? 'selected' : '' }}>{{ $na->descripcion }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-md-4" id="grado_wrapper">
            <label class="form-label">Grado</label>
            <select name="grado" id="grado" class="form-select">
                <option value="">Seleccionar</option>
                @foreach ($grados as $gr)
                    <option value="{{ $gr->id }}" data-nivel="{{ $gr->nivel_academico_id }}" {{ old('grado') == $gr->id ? 'selected' : '' }}>{{ $gr->descripcion }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-md-4" id="semestre_wrapper" style="display:none;">
            <label class="form-label">Semestre</label>
            <input type="number" name="semestre" id="semestre" min="1" max="15" class="form-control" value="{{ old('semestre') }}">
        </div>
    </div>

    <div class="mb-3">
        <label class="form-label">¿Qué beneficio tiene activo con Sapiencia?</label>
        <select name="fondo" class="form-select" required>
            <option value="">Seleccionar</option>
            @foreach ($fondos as $f)
                <option value="{{ $f->id }}" {{ old('fondo') == $f->id ? 'selected' : '' }}>{{ $f->descripcion }}</option>
            @endforeach
        </select>
    </div>

    <div class="row mb-3">
        <div class="col-md-6">
            <label class="form-label">¿Presenta discapacidad?</label>
            <select name="discapacidad" id="discapacidad" class="form-select" required>
                <option value="">Seleccionar</option>
                @foreach ($discapacidades as $d)
                    <option value="{{ $d->id }}" data-desc="{{ strtoupper($d->descripcion) }}" {{ old('discapacidad') == $d->id ? 'selected' : '' }}>{{ $d->descripcion }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-md-6" id="tipo_discapacidad_wrapper" style="display:none;">
            <label class="form-label">Tipo de discapacidad</label>
            <input type="text" name="tipo_discapacidad" id="tipo_discapacidad" class="form-control" value="{{ old('tipo_discapacidad') }}">
        </div>
    </div>

    <div class="mb-3">
        <label class="form-label">Número de cívica personalizada</label>
        <input type="text" name="civica" class="form-control" value="{{ old('civica') }}">
    </div>

    <h6 class="mt-4">Documentos adjuntos</h6>
    <div class="d-flex flex-wrap gap-2 mb-2">
        <button type="button" class="btn btn-outline-success" id="btnModalIdentidad" data-bs-toggle="modal" data-bs-target="#modalIdentidad">Adjuntar copia de documento de identidad</button>
        <button type="button" class="btn btn-outline-success" id="btnModalServicios" data-bs-toggle="modal" data-bs-target="#modalServicios">Copia de servicios públicos domiciliarios</button>
        <button type="button" class="btn btn-outline-success" id="btnModalCivica" data-bs-toggle="modal" data-bs-target="#modalCivica">Copia de Tarjeta Cívica</button>
        <button type="button" class="btn btn-outline-success" id="btnCertificado" data-bs-toggle="modal" data-bs-target="#modalCertificado" style="display:none;">Certificado de discapacidad o historia clínica</button>
    </div>

    <div id="archivos_seleccionados" class="mb-4 small">
        <span class="badge bg-light text-dark border me-2" id="badge_doc" style="display:none;">Documento: <span class="file-name"></span></span>
        <span class="badge bg-light text-dark border me-2" id="badge_serv" style="display:none;">Servicios: <span class="file-name"></span></span>
        <span class="badge bg-light text-dark border me-2" id="badge_civ" style="display:none;">Cívica: <span class="file-name"></span></span>
        <span class="badge bg-light text-dark border me-2" id="badge_disc" style="display:none;">Discapacidad: <span class="file-name"></span></span>
    </div>

    <!-- Inputs file reales ocultos que viajan en el POST del formulario -->
    <input type="file" name="archivo_documento_identidad" id="real_archivo_documento_identidad" class="d-none" accept=".pdf,.jpg,.jpeg">
    <input type="file" name="archivo_servicios_publicos" id="real_archivo_servicios_publicos" class="d-none" accept=".pdf,.jpg,.jpeg">
    <input type="file" name="archivo_tarjeta_civica" id="real_archivo_tarjeta_civica" class="d-none" accept=".pdf,.jpg,.jpeg">
    <input type="file" name="archivo_certificado_discapacidad" id="real_archivo_certificado_discapacidad" class="d-none" accept=".pdf,.jpg,.jpeg">

    <hr class="my-4">

    <p class="small">Es importante señalar que todo estudiante que requiere del PERFIL ESTUDIANTIL (TIQUETE METRO) deberá tener la tarjeta cívica personalizada, ya que es a través de este documento, es asignado el beneficio. En caso que el estudiante realice cambio del tipo o del número de documento de identidad, deberá acercarse a los Puntos de Atención al Cliente -PAC- de La Empresa Metro de Medellín, para solicitar la actualización de su tarjeta cívica. En caso de pérdida o reposición de la tarjeta cívica, el estudiante deberá acercarse a un Punto de Atención al Cliente -PAC- del Metro de Medellín, para reportar su pérdida y realizar el trámite para la expedición de una nueva tarjeta cívica y necesariamente deberá reportar el cambio a Sapiencia, para que, en el siguiente informe, se envíe el reporte actualizado de la información del estudiante beneficiario.</p>

    <p class="small">En observancia de la Ley 1581 de 2012, reglamentada parcialmente por el Decreto 1377 de 2013 y en la Política de uso y tratamiento de datos adoptado por SAPIENCIA, la importancia de la neutralidad de los medios tecnológicos y de comunicación, e interpretando todos estos de manera sistémica e integral en aras de la protección de los derechos y principios que circundan el Habeas Data y el Tratamiento de Datos Personales, se establecen las siguientes condiciones:</p>

    <p class="small fw-bold mb-1">FINALIDAD DEL TRATAMIENTO DE LOS DATOS PERSONALES PARA PERSONA JURÍDICA Y NATURAL:</p>
    <p class="small">
        a) el cumplimiento del lleno de requisitos formales para la suscripción de actas de compromiso y la posterior aplicación de los derechos y obligaciones que surgen entre las partes con ocasión de su suscripción.<br>
        b) el cumplimiento de la Ley de Transparencia y el Derecho de Acceso a la Información Pública Nacional (Ley 1712 del 2014).<br>
        c) La presentación de informes a los organismos de control.<br>
        d) para la entrega de información a entidades cuyo objeto social y/o misional incluya la recolección de datos estadísticos, históricos y científicos.<br>
        e) por solicitud de autoridad judicial. Manifiesto que me informaron que, si soy menor de edad y/o en caso de recolección de mi información sensible, tengo derecho a contestar o no las preguntas que me formulen y a entregar o no los datos solicitados. Entiendo que son datos sensibles aquellos que afectan la intimidad del titular o cuyo uso indebido pueda generar discriminación (información étnica, racial, su orientación política, convicciones religiosas o filosóficas, la pertenencia a sindicatos, organizaciones sociales, de derechos humanos, así como los relativos a la salud, vida sexual y datos biométricos).
    </p>
    <p class="small">Manifiesto que me informaron que los datos sensibles que se recolectarán serán utilizados para las finalidades descritas por la Agencia (Uso, recolección, actualización, transferencia)</p>
    <p class="small fst-italic">Nota: Cualquier uso de la información distinto a lo aquí establecido, no es aceptado ni permitido por SAPIENCIA.</p>

    <p class="small fw-bold mb-1">AVISO DE PRIVACIDAD:</p>
    <p class="small">Para los efectos de esta cláusula y del aviso de privacidad, se consideran datos sensibles aquellos que puedan revelar aspectos como origen racial o étnico, estado de salud presente y futura, información genética, creencias religiosas, filosóficas y morales, afiliación sindical, opiniones políticas, preferencia sexual y todos aquellos datos que puedan afectar la intimidad del titular o cuyo uso indebido pueda generar su discriminación. Respecto a estos SAPIENCIA se obliga al uso adecuado de los mismos en concordancia con la normativa vigente, la buena fe, el orden público y el presente Aviso.</p>

    <p class="small fw-bold mb-1">MECANISMOS PARA LA PROTECCIÓN DE DATOS PERSONALES: ACCESO, RECTIFICACIÓN, CANCELACIÓN U OPOSICIÓN:</p>
    <p class="small">la persona natural o jurídica Titular de Datos Personales puede solicitar a SAPIENCIA en cualquier momento, el acceso, la rectificación, la cancelación u oposición respecto a los datos personales que le conciernen, en este sentido, presentará su solicitud radicándola directamente en la Entidad o ingresando a la página web http://www.sapiencia.gov.co en la opción de Contáctenos o escribiendo al correo electrónico info@sapiencia.gov.co o comunicándose al teléfono en Medellín: (+57 4) 4447947.</p>

    <p class="small fw-bold">PARÁGRAFO: con la suscripción de este formulario se entiende aceptada la finalidad del tratamiento de datos y que conoce los mecanismos para su protección.</p>

    <div class="form-check my-4">
        <input class="form-check-input" type="checkbox" name="acepta" id="acepta" value="1" required {{ old('acepta') ? 'checked' : '' }}>
        <label class="form-check-label" for="acepta">Acepto</label>
    </div>

    <button type="submit" class="btn btn-primary btn-lg">Enviar Solicitud</button>
</form>

<!-- Modal: Documento de identidad -->
<div class="modal fade" id="modalIdentidad" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Adjuntar documento identidad</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <input type="file" id="input_modal_identidad" class="form-control" accept=".pdf,.jpg,.jpeg">
        <small class="text-danger">Solo es permitido los formatos PDF y JPG y un peso máximo de 2 MB</small>
        <div id="error_modal_identidad" class="text-danger mt-1 small" style="display:none;"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" onclick="guardarArchivoModal('input_modal_identidad', 'real_archivo_documento_identidad', 'modalIdentidad', 'btnModalIdentidad', 'badge_doc', 'Documento adjuntado')">Subir archivo</button>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Salir</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal: Servicios públicos -->
<div class="modal fade" id="modalServicios" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Adjuntar copia de servicios públicos</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <input type="file" id="input_modal_servicios" class="form-control" accept=".pdf,.jpg,.jpeg">
        <small class="text-danger">Solo es permitido los formatos PDF y JPG y un peso máximo de 2 MB</small>
        <div id="error_modal_servicios" class="text-danger mt-1 small" style="display:none;"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" onclick="guardarArchivoModal('input_modal_servicios', 'real_archivo_servicios_publicos', 'modalServicios', 'btnModalServicios', 'badge_serv', 'Servicios adjuntado')">Subir archivo</button>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Salir</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal: Tarjeta Cívica -->
<div class="modal fade" id="modalCivica" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Adjuntar copia de Tarjeta Cívica</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <input type="file" id="input_modal_civica" class="form-control" accept=".pdf,.jpg,.jpeg">
        <small class="text-danger">Solo es permitido los formatos PDF y JPG y un peso máximo de 2 MB</small>
        <div id="error_modal_civica" class="text-danger mt-1 small" style="display:none;"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" onclick="guardarArchivoModal('input_modal_civica', 'real_archivo_tarjeta_civica', 'modalCivica', 'btnModalCivica', 'badge_civ', 'Cívica adjuntada')">Subir archivo</button>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Salir</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal: Certificado discapacidad -->
<div class="modal fade" id="modalCertificado" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Adjuntar certificado de discapacidad o historia clínica</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <input type="file" id="input_modal_certificado" class="form-control" accept=".pdf,.jpg,.jpeg">
        <small class="text-danger">Solo es permitido los formatos PDF y JPG y un peso máximo de 2 MB</small>
        <div id="error_modal_certificado" class="text-danger mt-1 small" style="display:none;"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" onclick="guardarArchivoModal('input_modal_certificado', 'real_archivo_certificado_discapacidad', 'modalCertificado', 'btnCertificado', 'badge_disc', 'Certificado adjuntado')">Subir archivo</button>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Salir</button>
      </div>
    </div>
  </div>
</div>

@endsection

@section('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {
    // 1. Cálculo automático de edad según fecha de nacimiento
    const fechaNacInput = document.getElementById('fecha_nacimiento');
    const edadInput = document.getElementById('edad');

    function calcularEdad() {
        if (!fechaNacInput.value) {
            edadInput.value = '';
            return;
        }
        const hoy = new Date();
        const nac = new Date(fechaNacInput.value);
        let edad = hoy.getFullYear() - nac.getFullYear();
        const m = hoy.getMonth() - nac.getMonth();
        if (m < 0 || (m === 0 && hoy.getDate() < nac.getDate())) {
            edad--;
        }
        edadInput.value = edad >= 0 ? edad : 0;
    }

    fechaNacInput.addEventListener('change', calcularEdad);
    if (fechaNacInput.value) {
        calcularEdad();
    }

    // 2. Género: Mostrar "¿Cuál?" si es "OTRO"
    const generoSelect = document.getElementById('genero');
    const cualGeneroWrapper = document.getElementById('cual_genero_wrapper');
    const cualGeneroInput = document.getElementById('cual_genero');

    function toggleGenero() {
        const opt = generoSelect.options[generoSelect.selectedIndex];
        const desc = opt ? (opt.getAttribute('data-desc') || opt.text).toUpperCase() : '';
        if (desc.includes('OTRO')) {
            cualGeneroWrapper.style.display = 'block';
            cualGeneroInput.required = true;
        } else {
            cualGeneroWrapper.style.display = 'none';
            cualGeneroInput.required = false;
        }
    }
    generoSelect.addEventListener('change', toggleGenero);
    toggleGenero();

    // 3. Nivel Académico: Filtrar Grado o Mostrar Semestre si es SUPERIOR
    const nivelSelect = document.getElementById('nivel_academico');
    const gradoWrapper = document.getElementById('grado_wrapper');
    const gradoSelect = document.getElementById('grado');
    const semestreWrapper = document.getElementById('semestre_wrapper');
    const semestreInput = document.getElementById('semestre');

    const todosLosGrados = Array.from(gradoSelect.querySelectorAll('option[data-nivel]'));

    function toggleNivelAcademico() {
        const opt = nivelSelect.options[nivelSelect.selectedIndex];
        const desc = opt ? (opt.getAttribute('data-desc') || opt.text).toUpperCase() : '';
        const nivelId = nivelSelect.value;

        if (desc.includes('SUPERIOR')) {
            // Mostrar semestre y ocultar grado
            gradoWrapper.style.display = 'none';
            gradoSelect.value = '';
            gradoSelect.required = false;

            semestreWrapper.style.display = 'block';
            semestreInput.required = true;
        } else {
            // Mostrar grado y ocultar semestre
            semestreWrapper.style.display = 'none';
            semestreInput.value = '';
            semestreInput.required = false;

            gradoWrapper.style.display = 'block';
            gradoSelect.required = true;

            // Filtrar opciones de grado según el nivel académico seleccionado
            const valorActualGrado = gradoSelect.value;
            gradoSelect.innerHTML = '<option value="">Seleccionar</option>';
            todosLosGrados.forEach(option => {
                if (!nivelId || option.getAttribute('data-nivel') === String(nivelId)) {
                    const clone = option.cloneNode(true);
                    if (clone.value === valorActualGrado) {
                        clone.selected = true;
                    }
                    gradoSelect.appendChild(clone);
                }
            });
        }
    }
    nivelSelect.addEventListener('change', toggleNivelAcademico);
    if (nivelSelect.value) {
        toggleNivelAcademico();
    }

    // 4. Discapacidad: Mostrar "Tipo de discapacidad" y botón de Certificado si es "SI"
    const discSelect = document.getElementById('discapacidad');
    const tipoDiscWrapper = document.getElementById('tipo_discapacidad_wrapper');
    const tipoDiscInput = document.getElementById('tipo_discapacidad');
    const btnCertificado = document.getElementById('btnCertificado');

    function toggleDiscapacidad() {
        const opt = discSelect.options[discSelect.selectedIndex];
        const desc = opt ? (opt.getAttribute('data-desc') || opt.text).toUpperCase().trim() : '';
        if (desc === 'SI') {
            tipoDiscWrapper.style.display = 'block';
            tipoDiscInput.required = true;
            btnCertificado.style.display = 'inline-block';
        } else {
            tipoDiscWrapper.style.display = 'none';
            tipoDiscInput.required = false;
            btnCertificado.style.display = 'none';
        }
    }
    discSelect.addEventListener('change', toggleDiscapacidad);
    toggleDiscapacidad();
});

// 5. Transferencia de archivos desde los Modales a los inputs reales
function guardarArchivoModal(modalInputId, realInputId, modalId, btnId, badgeId, textoExito) {
    const modalInput = document.getElementById(modalInputId);
    const realInput = document.getElementById(realInputId);
    const btn = document.getElementById(btnId);
    const badge = document.getElementById(badgeId);

    if (!modalInput.files || modalInput.files.length === 0) {
        alert('Por favor seleccione un archivo antes de continuar.');
        return;
    }

    const archivo = modalInput.files[0];
    const maxBytes = 2 * 1024 * 1024; // 2 MB
    const extension = archivo.name.split('.').pop().toLowerCase();

    if (!['pdf', 'jpg', 'jpeg'].includes(extension)) {
        alert('Formato inválido. Solo se permite PDF, JPG o JPEG.');
        return;
    }

    if (archivo.size > maxBytes) {
        alert('El archivo supera el tamaño máximo permitido de 2 MB.');
        return;
    }

    // Transferir archivo al input file oculto del formulario usando DataTransfer
    const dt = new DataTransfer();
    dt.items.add(archivo);
    realInput.files = dt.files;

    // Actualizar botón y badge visual
    btn.classList.remove('btn-outline-success');
    btn.classList.add('btn-success');
    btn.innerText = '✓ ' + textoExito;

    if (badge) {
        badge.style.display = 'inline-block';
        const nameSpan = badge.querySelector('.file-name');
        if (nameSpan) nameSpan.innerText = archivo.name;
    }

    // Cerrar modal de Bootstrap
    const modalElement = document.getElementById(modalId);
    const modalInstance = bootstrap.Modal.getInstance(modalElement) || new bootstrap.Modal(modalElement);
    modalInstance.hide();
}
</script>
@endsection
