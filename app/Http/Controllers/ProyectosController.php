<?php

namespace App\Http\Controllers;

use App\Models\Proyectos;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use PDF;




class ProyectosController extends Controller
{

    public function getPDF()
    {
        $datos['proyectos'] = Proyectos::paginate();
        $pdf = PDF::loadView("PDF_Example", $datos);
        return $pdf->download('Proyectos.pdf');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $datos['proyectos'] = Proyectos::paginate(5);
        return view('proyecto.index',$datos);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('proyecto.create');
    }

        /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $datos = [
            'NombreProyecto'    =>'required|string|max:100',
            'FuenteFondos'      =>'required|string|max:50',
            'MontoPlanificado'  =>'required|numeric|min:1|max:999999999',
            'MontoPatrocinado'  =>'required|numeric|min:0|max:999999999',
            'MontoFondosPropios'  =>'required|numeric|min:0|max:999999999'
        ];
        $mensaje=[
                'required'=>'El :attribute es requerido',
                'FuenteFondos.required' => 'La Fuente de Fondos es requerida',
                'MontoPlanificado.required' => 'El Monto Planificado debe ser mayor a $1 y menor a $999,999,999.00',
                'MontoPatrocinado.required' => 'El Monto Patrocinado debe ser mayor o igual a $0 y menor a $999,999,999.00',  
                'MontoFondosPropios.required' => 'El Monto de Fondos Propios debe ser mayor o igual a $0 y menor a $999,999,999.00',  
            ];

        $this->validate($request, $datos, $mensaje);

        $datosProyecto = request()->except('_token');
        Proyectos::insert($datosProyecto);
       return redirect('proyecto')->with('mensaje', 'Proyecto creado satisfactoriamente...');
     

    }

    /**
     * Display the specified resource.
     */
    public function show(Proyectos $proyectos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
        $proyecto=Proyectos::findOrFail($id);
        return view('proyecto.edit', compact('proyecto'));
    
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
        $datos = [
            'NombreProyecto'    =>'required|string|max:100',
            'FuenteFondos'      =>'required|string|max:50',
            'MontoPlanificado'  =>'required|numeric|min:1|max:999999999',
            'MontoPatrocinado'  =>'required|numeric|min:0|max:999999999',
            'MontoFondosPropios'  =>'required|numeric|min:0|max:999999999'
        ];
        $mensaje=[
                'required'=>'El :attribute es requerido',
                'FuenteFondos.required' => 'La Fuente de Fondos es requerida',
                'MontoPlanificado.required' => 'El Monto Planificado debe ser mayor a $1 y menor a $999,999,999.00',
                'MontoPatrocinado.required' => 'El Monto Patrocinado debe ser mayor o igual a $0 y menor a $999,999,999.00',  
                'MontoFondosPropios.required' => 'El Monto de Fondos Propios debe ser mayor o igual a $0 y menor a $999,999,999.00',  
            ];

        $this->validate($request, $datos, $mensaje);

        $datosProyecto = request()->except(['_token','_method']);
        Proyectos::where('id', '=', $id)->update($datosProyecto);

        $proyecto=Proyectos::findOrFail($id);
        return redirect('proyecto')->with('mensaje','Proyecto Modificado');


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        Proyectos::destroy($id);
        return redirect('proyecto')->with('mensaje','Proyecto borrado');
    }
}
