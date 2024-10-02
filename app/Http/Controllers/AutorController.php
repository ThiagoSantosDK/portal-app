<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAutorRequest;
use App\Http\Requests\UpdateAutorRequest;
use App\Models\Autor;

class AutorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $autores = Autor::paginate(25);
        return view('admin.autores.index',compact('autores'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('site.autores.create',compact('autor'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAutorRequest $request)
    {
        //
        Autor::create($request->all());
        return redirect()->away('/autores')->with('sucess','Autor criado com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Autor $autor)
    {
        //
        return view('admin.autores.show',compact('autor'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Autor $autor)
    {
        //
        return view('admin.autores.edit',compact('autor'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAutorRequest $request, Autor $autor)
    {
        //
        $autor->update($request->all());
        return redirect()->away('/autores')->with('Sucess', 'Autor atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Autor $autor)
    {
        //
        $autor->delete();
        return redirect()->away('/autores')-with('Sucess', 'Autor deletado com sucesso');
    }
}
