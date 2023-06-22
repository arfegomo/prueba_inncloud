<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Documento;
use App\Models\Proceso;
use App\Models\TipoDocumento;
use Illuminate\Support\Facades\DB;

class DocumentoController extends Controller
{

    public function index()
    {
        $documentos = Documento::all();
        return view('documentos.index', compact('documentos'));
    }
}
