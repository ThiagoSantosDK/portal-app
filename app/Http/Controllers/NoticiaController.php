<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreNoticiaRequest;
use App\Http\Requests\UpdateNoticiaRequest;
use App\Models\Autor;
use App\Models\Caderno;
use App\Models\Noticia;

class NoticiaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //chamar rota index do web.php
        //Vamos transferir a informação para o arquivo index
        $noticias = Noticia::paginate(25);
        return view('admin.noticias.index',compact('noticias'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //carregar tudo o que é necessário para salvar um registro
        $autores = Autor::all();
        $cadernos = Caderno::all();

        return view('site.noticias.create',compact('autores,cadernos'));
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreNoticiaRequest $request)
    {
        //Tratar as regras de salvamento
        Noticia::create($request->all());
        //Redimensionar ou devolver uma mensagem para o cliente
        //return redirect()->route('noticias.index');
        return redirect()->away('/noticias')->with('sucess','Noticia criada com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Noticia $noticia)
    {
        //$id->recebendo via api
        //$noticia = Noticia::find($id);
        //$nome eu quero o primeiro registro
        //$noticia = Noticia::where('nome,$nome')->first();

        return view('admin.noticias.show',compact('noticia'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Noticia $noticia)
    {
        //
        $autores = Autor::all();
        $cadernos = Caderno::all();
        return view('admin.noticias.edit',compact('noticia','autores','cadernos'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateNoticiaRequest $request, Noticia $noticia)
    {
        //
        $noticia->update($request->all());
        return redirect()->away('/noticias')->with('Sucess', 'Noticia atualizada com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Noticia $noticia)
    {
        //if (cadernos->noticias()->count() > 0){
        //return redirect()->away('/noticias)->with('error', 'Caderno possui dependentes');
        //}
        $noticia->delete();
        return redirect()->away('/noticias')-with('Sucess', 'Noticia deletada com sucesso');
    }
}
