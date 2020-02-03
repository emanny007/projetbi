<!DOCTYPE html>
<html lang="fr">

<head>
    @include('includes.head')
</head>

<body class="animsition">
  <div class="page-wrapper">
  @include('includes.headerdesktop-checker')


  @include('flash::message')
  @yield('accueil_checker')
  @yield('index-employe')
  @yield('show-employe')

  @yield('index_conge')
  @include('flash::message')
  @yield('modify_edit_conge')
  @include('flash::message')
  @yield('modify_poste_checker')
  @include('flash::message')
  @yield('modify_experience_checker')
  @include('flash::message')
  @yield('modify_formation_checker')
  @include('flash::message')
  @yield('modify_contrat')
  @include('flash::message')
  @yield('modify_employe_checker')
  @include('flash::message')
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
