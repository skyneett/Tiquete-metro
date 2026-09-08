<?php

namespace App\Models\formulariometro;

use Illuminate\Database\Eloquent\Model;

class MetroDatosPersonalesActual extends Model
{
    protected $table = 'metro_datos_personales_actual';
    public $timestamps = true;

    protected $guarded = [];

    public function tipoDocumento()
    {
        return $this->belongsTo(TipoDocumento::class, 'tipo_documento');
    }

    public function generoRel()
    {
        return $this->belongsTo(Genero::class, 'genero');
    }

    public function municipioRel()
    {
        return $this->belongsTo(Municipio::class, 'municipio');
    }

    public function comunaRel()
    {
        return $this->belongsTo(Comuna::class, 'comuna');
    }

    public function barrioRel()
    {
        return $this->belongsTo(Barrio::class, 'barrio');
    }

    public function estratoRel()
    {
        return $this->belongsTo(Estrato::class, 'estrato');
    }

    public function sisbenRel()
    {
        return $this->belongsTo(Sisben::class, 'puntajeSisben');
    }

    public function discapacidadRel()
    {
        return $this->belongsTo(Sino::class, 'discapacidad');
    }

    public function tipoDiscapacidadRel()
    {
        return $this->belongsTo(TipoDiscapacidad::class, 'tipo_discapacidad');
    }

    public function nivelAcademicoRel()
    {
        return $this->belongsTo(NivelAcademico::class, 'nivel_academico');
    }

    public function gradoRel()
    {
        return $this->belongsTo(Grado::class, 'grado');
    }

    public function fondoRel()
    {
        return $this->belongsTo(Fondo::class, 'fondo');
    }

    public function motivoRel()
    {
        return $this->belongsTo(MotivoDiligenciarFormulario::class, 'motivo');
    }
}
