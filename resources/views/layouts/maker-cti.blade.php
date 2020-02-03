<!DOCTYPE html>
<html lang="fr">

<head>
    @include('includes.head')
</head>

<body class="animsition">
  <div class="page-wrapper">
  @include('includes.headerdesktop-maker-cti')

  @include('flash::message')
  @yield('accueil_maker')
  @include('flash::message')
  @yield('index-employe')
  @yield('show-employe')

  @yield('index_conge')
  @yield('modify_edit_conge')
  @yield('modify_poste_maker')
  @yield('modify_experience_maker')
  @yield('modify_formation_maker')
  @yield('modify_contrat')
  @include('flash::message')
  @yield('modify_employe_maker')
  @yield('creation_employe_maker')
  @yield('accueil_maker_groupe')


    @yield('modify_performance')
    @yield('performance_staff')
    @yield('index_performance')


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
