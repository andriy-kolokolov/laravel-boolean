@extends('layouts.base')

@section('contents')
<section>
    <table class="table my-5">
        <thead>
          <tr>
            <th scope="col">Urgente</th>
            <th scope="col">Titolo</th>
            <th scope="col">Data di creazione</th>
            <th scope="col">Data di Scadenza</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <th scope="row">&#10060;</th>
            <td>Andare a scuola</td>
            <td>2023-07-01</td>
            <td>2023-07-01</td>
          </tr>
          <tr>
            <th scope="row">&#9989;</th>
            <td>Fare la spesa per il pranzo con i parenti</td>
            <td>2023-06-25</td>
            <td>2023-07-03</td>
          </tr>
          <tr>
            <th scope="row">&#9989;</th>
            <td>Partita di tennis con colleghi</td>
            <td>2023-06-30</td>
            <td>2023-06-30</td>
          </tr>
          <tr>
            <th scope="row">&#9989;</th>
            <td>Cena da Marco</td>
            <td>2023-07-05</td>
            <td>2023-07-11</td>
          </tr>
        </tbody>
    </table>

    <div class="d-grid gap-2 d-md-block">
        <a href="{{ route('tasks.index') }}" class="btn btn-primary">Guarda la Tua To Do List -></a>
      </div>
</section>
@endsection
