<?php

/**
 * Created by PhpStorm.
 * User: Marlon Raphael
 * Date: 12/07/2018
 * Time: 15:19
 */

namespace estoque\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProdutoController extends Controller
{
    public function lista()
    {
        $produtos = DB::select('SELECT * FROM produtos');

        return view('produto.listagem')->withProdutos($produtos);

//        $data = [’produtos’ => $produtos];
//        return view(’listagem’, $data);
//        return view(’listagem’, [’produtos’ => $produtos]);
//        return view('listagem')->with('produtos', $produtos);
    }

    public function mostrar($id)
    {
        //        lista todos os params
//        $input = $request->all();
//        apenas nome e id
//        $input = $request->only('nome', 'id');
//        todos os params, menos o id
//        $input = $request->except('id');

        /**
         * Verifica se um parâmetro existe
         */
//        if ($request->has('id'))
//        {
//            $id = $request->route('id');
//        }else{
//            $id = 0;
//        }

//        $id = $request->route('id');

        /**
         * Select para buscar produto selecionado no banco de dados
         * returns array
         */
        $resposta = DB::select('SELECT * FROM produtos WHERE id = ?', [$id]);

        /**
         * Caso tenha encontrado, retorna a tupla do banco de dados
         */
        if(!empty($resposta))
        {
            return view('produto.detalhes')->with('p', current($resposta));
        }else{
            return "Este produto não existe";
        }
    }

    public function novo()
    {
        return view('produto.formulario');
    }

    public function adiciona(Request $request)
    {
        $dados = $request->all();

        unset($dados['_token']);

        DB::table('produtos')->insert($dados);

        $nome = $request->old('nome');

        return redirect('ProdutoController@lista')
            ->withInput($request->only('nome'));

//        return redirect('/usuarios')
//            ->withInput(Request::except('senha'));
    }

    public function listaJson()
    {
        $produtos = DB::select('SELECT * FROM produtos');

//        return $produtos; Retorno json padrão

//        return response()
//            ->download($caminhoParaUmArquivo);

        //Retorno Json explícito
        return response()->json($produtos);
    }

    //    public function adiciona(Request $request)
//    {
//        $dados = array();
//
//        /**
//         * Captura todos os valores enviados pelo formulário
//         */
////        $all = Request::all();
//        /**
//         * Captura os campos específicos vindos do formulário
//         */
////        $only = Request::only(’nome’, ’valor’, ’...’);
//
//        /**
//         * Capturando dados do formulário manualmente
//         */
//        $nome       = $request->input('nome');
//        $quantidade = (int)$request->input('quantidade');
//        $valor      = $request->input('valor');
//        $descricao  = $request->input('descricao');
//
//        DB::insert('INSERT INTO produtos (nome, quantidade, valor, descricao)
//          VALUES (?,?,?,?)', array($nome, $quantidade, $valor, $descricao));
//
//        return view('produto.adicionado')->with('nome', $nome);
//    }

}