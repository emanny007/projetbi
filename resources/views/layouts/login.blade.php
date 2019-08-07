<!DOCTYPE html>
<html lang="fr">

<head>
    @include('includes.head')
</head>

<body class="animsition" style="background-image:url(/images/icon/authentification.png)">


  @include('flash::message')
  @yield('authentification')


  <!-- pied de page -->
    @include('includes.footer')

  <!-- script javascript -->
    @include('includes.script')
</body>

</html>
<!-- end document-->
