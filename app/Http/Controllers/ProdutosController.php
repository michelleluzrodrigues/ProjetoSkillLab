<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Produto;

class ProdutosController extends Controller
{
    protected $respository;


    public function index()
    {

        $search = request('search');
        if ($search) {
            $produtos = Produto::where(
                ['nome', 'like', '%' . $search . '%']
            )->get();
        } else {
            $produtos = Produto::paginate(3);
        }



        return view('home', ['produtos' => $produtos, 'search' => $search]);
    }

    public function busca(Request $request, Produto $respository)
    {

        $buscas = $request->all();

        $produtos = $respository->busca($request->busca);
        return view('home', ['produtos' => $produtos, 'buscas' => $buscas]);

    }

    public function create()
    {
        return view('formCadastro/cadastro');
    }

    public function store(Request $request)
    {
        $produtos = new Produto;
        $produtos->nome = $request->nome;
        $produtos->unidade = $request->unidade;
        $produtos->descricao = $request->descricao;
        $produtos->valor = $request->valor;


        $produtos->save();

        return redirect('/home/cadastro')->with('msg', 'Produto cadastrado com sucesso!');
    }


    public function destroy($id)
    {
        Produto::findOrFail($id)->delete();
        return redirect('/home')->with('msg', 'Produto Deletado com sucesso!');
    }

    public function edit($id)
    {

        $produto = Produto::findOrFail($id);

        return view('formcadastro/editar', ['produto' => $produto]);
    }

    public function update(Request $request, $id)
    {

        $produto = Produto::findOrFail($id);

        $produto->update([
            'nome' => $request->nome,
            'unidade' => $request->unidade,
            'descricao' => $request->descricao,
            'valor' => $request->valor


        ]);
        return redirect('/home/editar/' . $id)->with('msg', 'Produto cadastrado com sucesso!');
    }
}
