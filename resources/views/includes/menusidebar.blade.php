        <!-- MENU SIDEBAR-->
        <aside class="menu-sidebar d-none d-lg-block">
            <div class="logo">
                <a href="">
                    <img src="{{ url('images/icon/logo.jpg') }}" alt="Groupe Cofina" />
                </a>
            </div>
            <div class="menu-sidebar__content js-scrollbar1">
                <nav class="navbar-sidebar">
                    <ul class="list-unstyled navbar__list">
                        <li class="active has-sub">
                            <a class="js-arrow" href="{{ url('/accueil') }}">
                                <i class="fas fa-home"></i>Accueil</a>
                        </li>
                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-user"></i>Gestions Employes</a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                              <li>
                                  <a href="{{ url('/employes/create') }}"><i class="fas fa-folder-open"></i>Ajouter</a>
                              </li>
                                <li>
                                    <a href="{{ url('/employes') }}"><i class="fas fa-folder-open"></i>Employes</a>
                                </li>
                                <li>
                                    <a href="{{ url('/analyse/index') }}"><i class="fas fa-folder-open"></i>Rapports</a>
                                </li>
                            </ul>
                        </li>
                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-file-text"></i>Gestions des contrats</a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                <li>
                                    <a href="{{ url('/contrats/index') }}"><i class="fas fa-folder-open"></i>Liste contrats</a>
                                </li>
                                <li>
                                    <a href="{{ url('/analyse/index') }}"><i class="fas fa-folder-open"></i>Rapports</a>
                                </li>
                            </ul>
                        </li>

                        <li>
                            <a href="{{ url('/conges/index') }}">
                                <i class="fas fa-table"></i>Gestions Congés</a>
                        </li>
                        <li>
                            <a href="{{ url('/reportings/index') }}">
                                <i class="fas fa-bar-chart-o"></i>Extraction</a>
                        </li>
                        <!--li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-copy"></i>Gestions des congés</a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                <li>
                                    <a href="{{ url('/conges/index') }}">Demandes</a>
                                </li>
                                <li>
                                    <a href="{{ url('/conges') }}">Creation</a>
                                </li>
                            </ul>
                        </li-->

                        <li>
                            <a href="#">
                                <i class="far fa-check-square"></i>Gestions Départs</a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fas fa-calendar-alt"></i>Gestons Sanctions</a>
                        </li>
                        <li>
                            <a href="map.html">
                                <i class="fas fa-map-marker-alt"></i>Parametrage</a>
                        </li>
                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-copy"></i>Pages</a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                <li>
                                    <a href="login.blade.php">Login</a>
                                </li>
                                <li>
                                    <a href="register.blade.php">Register</a>
                                </li>
                                <li>
                                    <a href="forget-pass.blade.php">Forget Password</a>
                                </li>
                            </ul>
                        </li>
                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-desktop"></i>UI Elements</a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                <li>
                                    <a href="button.blade.php">Button</a>
                                </li>
                                <li>
                                    <a href="badge.blade.php">Badges</a>
                                </li>
                                <li>
                                    <a href="tab.blade.php">Tabs</a>
                                </li>
                                <li>
                                    <a href="card.blade.php">Cards</a>
                                </li>
                                <li>
                                    <a href="alert.blade.php">Alerts</a>
                                </li>
                                <li>
                                    <a href="progress-bar.blade.php">Progress Bars</a>
                                </li>
                                <li>
                                    <a href="modal.blade.php">Modals</a>
                                </li>
                                <li>
                                    <a href="switch.blade.php">Switchs</a>
                                </li>
                                <li>
                                    <a href="grid.blade.php">Grids</a>
                                </li>
                                <li>
                                    <a href="fontawesome.blade.php">Fontawesome Icon</a>
                                </li>
                                <li>
                                    <a href="typo.blade.php">Typography</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>
        <!-- END MENU SIDEBAR-->
