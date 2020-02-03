@extends('layouts.master')

@section('etablissement')
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
                                        <a class="btn btn-xs btn-success" href="{{ route('etablissements.create') }}"><span class="glyphicon glyphicon-eye-open"></span>Creer etablissement</a>
                                          <br /><br />
                                          <center><label for="inputIsValid" align="center"><strong>PARAMETRE ETABLISSEMENT</strong></label></center>
                                          <!-- DATA TABLE-->
                                          <div class="table-responsive table m-b-40">
                                              <table class="table table-borderless table-striped table-earning" id="example" class="display" data-order='[[ 0, "desc" ]]' data-page-length='100' style="width:100%">
                                                  <thead>
                                                      <tr>
                                                          <th><center>ID</center></th>
                                                          <th><center>ETABLISSEMENT</center></th>
                                                          <th><center>SIGLE</center></th>
                                                          <th><center>TELEPHONE</center></th>
                                                          <th><center>SITE WEB</center></th>
                                                          <th><center>BOITE POSTALE</center></th>
                                                          <th><center>PAYS</center></th>
                                                          <!--th> <center>ACTIONS</center></th-->
                                                      </tr>
                                                  </thead>
                                                  <tbody>
                                                    @foreach ($etablissements as $etablissement)
                                                      <tr>
                                                          <td align="center">{{ $etablissement->id }}</td>
                                                          <td align="center">{{ $etablissement->libelle }}</td>
                                                          <td align="center">{{ $etablissement->sigle }}</td>
                                                          <td align="center">{{ $etablissement->telephone }}</td>
                                                          <td align="center">{{ $etablissement->siteweb }}</td>
                                                          <td align="center">{{ $etablissement->boite_postale }}</td>
                                                          <td align="center">{{ $etablissement->pays }}</td>
                                                          <!--td align="center"><a class="btn btn-xs btn-primary" href="{{ route('etablissements.edit',$etablissement->id) }}"><span class="fas fa-edit"></span></a>
                                                            <form action="{{ route('etablissements.destroy', $etablissement->id) }}" method="post" onsubmit = 'ConfirmDelete()'><button class="btn btn-danger" type="submit">
                                                              <span class="fas fa-archive"></span></button>@csrf @method('DELETE')</form>
                                                        </td-->
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
