@extends('layouts.master-cg')

@section('index_performances')
<!-- MAIN CONTENT-->

<!-- MAIN CONTENT-->
			<div class="uker">
				<div class="section__content section__content--p30">
					<div class="container-fluid">
						<div class="row">
							<div class="col-md-12"><br />

									<!--div class="card-body"-->
										<center>
											<button type="button" class="btn btn-secondary mb-1" data-toggle="modal" data-target="#largeModal">
											GESTION DE LA PERFORMANCE DES STAFFS
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
                                <th>NOTE MP</th>
                                <th>NOTE MDV MP</th>
																<th>NOTE EF</th>
                                <th>NOTE MDV EF</th>
																<th>POSITION EF</th>
																<th>ACTION</th>
                              </tr>
                            </thead>
                                  <tbody>
                                    @foreach ($performances as $performances)
                                    <tr>
                                      <td>{{ date('d-m-Y', strtotime($performances->created_at)) }}</td>
                                      <td>{{ $performances->prenom }} {{$performances->nom }}</td>
                                      <td>{{ $performances->libelle }}</td>
																			<td>{{ $performances->note_mp }}</td>
                                      <td>{{ $performances->note_mdv_mp }}</td>
																			<td>{{ $performances->note_ef }}</td>
																			<td>{{ $performances->note_mdv }}</td>

																			@if(($performances->position_ef=='TALENT')||($performances->position_ef=='POTENTIEL'))
			                                  <td><span class="badge badge-success"> {{ $performances->position_ef }} </span></td>

			                                @elseif($performances->position_ef=='PILIER +')
																			<td><span class="badge badge-primary"> {{ $performances->position_ef }} </span></td>

																			@elseif($performances->position_ef=='PILIER -')
																			<td><span class="badge badge-info"> {{ $performances->position_ef }} </span></td>

																			@elseif($performances->position_ef=='RESERVE +')
																			<td><span class="badge badge-secondary"> {{ $performances->position_ef }} </span></td>

																			@elseif($performances->position_ef=='RESERVE -')
																			<td><span class="badge badge-warning"> {{ $performances->position_ef }} </span></td>

																			@elseif($performances->position_ef=='FREINS')
																			<td><span class="badge badge-danger"> {{ $performances->position_ef }} </span></td>

																			@else
																				le staff n'est pas encore evaluation ou traitement pas terminer !
																			@endif

																			<td align="center"><a class="btn btn-xs btn-primary" href="{{ route('cg.performances.edit',$performances->employe_id) }}"><span class="fas fa-edit"></span></a></td>
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
