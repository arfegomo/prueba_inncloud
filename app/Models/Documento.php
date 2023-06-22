<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Documento extends Model
{
    use HasFactory;

    protected $fillable = ["nombre", "codigo", "contenido","tipo_documento_id","proceso_id"];

    public function procesos(){
        return $this->belongsTo(Proceso::class, 'proceso_id', 'id');
    }

    public function tipoDocumentos(){
        return $this->belongsTo(TipoDocumento::class, 'tipo_documento_id', 'id');
    }
}
