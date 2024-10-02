<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreNegocioRequest;
use App\Http\Requests\UpdateNegocioRequest;
use App\Models\Endereco;
use App\Models\Negocio;
use App\Models\TipoNegocio;

class NegocioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $negocios = Negocio::paginate(25);
        return view('admin.enderecos.index',compact('negocios'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $enderecos = Endereco::all();
        $tiposNegocios = TipoNegocio::all();
        return view('site.negocios.create',compact('enderecos','tiposNegocios'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreNegocioRequest $request)
    {
        //
        Negocio::create($request->all());
        return redirect()->away('/negocios')->with('sucess','Negocio criado com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Negocio $negocio)
    {
        //
        return view('admin.negocios.show',compact('negocio'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Negocio $negocio)
    {
        //
        $enderecos = Endereco::all();
        $tiposNegocios = tipoNegocio::all();
        return view('admin.negocios.edit',compact('negocio','enderecos','tiposNegocios'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateNegocioRequest $request, Negocio $negocio)
    {
        //
        $negocio->update($request->all());
        return redirect()->away('/negocios')->with('Sucess', 'Negocio atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Negocio $negocio)
    {
        //
        $negocio->delete();
        return redirect()->away('/negocios')-with('Sucess', 'Negocio deletado com sucesso');
    }
}
