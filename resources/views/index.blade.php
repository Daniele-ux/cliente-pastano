@extends('layout')

@section('content')

    <style>
        .push-top {
            margin-top: 50px;
        }
    </style>

    <div class="push-top">
        @if(session()->get('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div><br />
        @endif


        <table class="table">
            <thead>
            <tr class="table-warning">
                <td>ID</td>
                <td>Nome</td>
                <td>Indirizzo</td>
                <td>Citta</td>
                <td>CAP</td>
                <td>Numero</td>
                <td>Partita IVA</td>
                <td>Ragione Sociale</td>
                <td>Categoria</td>
                <td class="text-center">Action</td>
            </tr>
            </thead>
            <tbody>



            @foreach($cliente as $clientes)
                <tr>
                    <td>{{$clientes->id}}</td>
                    <td>{{$clientes->nome}}</td>
                    <td>{{$clientes->indirizzo}}</td>
                    <td>{{$clientes->citta}}</td>
                    <td>{{$clientes->cap}}</td>
                    <td>{{$clientes->numero}}</td>
                    <td>{{$clientes->partitaIVA}}</td>
                    <td>{{$clientes->ragSociale}}</td>
                    <td>{{$clientes->fk_categoria->tipo}}</td>

                    <td class="text-center">
                        <a href="{{ route('clientes.edit', $clientes->id)}}" class="btn btn-primary btn-sm">Modifica</a>
                        <form action="{{ route('clientes.destroy', $clientes->id)}}" method="post" style="display: inline-block">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm" type="submit">Elimina</button>
                        </form>
                    </td>
                </tr>
            @endforeach

            <tr>
                <td>
                    <a href="{{ route('clientes.create')}}" class="btn btn-primary btn-sm">Aggiungi CLiente</a>
                </td>
            </tr>

            </tbody>
        </table>
        </div>

@endsection
