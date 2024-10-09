<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCadernoRequest;
use App\Http\Requests\UpdateCadernoRequest;
use App\Models\Caderno;

class CadernoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //carregue os dados do banco
        $cadernos = Caderno::all();
        //Fazer response para o usuário
        return view('admin.cadernos.index',compact('cadernos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //retornar á paginá de criação
        return view('admin.cadernos.create',compact('cadernos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCadernoRequest $request)
    {
        //Debbug
        Caderno::create($request->all());
        return redirect()->away('/cadernos')->with('sucess','Caderno criado com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
        $caderno = Caderno::find($id);
        return view('admin.cadernos.show',compact('caderno'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
        $caderno = Caderno::find($id);
        return view('admin.cadernos.edit',compact('caderno'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCadernoRequest $request, $id)
    {
        //
        $caderno = Caderno::find($id);
        $caderno->update($request->all());
        return redirect()->away('/cadernos')->with('Sucess', 'Caderno atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        $caderno = Caderno::find($id);
        if ($caderno->noticias()->count() > 0) {
            return redirect()->away('/cadernos')->with('Error', 'Caderno possui dependentes!');
        }   
        $caderno->delete();
        return redirect()->away('/cadernos')-with('Sucess', 'Caderno deletado com sucesso');
    }
}
