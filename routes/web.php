<?php



  //****************************************************************
  // PAGE D'ACCUEIL DU PROFIL MAKER FILIALE CSG
  //****************************************************************

//GESTION DU POSTE
Route::get('/csg/postes/{id}/edit', 'PostecsgController@edit')->name('csg.postes.edit');
Route::post('/csg/postes/{id}', 'PostecsgController@update')->name('csg.postes.update');

//GESTION DE L'EXPERIENCE PROFESSIONNELLE
Route::get('/csg/experiences/{id}/edit', 'ExperiencecsgController@edit')->name('csg.experiences.edit');
Route::post('/csg/experiences/{id}', 'ExperiencecsgController@store')->name('csg.experiences.store');

//GESTION DE LA FORMATION
Route::get('/csg/formations/{id}/edit', 'FormationcsgController@edit')->name('csg.formations.edit');
Route::post('/csg/formations/{id}', 'FormationcsgController@store')->name('csg.formations.store');

//PAGE D'ACCUEIL DU MASTER GROUPE
  Route::post('/csg/accueil', 'ComptecsgController@accueil')->name('csg.accueil');
  Route::get('/csg/accueil', 'ComptecsgController@accueil')->name('csg.accueil');
  Route::get('/csg/accueil', 'ComptecsgController@senegal')->name('csg.accueil');

//TABLEAU DE BOARD DES EMPLOYES
Route::get('/csg/employes', 'EmployecsgController@index')->name('csg.main');
Route::get('/csg/employes/create', 'EmployecsgController@create')->name('csg.create');
Route::post('/csg/employes', 'EmployecsgController@store')->name('csg.store');
Route::put('/csg/employes/{id}', 'EmployecsgController@update')->name('csg.update');
Route::get('/csg/employes/{id}', 'EmployecsgController@show')->name('csg.show');
Route::get('/csg/employes/{id}/edit', 'EmployecsgController@edit')->name('csg.edit');
Route::delete('/csg/employes/{id}', 'EmployecsgController@destroy')->name('csg.destroy');

//GESTIONS DES CONGES
Route::get('/csg/conges/index', 'CongecsgController@index')->name('csg.conges.index');
Route::get('/csg/conges/{id}/edit', 'CongecsgController@edit')->name('csg.conges.edit');
Route::post('/csg/conges/{id}', 'CongecsgController@store')->name('csg.conges.store');

//GESTIONS DES EXTRACTIONS VERS DES FORMATS EXCEL
Route::get('/csg/reportings/export', 'ReportingcsgController@export')->name('csg.reportings.export');
Route::get('/csg/reportings/index', 'ReportingcsgController@index')->name('csg.reportings.index');
Route::get('/csg/reportings/exportdata', 'ExcelcsgController@exportdata')->name('csg.reportings.exportdata');

//GRAPHIQUE CONSOLETVs/CHARTS
Route::get('/csg/analyse/index', 'analysecsgController@index')->name('csg.analyse.index');
Route::get('/csg/analyse/entite', 'Analyse_entitecsgController@entite')->name('csg.analyse.entite');
Route::get('/csg/analyse/genre', 'Analyse_entitecsgController@genre')->name('csg.analyse.genre');
Route::get('/csg/analyse/contrat', 'Analyse_contratcsgController@contrat')->name('csg.analyse.contrat');

//GESTION DES CONTRATS
Route::get('/csg/contrats', 'ContratcsgController@index')->name('csg.contrats');
Route::get('/csg/contrats/index', 'ContratcsgController@index')->name('csg.contrats.index');
Route::get('/csg/contrats/undefined', 'ContratcsgController@index')->name('csg.contrats.undefined');
Route::get('/csg/contrats/{id}/edit', 'ContratcsgController@edit')->name('csg.contrats.edit');
Route::post('/csg/contrats/{id}', 'ContratcsgController@update')->name('csg.contrats.update');
Route::get('/csg/contrats/{id}', 'ContratcsgController@show')->name('csg.contrats.show');


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
/*
Route::get('/', function () {
    return view('welcome');
});

Route::get('/', function () {
    return view('/');
});
*/




