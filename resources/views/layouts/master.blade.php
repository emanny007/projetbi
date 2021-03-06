<!DOCTYPE html>
<html lang="fr">

<head>
    @include('includes.head')
</head>

<body class="animsition">
  <div class="page-wrapper">
  @include('includes.headerdesktop-maker')
    <!-- include('includes.header')
  include('includes.menusidebar')
  include('includes.topnavbar')-->

  <!--includehh('includes.contenu')-->

  @include('flash::message')
  @yield('main')
  @yield('creation_employe')
  @include('flash::message')
  @yield('modify_employe')
  @yield('show_employe')
<!--Gestion des parametres-->

  @yield('creation_etablissement')
  @yield('etablissement')
  @yield('departement')
  @yield('creation_departement')
  @include('flash::message')
  @yield('modify_departement')

  @yield('site')
  @yield('creation_site')
  @include('flash::message')
  @yield('modify_site')


  @yield('profil-users')
  @yield('modify_users')



  @yield('accueil_admin')
  @yield('modify_edit_conge')
  @yield('index_conge')
  @yield('reporting_excel')
  @yield('reporting_exportdata')
  @yield('reporting_preview')

  @yield('analyse_entite')
  @yield('analyse_employe')
  @yield('analyse_genre')
  @yield('analyse_contrat')
  @yield('analyse_indicateur')
  @yield('analyse_indicateur-new-rapport')
  @yield('analyse_exportdpt')
  @yield('traitement_export')
  @yield('traitement_expt')


  @yield('liste_contrat')
  @yield('modify_contrat')
  @yield('show_employe_contrat')


  @yield('modify_formation')

  @yield('modify_performance')
  @yield('performance_staff')
  @yield('index_performance')


  @yield('modify_edit_sanction')
  @yield('index_sanction')

  @yield('modify_edit_depart')
  @yield('index_depart')

  @yield('modify_experience')

  @yield('modify_poste')

<!-- pied de page -->
  @include('includes.footer')

<!-- script javascript -->
  @include('includes.script')

</body>

</html>
<!-- end document-->
