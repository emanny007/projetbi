@extends('layouts.master')

@section('liste_contrat')
<!-- MAIN CONTENT-->
<div class="uker">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
          <div class="row m-t-30">
            <div class="col-md-12">


                      <center><strong class="card-title pl-2">GESTION DES CONTRATS DES STAFFS</strong></center>

              <br />  <br />

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

                                          <!-- DATA TABLE-->
                                          <div class="table-responsive table m-b-40">
                                              <table class="table table-borderless table-striped table-earning" id="#example" class="display" data-order='[[ 1, "desc" ]]' data-page-length='50' style="width:100%">
                                                  <thead>
                                                      <tr>
                                                        <th>ID</th>
                                                          <th>NOM</th>
                                                          <th>PRENOM</th>
                                                          <!--th>EMAIL</th-->
                                                          <th>ENTITE</th>
                                                          <th>DEPARTEMENT</th>
                                                          <th>CATEGORIE</th>
                                                          <th>ACTION</th>

                                                      </tr>
                                                  </thead>
                                                  <tbody>
                                                    @foreach ($employes as $employe)
                                                      <tr>
                                                        <td>{{ $employe->id }}</td>
                                                          <td>{{ $employe->nom }}</td>
                                                          <td>{{ $employe->prenom }}</td>
                                                          <!--td>{{ $employe->email }}</td-->
                                                          <td>{{ $employe->entite }}</td>
                                                          <td>{{ $employe->departement }}</td>
                                                          <td>{{ $employe->categorie}}</td>
                                                          <td><a class="btn btn-xs btn-success" href="{{ route('contrats.show',$employe->id) }}"><span class="fas fa-eye"></span></a>&nbsp;
                  <a class="btn btn-xs btn-danger" href="{{ route('contrats.edit',$employe->id) }}"><span class="fas fa-edit"></span></a></td>

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
