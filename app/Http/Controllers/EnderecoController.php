<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEnderecoRequest;
use App\Http\Requests\UpdateEnderecoRequest;
use App\Models\Cidade;
use App\Models\Endereco;

class EnderecoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $enderecos = Endereco::paginate(25);
        return view('admin.enderecos.index',compact('enderecos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $cidades = Cidade::all();
        return view('site.enderecos.create',compact('cidades'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEnderecoRequest $request)
    {
        //
        Endereco::create($request->all());
        return redirect()->away('/enderecos')->with('sucess','Endereco criado com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Endereco $endereco)
    {
        //
        return view('admin.enderecos.show',compact('endereco'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Endereco $endereco)
    {
        //
        $cidades = Cidade::all();
        return view('admin.enderecos.edit',compact('endereco','cidades'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEnderecoRequest $request, Endereco $endereco)
    {
        //
        $endereco->update($request->all());
        return redirect()->away('/enderecos')->with('Sucess', 'Endereco atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Endereco $endereco)
    {
        //
        if ($endereco->negocios()->count() > 0|| $endereco->pontosTuristicos()->count > 0) {
            return redirect()->away('/enderecos')->with('error', 'Endereco possui dependentes');
            }
            $endereco->delete();
            return redirect()->away('/enderecos')-with('Sucess', 'Endereco deletado com sucesso');
    }
}
