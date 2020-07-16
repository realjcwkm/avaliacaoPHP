<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PessoaRequest;
use App\Models\ModelPessoa;
use App\Models\ModelDependente;
use SebastianBergmann\Environment\Console;

class PessoaController extends Controller
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
        //Lista todos os usuarios
        // dd($this->objPessoa->all()); 
        // dd($this->objDependente->all()); 
        //dd($this->objDependente->find(1)->relPessoa); 
        // dd($this->objPessoa->find(1)->relDependentes); 
        $pessoas = $this->objPessoa->all();
        return view('listar', compact('pessoas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cadastro');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PessoaRequest $request)
    {
        if ($request->cFoto == null) {
            $request->cFoto = '';
        }
        $cad = $this->objPessoa->create([
            'nome' => $request->cNome,
            'data_nasc' => $request->cDataNasc,
            'email' => $request->cEmail,
            'url_foto' => $request->cFoto
        ]);
        if ($cad) {
            return redirect('pessoas');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pessoa = $this->objPessoa->find($id);
        return view('editarCadastro', compact('pessoa'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pessoa = $this->objPessoa->find($id);
        return view('editarCadastro', compact('pessoa'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PessoaRequest $request, $id)
    {
        if ($request->cFoto == null) {
            $request->cFoto = '';
        }
        $this->objPessoa->where(['id'=>$id])->update([
            'nome' => $request->cNome,
            'data_nasc' => $request->cDataNasc,
            'email' => $request->cEmail,
            'url_foto' => $request->cFoto
        ]);
        return redirect('pessoas');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $del=$this->objPessoa->destroy($id);
        if ($del) {
            return redirect('pessoas');
        }
    }
}
