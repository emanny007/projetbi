@extends('layouts.checker')

@section('index_conge')
<!-- MAIN CONTENT-->

<!-- MAIN CONTENT-->
			<div class="uker">
				<div class="section__content section__content--p30">
					<div class="container-fluid">
						<div class="row">
							<div class="col-md-12"><br />

									<!--div class="card-body"-->
										<center><button type="button" class="btn btn-secondary mb-1" data-toggle="modal" data-target="#largeModal">
											GESTION DE CONGE
										</button>
									<!--/center-->
                      <br /><br />
                      <!-- DATA TABLE-->
                        <div class="table-responsive table--no-card m-b-30">
                          <table class="table table-borderless table-striped table-earning"  id="example" class="display" data-order='[[ 1, "desc" ]]' data-page-length='50' style="width:100%">
                          <thead>
                              <tr>
                                <th>DATE DEMANDE</th>
                                <th>STAFF</th>
                                <th>TYPE CONGES</th>
                                <th>DATE DEPART</th>
                                <th>DATE RETOUR</th>
																<th>SEXE</th>
                                <th>DEPARTEMENT</th>
																<th>ACTION</th>
                              </tr>
                            </thead>
                                  <tbody>
                                    @foreach ($conges as $conge)
                                    <tr>
                                      <td>{{ date('d-m-Y', strtotime($conge->date_demande)) }}</td>
                                      <td>{{ $conge->prenom }} {{$conge->nom }}</td>
                                      <td>{{ $conge->type_conge }}</td>
                                      <td>{{ date('d-m-Y', strtotime($conge->date_depart)) }}</td>
                                      <td>{{ date('d-m-Y', strtotime($conge->date_retour)) }}</td>
																			<td>{{ $conge->sexe }}</td>
                                      <td>{{ $conge->departement }}</td>
																			<td align="center"><a class="btn btn-xs btn-primary" href="{{ route('ci.conges.edit',$conge->employe_id) }}"><span class="fas fa-edit"></span></a></td>
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


			<!-- modal large -->
			<div class="modal fade" id="largeModal" tabindex="-1" role="dialog" aria-labelledby="largeModalLabel" aria-hidden="true">
				<div class="modal-dialog modal-lg" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="largeModalLabel">FORMULAIRE DE CONGES</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
              <!--  data du formulaire--------->
              <form enctype="multipart/form-data" class="form-horizontal" method="POST" action="">
              {{ csrf_field() }}
              <!--div class="has-success form-group">
                <label for="inputIsValid" class=" form-control-label">DATE DEMANDE</label>
                <input type="text" id="inputIsValid" name="date_demande"  value="{{ old('date_demande') }}" class="is-valid form-control-success form-control">
              @if($errors->has('date_demande'))
              <p> {{ $errors->first('date_demande') }} </p>
              @endif
            </div-->
              <div class="has-success form-group">
                <label for="inputIsValid" class=" form-control-label">NOM PRENOM </label>
                <input type="text" id="inputIsValid" name="libelle" value="{{ old('libelle') }}" class="is-valid form-control-success form-control">
              </div>
              @if($errors->has('libelle'))
              <p> {{ $errors->first('libelle') }} </p>
              @endif
              <div class="has-success form-group">
                <label for="inputIsValid" class=" form-control-label">TYPE DE CONGE</label>
                <select name="type_conge" id="selectLg" class="form-control-lg is-valid form-control-success form-control">
									<option></option>
									<option value="CONGES ANNUELS">CONGES ANNUELS</option>
									<option value="CONGES MALADIES">CONGES MALADIES</option>
									<option value="CONGES DE MATERNITE">CONGES DE MATERNITE</option>
									<option value="TRAVAIL A DISTANCE">TRAVAIL A DISTANCE</option>
									<option value="AUTRES">AUTRES</option>
                </select>
              </div>
              @if($errors->has('type_conge'))
              <p> {{ $errors->first('type_conge') }} </p>
              @endif
              <div class="has-success form-group">
                 <label for="inputIsValid" class=" form-control-label">DATE DEBUT</label>
                 <input type="date" id="inputIsValid" name="date_depart" value="{{ old('date_depart') }}" class="is-valid form-control-success form-control">
              </div>
              @if($errors->has('date_depart'))
              <p> {{ $errors->first('date_depart') }} </p>
              @endif
              <div class="has-success form-group">
                 <label for="inputIsValid" class=" form-control-label">DATE FIN</label>
                 <input type="date" id="inputIsValid" name="date_retour" value="{{ old('date_retour') }}" class="is-valid form-control-success form-control">
              </div>
              @if($errors->has('date_retour'))
              <p> {{ $errors->first('date_retour') }} </p>
              @endif
              <!--div class="has-success form-group">
                <label for="inputIsValid" class=" form-control-label">SOLDE</label>
                <input type="number" id="inputIsValid" name="solde" value="{{ old('solde') }}" class="is-valid form-control-success form-control">
              </div-->
              @if($errors->has('solde'))
              <p> {{ $errors->first('solde') }} </p>
              @endif
              <div class="has-success form-group">
                <label for="inputIsValid" class=" form-control-label">STATUT</label>
                <input type="email" id="inputIsValid" name="email" value="{{ old('email') }}" class="is-valid form-control-success form-control">
              </div>
              @if($errors->has('email'))
              <p> {{ $errors->first('email') }} </p>
              @endif
              <div class="has-success form-group">
                <label for="inputIsValid" class=" form-control-label">COMMENTAIRE</label>
                <textarea name="commentaire" id="textarea-input" rows="7" class="is-valid form-control-success form-control"></textarea>
              </div>
              @if($errors->has('commentaire'))
              <p> {{ $errors->first('commentaire') }} </p>
              @endif
            <br />
            <div class="modal-footer"> <center>
              <!--a class="btn btn-xs btn-danger" href="">RETOURNER</a>
              <button type="submit"  class="btn btn-success">AJOUTER </button--->
              </center>
            </div>
      </form>

              <!-- FIN FORMULAIRE -->
						</div>
					</div>
				</div>
			</div>
			<!-- end modal large -->




@endsection
