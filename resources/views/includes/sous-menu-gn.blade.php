<center>
  <a class="btn btn-xs btn-primary" href="{{ route('gn.main') }}"><span class="fas fa-user"></span> Employes &nbsp;</a>
  <a class="btn btn-xs btn-primary" href="{{ route('gn.show',$employe->id) }}"><span class="fas fa-info"></span> Afficher &nbsp;</a>
  <a class="btn btn-xs btn-primary" href="{{ route('gn.edit',$employe->id) }}"><span class="fas fa-user"></span> Modifier &nbsp;</a>
  <a class="btn btn-xs btn-primary" href="{{ route('gn.contrats.edit',$employe->id) }}"><span class="fas fa-edit"></span> Contrat &nbsp;</a>
  <a class="btn btn-xs btn-primary" href="{{ route('gn.postes.edit',$employe->id) }}"><span class="fas fa-male"></span> Poste &nbsp;</a>
  <a class="btn btn-xs btn-primary" href="{{ route('gn.formations.edit',$employe->id) }}"><span class="fas fa-suitcase"></span> Formation &nbsp;</a>
  <a class="btn btn-xs btn-primary" href="{{ route('gn.experiences.edit',$employe->id) }}"><span class="fas fa-tasks"></span> Experience &nbsp;</a>
  <a class="btn btn-xs btn-primary" href="{{ route('gn.conges.edit',$employe->id) }}"><span class="fas fa-table"></span>Conge &nbsp;</a>
  <a class="btn btn-xs btn-primary" href="{{ route('gn.performances.edit',$employe->id) }}"><span class="fas fa-bolt"></span> Performance &nbsp;</a>
  <a class="btn btn-xs btn-primary" href="{{ route('gn.sanctions.edit',$employe->id) }}"><span class="fas fa-gavel"></span> Sanction &nbsp;</a>
  <a class="btn btn-xs btn-primary" href="{{ route('gn.departs.edit',$employe->id) }}"><span class="fas fa-road"></span> Departs &nbsp;</a>
</center>
