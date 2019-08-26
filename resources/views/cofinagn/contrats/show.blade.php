@extends('layouts.master-gn')

@section('show_employe_contrat')
  <!-- MAIN CONTENT-->
  <div class="uker">
      <div class="section__content section__content--p30">
          <div class="container-fluid">
           <div class="col-md-12">
               <div class="card">
                   <div class="card-header">
                       <i class="fa fa-user"></i>
                       <strong class="card-title pl-2">Contrat utilisateur</strong>
                   </div>
                   @if(empty($employe))
                   <div class="card-body">
                       <div class="mx-auto">
                              <marquee> <strong>  AUCUN CONTRAT N'A ETE RENSEIGNE POUR CET EMPLOYE !!! </strong></marquee>
                       </div>
                       <center><a class="btn btn-xs btn-danger" href="{{ route('gn.contrats.index') }}">RETOURNER</a></center>
                    </div>

                   @else
                   <div class="card-body">
                       <div class="mx-auto d-block">
                           <img class="rounded-circle mx-auto d-block" src="/images/{{ $employe->photo }}" width="150" height="150" alt="{{ $employe->prenom }}  {{ $employe->nom }}">
                           <h5 class="text-sm-center mt-2 mb-1">{{ $employe->prenom }}  {{ $employe->nom }}</h5>
                           <div class="location text-sm-center">
                               <i class="fa fa-map-marker">CONTRAT : </i>{{ $employe->type_contrat }}</div>
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
                                                    <td>SEXE</td>
                                                    <td>{{ $employe->sexe }}</td>
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
                                                    <td>NATIONNALITE</td>
                                                    <td>{{ $employe->nationnalite }}</td>
                                                </tr>
                                                <tr>
                                                    <td>ORIGINE</td>
                                                    <td>{{ $employe->origine }}</td>
                                                </tr>
                                                <tr>
                                                    <td>TYPE CONTRAT</td>
                                                    <td>{{ $employe->type_contrat }}</td>
                                                </tr>
                                                <tr>
                                                    <td>DATE DEBUT</td>
                                                    <td>{{ $employe->date_debut }}</td>
                                                </tr>
                                                <tr>
                                                    <td>DATE FIN</td>
                                                    <td>{{ $employe->date_fin }}</td>
                                                </tr>

                                            </tbody>
                                        </table>
                                    </div>
                                    <center><br /><br />
                                      <a class="btn btn-xs btn-danger" href="{{ url('/cofinagn/contrats/index') }}">RETOURNER</a>
                                    </center>
                                </div>
                                <!--  END TOP CAMPAIGN-->
                                @endif
                   </div>

               </div>

           </div>


        </div>
      </div>
    </div>

@endsection
