@extends('layouts.principal')

@section('conteudo')

<h1 class="h1 mb-5 mt-5">
    Detalhes do produto: {{ $p->nome }}
</h1>
<ul>
    <li>
        <strong>Valor:</strong> {{ $p->valor }}
    </li>
    <li>
        <strong>Descrição: </strong>{{ $p->descricao }}
    </li>
    <li>
        <strong>Quantidade: </strong>{{ $p->quantidade }}
        {{--or 'nada aqui'--}}
    </li>
</ul>
@stop