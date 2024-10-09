<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePontoTuristicoRequest;
use App\Http\Requests\UpdatePontoTuristicoRequest;
use App\Models\Endereco;
use App\Models\PontoTuristico;
use App\Models\TipoPontoTuristico;

class PontoTuristicoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $pontosTuristicos = PontoTuristico::paginate(25);
        return view('admin.pontosTuristicos.index',compact('pontosTuristicos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $enderecos = Endereco::all();
        $tipospontosturisticos = TipoPontoTuristico::all();
        return view('admin.pontosTuristicos.create',compact('enderecos','tipospontosturisticos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePontoTuristicoRequest $request)
    {
        //
        PontoTuristico::create($request->all());
        return redirect()->away('/pontosTuristicos')->with('sucess','Ponto Turistico criado com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
        $pontoTuristico = PontoTuristico::find($id);
        return view('admin.pontosTuristicos.show',compact('pontoTuristico'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
        $pontoTuristico = PontoTuristico::find($id);
        $enderecos = Endereco::all();
        $tipospontosturisticos = TipoPontoTuristico::all();
        return view('admin.pontosTuristicos.edit',compact('pontoTuristico','enderecos','tipospontosturisticos'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePontoTuristicoRequest $request, $id)
    {
        //
        $pontoTuristico = PontoTuristico::find($id);
        $pontoTuristico->update($request->all());
        return redirect()->away('/pontosTuristicos')->with('Sucess', 'Ponto Turistico atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        $pontoTuristico = PontoTuristico::find($id);
        $pontoTuristico->delete();
        return redirect()->away('/pontosTuristicos')->with('Sucess', 'Ponto Turistico deletado com sucesso!');
    }
}
