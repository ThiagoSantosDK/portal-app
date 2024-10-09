<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTipoPontoTuristicoRequest;
use App\Http\Requests\UpdateTipoPontoTuristicoRequest;
use App\Models\TipoPontoTuristico;

class TipoPontoTuristicoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $tiposPontosTuristicos = TipoPontoTuristico::paginate(25);
        return view('admin.tiposPontosTuristicos.index',compact('tiposPontosTuristicos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.tiposPontosTuristicos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTipoPontoTuristicoRequest $request)
    {
        //
        TipoPontoTuristico::create($request->all());
        return redirect()->away('/tiposPontosTuristicos')->with('sucess','Tipo Ponto Turistico criado com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
        $tipoPontoTuristico = TipoPontoTuristico::find($id);
        return view('admin.tiposPontosTuristicos.show',compact('tipoPontoTuristico'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
        $tipoPontoTuristico = TipoPontoTuristico::find($id);
        return view('admin.tiposPontosTuristicos.edit',compact('tipoPontoTuristico'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTipoPontoTuristicoRequest $request, $id)
    {
        //
        $tipoPontoTuristico = TipoPontoTuristico::find($id);
        $tipoPontoTuristico->update($request->all());
        return redirect()->away('/tiposPontosTuristicos')->with('Sucess', 'Tipo Ponto Turistico atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        $tipoPontoTuristico = TipoPontoTuristico::find($id);
        if ($tipoPontoTuristico->pontosTuristicos()->count() > 0) {
            return redirect()->away('/tiposPontosTuristicos')->with('Error', 'Tipo Ponto Turistico possui dependentes!');
    }
    $tipoPontoTuristico->delete();
    return redirect()->away('/tiposPontosTuristicos')-with('Sucess', 'Tipo Ponto Turistico deletado com sucesso');
    }
}
