<?php

namespace App\Http\Controllers;

use App\Models\Maestro;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class MaestroController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $maestros = Maestro::all();
        return view('maestro.index',compact('maestros'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('maestro.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $maestros = new Maestro();

        $request->validate([
            'codigo'=>['required','unique:maestros,codigo','min:10','max:10','numeric','integer'],
            'nombre'=>['required','alpha_num:ascii'],
            'apellidopaterno'=>['required','alpha_num:ascii'],
            'apellidomaterno'=>['required','alpha_num:ascii'],
            'NSS'=>['required','unique:maestros,NSS','min:12','max:12','numeric','integer'],
            'correo'=>['required','unique:maestros,correo','email:rfc,dns']
        ]);

        $maestros->codigo = $request->get('codigo');
        $maestros->nombre = $request->get('nombre');
        $maestros->apellidopaterno = $request->get('apellidopaterno');
        $maestros->apellidomaterno = $request->get('apellidomaterno');
        $maestros->NSS = $request->get('NSS');
        $maestros->correo = $request->get('correo');

        $maestros->save();

        return redirect('/maestros');
    }

    /**
     * Display the specified resource.
     */
    public function show(Maestro $maestro)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Maestro $maestro)
    {
        $maestro = Maestro::find($id);
        return view('maestro.edit',compact('maestro'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Maestro $maestro)
    {

        $maestro = Maestro::find($id);

        $request->validate([
            'codigo'=>['required','unique:maestros,codigo','min:10','max:10','numeric','integer'],
            'nombre'=>['required','alpha_num:ascii'],
            'apellidopaterno'=>['required','alpha_num:ascii'],
            'apellidomaterno'=>['required','alpha_num:ascii'],
            'NSS'=>['required','unique:maestros,NSS','min:12','max:12','numeric','integer'],
            'correo'=>['required',Rule::unique('estudiante','correo')->ignore($id),'email:rfc,dns']
        ]);

        $maestro->codigo = $request->get('codigo');
        $maestro->nombre = $request->get('nombre');
        $maestro->apellidopaterno = $request->get('apellidopaterno');
        $maestro->apellidomaterno = $request->get('apellidomaterno');
        $maestro->NSS = $request->get('NSS');
        $maestro->correo = $request->get('correo');

        $maestro->save();

        return redirect('/maestros');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Maestro $maestro)
    {
        $maestro = Maestro::find($id);
        $maestro->delete();
        return redirect('/maestros');
    }
}
