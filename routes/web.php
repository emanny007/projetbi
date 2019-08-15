<?php

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
