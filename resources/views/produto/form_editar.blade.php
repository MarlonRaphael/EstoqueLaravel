@extends('layouts.principal')

@section('conteudo')
    <h1>Edita produto</h1>

    <form action="{{ action('ProdutoController@altera') }}" method="post" class="form">

        <label for="Nome" class="label">Nome</label>
        <input type="text" name="nome" class="form-control" value="{{ $p->nome }}">

        <label for="Descricao">Descrição</label>
        <input type="text" name="descricao" class="form-control" value="{{ $p->descricao }}">

        <label for="Valor">Valor</label>
        <input type="number" name="valor" class="form-control" value="{{ $p->valor }}">

        <label for="Quantidade">Quantidade</label>
        <input type="number" name="quantidade" class="form-control" value="{{ $p->quantidade }}" >

        <div class="form-group mt-3">
            <button type="submit" class="btn btn-primary">Salvar</button>
            <button type="reset" class="btn btn-danger">Limpar</button>
        </div>

        <input type="hidden" name="id" value="{{ $p->id }}">

        <input type="hidden" name="_token" value="{{{csrf_token()}}}">
    </form>
@stop