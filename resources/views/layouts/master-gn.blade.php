<!DOCTYPE html>
<html lang="fr">

<head>
    @include('includes.head')
</head>

<body class="animsition">
  <div class="page-wrapper">
  @include('includes.headerdesktop-maker-gn')
    <!-- include('includes.header')
  include('includes.menusidebar')
  include('includes.topnavbar')-->

  <!--includehh('includes.contenu')-->


  @yield('main')
  @yield('creation_employe')
  @include('flash::message')
  @yield('modify_employe')
  @yield('show_employe')

  @yield('departement')
  @yield('creation_departement')
  @include('flash::message')
  @yield('modify_departement')

  @yield('site')
  @yield('creation_site')
  @include('flash::message')
  @yield('modify_site')

  @yield('accueil_admin')
  @yield('modify_edit_conge')
  @yield('index_conge')
  @yield('reporting_excel')
  @yield('reporting_exportdata')

  @yield('analyse_entite')
  @yield('analyse_employe')
  @yield('analyse_genre')
  @yield('analyse_contrat')


  @yield('liste_contrat')
  @yield('modify_contrat')
  @yield('show_employe_contrat')

  @yield('modify_performance')
  @yield('performance_staff')
  @yield('index_performances')


  @yield('modify_edit_sanction')
  @yield('index_sanction')

  @yield('modify_edit_depart')
  @yield('index_depart')

  @yield('modify_formation')

  @yield('modify_experience')
  @yield('modify_poste')

<!-- pied de page -->
  @include('includes.footer')

<!-- script javascript -->
  @include('includes.script')

</body>

</html>
<!-- end document-->
