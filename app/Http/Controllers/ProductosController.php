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
            'precio' => ['required'],
            'cantidad' => ['required', 'integer']
        ]);
        if (!is_null($request->input('descuento'))){
            $validateDescuento = $this->validate($request,[
                'descuento' => ['integer'],
            ]);
        }

        $precio =  bcmul($request->input('precio'), $request->input('cantidad'), 2);

        $producto = new Producto();

        $producto->id_peluqueria = $request->input('peluqueria');
        $producto->id_firma = $request->input('firma');
        $producto->nombre = $request->input('nombre_producto');
        $producto->descripcion = $request->input('descripcion');
        $producto->precio = $request->input('cantidad') > 0 && $request->input('cantidad') != null ? $precio : 0;
        $producto->descuento = $request->input('descuento');
        $producto->cantidad = $request->input('cantidad');

        $producto->save();

        return redirect()->back()->with([
            'message' => 'Producto a??adido correctamente'
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
        $descuento = false;
        $precioDescontado = $this->restarDescuento($producto->descuento, $producto->precio);

        if (isset($producto->descuento) && !is_null($producto->descuento)){
            $descuento = true;
        }

        return view('productos.profilepr', [
           'producto' => $producto,
            'descuento' => $descuento,
            'precioDescontado' => $precioDescontado
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

        $precio = bcdiv($producto->precio,$producto->cantidad,2);

        $firmas = Firma::all();

        return view('productos.create_edit_producto', [
            'producto' => $producto,
            'peluquerias' => $productos,
            'firmas' => $firmas,
            'precio' => $precio
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
            'precio' => ['required'],
            'cantidad' => ['required', 'integer']
        ]);
        if (!is_null($request->input('descuento'))){
            $validateDescuento = $this->validate($request,[
                'descuento' => ['integer'],
            ]);
        }

        $precio =  bcmul($request->input('precio'), $request->input('cantidad'), 2);

        $producto = Producto::find($id);

        $producto->id_peluqueria = $request->input('peluqueria');
        $producto->id_firma = $request->input('firma');
        $producto->nombre = $request->input('nombre_producto');
        $producto->descripcion = $request->input('descripcion');
        $producto->precio = $request->input('cantidad') > 0 && $request->input('cantidad') != null ? $precio : 0;
        $producto->descuento = $request->input('descuento');
        $producto->cantidad = $request->input('cantidad');

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

    public function restarDescuento($descuento, $precio){
        $decimal = $descuento / 100;
        $descuento = $precio * $decimal;
        $totalDescontado = $precio - $descuento;

        return $totalDescontado;
    }
}
