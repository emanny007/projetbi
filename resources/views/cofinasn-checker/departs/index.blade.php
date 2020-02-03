@extends('layouts.checkersn')

@section('index_depart')

<!-- MAIN CONTENT-->
			<div class="uker">
				<div class="section__content section__content--p30">
					<div class="container-fluid">
						<div class="row">
							<div class="col-md-12"><br />

									<!--div class="card-body"-->
										<center>
											<button type="button" class="btn btn-secondary mb-1" data-toggle="modal" data-target="#largeModal">
											GESTION DES DEPARTS
										</button>
										</center>
                      <br /><br />
                      <!-- DATA TABLE-->
                        <div class="table-responsive table--no-card m-b-30">
                          <table class="table table-borderless table-striped table-earning" id="example" class="display" data-order='[[ 0, "desc" ]]' data-page-length='100' style="width:100%">
                          <thead>
                              <tr>
                                <th>DATE SAISIE</th>
                                <th>STAFF</th>
                                <th>ANNEE</th>
                                <th>DATE DEPART</th>
																<th>STATUT</th>
																<th>ACTION</th>
                              </tr>
                            </thead>
                                  <tbody>
                                    @foreach ($departs as $departs)
                                    <tr>
                                      <td>{{ date('d-m-Y', strtotime($departs->created_at)) }}</td>
                                      <td>{{ $departs->prenom }} {{$departs->nom }}</td>
                                      <td>{{ $departs->date_depart }}</td>
																			<td>{{ $departs->motif }}</td>
                                      <td>{{ $departs->statut }}</td>
																			<td align="center"><a class="btn btn-xs btn-primary" href="{{ route('snck.departs.edit',$departs->employe_id) }}"><span class="fas fa-edit"></span></a></td>
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
