<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cidade;

class CidadeController extends Controller
{
    public function cidades()
    {

        $subtitulo = 'Lista de Cidades';
        //$cidades = ['Sao Paulo','Santos'];
        $cidades = Cidade::all();

        //Formas de mostrar na tela os dados do banco antes de mandar pra view
        //01 - dd($cidades);
        //02 -
        //foreach($cidades as $cidade){
        //    echo $cidade->nome;
        //}

        return view('admin.cidades.index', compact('subtitulo', 'cidades'));
    }

    public function formAdicionar()
    {
        return view('admin.cidades.form');
    }

    public function adicionar(Request $request)
    {
        //pegar o dado enviado pelo form
        /*$nome = $request->nome;
        echo $nome;*/

        //Primeira Maneira - criar um objeto do modelo (classe) Cidade - Neste caso informamos campo a campo.
        /*$cidade = new Cidade();
        $cidade->nome = $request->nome;
        $cidade->save(); //Salva no banco de dados
        return redirect()->route('admin.cidades.listar');*/

        //Segunda Maneira - No Model, atribuimos o fillable para atribuição em
        //massa que queremos salvar assim não precisamos repetir os campos um por um (mais Seguro)
        Cidade::create($request->all());
        return redirect()->route('admin.cidades.listar');

    }
}
