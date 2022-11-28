@extends('admins.dashboard')

@section('content')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
{{-- @foreach ($files as $file)
    <form action="/posts/import" method="post">
        @csrf
        <input type="text" name="file_path" hidden value="{{ $file['documents'] }}">
        <button class="btn btn-warning">{{  $file['documentName']  }}</button>
        </form>
    @endforeach
    --}}

<div class="col-md-12 text-center">
    <form class="row g-3" action="{{ route('import_file') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="results">
            @if(Session::get('success'))
            <div class="alert alert-success">
                {{ Session::get('success') }}
            </div>
            @endif

            @if(Session::get('fail'))
            <div class="alert alert-danger">
                {{ Session::get('fail') }}
            </div>
            @endif
        </div>

        <div class="row g-3">
            <div class="col">
                <label class="visually-hidden">Excel</label>
                <input type="file" class="form-control" name="file" >
            </div>
            <div class="col">
                <input type="text" class="form-control" name="description" placeholder="Description du fichier" aria-label="Description du fichier">
            </div>
        </div>
        <div class="col-auto ">
          <button type="submit" class="btn btn-primary mb-2 ">Insérer le fichier</button>
        </div>

        @error('excel_file')
       <span class="text-danger">{{ $message }}</span>
       @enderror
      </form>
</div>



<div class="d-grid gap-2 d-md-flex justify-content-md-end">
    <button type="button" class="btn btn-primary  mb-6" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo">Filtrer</button>
</div>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Filtrer ici </h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <form action="#" method="get">
            @csrf
            <!-- The start date field -->
            <div class="col-sm-12 ml-auto">
                <label for="">Nom du document</label>
                    <input class="form-control" type="text" name="documentName" />
                    {{-- <label class="col-md-4 col-form-label" for="">Date d'importation </label>
                    <input class="form-control" type="date" name="dateImport" placeholder="Date" />
                    <label class="col-md-4 col-form-label" for="">Description </label>
                    <input class="form-control" type="text" name="description" placeholder="description" /> --}}
            </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Rechercher</button>
          </div>
        </form>
        </div>
      </div>
    </div>
                         {{-- Filtre --}}
                         <div class="row">

                            <div class="table-responsive table table-striped table-hover">
                                <table id="table_id" class="display nowrap dataTable dtr-inline collapsed table table-bordered" style="width: 100%;" aria-describedby="example_info">
                                    <thead>

                                      <tr>
                                        <th scope="col">Nom du document</th>
                                        <th scope="col">Voir</th>
                                        <th scope="col">Télécharger</th>
                                      </tr>
                                    </thead>
                                    <tbody>

                                    @if(count($files))
                                    @foreach ($files as $file)
                                    <tr>
                                    <td>{{ $file['documentName'] }}</td>

                                    <form action="/posts/import" method="post">
                                        @csrf
                                        <input type="text" name="file_path" hidden value="{{ $file['documents'] }}">
                                        <td><button class="btn btn-warning">download</button></td>
                                        <td>voir</td>
                                    </form>




                                    </tr>
                                    @endforeach
                                        @else
                                            <tr>
                                                <td colspan="3">Aucune donnée trouvée</td>

                                            </tr>
                                    @endif
                                    </tbody>
                                  </table>
                            </div>
                        </div>
@endsection
