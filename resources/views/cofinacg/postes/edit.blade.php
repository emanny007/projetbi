@extends('layouts.master-cg')

@section('modify_poste')
  <!-- MAIN CONTENT-->
  <div class="uker">
      <div class="section__content section__content--p30">
          <div class="container-fluid">
            <br />
            <div class="col-sm-6 col-lg-12">
              <center>
                <a class="btn btn-xs btn-primary" href="{{ route('cg.main') }}"><span class="fas fa-user"></span> Employes &nbsp;</a>
                <a class="btn btn-xs btn-primary" href="{{ route('cg.show',$employe->id) }}"><span class="fas fa-info"></span> Afficher &nbsp;</a>
                <a class="btn btn-xs btn-primary" href="{{ route('cg.edit',$employe->id) }}"><span class="fas fa-user"></span> Modifier &nbsp;</a>
                <a class="btn btn-xs btn-primary" href="{{ route('cg.contrats.edit',$employe->id) }}"><span class="fas fa-edit"></span> Contrat &nbsp;</a>
                <a class="btn btn-xs btn-primary" href="{{ route('cg.postes.edit',$employe->id) }}"><span class="fas fa-male"></span> Poste &nbsp;</a>
                <a class="btn btn-xs btn-primary" href="{{ route('cg.formations.edit',$employe->id) }}"><span class="fas fa-suitcase"></span> Formation &nbsp;</a>
                <a class="btn btn-xs btn-primary" href="{{ route('cg.experiences.edit',$employe->id) }}"><span class="fas fa-tasks"></span> Experience &nbsp;</a>
                <a class="btn btn-xs btn-primary" href="{{ route('cg.conges.edit',$employe->id) }}"><span class="fas fa-table"></span>Conge &nbsp;</a>
              </center>
          </div>

                        <div class="row well m-t-30">
                              <div class="col-md-12">
                                <div class="card">
                                  <div class="card-header">
                                   <center><strong>Gestion du poste</strong></center>
                                  </div>

                                  <div class="card-body card-block">
                                    <!-- DATA TABLE-->
                                    <div class="table-responsive table m-b-40">
                                        <table class="table table-borderless table-earning">

                                            <tbody>

                                                <tr>
                                                  <td>Matricule:  {{ $employe->matricule }}</td>

                                                    <td>Nom:  {{ $employe->nom }}</td>

                                                    <td>Prenom: {{ $employe->prenom }}</td>

                                                    <td>Departement: {{ $employe->departement }}</td>

                                                    <td>Categorie: {{ $employe->categorie }}</td>

                                                    <td>Secteur: {{ $employe->secteur }}</td>

                                                    <td>Entite: {{ $employe->entite }}</td>

                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                  </div>

            <div class="card">
              <div class="card-header">
               <strong></strong>
              </div>
                    <div class="card-body card-block">
                      <form name="form1" class="form-horizontal" method="POST" action="{{ route('cg.postes.update',$employe->id)}}">
                        {{ csrf_field() }}
                        <div class="row">
                          <div class="col-3 has-success form-group">
                          <label for="inputIsValid" class=" form-control-label">Intitule du poste</label>
                          @if(!empty($poste))
                          <input type="text" id="inputIsValid" name="intitule" value="{{ $poste->intitule }}" class="is-valid form-control-success form-control">
                          <input type="hidden" value="{{ $employe->id }}" name="id_empl"/>
                          @else
                          <input type="text" id="inputIsValid" name="intitule" class="is-valid form-control-success form-control">
                          <input type="hidden" value="{{ $employe->id }}" name="id_empl"/>
                          @endif
                          </div>
                          @if($errors->has('intitule'))
                          <p> {{ $errors->first('intitule') }} </p>
                          @endif

                          <div class="col-3 has-success form-group">
                          <label for="inputIsValid" class=" form-control-label">Grade Local</label>
                          @if(!empty($poste))
                            <input type="text" id="inputIsValid" name="grade_local" value="{{ $poste->grade_local }}" class="is-valid form-control-success form-control">
                          @else
                            <input type="text" id="inputIsValid" name="grade_local" class="is-valid form-control-success form-control">
                          @endif
                          </div>
                          @if($errors->has('grade_local'))
                          <p> {{ $errors->first('grade_local') }} </p>
                          @endif

                            <div class="col-3 has-success form-group">
                            <label for="inputIsValid" class=" form-control-label">Grade Cofina</label>
                            @if(!empty($poste))
                            <input type="text" id="inputIsValid" name="grade_cofina" value="{{ $poste->grade_cofina }}" class="is-valid form-control-success form-control">
                            @else
                            <input type="text" id="inputIsValid" name="grade_cofina" class="is-valid form-control-success form-control">
                            @endif
                            </div>
                            @if($errors->has('grade_cofina'))
                            <p> {{ $errors->first('grade_cofina') }} </p>
                            @endif

                            <div class="col-3 has-success form-group">
                            <label for="inputIsValid" class=" form-control-label">Anciennete</label>
                            <select name="anciennete" id="selectLg" class="is-valid form-control form-control">
                            @if(!empty($poste))
                            <option value="{{ $poste->anciennete }}">{{ $poste->anciennete }}</option>
                            @else
                            <option></option>
                            @endif
                            <option value="1 AN">1 AN</option>
                            <option value="2 ANS">2 ANS</option>
                            <option value="3 ANS">3 ANS</option>
                            <option value="4 ANS">4 ANS</option>
                            <option value="5 ANS">5 ANS</option>
                            <option value="6 ANS">6 ANS</option>
                            <option value="7 ANS">7 ANS</option>
                            <option value="8 ANS">8 ANS</option>
                            <option value="9 ANS">9 ANS</option>
                            <option value="10 ANS">10 ANS</option>
                            <option value="11 ANS">11 ANS</option>
                            <option value="12 ANS">12 ANS</option>
                            <option value="13 ANS">13 ANS</option>
                            <option value="14 ANS">14 ANS</option>
                            <option value="15 ANS">15 ANS</option>
                            <option value="AUTRE"> >15 ANS</option>

                            </select>
                            </div>

                            @if($errors->has('anciennete'))
                            <p> {{ $errors->first('anciennete') }} </p>
                            @endif
                        </div>
                          <div class="row">

                            <div class="col-3 has-success form-group">
                            <label for="inputIsValid" class=" form-control-label">Nom du n+1</label>
                            @if(isset($poste))
                            <input type="text" id="inputIsValid" name="fonction" value="{{ $poste->fonction }}" class="is-valid form-control-success form-control">
                            @else
                              <input type="text" id="inputIsValid" name="fonction" class="is-valid form-control-success form-control">
                            @endif
                            </div>
                            @if($errors->has('fonction'))
                            <p> {{ $errors->first('fonction') }} </p>
                            @endif

                          <div class="col-3 has-success form-group">
                          <label for="inputIsValid" class=" form-control-label">Fonction N+1</label>
                          @if(!empty($poste))
                          <input type="text" id="inputIsValid" name="fonction_n1" value="{{ $poste->fonction_n1 }}" class="is-valid form-control-success form-control">
                          @else
                          <input type="text" id="inputIsValid" name="fonction_n1" class="is-valid form-control-success form-control">
                          @endif
                          </div>
                          @if($errors->has('fonction_n1'))
                          <p> {{ $errors->first('fonction_n1') }} </p>
                          @endif

                        <div class="col-3 has-success form-group">
                        <label for="inputIsValid" class=" form-control-label">Date D'Embauche</label>
                        @if(!empty($poste))
                        <input type="date" id="inputIsValid" name="date_embauche" value="{{ $poste->date_embauche }}" class="is-valid form-control-success form-control">
                        @else
                        <input type="date" id="inputIsValid" name="date_embauche" class="is-valid form-control-success form-control">
                        @endif
                        </div>
                        @if($errors->has('date_embauche'))
                        <p> {{ $errors->first('date_embauche') }} </p>
                        @endif
                        <div class="col-3 has-success form-group">
                        <label id="autre" class=" form-control-label">Date D'entrée</label>
                        @if(!empty($poste))
                        <input type="date" id="date_entree" name="date_entree"  value="{{ $poste->date_entree  }}" class="is-valid form-control-success form-control">
                        @else
                        <input type="date" id="date_entree" name="date_entree"  class="is-valid form-control-success form-control">
                        @endif
                        </div>
                        @if($errors->has('date_entree'))
                        <p> {{ $errors->first('date_entree') }} </p>
                        @endif
                        </div>
                        <br />
                      <div class="form-group"> <center>
                        <a class="btn btn-xs btn-danger" href="{{ route('cg.main') }}">RETOURNER</a>
                    <button type="submit"  class="btn btn-success">MODIFIER</button>
                  </center>
                  </div>
                </form>
              </div>

          </div>
        </div>
      </div>
  </div>
  </div>
  </div>
  </div>

@endsection
