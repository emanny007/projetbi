@extends('layouts.master')

@section('reporting_preview')
  <!-- MAIN CONTENT-->
  <div class="uker">
      <div class="section__content section__content--p30">
          <div class="container-fluid">
            <div class="row m-t-30">
              <div class="col-md-12">


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
                                <th> <center>ACTIONS</center></th>
                            </tr>
                        </thead>
                        <tbody>
                          @foreach ($query as $queries)
                            <tr>
                                <td align="center">{{ $queries->NBRE_EMPLOYE }}</td>
                                

                            </tr>
                          @endforeach

                        </tbody>
                    </table>
                </div>
                <!-- END DATA TABLE-->





          <br />
        </div>
      </div>
    </div>
  </div>
</div>
</div>
@endsection
