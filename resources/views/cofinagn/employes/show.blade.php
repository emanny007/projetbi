@extends('layouts.master-gn')

@section('modify_employe')
  <!-- MAIN CONTENT-->
  <div class="uker">
      <div class="section__content section__content--p30">
          <div class="container-fluid">
            <br />
            <div class="col-sm-6 col-lg-12">
              @include('includes.sous-menu-gn')
          </div>

          <div class="row well m-t-30">
           <div class="col-md-12">
               <div class="card">
                   <div class="card-header">
                       <i class="fa fa-user"></i>
                       <strong class="card-title pl-2">Profile utilisateur</strong>
                   </div>
                   <div class="card-body">
                       <div class="mx-auto d-block">
                           <img class="rounded-circle mx-auto d-block" src="/images/{{ $employe->photo }}" width="150" height="150" alt="Card image cap">
                           <h5 class="text-sm-center mt-2 mb-1">{{ $employe->prenom }}  {{ $employe->nom }}</h5>
                           <div class="location text-sm-center">
                               <i class="fa fa-map-marker"></i>{{ $employe->entite }}</div>
                       </div>
                       <hr>
                       <!--div class="card-text text-sm-center">
                           <label for="inputIsValid" class=" form-control-label">NOMBRE D'ENFANTS</label>
                       </div-->

                       <!-- TOP CAMPAIGN-->
                                <div class="top-campaign">
                                    <div class="table-responsive">
                                        <table class="table table-top-campaign">
                                            <tbody>
                                                <tr>
                                                    <td>MATRICULE</td>
                                                    <td>{{ $employe->matricule }}</td>
                                                </tr>
                                                <tr>
                                                    <td>NUMERO SSS</td>
                                                    <td>{{ $employe->numero_sss }}</td>
                                                </tr>
                                                <tr>
                                                    <td>NOM</td>
                                                    <td>{{ $employe->nom }}</td>
                                                </tr>
                                                <tr>
                                                    <td>PRENOMS</td>
                                                    <td>{{ $employe->prenom }}</td>
                                                </tr>
                                                <tr>
                                                    <td>EMAIL PROFESSIONNEL</td>
                                                    <td>{{ $employe->email }}</td>
                                                </tr>
                                                <tr>
                                                    <td>PASSWORD</td>
                                                    <td>{{ $employe->password }}</td>
                                                </tr>
                                                <tr>
                                                    <td>ROLE</td>
                                                    <td>{{ $employe->role }}</td>
                                                </tr>
                                                <tr>
                                                    <td>DATE NAISSANCE</td>
                                                    <td>{{ $employe->date_naissance }}</td>
                                                </tr>
                                                <tr>
                                                    <td>EMAIL PERSONNEL</td>
                                                    <td>{{ $employe->mail_perso }}</td>
                                                </tr>
                                                <tr>
                                                    <td>TELEPHONE PROFESSIONNEL</td>
                                                    <td>{{ $employe->tel_pro }}</td>
                                                </tr>
                                                <tr>
                                                    <td>TELEPHONE PERSONNEL</td>
                                                    <td>{{ $employe->tel_perso }}</td>
                                                </tr>
                                                <tr>
                                                    <td>CONTACT URGENT</td>
                                                    <td>{{ $employe->contact_urgent }}</td>
                                                </tr>
                                                <tr>
                                                    <td>ENTITE</td>
                                                    <td>{{ $employe->entite }}</td>
                                                </tr>
                                                <tr>
                                                    <td>DEPARTEMENT</td>
                                                    <td>{{ $employe->departement }}</td>
                                                </tr>
                                                <tr>
                                                    <td>SEXE</td>
                                                    <td>{{ $employe->sexe }}</td>
                                                </tr>
                                                <tr>
                                                    <td>AGE</td>
                                                    <td>{{ $employe->age }}</td>
                                                </tr>
                                                <tr>
                                                    <td>SECTEUR</td>
                                                    <td>{{ $employe->secteur }}</td>
                                                </tr>
                                                <tr>
                                                    <td>CATEGORIE</td>
                                                    <td>{{ $employe->categorie }}</td>
                                                </tr>
                                                <tr>
                                                    <td>CIVILITE</td>
                                                    <td>{{ $employe->civilite}}</td>
                                                </tr>
                                                <tr>
                                                    <td>SITUATION MATRIMONIALE</td>
                                                    <td>{{ $employe->situation_matrimoniale }}</td>
                                                </tr>
                                                <tr>
                                                    <td>NOMBRE D'ENFANTS</td>
                                                    <td>{{ $employe->nbre_enfant }}</td>
                                                </tr>
                                                <tr>
                                                    <td>NATIONALITE</td>
                                                    <td>{{ $employe->nationnalite }}</td>
                                                </tr>
                                                <tr>
                                                    <td>STATUT</td>
                                                    <td>{{ $employe->statut }}</td>
                                                </tr>

                                            </tbody>
                                        </table>
                                    </div>

                                    <center><br /><br />
                                      <a class="btn btn-xs btn-danger" href="{{ url('/cofinagn/employes') }}">RETOURNER</a>
                                    </center>
                                </div>
                                <!--  END TOP CAMPAIGN-->
                   </div>
               </div>
           </div>


        </div>
      </div>
    </div>
    </div>

@endsection
