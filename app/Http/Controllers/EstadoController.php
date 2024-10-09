<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEstadoRequest;
use App\Http\Requests\UpdateEstadoRequest;
use App\Models\Estado;

class EstadoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $estados = Estado::paginate(25);
        return view('admin.estados.index',compact('estados'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.estados.create',compact('estados'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEstadoRequest $request)
    {
        //
        Estado::create($request->all());
        return redirect()->away('/estados')->with('sucess','Estado criado com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
        $estado = Estado::find($id);
        return view('admin.estados.show',compact('estado'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
        $estado = Estado::find($id);
        return view('admin.estados.edit',compact('estado'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEstadoRequest $request, $id)
    {
        //
        $estado = Estado::find($id);
        $estado->update($request->all());
        return redirect()->away('/estados')->with('Sucess', 'Estado atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        $estado = Estado::find($id);
        if ($estado->cidades()->count() > 0) {
            return redirect()->away('/estados')->with('error', 'Estado possui dependentes');
        } 
        $estado->delete();
        return redirect()->away('/estados')-with('Sucess', 'Estado deletado com sucesso');
    }
}
