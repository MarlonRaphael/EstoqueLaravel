<?php

/**
 * Created by PhpStorm.
 * User: Marlon Raphael
 * Date: 12/07/2018
 * Time: 15:19
 */

namespace estoque\Http\Controllers;

use estoque\Http\Requests\ProdutoRequest;
use estoque\Produto;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    public function __contruct()
    {
        $this->middleware('auth', [
            'only' => ['adiciona', 'remove']
        ]);

//        $this->middleware('nosso-middleware', [
//            'only' => ['adiciona', 'remove']
//        ]);
    }

    public function lista()
    {
        $produtos = Produto::all();

        return view('produto.listagem')->withProdutos($produtos);
    }

    public function mostrar($id)
    {
        $resposta = Produto::find($id);

        /**
         * Caso tenha encontrado, retorna a tupla do banco de dados
         */
        if(!empty($resposta))
        {
            return view('produto.detalhes')->with('p', $resposta);
        }else{
            return "Este produto não existe";
        }
    }

    public function adiciona(ProdutoRequest $request)
    {
        Produto::create($request->all());

        return redirect()
            ->action('ProdutoController@lista')
            ->withInput($request->only('nome'));
    }

    public function editar($id)
    {
        $produto = Produto::find($id);

        if (!empty($produto))
        {
            return view('produto.form_editar')->with('p', $produto);
        }else{
            return "Este produto não existe";
        }

    }

    public function altera(Request $request)
    {
        $params = $request->all();

        $produto = Produto::find($params['id']);

        $produto->update($params);

        return redirect()->action('ProdutoController@lista')
            ->withInput($request->only('nome'));
    }

    public function remove($id)
    {
        $produto = Produto::find($id);

        $produto->delete();

        return redirect()->action('ProdutoController@lista');
    }

    public function listaJson()
    {
        $produtos = Produto::all();

        return response()->json($produtos);
    }

    public function novo()
    {
        return view('produto.formulario');
    }

//    public function adiciona(Request $request)
//    {
//        $params = $request->all();
//
//        $produto = new Produto($params);
//
//        $produto->save();
//
//        return redirect()->action('ProdutoController@lista')
//            ->withInput($request->only('nome'));
//    }

//    public function adiciona(Request $request)
//    {
//        $produto = new Produto();
//
//        $produto->nome      = $request->input('nome');
//        $produto->valor     = $request->input('valor');
//        $produto->descricao = $request->input('descricao');
//        $produto->quantidade= $request->input('quantidade');
//
//        $produto->save();
//
//        return redirect()->action('ProdutoController@lista')
//            ->withInput($request->only('nome'));
//    }

}