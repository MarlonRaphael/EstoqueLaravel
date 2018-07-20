@extends('layouts.principal')

@section('conteudo')

    @if(count($errors) > 0)
    <div class="alert alert-danger mt-5">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <h1 class="h1 my-5">Novo produto</h1>

    <form action="/produtos/adiciona" method="post" class="form">

        <label for="Nome" class="label">Nome</label>
        <input type="text" name="nome" class="form-control" value="{{ old('nome') }}">

        <label for="Descricao">Descrição</label>
        <input type="text" name="descricao" class="form-control" value="{{ old('descricao') }}">

        <label for="Valor">Valor</label>
        <input type="number" name="valor" class="form-control" value="{{ old('valor') }}">

        <label for="Quantidade">Quantidade</label>
        <input type="number" name="quantidade" class="form-control" value="{{ old('quantidade') }}">

        <div class="form-group mt-3">
            <button type="submit" class="btn btn-primary">Cadastrar</button>
            <button type="reset" class="btn btn-danger">Limpar</button>
        </div>

        <input type="hidden" name="_token" value="{{{csrf_token()}}}">
    </form>
@stop