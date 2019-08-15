<!-- HEADER DESKTOP-->
<header class="header-desktop3 d-none d-lg-block">
    <div class="section__content section__content--p35">
        <div class="header3-wrap">
            <div class="header__logo">
                <a href="#"> <img src="{{ url('images/icon/logo.jpg')}}" alt="Groupe Cofina" width="200" height="75"/></a>
            </div>
            <div class="header__navbar">
                <ul class="list-unstyled">

                    <li>
                      <a href="{{ url('/cofinasn-checker/accueil') }}">
                      <i class="fas fa-home"></i>
                      <span class="bot-line"></span>Accueil</a>
                    </li>

                  <li class="has-sub">
                      <a href="{{ url('/cofinasn-checker/accueil') }}">
                      <i class="fas fa-user"></i>Employes</a>
                      <span class="bot-line"></span>
                      </a>
                    <ul class="header3-sub-list list-unstyled">
                        <li>
                          <a href="{{ url('/cofinasn-checker/employes/create-employe') }}"><i class="fas fa-folder-open"></i>Ajouter Employe</a>
                        </li>
                          <li>
                            <a href="{{ url('/cofinasn-checker/employes') }}"><i class="fas fa-folder-open"></i>Liste Employe</a>
                          </li>
                      </ul>
                  </li>
                    <li>
                        <a href="{{ url('/cofinasn-checker/conges/index') }}">
                            <i class="fas fa-table"></i>
                            <span class="bot-line"></span>Congés</a>
                    </li>
                    <!--li class="has-sub">
                        <a href="#">
                            <i class="fas fa-copy"></i>
                            <span class="bot-line"></span>Pages</a>
                        <ul class="header3-sub-list list-unstyled">
                            <li>
                                <a href="login.html">Login</a>
                            </li>
                            <li>
                                <a href="register.html">Register</a>
                            </li>
                            <li>
                                <a href="forget-pass.html">Forget Password</a>
                            </li>
                        </ul>
                    </li-->
                    <!--li class="has-sub">
                        <a href="#">
                            <i class="fas fa-desktop"></i>
                            <span class="bot-line"></span>UI Elements</a>
                        <ul class="header3-sub-list list-unstyled">
                            <li>
                                <a href="button.html">Button</a>
                            </li>
                            <li>
                                <a href="badge.html">Badges</a>
                            </li>
                            <li>
                                <a href="tab.html">Tabs</a>
                            </li>

                        </ul>
                    </li-->
                    <li class="has-sub"><a href="#"> <img src="{{ url('images/drapeau/senegal.jpg') }}" alt="Groupe Cofina" width="50" height="50"/></a></li>
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
                            <img src="{{ url('images/emanny.png') }}" alt="Emanny Uker" width="200" height="200" />
                        </div>
                        <div class="content">
                            <a class="js-acc-btn" href="#">Compte</a>
                        </div>
                        <div class="account-dropdown js-dropdown">
                            <div class="account-dropdown__body">
                                <div class="account-dropdown__item">
                                    <a href="#">
                                        <i class="zmdi zmdi-account"></i>Mon compte</a>
                                </div>
                                <div class="account-dropdown__item">
                                    <a href="#">
                                        <i class="zmdi zmdi-settings"></i>Parametre</a>
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
