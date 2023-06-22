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

    public function edit($id)
    {
        $documento = Documento::find($id);
        $procesos = Proceso::pluck('nombre','id')->all();
        $tiposDocumentos = TipoDocumento::pluck('nombre','id')->all();
        return view('documentos.edit',compact('documento','procesos','tiposDocumentos'));
    }

    public function update(Request $request, $id)
    {   
        $this->validate($request, [
            'nombre' => ['required', 'string', 'max:255'],
            'contenido' => ['required', 'string'],
        ]);
    
        $documento = Documento::find($id);  
        $documento->nombre = $request->get('nombre');
        $documento->contenido = $request->get('contenido');

        //\DB::enableQueryLog();

        $DataDocumento = DB::table('documentos')
            ->where('id',$id)
            ->select('tipo_documento_id','proceso_id')
            ->get();

        foreach($DataDocumento as $item){

            if(($item->tipo_documento_id == $request->get('tipo_documento_id')) && ($item->proceso_id == $request->get('proceso_id'))){
            
                unset($documento->proceso_id);
                unset($documento->tipo_documento_id);   
                unset($documento->codigo);
            
            }else{
                

                $documento->proceso_id = $request->get('proceso_id');
                $documento->tipo_documento_id = $request->get('tipo_documento_id');
                
                $codigoDocumento = DB::table('documentos')
                ->where('proceso_id',$request->get('proceso_id'))
                ->where('tipo_documento_id',$request->get('tipo_documento_id'))
                ->max('codigo');

                if($codigoDocumento > 0){
                    $documento->codigo = $codigoDocumento + 1;
                }else{
                    $documento->codigo = 1;
                }
            }
        }
        
        $documento->save();
        
        return redirect()->route('documentos.index')->with('grabado', 'ok');
    }

    public function destroy($id)
    {
        $documento = Documento::find($id)->delete();

        return redirect()->route('documentos.index')->with('eliminado', 'ok');
    }
}
