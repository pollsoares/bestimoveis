<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cidade;

class CidadeController extends Controller
{
    public function cidades(){

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

}
