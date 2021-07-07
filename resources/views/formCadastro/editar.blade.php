@extends('layouts.main')

@section('title', 'Editando')

@section('content')

<div class="form">
  <main>
    <div class="container-fluid">
      <div class="row">
        @if(session('msg'))
        <p class="alert alert-success col-md-7 offset-md-3" role="alert">{{session('msg')}}</p>
        @endif
      </div>
    </div>
  </main>
  <h3>Editando seu produto</h3>
  <form action="{{route('alterar_produto', ['id' => $produto->id])}}" method="POST">
    @csrf
    <div class="form-group">
      <div class=" col-md-7 offset-md-3">
        <label for="nome">Nome</label>
        <input type="text" class="form-control" id="nome" name="nome" value="{{$produto->nome}}">
      </div>

    </div>
    <div class="form-group">
      <div class=" col-md-7 offset-md-3">
        <label for="unidade">Unidade</label>
        <input type="text" class="form-control" id="unidade" name="unidade" value="{{$produto->unidade}}">
      </div>
    </div>
    <div class="form-group">
      <div class=" col-md-7 offset-md-3">
        <label for="valor">Valor</label>
        <input type="text" class="form-control" id="valor" name="valor" value="{{$produto->valor}}">
      </div>
    </div>
    <div class="form-group">
      <div class=" col-md-7 offset-md-3">
        <label for="descricao">Descrição</label>
        <textarea class="form-control" id="descricao" rows="3" name="descricao" >{{$produto->descricao}}</textarea>
      </div>
    </div>
    <div class=" col-md-7 offset-md-3">
      <button type="submit" class="btn btn-primary">Atualizar</button>
    </div>
  </form>

</div>

@endsection