<center>
  <a class="btn btn-xs btn-primary" href="{{ route('cti.index-employe') }}"><span class="fas fa-user"></span> Employes &nbsp;</a>
  <a class="btn btn-xs btn-primary" href="{{ route('cti.show-employe',$employe->id) }}"><span class="fas fa-info"></span> Afficher &nbsp;</a>
  <a class="btn btn-xs btn-primary" href="{{ route('cti.edit-employe',$employe->id) }}"><span class="fas fa-user"></span> Modifier &nbsp;</a>
  <a class="btn btn-xs btn-primary" href="{{ route('cti.contrats.edit',$employe->id) }}"><span class="fas fa-edit"></span> Contrat &nbsp;</a>
  <a class="btn btn-xs btn-primary" href="{{ route('cti.postes.edit',$employe->id) }}"><span class="fas fa-male"></span> Poste &nbsp;</a>
  <a class="btn btn-xs btn-primary" href="{{ route('cti.formations.edit',$employe->id) }}"><span class="fas fa-suitcase"></span> Formation &nbsp;</a>
  <a class="btn btn-xs btn-primary" href="{{ route('cti.experiences.edit',$employe->id) }}"><span class="fas fa-tasks"></span> Experience &nbsp;</a>
  <a class="btn btn-xs btn-primary" href="{{ route('cti.conges.edit',$employe->id) }}"><span class="fas fa-table"></span> Conge &nbsp;</a>
</center>
