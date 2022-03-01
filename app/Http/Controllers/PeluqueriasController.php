<?php

namespace App\Http\Controllers;

use App\Models\Municipio;
use App\Models\Peluqueria;
use Illuminate\Http\Request;

class PeluqueriasController extends Controller
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
        $peluquerias = Peluqueria::all();
        $all = true;

        return view('peluquerias.indexp', [
            'peluquerias' => $peluquerias,
            'all' => $all
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $municipios = Municipio::all();

        return view('peluquerias.create_edit_peluqueria', [
            'municipios' => $municipios
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
           'nombre_peluqueria' => ['required', 'string', 'max:255'],
           'nombre_contacto' => ['string', 'max:255'],
           'direccion' => ['string', 'max:255'],
           'telefono' => ['required'],
           'observaciones' => ['string'],
           'numero_visitas' => ['integer'],
           'total_vendido' => ['integer'],
           'total_cobrado' => ['integer']
        ]);

        $peluqueria = new Peluqueria();

        $peluqueria->id_municipio = $request->input('municipio');
        $peluqueria->nombre = $request->input('nombre_peluqueria');
        $peluqueria->contacto = $request->input('nombre_contacto');
        $peluqueria->direccion = $request->input('direccion');
        $peluqueria->telefono = $request->input('telefono');
        $peluqueria->observaciones = $request->input('observaciones');
        $peluqueria->n_visitas = $request->input('numero_visitas');
        $peluqueria->total_vendido = $request->input('total_vendido');
        $peluqueria->total_cobrado = $request->input('total_cobrado');

        $peluqueria->save();

        return redirect()->back()->with([
           'message' => 'Peluqueria añadida correctamente'
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
        $peluqueria = Peluqueria::find($id);

        $pendiente = $peluqueria->total_vendido - $peluqueria->total_cobrado;

        return view('peluquerias.profile', [
            'peluqueria' => $peluqueria,
            'pendiente' => $pendiente
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
        $peluqueria = Peluqueria::find($id);
        $municipios = Municipio::all();

        return view('peluquerias.create_edit_peluqueria', [
           'peluqueria' => $peluqueria ,
           'municipios' => $municipios
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
            'nombre_peluqueria' => ['required', 'string', 'max:255'],
            'nombre_contacto' => ['string', 'max:255'],
            'direccion' => ['string', 'max:255'],
            'telefono' => ['required'],
            'observaciones' => ['string'],
            'numero_visitas' => ['integer'],
            'total_vendido' => ['integer'],
            'total_cobrado' => ['integer']
        ]);

        $peluqueria = Peluqueria::find($id);

        $peluqueria->id_municipio = $request->input('municipio');
        $peluqueria->nombre = $request->input('nombre_peluqueria');
        $peluqueria->contacto = $request->input('nombre_contacto');
        $peluqueria->direccion = $request->input('direccion');
        $peluqueria->telefono = $request->input('telefono');
        $peluqueria->observaciones = $request->input('observaciones');
        $peluqueria->n_visitas = $request->input('numero_visitas');
        $peluqueria->total_vendido = $request->input('total_vendido');
        $peluqueria->total_cobrado = $request->input('total_cobrado');

        $peluqueria->update();

        return redirect()->back()->with([
            'message' => 'Peluqueria modificada correctamente'
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
        $peluqueria = Peluqueria::find($id);

        $peluqueria->delete();

        $message = array('message' => 'La peluqueria se ha borrado correctamente');

        return redirect()->back()->with($message);
    }
}
