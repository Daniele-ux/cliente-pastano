@extends('layout')

@section('content')

<style>
    .container {
      max-width: 450px;
    }
    .push-top {
      margin-top: 50px;
    }
</style>

<div class="card push-top">
  <div class="card-header">
    Aggiungi Cliente
  </div>

  <div class="card-body">
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif
      <form method="post" action="{{ route('clientes.store') }}">
          <div class="form-group">
              @csrf
              <label for="nome">Nome</label>
              <input type="text" class="form-control" name="nome"/>
          </div>
          <div class="form-group">
              <label for="indirizzo">Indirizzo</label>
              <input type="text" class="form-control" name="indirizzo"/>
          </div>
          <div class="form-group">
              <label for="citta">Citta</label>
              <input type="text" class="form-control" name="citta"/>
          </div>
          <div class="form-group">
              <label for="cap">CAP</label>
              <input type="text" class="form-control" name="cap"/>
          </div>
          <div class="form-group">
            <label for="numero">Numero</label>
            <input type="text" class="form-control" name="numero"/>
        </div>
        <div class="form-group">
            <label for="partitaIVA">Partita IVA</label>
            <input type="text" class="form-control" name="partitaIVA"/>
        </div>
        <div class="form-group">
            <label for="ragSociale">Ragione Sociale</label>
            <input type="text" class="form-control" name="ragSociale"/>
        </div>
          <button type="submit" class="btn btn-block btn-danger">Crea Cliente</button>
      </form>
  </div>
</div>
@endsection
