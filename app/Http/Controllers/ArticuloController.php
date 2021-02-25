<?php 

namespace App\Http\Controllers;

use App\Models\Articulo;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;

class ArticuloController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $datos['articulos']=Articulo::paginate(1);
        return view('articulo.index',$datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('articulo.create'); // esta dando al contralodar la inf de la vista
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
            'nombre' => 'required|string|max:100',
            'descripcion' => 'required|string|max:100',
            'precio' => 'required|string|max:10',
            'codMarca' => 'required|string|max:100',
            'codCategoria' => 'required|string|max:100',
            'stock' => 'required|integer|max:100',
            'foto' => 'required|max:10000|mimes:jpeg,png,jpg',
            
        ];
        $mensaje=[
            'required'=> 'El :attribute es requerido',
            'descripcion.required' => 'La descripcion es requerido',
            'foto.required'=>'La foto es requerida'
        ];
        $this->validate($request,$campos,$mensaje);

        //$datosArticulo = request()->all();
        $datosArticulo = request()->except('_token');

        if($request->hasFile('foto')){
            $datosArticulo['foto']=$request-> file('foto')->store('uploads','public');
        }
        Articulo::insert($datosArticulo);

        //return response()->json($datosArticulo);
        return redirect('articulo')->with('mensaje','Articulo agregado con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Articulo  $articulo
     * @return \Illuminate\Http\Response
     */
    public function show(Articulo $articulo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Articulo  $articulo
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $articulo=Articulo::findOrFail($id);

        return view('articulo.edit', compact('articulo') );

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Articulo  $articulo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        $campos=[
            'nombre' => 'required|string|max:100',
            'descripcion' => 'required|string|max:100',
            'precio' => 'required|string|max:10',
            'codMarca' => 'required|string|max:100',
            'codCategoria' => 'required|string|max:100',
            'stock' => 'required|integer|max:100',
            
        ];
        $mensaje=[
            'required'=> 'El :attribute es requerido',
            'descripcion.required' => 'La descripcion es requerido',
            //'foto.required'=>'La foto es requerida'
        ];

        if($request->hasFile('foto')){
            $campos=['foto' => 'required|max:10000|mimes:jpeg,png,jpg'];
            $mensaje=['foto.required'=>'La foto es requerida'];
        }    
        $this->validate($request,$campos,$mensaje);

        //
        $datosArticulo = request()->except(['_token','_method']);
        
        if($request->hasFile('foto')){
            $articulo=Articulo::findOrFail($id);
            Storage::delete('public/'.$articulo->foto);
            $datosArticulo['foto']=$request-> file('foto')->store('uploads','public');
        }

        Articulo::where('id','=',$id)->update($datosArticulo);
        $articulo=Articulo::findOrFail($id);
        //return view('articulo.edit', compact('articulo') );
        return redirect('articulo')->with('mensaje','Articulo Modificado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Articulo  $articulo
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $articulo=Articulo::findOrFail($id);
        if(Storage::delete('public/'.$articulo->foto)){
            Articulo::destroy($id);
        }
        
        return redirect('articulo')->with('mensaje','Articulo borrado');
    }
}
