@extends('layouts.principal')

@section('conteudo')
<h1 class="mb-5 mt-5">Listagem de produtos</h1>
<table class="table table-striped table-bordered table-hover">
    <thead>
        <th>Nome</th>
        <th>Valor</th>
        <th>Descrição</th>
        <th>Quantidade</th>
        <th></th>
        <th></th>
        <th></th>
    </thead>
        <tbody>
        @if(!empty($produtos))
            @foreach($produtos as $p)
                <tr class="{{ $p->quantidade <= 1 ? 'table-danger' : '' }}">
                    <td>{{ $p->nome }}</td>
                    <td>{{ $p->valor }}</td>
                    <td>{{ $p->descricao }}</td>
                    <td>{{ $p->quantidade }}</td>
                    <td>
                        <a href="{{ action('ProdutoController@mostrar', $p->id ) }}">
                            <i class="fas fa-search fa-lg"></i>
                        </a>
                    </td>
                    <td>
                        <a href="{{ action('ProdutoController@remove', $p->id ) }}">
                            <i class="fas fa-trash-alt fa-lg"></i>
                        </a>
                    </td>
                    <td>
                        <a href="{{ action('ProdutoController@editar', $p->id ) }}">
                            <i class="fas fa-edit fa-lg"></i>
                        </a>
                    </td>
                </tr>
            @endforeach
        @else
            <div class="alert alert-danger">
                Você não tem nenhum produto cadastrado
            </div>
        @endif
    </tbody>
</table>
<h4>
    <span class="badge badge-pill badge-danger">
        Um ou menos itens no estoque
    </span>
</h4>
@if(old('nome'))
<div class="alert alert-success">
    <strong>Sucesso!</strong>
    O produto {{ old('nome') }} foi adicionado com sucesso!
</div>
@endif
@stop