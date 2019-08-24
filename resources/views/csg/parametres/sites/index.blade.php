@extends('layouts.master')

@section('site')
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
                                        <a class="btn btn-xs btn-success" href="{{ route('sites.create') }}"><span class="glyphicon glyphicon-eye-open"></span>Ajouter </a>
                                          <br /><br />
                                          <center><label for="inputIsValid" align="center"><strong>PARAMETRE ENTITE</strong></label></center>
                                          <!-- DATA TABLE-->
                                          <div class="table-responsive table m-b-40">
                                              <table class="table table-borderless table-striped table-earning" id="example" class="display" data-page-length='50' style="width:100%">
                                                  <thead>
                                                      <tr>
                                                          <th><center>ID</center></th>
                                                          <th><center>PAYS</center></th>
                                                          <th><center>ENTITE</center></th>
                                                          <th><center>NATIONNALITE</center></th>
                                                          <th><center>DRAPEAU</center></th>
                                                          <!--th> <center>ACTIONS</center></th-->
                                                      </tr>
                                                  </thead>
                                                  <tbody>
                                                    @foreach ($sites as $site)
                                                      <tr>
                                                          <td align="center">{{ $site->id }}</td>
                                                          <td align="center">{{ $site->pays }}</td>
                                                          <td align="center">{{ $site->entite }}</td>
                                                          <td align="center">{{ $site->nationnalite }}</td>
                                                          <td align="center"> <img class="rounded-circle mx-auto d-block" src="/images/drapeau/{{ $site->lien }}" width="50" height="50"></td>
                                                          <!--td align="center"><a class="btn btn-xs btn-primary" href="{{ route('sites.edit',$site->id) }}"><span class="fas fa-edit"></span></a>
                                                            <form action="{{ route('sites.destroy', $site->id) }}" method="post"><button class="btn btn-danger" type="submit">
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
