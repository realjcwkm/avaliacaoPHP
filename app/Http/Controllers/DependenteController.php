<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\ModelPessoa;
use App\Models\ModelDependente;
use App\Http\Requests\DependenteRequest;

class DependenteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    private $objPessoa;
    private $objDependente;

    public function __construct()
    {
        $this->objPessoa = new ModelPessoa();
        $this->objDependente = new ModelDependente();
    }

    public function index()
    {
        $dependentes = $this->objDependente->all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cadastrarDependente');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DependenteRequest $request)
    {
        $cad = $this->objDependente->create([
            'nome' => $request->cNome,
            'data_nasc' => $request->cDataNasc
        ]);
        if ($cad) {
            return redirect('cadastrarDependente');
        }//
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $dependentes = $this->objDependente->all()->where(['id_pessoa'=>$id]);

        return view('cadastrarDependente', compact('dependentes'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $del=$this->objDependente->destroy($id);
        if ($del) {
            return redirect('cadastrarDependente');
        }
    }
}
