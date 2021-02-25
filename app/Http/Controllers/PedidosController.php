<?php

namespace App\Http\Controllers;

use App\Models\Pedidos;
use Illuminate\Http\Request;

class PedidosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $datos['pedidos']=Pedidos::paginate(5);
        return view('pedido.index', $datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('pedido.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $campos=[
            'Codigo' => 'required|string|max:100',
            'Fecha_Pedido' => 'required|string|max:100',
            'Entregado' => 'required|string|max:100',
            'PrecioTotal' => 'required|string|max:100',
             
                        
        ];
        $mensaje=[
            'required'=> 'El :attribute es requerido',
            'Fecha_Pedido.required' => 'La Fecha_Pedido es requerido',
            
        ];
        $this->validate($request,$campos,$mensaje);


        //$datosProveedor = request()->all();
        $datosPedido = request()->except('_token');

        Pedidos::insert($datosPedido);

        //return response()->json($datosProveedor);
        return redirect('pedido')->with('mensaje','Pedido agregado con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pedido  $proveedor
     * @return \Illuminate\Http\Response
     */
    public function show(Pedidos $pedidos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pedidos $pedido
     * @return \Illuminate\Http\Response
     */
    public function edit($id) 
    {
        //
        $pedido=Pedidos::findOrFail($id);
        return view('pedido.edit', compact('pedido') );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pedidos $proveedor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
    
        $campos=[
            'Codigo' => 'required|string|max:100',
            'Fecha_Pedido' => 'required|string|max:100',
            'Entregado' => 'required|string|max:100',
            'PrecioTotal' => 'required|string|max:100',
             
                        
        ];
        $mensaje=[
            'required'=> 'El :attribute es requerido',            
        ];
        $this->validate($request,$campos,$mensaje);

        //
        $datosPedido = request()->except(['_token','_method']);
        Pedidos::where('id','=',$id)->update( $datosPedido);

        $proveedor=Pedidos::findOrFail($id);
        //return view('proveedor.edit', compact('pedido') );
        return redirect('pedido')->with('mensaje','Pedido Modificado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Proveedor  $proveedor
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $pedido=Pedidos::findOrFail($id);

        Pedidos::destroy($id);
        return redirect('pedido')->with('mensaje','Pedido Borrado');
    }
}
