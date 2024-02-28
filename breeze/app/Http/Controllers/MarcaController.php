<?php

namespace App\Http\Controllers;

use App\Models\Marca;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class MarcaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() : View
    {
        $marcas = Marca::paginate(5);
        return view('marcas', [ 'marcas'=>$marcas ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() : View
    {
        return \view('marcaCreate');
    }

    private function validarForm( Request $request )
    {
        $request->validate(
        //[ 'campo'=>regla1|regla2 ]
            [ 'mkNombre'=>'required|unique:marcas|min:2|max:30' ],
            [
                'mkNombre.required'=>'El campo "Nombre de la marca" es obligatorio.',
                'mkNombre.unique'=>'No puede haber dos marcas con el mismo nombre.',
                'mkNombre.min'=>'El campo "Nombre de la marca" debe tener al menos 2 caractéres.',
                'mkNombre.max'=>'El campo "Nombre de la marca" debe tener 30 caractéres como máximo.'
            ]
        );
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) : RedirectResponse
    {
        //validación
        $this->validarForm($request);
        $mkNombre = $request->mkNombre;
        try {
            /*$marca = new Marca;
            $marca->mkNombre = $mkNombre;
            $marca->save();*/
            Marca::create(
                [
                    'mkNombre'=>$mkNombre
                ]
            );
            return redirect('/marcas')
                ->with([
                    'mensaje'=>'Marca: '.$mkNombre.' agregada correctamente.',
                    'css'=>'green'
                ]);
        }catch( \Throwable $th ){
            return redirect('/marcas')
                ->with([
                    'mensaje'=>'No se pudo agregar la marca: '.$mkNombre,
                    'css'=>'red'
                ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Marca $marca)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Marca $marca) : View
    {
        //$marca = Marca::find($request->idMarca);
        return view('marcaEdit', [ 'marca'=>$marca ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Marca $marca)
    {
        //validación
        $this->validarForm($request);
        $mkNombre = $request->mkNombre;
        try {
            /*$marca = Marca::find($request->idMarca);
            $marca->mkNombre = $mkNombre;
            $marca->save();*/
            $marca->update(
                [
                    'mkNombre'=>$mkNombre
                ]
            );
            return redirect('/marcas')
                ->with([
                    'mensaje'=>'Marca: '.$mkNombre.' modificada correctamente.',
                    'css'=>'green'
                ]);
        }catch( \Throwable $th ){
            return redirect('/marcas')
                ->with([
                    'mensaje'=>'No se pudo modificar la marca: '.$mkNombre,
                    'css'=>'red'
                ]);
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Marca $marca)
    {
        //
    }
}
