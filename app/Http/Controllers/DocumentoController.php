<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Documento;
use App\Models\Proceso;
use App\Models\TipoDocumento;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class DocumentoController extends Controller
{

    public function index()
    {
        $documentos = Documento::all();
        return view('documentos.index', compact('documentos'));
    }

    public function create()
    {
        $procesos = Proceso::pluck('nombre','id')->all();
        $tiposDocumentos = TipoDocumento::pluck('nombre','id')->all();
        return view('documentos.create', compact('procesos','tiposDocumentos'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nombre' => ['required', 'string', 'max:255'],
            'contenido' => ['required', 'string'],
        ]);

        $documento = new Documento();

        $documento->nombre = $request->get('nombre');
        $documento->contenido = $request->get('contenido');
        $documento->proceso_id = $request->get('proceso_id');
        $documento->tipo_documento_id = $request->get('tipo_documento_id');

        //\DB::enableQueryLog();
        
        $codigoDocumento = DB::table('documentos')
            ->where('proceso_id',$request->get('proceso_id'))
            ->where('tipo_documento_id',$request->get('tipo_documento_id'))
            ->max('codigo');
        
        if($codigoDocumento > 0){
            $documento->codigo = $codigoDocumento + 1;
        }else{
            $documento->codigo = 1;
        }
        
        $documento->save();

        return redirect()->route('documentos.index')->with('success', 'Registro grabado correctamente.');
    }
}
