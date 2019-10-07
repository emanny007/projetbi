<center>
  <a class="btn btn-xs btn-primary" href="{{ route('fine.main') }}"><span class="fas fa-user"></span> Employes &nbsp;</a>
  <a class="btn btn-xs btn-primary" href="{{ route('fine.show',$employe->id) }}"><span class="fas fa-info"></span> Afficher &nbsp;</a>
  <a class="btn btn-xs btn-primary" href="{{ route('fine.edit',$employe->id) }}"><span class="fas fa-user"></span> Modifier &nbsp;</a>
  <a class="btn btn-xs btn-primary" href="{{ route('fine.contrats.edit',$employe->id) }}"><span class="fas fa-edit"></span> Contrat &nbsp;</a>
  <a class="btn btn-xs btn-primary" href="{{ route('fine.postes.edit',$employe->id) }}"><span class="fas fa-male"></span> Poste &nbsp;</a>
  <a class="btn btn-xs btn-primary" href="{{ route('fine.formations.edit',$employe->id) }}"><span class="fas fa-suitcase"></span> Formation &nbsp;</a>
  <a class="btn btn-xs btn-primary" href="{{ route('fine.experiences.edit',$employe->id) }}"><span class="fas fa-tasks"></span> Experience &nbsp;</a>
  <a class="btn btn-xs btn-primary" href="{{ route('fine.conges.edit',$employe->id) }}"><span class="fas fa-table"></span>Conge &nbsp;</a>
</center>
