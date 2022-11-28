@extends('admins.dashboard')
@section('content')
<h1>Data</h1>
<form action="/posts" method="post">
    @csrf

<div class="row g-3">
    <div class="col">
      <input type="text" class="form-control" name="name" placeholder="login" aria-label="First name">
    </div>
    <div class="col">
      <input type="text" class="form-control" name="libellle" placeholder="Email" aria-label="Last name">
    </div>
  </div><br>
  <div class="row g-3">
    <div class="col">
        <input type="text" class="form-control" name="entreprise" placeholder="mot de passe" aria-label="Email">
   </div>
    <div class="col">
      <input type="text" class="form-control" name="destinataire" placeholder="password confirm" aria-label="Code">
    </div>
  </div>
  <div class="row mt-2">
    <div class="col-md-8 offset-md-4">
         <button type="submit" class="btn btn-primary" id='submit'>Valider</button>
    </div>

</div>
</form>

@endsection
