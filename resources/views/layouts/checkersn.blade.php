<!DOCTYPE html>
<html lang="fr">

<head>
    @include('includes.head')
</head>

<body class="animsition">
  <div class="page-wrapper">
  @include('includes.headerdesktop-checker-sn')

  @yield('accueil_checker')
  @yield('index-employe')
  @yield('show-employe')

  @yield('index_conge')
  @yield('modify_edit_conge')
  @yield('modify_poste_checker')
  @yield('modify_experience_checker')
  @yield('modify_formation_checker')
  @yield('modify_contrat')
  @yield('modify_employe_checker')
  @yield('creation_employe_checker')
  @yield('accueil_checker_groupe')

  @yield('modify_performance')
  @yield('performance_staff')
  @yield('index_performances')

  @yield('modify_edit_sanction')
  @yield('index_sanction')

  @yield('modify_edit_depart')
  @yield('index_depart')

<!-- pied de page -->
  @include('includes.footerchecker')

<!-- script javascript -->
  @include('includes.script')

</body>

</html>
<!-- end document-->
