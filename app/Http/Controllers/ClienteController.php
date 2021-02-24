<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Categoria;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cliente = Cliente::all();
        //$categoria = Cliente::find($cliente)->categorias;

        return view('index', compact('cliente'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $storeData = $request->validate([
            'nome' => 'required|max:255',
            'indirizzo' => 'required|max:255',
            'citta' => 'required|max:255',
            'cap' => 'required|max:255',
            'numero' => 'required|max:255',
            'partitaIVA' => 'required|max:255',
            'ragSociale' => 'required|max:255',
            'fk_categoria' => 'required|numeric',
        ]);
        $cliente = Cliente::create($storeData);

        return redirect('/clientes')->with('Completato', 'Cliente Salvato!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cliente = Cliente::findOrFail($id);
        return view('edit', compact('cliente'));
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
        $updateData = $request->validate([
            'nome' => 'required|max:255',
            'indirizzo' => 'required|max:255',
            'citta' => 'required|max:255',
            'cap' => 'required|max:255',
            'numero' => 'required|max:255',
            'partitaIVA' => 'required|max:255',
            'ragSociale' => 'required|max:255',
            'fk_categoria' => 'required|numeric',
        ]);
        Cliente::whereId($id)->update($updateData);
        return redirect('/clientes')->with('Completato', 'Cliente Aggiornato!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cliente = Cliente::findOrFail($id);
        $cliente->delete();

        return redirect('/clientes')->with('Completato', 'Cliente Rimosso!');
    }
}
