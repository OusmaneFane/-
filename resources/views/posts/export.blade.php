@extends('admins.dashboard')
@section('content')
<table id="table_id" class="display nowrap dataTable dtr-inline collapsed table table-bordered" style="width: 100%;" aria-describedby="example_info">
    <thead>
      <tr>
          <th>Nom</th>
          <th> Libelle</th>
          <th> Entreprise</th>
          <th>Destinataire</th>
      </tr>
    </thead>
    <tbody>

     @foreach ($datas as $dat)


          <tr class="foobar">
            

            <td>{{  $dat->name  }}</td>
            <td>{{ $dat->libellle }}</td>
            <td>{{ $dat->entreprise }}</td>
            <td>{{ $dat->destinataire }}</td>
        
          </tr>

      @endforeach

    </tbody>
  </table>
</div>
</div>
</div>
@endsection