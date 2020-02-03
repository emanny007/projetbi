@extends('layouts.master')

@section('departement')
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
                        <br />
                                        <a class="btn btn-xs btn-success" href="{{ route('departements.create') }}"><span class="glyphicon glyphicon-eye-open"></span>Ajouter Departement</a>
                                          <br /><br />
                                          <center><label for="inputIsValid" align="center"><strong>PARAMETRE DEPARTEMENT</strong></label></center>
                                          <!-- DATA TABLE-->
                                          <div class="table-responsive table m-b-40">
                                              <table class="table table-borderless table-striped table-earning" id="example" class="display" data-page-length='50' style="width:100%">
                                                  <thead>
                                                      <tr>
                                                          <th><center>ID</center></th>
                                                          <th><center>DEPARTEMENTS</center></th>
                                                          <th> <center>ACTIONS</center></th>
                                                      </tr>
                                                  </thead>
                                                  <tbody>
                                                    @foreach ($departements as $departement)
                                                      <tr>
                                                          <td align="center">{{ $departement->id }}</td>
                                                          <td align="center">{{ $departement->libelle }}</td>
                                                          <td align="center"><a class="btn btn-xs btn-primary" href="{{ route('departements.edit',$departement->id) }}"><span class="fas fa-edit"></span></a>
                                                            <form action="{{ route('departements.destroy', $departement->id) }}" method="post"><button class="btn btn-danger" type="submit">
                                                              <span class="fas fa-archive"></span></button>@csrf @method('DELETE')</form>
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
