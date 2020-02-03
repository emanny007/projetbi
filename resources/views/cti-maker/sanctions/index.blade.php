@extends('layouts.maker-cti')

@section('index_sanction')

<!-- MAIN CONTENT-->
			<div class="uker">
				<div class="section__content section__content--p30">
					<div class="container-fluid">
						<div class="row">
							<div class="col-md-12">
								<br />
									<!--div class="card-body"-->
										<center>
											<button type="button" class="btn btn-secondary mb-1" data-toggle="modal" data-target="#largeModal">
											GESTION DES SANCTIONS
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
																<th>POSITION EF</th>
																<th>ACTION</th>
                              </tr>
                            </thead>
                                  <tbody>
                                    @foreach ($sanctions as $sanctions)
                                    <tr>
                                      <td>{{ date('Y-m-d H:i:s', strtotime($sanctions->created_at)) }}</td>
                                      <td>{{ $sanctions->prenom }} {{$sanctions->nom }}</td>
                                      <td>{{ $sanctions->type_sanction }}</td>
																			<td>{{ $sanctions->commentaire }}</td>
																			<td align="center"><a class="btn btn-xs btn-primary" href="{{ route('cti.sanctions.edit',$sanctions->employe_id) }}"><span class="fas fa-edit"></span></a></td>
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