Route::group([
  'middleware' =>'App\Http\Middleware\Auth',
],function (){




    //****************************************************************
    // PAGE D'ACCUEIL DU PROFIL MAKER FILIALE CAC
    //****************************************************************

  //GESTION DU POSTE
  Route::get('/cac/postes/{id}/edit', 'PostecacController@edit')->name('cac.postes.edit');
  Route::post('/cac/postes/{id}', 'PostecacController@update')->name('cac.postes.update');

  //GESTION DE L'EXPERIENCE PROFESSIONNELLE
  Route::get('/cac/experiences/{id}/edit', 'ExperiencecacController@edit')->name('cac.experiences.edit');
  Route::post('/cac/experiences/{id}', 'ExperiencecacController@store')->name('cac.experiences.store');

  //GESTION DE LA FORMATION
  Route::get('/cac/formations/{id}/edit', 'FormationcacController@edit')->name('cac.formations.edit');
  Route::post('/cac/formations/{id}', 'FormationcacController@store')->name('cac.formations.store');

  //PAGE D'ACCUEIL DU MASTER GROUPE
    Route::post('/cac/accueil', 'ComptecacController@accueil')->name('cac.accueil');
    Route::get('/cac/accueil', 'ComptecacController@accueil')->name('cac.accueil');
    Route::get('/cac/accueil', 'ComptecacController@senegal')->name('cac.accueil');

  //TABLEAU DE BOARD DES EMPLOYES
  Route::get('/cac/employes', 'EmployecacController@index')->name('cac.main');
  Route::get('/cac/employes/create', 'EmployecacController@create')->name('cac.create');
  Route::post('/cac/employes', 'EmployecacController@store')->name('cac.store');
  Route::put('/cac/employes/{id}', 'EmployecacController@update')->name('cac.update');
  Route::get('/cac/employes/{id}', 'EmployecacController@show')->name('cac.show');
  Route::get('/cac/employes/{id}/edit', 'EmployecacController@edit')->name('cac.edit');
  Route::delete('/cac/employes/{id}', 'EmployecacController@destroy')->name('cac.destroy');

  //GESTIONS DES CONGES
  Route::get('/cac/conges/index', 'CongecacController@index')->name('cac.conges.index');
  Route::get('/cac/conges/{id}/edit', 'CongecacController@edit')->name('cac.conges.edit');
  Route::post('/cac/conges/{id}', 'CongecacController@store')->name('cac.conges.store');

  //GESTIONS DES EXTRACTIONS VERS DES FORMATS EXCEL
  Route::get('/cac/reportings/export', 'ReportingcacController@export')->name('cac.reportings.export');
  Route::get('/cac/reportings/index', 'ReportingcacController@index')->name('cac.reportings.index');
  Route::get('/cac/reportings/exportdata', 'ExcelcacController@exportdata')->name('cac.reportings.exportdata');

  //GRAPHIQUE CONSOLETVs/CHARTS
  Route::get('/cac/analyse/index', 'analysecacController@index')->name('cac.analyse.index');
  Route::get('/cac/analyse/entite', 'Analyse_entitecacController@entite')->name('cac.analyse.entite');
  Route::get('/cac/analyse/genre', 'Analyse_entitecacController@genre')->name('cac.analyse.genre');
  Route::get('/cac/analyse/contrat', 'Analyse_contratcacController@contrat')->name('cac.analyse.contrat');

  //GESTION DES CONTRATS
  Route::get('/cac/contrats', 'ContratcacController@index')->name('cac.contrats');
  Route::get('/cac/contrats/index', 'ContratcacController@index')->name('cac.contrats.index');
  Route::get('/cac/contrats/undefined', 'ContratcacController@index')->name('cac.contrats.undefined');
  Route::get('/cac/contrats/{id}/edit', 'ContratcacController@edit')->name('cac.contrats.edit');
  Route::post('/cac/contrats/{id}', 'ContratcacController@update')->name('cac.contrats.update');
  Route::get('/cac/contrats/{id}', 'ContratcacController@show')->name('cac.contrats.show');






//****************************************************************
// PAGE D'ACCUEIL DU PROFIL MAKER FILIALE COFINA SN
//****************************************************************
  Route::get('/includes/master', 'ConnexionController@comptemaker')->name('includes.headerdesktop-maker');

  //GESTION DU POSTE
  Route::get('/cofinasn/postes/{id}/edit', 'PostesnController@edit')->name('sn.postes.edit');
  Route::post('/cofinasn/postes/{id}', 'PostesnController@update')->name('sn.postes.update');

  //GESTION DE L'EXPERIENCE PROFESSIONNELLE
  Route::get('/cofinasn/experiences/{id}/edit', 'ExperiencesnController@edit')->name('sn.experiences.edit');
  Route::post('/cofinasn/experiences/{id}', 'ExperiencesnController@store')->name('sn.experiences.store');

  //GESTION DE LA FORMATION
  Route::get('/cofinasn/formations/{id}/edit', 'FormationsnController@edit')->name('sn.formations.edit');
  Route::post('/cofinasn/formations/{id}', 'FormationsnController@store')->name('sn.formations.store');

  //PAGE D'ACCUEIL DU MASTER GROUPE
  Route::post('/cofinasn/accueil', 'ComptesnController@accueil')->name('sn.accueil');
  Route::get('/cofinasn/accueil', 'ComptesnController@accueil')->name('sn.accueil');
  Route::get('/cofinasn/accueil', 'ComptesnController@senegal')->name('senegal.accueil');

  //TABLEAU DE BOARD DES EMPLOYES
  Route::get('/cofinasn/employes', 'EmployesnController@index')->name('sn.main');
  Route::get('/cofinasn/employes/create', 'EmployesnController@create')->name('sn.create');
  Route::post('/cofinasn/employes', 'EmployesnController@store')->name('sn.store');
  Route::put('/cofinasn/employes/{id}', 'EmployesnController@update')->name('sn.update');
  Route::get('/cofinasn/employes/{id}', 'EmployesnController@show')->name('sn.show');
  Route::get('/cofinasn/employes/{id}/edit', 'EmployesnController@edit')->name('sn.edit');
  Route::delete('/cofinasn/employes/{id}', 'EmployesnController@destroy')->name('sn.destroy');

  //GESTIONS DES CONGES
  Route::get('/cofinasn/conges/index', 'CongesnController@index')->name('sn.conges.index');
  Route::get('/cofinasn/conges/{id}/edit', 'CongesnController@edit')->name('sn.conges.edit');
  Route::post('/cofinasn/conges/{id}', 'CongesnController@store')->name('sn.conges.store');

  //GESTIONS DES EXTRACTIONS VERS DES FORMATS EXCEL
  Route::get('/cofinasn/reportings/export', 'ReportingsnController@export')->name('sn.reportings.export');
  Route::get('/cofinasn/reportings/index', 'ReportingsnController@index')->name('sn.reportings.index');
  Route::get('/cofinasn/reportings/exportdata', 'ExcelsnController@exportdata')->name('sn.reportings.exportdata');

  //GRAPHIQUE CONSOLETVs/CHARTS
  Route::get('/cofinasn/analyse/index', 'analysesnController@index')->name('sn.analyse.index');
  Route::get('/cofinasn/analyse/entite', 'Analyse_entitesnController@entite')->name('sn.analyse.entite');
  Route::get('/cofinasn/analyse/genre', 'Analyse_entitesnController@genre')->name('sn.analyse.genre');
  Route::get('/cofinasn/analyse/contrat', 'Analyse_contratsnController@contrat')->name('sn.analyse.contrat');

  //GESTION DES CONTRATS
  Route::get('/cofinasn/contrats', 'ContratsnController@index')->name('sn.contrats');
  Route::get('/cofinasn/contrats/index', 'ContratsnController@index')->name('sn.contrats.index');
  Route::get('/cofinasn/contrats/undefined', 'ContratsnController@index')->name('sn.contrats.undefined');
  Route::get('/cofinasn/contrats/{id}/edit', 'ContratsnController@edit')->name('sn.contrats.edit');
  Route::post('/cofinasn/contrats/{id}', 'ContratsnController@update')->name('sn.contrats.update');
  Route::get('/cofinasn/contrats/{id}', 'ContratsnController@show')->name('sn.contrats.show');


  //****************************************************************
  // PAGE D'ACCUEIL DU PROFIL CHECKER FILIALE CAC
  //****************************************************************
  //Route::post('/accueil-checker', 'CompteController@accueil_checker')->name('accueil');
  Route::get('/accueil', 'CompteController@accueil_checker')->name('accueil');
  Route::get('/cote-d-ivoire/accueil', 'CompteController@cotedivoire')->name('cotedivoire.accueil');


  //**************************
  Route::get('/cote-d-ivoire/employes', 'EmployeciController@index')->name('index-employe');
  Route::get('/cote-d-ivoire/employes/create-employe', 'EmployeciController@create')->name('create-employe');
  Route::post('/cote-d-ivoire/employes', 'EmployeciController@store')->name('store-employe');
  Route::put('/cote-d-ivoire/employes/{id}', 'EmployeciController@update')->name('update-employe');
  Route::get('/cote-d-ivoire/employes/{id}', 'EmployeciController@show')->name('show-employe');
  Route::get('/cote-d-ivoire/employes/{id}/edit-employe', 'EmployeciController@edit')->name('edit-employe');
  Route::delete('/cote-d-ivoire/employes/destroy-employe/{id}', 'EmployeciController@destroy')->name('destroy-employe');

  //GESTIONS DES CONGES
  Route::get('/cote-d-ivoire/conges/index', 'CongeciController@index')->name('ci.conges.index');
  Route::get('/cote-d-ivoire/conges/{id}/edit', 'CongeciController@edit')->name('ci.conges.edit');
  Route::post('/cote-d-ivoire/conges/{id}', 'CongeciController@store')->name('ci.conges.store');

  //GESTION DU POSTE CHECKER CI
  Route::get('/cote-d-ivoire/postes/{id}/edit', 'PosteciController@edit')->name('ci.postes.edit');
  Route::post('/cote-d-ivoire/postes/{id}', 'PosteciController@update')->name('ci.postes.update');

  //GESTION DE CONTRAT CHECKER CI
  Route::get('/cote-d-ivoire/contrats/{id}/edit', 'ContratciController@edit')->name('ci.contrats.edit');
  Route::post('/cote-d-ivoire/contrats/{id}', 'ContratciController@update')->name('ci.contrats.update');
  //GESTION
  Route::get('/cote-d-ivoire/postes/{id}/edit', 'PosteciController@edit')->name('ci.postes.edit');

  Route::get('/cote-d-ivoire/experiences/{id}/edit', 'ExperienceciController@edit')->name('ci.experiences.edit');

  //GESTION DE LA FORMATION
  Route::get('/cote-d-ivoire/formations/{id}/edit', 'FormationciController@edit')->name('ci.formations.edit');
  Route::post('/cote-d-ivoire/formations/{id}', 'FormationController@store')->name('ci.formations.store');

  //GESTION DE L'EXPERIENCE PROFESSIONNELLE
  Route::get('/cote-d-ivoire/experiences/{id}/edit', 'ExperienceciController@edit')->name('ci.experiences.edit');
  Route::post('/cote-d-ivoire/experiences/{id}', 'ExperienceciController@store')->name('ci.experiences.store');

  //***************************************************************
  // PAGE D'ACCUEIL DU PROFIL CHECKER FILIALE SENEGAL
  //***************************************************************

  //Route::post('/accueil-checker', 'CompteController@accueil_checker')->name('accueil');
  Route::get('/accueil', 'ComptesnckController@accueil_checker')->name('snck.accueil');
  Route::get('/cofinasn-checker/accueil', 'ComptesnckController@senegalsnck')->name('senegalsnck.accueil');

  //**************************
  Route::get('/cofinasn-checker/employes', 'EmployesnckController@index')->name('snck.index-employe');
  Route::get('/cofinasn-checker/employes/create-employe', 'EmployesnckController@create')->name('snck.create-employe');
  Route::post('/cofinasn-checker/employes', 'EmployesnckController@store')->name('snck.store-employe');
  Route::put('/cofinasn-checker/employes/{id}', 'EmployesnckController@update')->name('snck.update-employe');
  Route::get('/cofinasn-checker/employes/{id}', 'EmployesnckController@show')->name('snck.show-employe');
  Route::get('/cofinasn-checker/employes/{id}/edit-employe', 'EmployesnckController@edit')->name('snck.edit-employe');
  Route::delete('/cofinasn-checker/employes/destroy-employe/{id}', 'EmployesnckController@destroy')->name('snck.destroy-employe');


  //GESTIONS DES CONGES
  Route::get('/cofinasn-checker/conges/index', 'CongesnckController@index')->name('snck.conges.index');
  Route::get('/cofinasn-checker/conges/{id}/edit', 'CongesnckController@edit')->name('snck.conges.edit');
  Route::post('/cofinasn-checker/conges/{id}', 'CongesnckController@store')->name('snck.conges.store');

  //GESTION DU POSTE CHECKER CI
  Route::get('/cofinasn-checker/postes/{id}/edit', 'PostesnckController@edit')->name('snck.postes.edit');
  Route::post('/cofinasn-checker/postes/{id}', 'PostesnckController@update')->name('snck.postes.update');

  //GESTION DE CONTRAT CHECKER CI
  Route::get('/cofinasn-checker/contrats/{id}/edit', 'ContratsnckController@edit')->name('snck.contrats.edit');
  Route::post('/cofinasn-checker/contrats/{id}', 'ContratsnckController@update')->name('snck.contrats.update');
  //GESTION
  Route::get('/cofinasn-checker/postes/{id}/edit', 'PostesnckController@edit')->name('snck.postes.edit');

  Route::get('/cofinasn-checker/experiences/{id}/edit', 'ExperiencesnckController@edit')->name('snck.experiences.edit');

  //GESTION DE LA FORMATION
  Route::get('/cofinasn-checker/formations/{id}/edit', 'FormationsnckController@edit')->name('snck.formations.edit');
  Route::post('/cofinasn-checker/formations/{id}', 'FormationsnckController@store')->name('snck.formations.store');

  //GESTION DE L'EXPERIENCE PROFESSIONNELLE
  Route::get('/cofinasn-checker/experiences/{id}/edit', 'ExperiencesnckController@edit')->name('snck.experiences.edit');
  Route::post('/cofinasn-checker/experiences/{id}', 'ExperiencesnckController@store')->name('snck.experiences.store');

  //******************














Route::get('/includes/master', 'ConnexionController@comptemaker')->name('includes.headerdesktop-maker');

//GESTION DU POSTE
Route::get('/postes/{id}/edit', 'PosteController@edit')->name('postes.edit');
Route::post('/postes/{id}', 'PosteController@update')->name('postes.update');

//GESTION DE L'EXPERIENCE PROFESSIONNELLE
Route::get('/experiences/{id}/edit', 'ExperienceController@edit')->name('experiences.edit');
Route::post('/experiences/{id}', 'ExperienceController@store')->name('experiences.store');

//GESTION DE LA FORMATION
Route::get('/formations/{id}/edit', 'FormationController@edit')->name('formations.edit');
Route::post('/formations/{id}', 'FormationController@store')->name('formations.store');

//PAGE D'ACCUEIL DU MASTER GROUPE
  Route::post('/accueil', 'CompteController@accueil')->name('accueil');
  Route::get('/accueil', 'CompteController@accueil')->name('accueil');
  Route::get('/cote-d-ivoire/accueil', 'CompteController@cotedivoire')->name('cotedivoire.accueil');
//  Route::post('/accueil', 'CompteController@store')->name('accueil.store');
  Route::get('/deconnexion', 'CompteController@deconnexion');


Route::get('/home', 'HomeController@index')->name('home');

Route::get('/includes/headerdesktop-checker', 'CompteController@sessionuser')->name('sessionuser');

//TABLEAU DE BOARD DES EMPLOYES
Route::get('/employes', 'EmployeController@index')->name('main');
Route::get('/employes/create', 'EmployeController@create')->name('create');
Route::post('/employes', 'EmployeController@store')->name('store');
Route::put('/employes/{id}', 'EmployeController@update')->name('update');
Route::get('/employes/{id}', 'EmployeController@show')->name('show');
Route::get('/employes/{id}/edit', 'EmployeController@edit')->name('edit');
Route::delete('/employes/{id}', 'EmployeController@destroy')->name('destroy');
//Route::get('/employe/afficher', 'EmployeController@afficher');


//CRUD DES DEPARTEMENTS
Route::get('/parametres/departements', 'DepartementController@index')->name('departements.index');
Route::get('/parametres/departements/create', 'DepartementController@create')->name('departements.create');
Route::post('/parametres/departements', 'DepartementController@store')->name('departements.store');
Route::put('/parametres/departements/{id}', 'DepartementController@update')->name('departements.update');
Route::get('/parametres/departements/{id}', 'DepartementController@show')->name('departements.show');
Route::get('/parametres/departements/{id}/edit', 'DepartementController@edit')->name('departements.edit');
Route::delete('/parametres/departements/{id}', 'DepartementController@destroy')->name('departements.destroy');

//CRUD DES SITES
Route::get('/parametres/sites', 'SiteController@index')->name('sites.index');
Route::get('/parametres/sites/create', 'SiteController@create')->name('sites.create');
Route::post('/parametres/sites', 'SiteController@store')->name('sites.store');
Route::put('/parametres/sites/{id}', 'SiteController@update')->name('sites.update');
Route::get('/parametres/sites/{id}', 'SiteController@show')->name('sites.show');
Route::get('/parametres/sites/{id}/edit', 'SiteController@edit')->name('sites.edit');
Route::delete('/parametres/sites/{id}', 'SiteController@destroy')->name('sites.destroy');

//GESTIONS DES CONGES
Route::get('/conges/index', 'CongeController@index')->name('conges.index');
Route::get('/conges/{id}/edit', 'CongeController@edit')->name('conges.edit');
Route::post('/conges/{id}', 'CongeController@store')->name('conges.store');

//GESTIONS DES EXTRACTIONS VERS DES FORMATS EXCEL
Route::get('/reportings/export', 'ReportingController@export')->name('reportings.export');
Route::get('/reportings/index', 'ReportingController@index')->name('reportings.index');
Route::get('/reportings/exportdata', 'ExcelController@exportdata')->name('reportings.exportdata');

//GRAPHIQUE CONSOLETVs/CHARTS
Route::get('/analyse/index', 'analyseController@index')->name('analyse.index');
Route::get('/analyse/entite', 'Analyse_entiteController@entite')->name('analyse.entite');
Route::get('/analyse/genre', 'Analyse_entiteController@genre')->name('analyse.genre');
Route::get('/analyse/contrat', 'Analyse_contratController@contrat')->name('analyse.contrat');

//GESTION DES CONTRATS
Route::get('/contrats', 'ContratController@index')->name('contrats');
Route::get('/contrats/index', 'ContratController@index')->name('contrats.index');
Route::get('/contrats/undefined', 'ContratController@index')->name('contrats.undefined');
Route::get('/contrats/{id}/edit', 'ContratController@edit')->name('contrats.edit');
Route::post('/contrats/{id}', 'ContratController@update')->name('contrats.update');
Route::get('/contrats/{id}', 'ContratController@show')->name('contrats.show');

});


//AUTHENTIFICATION DES USERS
Route::get('/', 'ConnexionController@index')->name('connexions.index');
Route::get('/connexions/index', 'ConnexionController@index')->name('connexions.index');
Route::get('/connexions', 'ConnexionController@index')->name('connexions.index');
Route::post('/connexions', 'ConnexionController@authentification')->name('authentification');
