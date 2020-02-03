<!-- HEADER DESKTOP-->
<header class="header-desktop3 d-none d-lg-block">
    <div class="section__content section__content--p35">
        <div class="header3-wrap">
            <div class="header__logo">
                <a href="{{ url('/cofinagn/accueil') }}"> <img src="{{ url('images/icon/logo.jpg') }}" alt="Groupe Cofina" width="200" height="75"/></a>
            </div>
            <div class="header__navbar">
                <ul class="list-unstyled">

                  <li>
                      <a href="{{ url('/cofinagn/accueil') }}">
                          <i class="fas fa-home"></i>
                          <span class="bot-line"></span>Accueil</a>
                  </li>

                    <li class="has-sub">
                        <a href="{{ url('/cofinagn/accueil') }}">
                            <i class="fas fa-user"></i>Employes</a>
                            <span class="bot-line"></span>
                        </a>
                        <ul class="header3-sub-list list-unstyled">
                            <li>
                                <a href="{{ url('/cofinagn/employes/create') }}"><i class="fas fa-folder-open"></i>Ajouter Employe</a>
                            </li>
                            <li>
                                <a href="{{ url('/cofinagn/employes') }}"><i class="fas fa-folder-open"></i>Liste Employe</a>
                            </li>
                        </ul>
                    </li>

                    <li class="has-sub">
                        <a href="#">
                            <i class="fas fa-bar-chart-o"></i>
                            <span class="bot-line"></span>Analyse</a>
                        <ul class="header3-sub-list list-unstyled">
                            <li>
                                <a href="{{ url('/cofinagn/analyse/index') }}"><i class="fas fa-folder-open"></i>Departement</a>
                            </li>
                            <li>
                                <a href="{{ url('/cofinagn/analyse/entite') }}"><i class="fas fa-folder-open"></i>Entite</a>
                            </li>
                            <li>
                                <a href="{{ url('/cofinagn/analyse/contrat') }}"><i class="fas fa-folder-open"></i>Contrat</a>
                            </li>
                        </ul>
                    </li>

                    <li class="has-sub">
                        <a href="#">
                            <i class="fas fa-table"></i>
                            <span class="bot-line"></span>Listes</a>
                        <ul class="header3-sub-list list-unstyled">
                            <li>
                              <a href="{{ url('/cofinagn/conges/index') }}"><i class="fas fa-folder-open"></i>Congés</a>
                            </li>
                            <li>
                                <a href="{{ url('/cofinagn/performances/index') }}"><i class="fas fa-folder-open"></i>Performances</a>
                            </li>
                            <li>
                                <a href="{{ url('/cofinagn/sanctions/index') }}"><i class="fas fa-folder-open"></i>Sanctions</a>
                            </li>
                            <li>
                                <a href="{{ url('/cofinagn/departs/index') }}"><i class="fas fa-folder-open"></i>Departs</a>
                            </li>
                        </ul>
                    </li>


                    <li> <!-- url('/cofinasn/reportings/index') -->
                        <a href="#">
                            <i class="fas fa-upload"></i>
                            <span class="bot-line"></span>Extraction</a>
                    </li>

                    <li class="has-sub"><a href="{{ url('/cofinagn/accueil') }}"> <img src="{{ url('images/drapeau/guinee.png') }}" alt="Groupe Cofina" width="50" height="50"/></a></li>
                </ul>
            </div>
            <div class="header__tool">
                <!--div class="header-button-item has-noti js-item-menu">
                    <i class="zmdi zmdi-notifications"></i>
                    <div class="notifi-dropdown notifi-dropdown--no-bor js-dropdown">
                        <div class="notifi__title">
                            <p>You have 3 Notifications</p>
                        </div>
                        <div class="notifi__item">
                            <div class="bg-c1 img-cir img-40">
                                <i class="zmdi zmdi-email-open"></i>
                            </div>
                            <div class="content">
                                <p>You got a email notification</p>
                                <span class="date">April 12, 2018 06:50</span>
                            </div>
                        </div>
                        <div class="notifi__item">
                            <div class="bg-c2 img-cir img-40">
                                <i class="zmdi zmdi-account-box"></i>
                            </div>
                            <div class="content">
                                <p>Your account has been blocked</p>
                                <span class="date">April 12, 2018 06:50</span>
                            </div>
                        </div>
                        <div class="notifi__item">
                            <div class="bg-c3 img-cir img-40">
                                <i class="zmdi zmdi-file-text"></i>
                            </div>
                            <div class="content">
                                <p>You got a new file</p>
                                <span class="date">April 12, 2018 06:50</span>
                            </div>
                        </div>
                        <div class="notifi__footer">
                            <a href="#">All notifications</a>
                        </div>
                    </div>
                </div-->
                <!--div class="header-button-item js-item-menu">
                    <i class="zmdi zmdi-settings"></i>
                    <div class="setting-dropdown js-dropdown">
                        <div class="account-dropdown__body">
                            <div class="account-dropdown__item">
                                <a href="#">
                                    <i class="zmdi zmdi-account"></i>Account</a>
                            </div>
                            <div class="account-dropdown__item">
                                <a href="#">
                                    <i class="zmdi zmdi-settings"></i>Setting</a>
                            </div>
                            <div class="account-dropdown__item">
                                <a href="#">
                                    <i class="zmdi zmdi-money-box"></i>Billing</a>
                            </div>
                        </div>
                        <div class="account-dropdown__body">
                            <div class="account-dropdown__item">
                                <a href="#">
                                    <i class="zmdi zmdi-globe"></i>Language</a>
                            </div>
                            <div class="account-dropdown__item">
                                <a href="#">
                                    <i class="zmdi zmdi-pin"></i>Location</a>
                            </div>
                            <div class="account-dropdown__item">
                                <a href="#">
                                    <i class="zmdi zmdi-email"></i>Email</a>
                            </div>
                            <div class="account-dropdown__item">
                                <a href="#">
                                    <i class="zmdi zmdi-notifications"></i>Notifications</a>
                            </div>
                        </div>
                    </div>
                </div-->
                <div class="account-wrap">
                    <div class="account-item account-item--style2 clearfix js-item-menu">
                        <div class="image">
                            <img src="{{ url('images/emanny.png') }}" />
                        </div>

                        <div class="content">
                            <a class="js-acc-btn" href="#">Compte</a>
                        </div>

                        <div class="account-dropdown js-dropdown">
                            <!--div class="info clearfix">
                                <div class="image">
                                    <a href="#">
                                        <img src="images/icon/avatar-01.jpg" alt="John Doe" />
                                    </a>
                                </div>
                                <div class="content">
                                    <h5 class="name">
                                        <a href="#">john doe</a>
                                    </h5>
                                    <span class="email">johndoe@example.com</span>
                                </div>
                            </div-->
                            <div class="account-dropdown__body">
                                <div class="account-dropdown__item">
                                    <a href="#">
                                        <i class="zmdi zmdi-account"></i>Mon compte</a>
                                </div>
                                <div class="account-dropdown__item">
                                    <a href="#">
                                        <i class="zmdi zmdi-settings"></i>Setting</a>
                                </div>
                                <!--div class="account-dropdown__item">
                                    <a href="#">
                                        <i class="zmdi zmdi-money-box"></i>Billing</a>
                                </div-->
                            </div>
                            <div class="account-dropdown__footer">
                                <a href="{{ url('/deconnexion') }}">
                                    <i class="zmdi zmdi-power"></i>Deconnexion</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- END HEADER DESKTOP-->
