<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\CidadeRequest;
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
        $action = route('admin.cidades.adicionar');
        return view('admin.cidades.form', compact('action'));
    }

    public function adicionar(CidadeRequest $request) //Alterado o Request para CidadeRequest por causa do Requests
    {
        //pegar o dado enviado pelo form
        /*$nome = $request->nome;
        echo $nome;*/

        //Primeira Maneira - criar um objeto do modelo (classe) Cidade - Neste caso informamos campo a campo.
        /*$cidade = new Cidade();
        $cidade->nome = $request->nome;
        $cidade->save(); //Salva no banco de dados
        return redirect()->route('admin.cidades.listar');*/


       /* Comentado pois a validação passou para o Requests - O controlador fica mais limpo
       Validar os dados antes de gravar - no caso de cidades os nomes não se
       repetem com a unique, bail se ocorre qualquer um dos erros ele para e não executa os outros

       $request->validate([
            'nome' => 'bail|required|min:3|max:100|unique:cidades'
        ]);*/

        //Segunda Maneira - No Model, atribuimos o fillable para atribuição em
        //massa que queremos salvar assim não precisamos repetir os campos um por um (mais Seguro)

        Cidade::create($request->all());
        $request->session()->flash('sucesso', "Cidade $request->nome incluída com sucesso!");
        return redirect()->route('admin.cidades.listar');

    }

    public function deletar($id, Request $request)
    {
        Cidade::destroy($id);

        $request->session()->flash('sucesso', "Cidade excluída com sucesso!");

        return redirect()->route('admin.cidades.listar');
    }

    public function formEditar($id)
    {
        //Utilizar o mesmo form de cadastro para edição
        $cidade = Cidade::find($id); // recebo do banco de dados através da requisição
        $action = route('admin.cidades.editar', $cidade->id);
        return view('admin.cidades.form', compact('cidade', 'action'));

    }

    public function editar(CidadeRequest $request, $id)
    {
        $cidade = Cidade::find($id); // recebo do banco de dados através da requisição
        /*$cidade->nome = $request->nome;
        $cidade->save();*/
        $cidade->update($request->all()); //Utilizando o mass assignment do fillable ( todos os campos devem ser preenchidos no fillable)
        $request->session()->flash('sucesso', "Cidade $request->nome alterada com sucesso!");
        return redirect()->route('admin.cidades.listar');
    }

}
