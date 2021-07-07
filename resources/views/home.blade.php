@extends('layouts.main')

@section('title', 'Home')

@section('content')


<div class="container">
    <div class=" item1">
        <div class="row   ">
            <div class="col-3 item3 left">
                <div>
                    <a href="/home/cadastro"><button type="button" class="btn btn-success"> cadastro</button></a>

                </div>
            </div>

            <div class="col-8 ">
                <div class="alinha1">
                    <form class="form-inline align-items" action="{{url('/home/busca')}}" method="POST">
                        {{csrf_field()}}
                        <input class="form-control mr-sm-2" type="search" placeholder="Pesquisar" aria-label="Pesquisar" name="busca">
                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Pesquisar</button>
                    </form>
                </div>

            </div>
        </div>
    </div>

    <div class="item2">
        @if(session('msg'))
        <p class="alert alert-danger" role="alert">{{session('msg')}}</p>
        @endif
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Descrição</th>
                    <th scope="col">Unidade</th>
                    <th scope="col">valor</th>

                    <th class="alinhaBotao">

                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($produtos as $produto)
                <tr>
                    <th scope="row">{{ $produto->id }}</th>
                    <td>{{ $produto->nome }}</td>
                    <td>{{ $produto->descricao }}</td>
                    <td>{{ $produto->unidade }}</td>
                    <td>R$ {{ $produto->valor }}</td>

                    <td class="alinhaBotao">

                        <a href="/home/editar/{{$produto->id}}"><button type="submit" class="btn btn-primary">Editar</button></a>


                        <!-- Botão para acionar modal -->
                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#ExemploModalCentralizado">
                            Excluir
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" data-backdrop="static" id="ExemploModalCentralizado" tabindex="-1" role="dialog" aria-labelledby="TituloModalCentralizado" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        Tem certeza que deseja Excluir? </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                                        <form action="/home/{{$produto -> id}}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger delete-btn">Deletar</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    @if(isset($buscas))
    {{ $produtos->appends($buscas)->links('pagination::bootstrap-4' )}}
    @else
    {{ $produtos->links('pagination::bootstrap-4' )}}
    @endif
</div>






@endsection