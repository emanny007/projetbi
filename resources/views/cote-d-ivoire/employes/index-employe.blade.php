@extends('layouts.checker')

@section('index-employe')
<!-- MAIN CONTENT-->
<div class="uker">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
          <div class="row m-t-30">
                                      <div class="col-md-12">

                                    @if(session()->get('success'))
                                    <div class="alert alert-success">
                                      {{ session()->get('success') }}
                                    </div>
                                    @endif

                                    @if(session('error'))
                                    <div class="alert alert-danger">
                                      {{ session()->get('danger') }}
                                    </div>
                                    @endif
                                        <a class="btn btn-xs btn-success" href="{{ route('create-employe') }}"><span class="glyphicon glyphicon-eye-open"></span>Ajouter</a>
                                          <br /><br />
                                          <center><label for="inputIsValid" align="center"><strong>GESTION DES EMPLOYES</strong></label></center>
                                          <!-- DATA TABLE-->
                                          <div class="table-responsive table m-b-40">
                                              <table class="table table-borderless table-striped table-earning" id="example" class="display" data-order='[[ 1, "desc" ]]' data-page-length='50' style="width:100%">
                                                  <thead>
                                                      <tr>
                                                          <th>MATRICULE</th>
                                                          <th>NOM</th>
                                                          <th>PRENOM</th>
                                                          <th>EMAIL</th>
                                                          <th>ENTITE</th>
                                                          <th>ACTIONS</th>
                                                      </tr>
                                                  </thead>
                                                  <tbody>
                                                    @foreach ($employes as $employe)
                                                      <tr>
                                                          <td>{{ $employe->matricule }}</td>
                                                          <td>{{ $employe->nom }}</td>
                                                          <td>{{ $employe->prenom }}</td>
                                                          <td>{{ $employe->email }}</td>
                                                          <td>{{ $employe->entite }}</td>
                                                          <td><a class="btn btn-xs btn-info" href="{{ route('show-employe',$employe->id) }}"><span class="fas fa-eye"></span></a>&nbsp;
                                                            <a class="btn btn-xs btn-primary" href="{{ route('edit-employe',$employe->id) }}"><span class="fas fa-edit"></span></a>
                                                            <!--form action="" method="post">
                                                            <button class="btn btn-danger" type="submit"><span class="fas fa-archive"></span></button>@csrf @method('DELETE')</form-->
                                                        </td>
                                                      </tr>
                                                    @endforeach

                                                  </tbody>
                                              </table>
                                          </div>
                                          <!-- END DATA TABLE-->
                                      </div>
                                  </div>
        </div>
    </div>
</div>


@endsection
