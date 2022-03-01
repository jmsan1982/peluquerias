<?php

namespace App\Http\Controllers;

use App\Models\Firma;
use App\Models\Peluqueria;
use App\Models\Producto;
use Illuminate\Http\Request;

class ProductosController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $peluquerias = Peluqueria::all();
        $firmas = Firma::all();

        return view('productos.create_edit_producto', [
            'peluquerias' => $peluquerias,
            'firmas' => $firmas
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = $this->validate($request,[
            'nombre_producto' => ['required', 'string', 'max:255'],
            'descripcion' => ['required', 'string', 'max:255'],
            'precio' => ['required', 'integer']
            /*'telefono' => ['required'],
            'observaciones' => ['string'],
            'numero_visitas' => ['integer'],
            'total_vendido' => ['integer'],
            'total_cobrado' => ['integer']*/
        ]);

        $producto = new Producto();

        $producto->id_peluqueria = $request->input('peluqueria');
        $producto->id_firma = $request->input('firma');
        $producto->nombre = $request->input('nombre_producto');
        $producto->descripcion = $request->input('descripcion');
        $producto->precio = $request->input('precio');
        /* $producto->observaciones = $request->input('observaciones');
         $producto->n_visitas = $request->input('numero_visitas');
         $producto->total_vendido = $request->input('total_vendido');
         $producto->total_cobrado = $request->input('total_cobrado');*/

        $producto->save();

        return redirect()->back()->with([
            'message' => 'Producto añadido correctamente'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $producto = Producto::find($id);

        return view('productos.profilepr', [
           'producto' => $producto
        ]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $producto = Producto::find($id);

        $productos = Peluqueria::all();

        $firmas = Firma::all();

        return view('productos.create_edit_producto', [
            'producto' => $producto,
            'peluquerias' => $productos,
            'firmas' => $firmas
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validate = $this->validate($request,[
            'nombre_producto' => ['required', 'string', 'max:255'],
            'descripcion' => ['required', 'string', 'max:255'],
            'precio' => ['required', 'integer']
            /*'telefono' => ['required'],
            'observaciones' => ['string'],
            'numero_visitas' => ['integer'],
            'total_vendido' => ['integer'],
            'total_cobrado' => ['integer']*/
        ]);

        $producto = Producto::find($id);

        $producto->id_peluqueria = $request->input('peluqueria');
        $producto->id_firma = $request->input('firma');
        $producto->nombre = $request->input('nombre_producto');
        $producto->descripcion = $request->input('descripcion');
        $producto->precio = $request->input('precio');
       /* $producto->observaciones = $request->input('observaciones');
        $producto->n_visitas = $request->input('numero_visitas');
        $producto->total_vendido = $request->input('total_vendido');
        $producto->total_cobrado = $request->input('total_cobrado');*/

        $producto->update();

        return redirect()->back()->with([
        'message' => 'Producto modificado correctamente'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $producto = Producto::find($id);

        $producto->delete();

        $message = array('message' => 'El producto se ha borrado correctamente');

        return redirect()->back()->with($message);
    }
}
