<?php

namespace App\Http\Controllers;

use App\Models\Contato;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ContatoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contatos = Contato::all();
        return view('contato.index', [
            'contatos' => $contatos
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return response()->view('contato.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $this->validate($request, [
            'nome' => 'required',
            'telefone' => 'required',
            'email' => 'required',
            'cidade' => 'required',
            'estado' => 'required',
            'categoria' => [
                'required',
                Rule::in(['cliente', 'fornecedor', 'funcionário'])
            ]
        ]);

        Contato::create($data);

        return redirect()->route('contato.index')->withInput([
            'success' => 'Recurso criado com sucesso'
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
        $contato = Contato::findOrFail($id);

        return response()->view('contato.edit', [
            'contato' => $contato
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
        $data = $this->validate($request, [
            'nome' => 'required',
            'telefone' => 'required',
            'email' => 'required',
            'cidade' => 'required',
            'estado' => 'required',
            'categoria' => [
                'required',
                Rule::in(['cliente', 'fornecedor', 'funcionário'])
            ]
        ]);

        $contato = Contato::findOrFail($id);
        $updated = $contato->update($data);

        return $updated ? redirect()->route('contato.index')->withInput([
            'success' => 'Recurso atualizado com sucesso'
        ]) : redirect()->route('contato.edit')->withInput([
            'error' => 'Falha na atualização do recurso'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $contato = Contato::findOrFail($id);
        $deleted = $contato->delete();

        $redirectInstance = redirect()->route('contato.index');

        return $deleted ? $redirectInstance->withInput([
            'success' => 'Recurso removido com sucesso'
        ]) : $redirectInstance->withInput([
            'error' => 'Falha na remoção do recurso'
        ]);
    }
}
