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
  // PAGE D'ACCUEIL DU PROFIL MAKER FILIALE COFINA BURKINA FASO
  //****************************************************************
  //GESTION DE LA PERFORMANCE
  Route::get('/cofinabf/performances/{id}/modif', 'PerformancebfController@modif')->name('bf.performances.modif');
  Route::put('/cofinabf/performances/modif/{id}', 'PerformancebfController@update')->name('bf.performances.update');

  Route::get('/cofinabf/performances/index', 'PerformancebfController@index')->name('bf.performances.index');
  Route::get('/cofinabf/performances/{id}/edit', 'PerformancebfController@edit')->name('bf.performances.edit');
  Route::post('/cofinabf/performances/{id}', 'PerformancebfController@store')->name('bf.performances.store');
  Route::delete('/cofinabf/performances/{id}', 'PerformancebfController@destroy')->name('bf.performances.destroy');

  //GESTIONS DES DEPARTS
  Route::get('/cofinabf/departs/index', 'DepartbfController@index')->name('bf.departs.index');
  Route::get('/cofinabf/departs/{id}/edit', 'DepartbfController@edit')->name('bf.departs.edit');
  //Route::post('/departs/{id}', 'DepartController@store')->name('departs.store');
  Route::delete('/cofinabf/departs/{id}', 'DepartbfController@destroy')->name('bf.departs.destroy');
  Route::post('/cofinabf/departs/{id}', 'DepartbfController@update')->name('bf.departs.update');

  //GESTIONS DES SANCTIONS
  Route::get('/cofinabf/sanctions/index', 'SanctionbfController@index')->name('bf.sanctions.index');
  Route::get('/cofinabf/sanctions/{id}/edit', 'SanctionbfController@edit')->name('bf.sanctions.edit');
  Route::post('/cofinabf/sanctions/{id}', 'SanctionbfController@store')->name('bf.sanctions.store');
  Route::delete('/cofinabf/sanctions/{id}', 'SanctionbfController@destroy')->name('bf.sanctions.destroy');

//GESTION DU POSTE
Route::get('/cofinabf/postes/{id}/edit', 'PostebfController@edit')->name('bf.postes.edit');
Route::post('/cofinabf/postes/{id}', 'PostebfController@update')->name('bf.postes.update');

//GESTION DE L'EXPERIENCE PROFESSIONNELLE
Route::get('/cofinabf/experiences/{id}/edit', 'ExperiencebfController@edit')->name('bf.experiences.edit');
Route::post('/cofinabf/experiences/{id}', 'ExperiencebfController@store')->name('bf.experiences.store');

//GESTION DE LA FORMATION
Route::get('/cofinabf/formations/{id}/edit', 'FormationbfController@edit')->name('bf.formations.edit');
Route::post('/cofinabf/formations/{id}', 'FormationcgController@store')->name('bf.formations.store');

//PAGE D'ACCUEIL DU MASTER GROUPE
  Route::post('/cofinabf/accueil', 'ComptebfController@accueil')->name('bf.accueil');
  Route::get('/cofinabf/accueil', 'ComptebfController@accueil')->name('bf.accueil');
  Route::get('/cofinabf/accueil', 'ComptebfController@senegal')->name('bf.accueil');

//TABLEAU DE BOARD DES EMPLOYES
Route::get('/cofinabf/employes', 'EmployebfController@index')->name('bf.main');
Route::get('/cofinabf/employes/create', 'EmployebfController@create')->name('bf.create');
Route::post('/cofinabf/employes', 'EmployebfController@store')->name('bf.store');
Route::put('/cofinabf/employes/{id}', 'EmployebfController@update')->name('bf.update');
Route::get('/cofinabf/employes/{id}', 'EmployebfController@show')->name('bf.show');
Route::get('/cofinabf/employes/{id}/edit', 'EmployebfController@edit')->name('bf.edit');
Route::delete('/cofinabf/employes/{id}', 'EmployebfController@destroy')->name('bf.destroy');

//GESTIONS DES CONGES
Route::get('/cofinabf/conges/index', 'CongebfController@index')->name('bf.conges.index');
Route::get('/cofinabf/conges/{id}/edit', 'CongebfController@edit')->name('bf.conges.edit');
Route::post('/cofinabf/conges/{id}', 'CongebfController@store')->name('bf.conges.store');

//GESTIONS DES EXTRACTIONS VERS DES FORMATS EXCEL
Route::get('/cofinabf/reportings/index', 'ReportingbfController@export')->name('bf.reportings.export');
Route::post('/cofinabf/reportings/index', 'ReportingbfController@index')->name('bf.reportings.index');
Route::get('/cofinabf/reportings/exportdata', 'ExcelbfController@exportdata')->name('bf.reportings.exportdata');


//GRAPHIQUE CONSOLETVs/CHARTS
Route::get('/cofinabf/analyse/index', 'analysebfController@index')->name('bf.analyse.index');
Route::get('/cofinabf/analyse/entite', 'Analyse_entitebfController@entite')->name('bf.analyse.entite');
Route::get('/cofinabf/analyse/genre', 'Analyse_entitebfController@genre')->name('bf.analyse.genre');
Route::get('/cofinabf/analyse/contrat', 'Analyse_contratbfController@contrat')->name('bf.analyse.contrat');
Route::get('/cofinabf/analyse/indicateur', 'Analyse_indicateurbfController@indicateur')->name('bf.analyse.indicateur');
Route::post('/cofinabf/analyse/indicateur', 'Analyse_indicateurbfController@indicateur')->name('bf.analyse.indicateur');


//GESTION DES CONTRATS
Route::get('/cofinabf/contrats', 'ContratbfController@index')->name('bf.contrats');
Route::get('/cofinabf/contrats/index', 'ContratbfController@index')->name('bf.contrats.index');
Route::get('/cofinabf/contrats/undefined', 'ContratbfController@index')->name('bf.contrats.undefined');
Route::get('/cofinabf/contrats/{id}/edit', 'ContratbfController@edit')->name('bf.contrats.edit');
Route::post('/cofinabf/contrats/{id}', 'ContratbfController@update')->name('bf.contrats.update');
Route::get('/cofinabf/contrats/{id}', 'ContratbfController@show')->name('bf.contrats.show');




  //***************************************************************
  // PAGE D'ACCUEIL DU PROFIL MAKER CTI (DROIT LIMITE)
  //***************************************************************

  //Route::post('/accueil-checker', 'CompteController@accueil_checker')->name('accueil');
  Route::post('/cti-maker/accueil', 'ComptectiController@accueil_maker')->name('cti.accueil');
  Route::get('/cti-maker/accueil', 'ComptectiController@accueil_maker')->name('cti.accueil');
  Route::get('/cti-maker/accueil', 'ComptectiController@accueil_liste_entite')->name('cti-entite.accueil');

  //**************************
  //TABLEAU DE BOARD DES EMPLOYES
  //GESTION DE LA PERFORMANCE
  Route::get('/cti-maker/performances/{id}/modif', 'PerformancectiController@modif')->name('cti.performances.modif');
  Route::put('/cti-maker/performances/modif/{id}', 'PerformancectiController@update')->name('cti.performances.update');

  Route::get('/cti-maker/performances/index', 'PerformancectiController@index')->name('cti.performances.index');
  Route::get('/cti-maker/performances/{id}/edit', 'PerformancectiController@edit')->name('cti.performances.edit');
  Route::post('/cti-maker/performances/{id}', 'PerformancectiController@store')->name('cti.performances.store');
  Route::delete('/cti-maker/performances/{id}', 'PerformancectiController@destroy')->name('cti.performances.destroy');

  //GESTIONS DES DEPARTS
  Route::get('/cti-maker/departs/index', 'DepartctiController@index')->name('cti.departs.index');
  Route::get('/cti-maker/departs/{id}/edit', 'DepartctiController@edit')->name('cti.departs.edit');
  //Route::post('/departs/{id}', 'DepartController@store')->name('departs.store');
  Route::delete('/cti-maker/departs/{id}', 'DepartctiController@destroy')->name('cti.departs.destroy');
  Route::post('/cti-maker/departs/{id}', 'DepartctiController@update')->name('cti.departs.update');

  //GESTIONS DES SANCTIONS
  Route::get('/cti-maker/sanctions/index', 'SanctionctiController@index')->name('cti.sanctions.index');
  Route::get('/cti-maker/sanctions/{id}/edit', 'SanctionctiController@edit')->name('cti.sanctions.edit');
  Route::post('/cti-maker/sanctions/{id}', 'SanctionctiController@store')->name('cti.sanctions.store');
  Route::delete('/cti-maker/sanctions/{id}', 'SanctionctiController@destroy')->name('cti.sanctions.destroy');

  Route::get('/cti-maker/employes', 'EmployectiController@index')->name('cti.index-employe');
  Route::get('/cti-maker/employes/create-employe', 'EmployectiController@create')->name('cti.create-employe');
  Route::post('/cti-maker/employes', 'EmployectiController@store')->name('cti.store-employe');
  Route::put('/cti-maker/employes/{id}', 'EmployectiController@update')->name('cti.update-employe');
  Route::get('/cti-maker/employes/{id}', 'EmployectiController@show')->name('cti.show-employe');
  Route::get('/cti-maker/employes/{id}/edit-employe', 'EmployectiController@edit')->name('cti.edit-employe');
  Route::delete('/cti-maker/employes/destroy-employe/{id}', 'EmployectiController@destroy')->name('cti.destroy-employe');


  //GESTIONS DES CONGES
  Route::get('/cti-maker/conges/index', 'CongectiController@index')->name('cti.conges.index');
  Route::get('/cti-maker/conges/{id}/edit', 'CongectiController@edit')->name('cti.conges.edit');
  Route::post('/cti-maker/conges/{id}', 'CongectiController@store')->name('cti.conges.store');

  //GESTION DU POSTE MAKER CTI
  Route::get('/cti-maker/postes/{id}/edit', 'PostesctiController@edit')->name('cti.postes.edit');
  Route::post('/cti-maker/postes/{id}', 'PostesctiController@update')->name('cti.postes.update');

  //GESTION DE CONTRAT MAKER CTI
  Route::get('/cti-maker/contrats/{id}/edit', 'ContratctiController@edit')->name('cti.contrats.edit');
  Route::post('/cti-maker/contrats/{id}', 'ContratctiController@update')->name('cti.contrats.update');
  //GESTION
  //Route::get('/cti-maker/postes/{id}/edit', 'PostesctiController@edit')->name('cti.postes.edit');

  Route::get('/cti-maker/experiences/{id}/edit', 'ExperiencectiController@edit')->name('cti.experiences.edit');

  //GESTION DE LA FORMATION
  Route::get('/cti-maker/formations/{id}/edit', 'FormationctiController@edit')->name('cti.formations.edit');
  Route::post('/cti-maker/formations/{id}', 'FormationctiController@store')->name('cti.formations.store');

  //GESTION DE L'EXPERIENCE PROFESSIONNELLE
  Route::get('/cti-maker/experiences/{id}/edit', 'ExperiencectiController@edit')->name('cti.experiences.edit');
  Route::post('/cti-maker/experiences/{id}', 'ExperiencectiController@store')->name('cti.experiences.store');


  //****************************************************************
  // PAGE D'ACCUEIL PROFIL MAKER DE LA FILIALE FINELLE
  //****************************************************************
  //GESTION DE LA PERFORMANCE
  Route::get('/finelle/performances/{id}/modif', 'PerformancefineController@modif')->name('fine.performances.modif');
  Route::put('/finelle/performances/modif/{id}', 'PerformancefineController@update')->name('fine.performances.update');

  Route::get('/finelle/performances/index', 'PerformancefineController@index')->name('fine.performances.index');
  Route::get('/finelle/performances/{id}/edit', 'PerformancefineController@edit')->name('fine.performances.edit');
  Route::post('/finelle/performances/{id}', 'PerformancefineController@store')->name('fine.performances.store');
  Route::delete('/finelle/performances/{id}', 'PerformancefineController@destroy')->name('fine.performances.destroy');

  //GESTIONS DES DEPARTS
  Route::get('/finelle/departs/index', 'DepartfineController@index')->name('fine.departs.index');
  Route::get('/finelle/departs/{id}/edit', 'DepartfineController@edit')->name('fine.departs.edit');
  //Route::post('/departs/{id}', 'DepartController@store')->name('departs.store');
  Route::delete('/finelle/departs/{id}', 'DepartfineController@destroy')->name('fine.departs.destroy');
  Route::post('/finelle/departs/{id}', 'DepartfineController@update')->name('fine.departs.update');

  //GESTIONS DES SANCTIONS
  Route::get('/finelle/sanctions/index', 'SanctionfineController@index')->name('fine.sanctions.index');
  Route::get('/finelle/sanctions/{id}/edit', 'SanctionfineController@edit')->name('fine.sanctions.edit');
  Route::post('/finelle/sanctions/{id}', 'SanctionfineController@store')->name('fine.sanctions.store');
  Route::delete('/finelle/sanctions/{id}', 'SanctionfineController@destroy')->name('fine.sanctions.destroy');

  //GESTION DU POSTE
  Route::get('/finelle/postes/{id}/edit', 'PostefineController@edit')->name('fine.postes.edit');
  Route::post('/finelle/postes/{id}', 'PostefineController@update')->name('fine.postes.update');

  //GESTION DE L'EXPERIENCE PROFESSIONNELLE
  Route::get('/finelle/experiences/{id}/edit', 'ExperiencefineController@edit')->name('fine.experiences.edit');
  Route::post('/finelle/experiences/{id}', 'ExperiencefineController@store')->name('fine.experiences.store');

  //GESTION DE LA FORMATION
  Route::get('/finelle/formations/{id}/edit', 'FormationfineController@edit')->name('fine.formations.edit');
  Route::post('/finelle/formations/{id}', 'FormationfineController@store')->name('fine.formations.store');

  //PAGE D'ACCUEIL DU MASTER GROUPE
  Route::post('/finelle/accueil', 'ComptefineController@accueil')->name('fine.accueil');
  Route::get('/finelle/accueil', 'ComptefineController@accueil')->name('fine.accueil');
  Route::get('/finelle/accueil', 'ComptefineController@senegal')->name('fine.accueil');

  //TABLEAU DE BOARD DES EMPLOYES
  Route::get('/finelle/employes', 'EmployefineController@index')->name('fine.main');
  Route::get('/finelle/employes/create', 'EmployefineController@create')->name('fine.create');
  Route::post('/finelle/employes', 'EmployefineController@store')->name('fine.store');
  Route::put('/finelle/employes/{id}', 'EmployefineController@update')->name('fine.update');
  Route::get('/finelle/employes/{id}', 'EmployefineController@show')->name('fine.show');
  Route::get('/finelle/employes/{id}/edit', 'EmployefineController@edit')->name('fine.edit');
  Route::delete('/finelle/employes/{id}', 'EmployefineController@destroy')->name('fine.destroy');

  //GESTIONS DES CONGES
  Route::get('/finelle/conges/index', 'CongefineController@index')->name('fine.conges.index');
  Route::get('/finelle/conges/{id}/edit', 'CongefineController@edit')->name('fine.conges.edit');
  Route::post('/finelle/conges/{id}', 'CongefineController@store')->name('fine.conges.store');

  //GESTIONS DES EXTRACTIONS VERS DES FORMATS EXCEL
  Route::get('/finelle/reportings/index', 'ReportingfineController@export')->name('fine.reportings.export');
  Route::post('/finelle/reportings/index', 'ReportingfineController@index')->name('fine.reportings.index');
  Route::get('/finelle/reportings/exportdata', 'ExcelfineController@exportdata')->name('fine.reportings.exportdata');


  //GRAPHIQUE CONSOLETVs/CHARTS
  Route::get('/finelle/analyse/index', 'analysefineController@index')->name('fine.analyse.index');
  Route::get('/finelle/analyse/entite', 'Analyse_entitefineController@entite')->name('fine.analyse.entite');
  Route::get('/finelle/analyse/genre', 'Analyse_entitefineController@genre')->name('fine.analyse.genre');
  Route::get('/finelle/analyse/contrat', 'Analyse_contratfineController@contrat')->name('fine.analyse.contrat');
  Route::get('/finelle/analyse/indicateur', 'Analyse_indicateurfineController@indicateur')->name('fine.analyse.indicateur');
  Route::post('/finelle/analyse/indicateur', 'Analyse_indicateurfineController@indicateur')->name('fine.analyse.indicateur');

  //GESTION DES CONTRATS
  Route::get('/finelle/contrats', 'ContratfineController@index')->name('fine.contrats');
  Route::get('/finelle/contrats/index', 'ContratfineController@index')->name('fine.contrats.index');
  Route::get('/finelle/contrats/undefined', 'ContratfineController@index')->name('fine.contrats.undefined');
  Route::get('/finelle/contrats/{id}/edit', 'ContratfineController@edit')->name('fine.contrats.edit');
  Route::post('/finelle/contrats/{id}', 'ContratfineController@update')->name('fine.contrats.update');
  Route::get('/finelle/contrats/{id}', 'ContratfineController@show')->name('fine.contrats.show');


  //****************************************************************
  // PAGE D'ACCUEIL DU PROFIL MAKER FILIALE COFINA MALI
  //****************************************************************
  //GESTION DE LA PERFORMANCE
  Route::get('/cofinaml/performances/{id}/modif', 'PerformancemlController@modif')->name('ml.performances.modif');
  Route::put('/cofinaml/performances/modif/{id}', 'PerformancemlController@update')->name('ml.performances.update');

  Route::get('/cofinaml/performances/index', 'PerformancemlController@index')->name('ml.performances.index');
  Route::get('/cofinaml/performances/{id}/edit', 'PerformancemlController@edit')->name('ml.performances.edit');
  Route::post('/cofinaml/performances/{id}', 'PerformancemlController@store')->name('ml.performances.store');
  Route::delete('/cofinaml/performances/{id}', 'PerformancemlController@destroy')->name('ml.performances.destroy');

  //GESTIONS DES DEPARTS
  Route::get('/cofinaml/departs/index', 'DepartmlController@index')->name('ml.departs.index');
  Route::get('/cofinaml/departs/{id}/edit', 'DepartmlController@edit')->name('ml.departs.edit');
  //Route::post('/departs/{id}', 'DepartController@store')->name('departs.store');
  Route::delete('/cofinaml/departs/{id}', 'DepartmlController@destroy')->name('ml.departs.destroy');
  Route::post('/cofinaml/departs/{id}', 'DepartmlController@update')->name('ml.departs.update');

  //GESTIONS DES SANCTIONS
  Route::get('/cofinaml/sanctions/index', 'SanctionmlController@index')->name('ml.sanctions.index');
  Route::get('/cofinaml/sanctions/{id}/edit', 'SanctionmlController@edit')->name('ml.sanctions.edit');
  Route::post('/cofinaml/sanctions/{id}', 'SanctionmlController@store')->name('ml.sanctions.store');
  Route::delete('/cofinaml/sanctions/{id}', 'SanctionmlController@destroy')->name('ml.sanctions.destroy');

//GESTION DU POSTE
Route::get('/cofinaml/postes/{id}/edit', 'PostemlController@edit')->name('ml.postes.edit');
Route::post('/cofinaml/postes/{id}', 'PostemlController@update')->name('ml.postes.update');

//GESTION DE L'EXPERIENCE PROFESSIONNELLE
Route::get('/cofinaml/experiences/{id}/edit', 'ExperiencemlController@edit')->name('ml.experiences.edit');
Route::post('/cofinaml/experiences/{id}', 'ExperiencemlController@store')->name('ml.experiences.store');

//GESTION DE LA FORMATION
Route::get('/cofinaml/formations/{id}/edit', 'FormationmlController@edit')->name('ml.formations.edit');
Route::post('/cofinaml/formations/{id}', 'FormationcgController@store')->name('ml.formations.store');

//PAGE D'ACCUEIL DU MASTER GROUPE
  Route::post('/cofinaml/accueil', 'ComptemlController@accueil')->name('ml.accueil');
  Route::get('/cofinaml/accueil', 'ComptemlController@accueil')->name('ml.accueil');
  Route::get('/cofinaml/accueil', 'ComptemlController@senegal')->name('ml.accueil');

//TABLEAU DE BOARD DES EMPLOYES
Route::get('/cofinaml/employes', 'EmployemlController@index')->name('ml.main');
Route::get('/cofinaml/employes/create', 'EmployemlController@create')->name('ml.create');
Route::post('/cofinaml/employes', 'EmployemlController@store')->name('ml.store');
Route::put('/cofinaml/employes/{id}', 'EmployemlController@update')->name('ml.update');
Route::get('/cofinaml/employes/{id}', 'EmployemlController@show')->name('ml.show');
Route::get('/cofinaml/employes/{id}/edit', 'EmployemlController@edit')->name('ml.edit');
Route::delete('/cofinaml/employes/{id}', 'EmployemlController@destroy')->name('ml.destroy');

//GESTIONS DES CONGES
Route::get('/cofinaml/conges/index', 'CongemlController@index')->name('ml.conges.index');
Route::get('/cofinaml/conges/{id}/edit', 'CongemlController@edit')->name('ml.conges.edit');
Route::post('/cofinaml/conges/{id}', 'CongemlController@store')->name('ml.conges.store');

//GESTIONS DES EXTRACTIONS VERS DES FORMATS EXCEL
Route::get('/cofinaml/reportings/index', 'ReportingmlController@export')->name('ml.reportings.export');
Route::post('/cofinaml/reportings/index', 'ReportingmlController@index')->name('ml.reportings.index');
Route::get('/cofinaml/reportings/exportdata', 'ExcelmlController@exportdata')->name('ml.reportings.exportdata');


//GRAPHIQUE CONSOLETVs/CHARTS
Route::get('/cofinaml/analyse/index', 'analysemlController@index')->name('ml.analyse.index');
Route::get('/cofinaml/analyse/entite', 'Analyse_entitemlController@entite')->name('ml.analyse.entite');
Route::get('/cofinaml/analyse/genre', 'Analyse_entitemlController@genre')->name('ml.analyse.genre');
Route::get('/cofinaml/analyse/contrat', 'Analyse_contratmlController@contrat')->name('ml.analyse.contrat');

//GESTION DES CONTRATS
Route::get('/cofinaml/contrats', 'ContratmlController@index')->name('ml.contrats');
Route::get('/cofinaml/contrats/index', 'ContratmlController@index')->name('ml.contrats.index');
Route::get('/cofinaml/contrats/undefined', 'ContratmlController@index')->name('ml.contrats.undefined');
Route::get('/cofinaml/contrats/{id}/edit', 'ContratmlController@edit')->name('ml.contrats.edit');
Route::post('/cofinaml/contrats/{id}', 'ContratmlController@update')->name('ml.contrats.update');
Route::get('/cofinaml/contrats/{id}', 'ContratmlController@show')->name('ml.contrats.show');


    //****************************************************************
    // PAGE D'ACCUEIL DU PROFIL MAKER FILIALE COFINA CONGO
    //****************************************************************
    //GESTION DE LA PERFORMANCE
    Route::get('/cofinacg/performances/{id}/modif', 'PerformancecgController@modif')->name('cg.performances.modif');
    Route::put('/cofinacg/performances/modif/{id}', 'PerformancecgController@update')->name('cg.performances.update');

    Route::get('/cofinacg/performances/index', 'PerformancecgController@index')->name('cg.performances.index');
    Route::get('/cofinacg/performances/{id}/edit', 'PerformancecgController@edit')->name('cg.performances.edit');
    Route::post('/cofinacg/performances/{id}', 'PerformancecgController@store')->name('cg.performances.store');
    Route::delete('/cofinacg/performances/{id}', 'PerformancecgController@destroy')->name('cg.performances.destroy');

    //GESTIONS DES DEPARTS
    Route::get('/cofinacg/departs/index', 'DepartcgController@index')->name('cg.departs.index');
    Route::get('/cofinacg/departs/{id}/edit', 'DepartcgController@edit')->name('cg.departs.edit');
    //Route::post('/departs/{id}', 'DepartController@store')->name('departs.store');
    Route::delete('/cofinacg/departs/{id}', 'DepartcgController@destroy')->name('cg.departs.destroy');
    Route::post('/cofinacg/departs/{id}', 'DepartcgController@update')->name('cg.departs.update');

    //GESTIONS DES SANCTIONS
    Route::get('/cofinacg/sanctions/index', 'SanctioncgController@index')->name('cg.sanctions.index');
    Route::get('/cofinacg/sanctions/{id}/edit', 'SanctioncgController@edit')->name('cg.sanctions.edit');
    Route::post('/cofinacg/sanctions/{id}', 'SanctioncgController@store')->name('cg.sanctions.store');
    Route::delete('/cofinacg/sanctions/{id}', 'SanctioncgController@destroy')->name('cg.sanctions.destroy');

  //GESTION DU POSTE
  Route::get('/cofinacg/postes/{id}/edit', 'PostecgController@edit')->name('cg.postes.edit');
  Route::post('/cofinacg/postes/{id}', 'PostecgController@update')->name('cg.postes.update');

  //GESTION DE L'EXPERIENCE PROFESSIONNELLE
  Route::get('/cofinacg/experiences/{id}/edit', 'ExperiencecgController@edit')->name('cg.experiences.edit');
  Route::post('/cofinacg/experiences/{id}', 'ExperiencecgController@store')->name('cg.experiences.store');

  //GESTION DE LA FORMATION
  Route::get('/cofinacg/formations/{id}/edit', 'FormationcgController@edit')->name('cg.formations.edit');
  Route::post('/cofinacg/formations/{id}', 'FormationcgController@store')->name('cg.formations.store');

  //PAGE D'ACCUEIL DU MASTER GROUPE
    Route::post('/cofinacg/accueil', 'ComptecgController@accueil')->name('cg.accueil');
    Route::get('/cofinacg/accueil', 'ComptecgController@accueil')->name('cg.accueil');
    Route::get('/cofinacg/accueil', 'ComptecgController@senegal')->name('cg.accueil');

  //TABLEAU DE BOARD DES EMPLOYES
  Route::get('/cofinacg/employes', 'EmployecgController@index')->name('cg.main');
  Route::get('/cofinacg/employes/create', 'EmployecgController@create')->name('cg.create');
  Route::post('/cofinacg/employes', 'EmployecgController@store')->name('cg.store');
  Route::put('/cofinacg/employes/{id}', 'EmployecgController@update')->name('cg.update');
  Route::get('/cofinacg/employes/{id}', 'EmployecgController@show')->name('cg.show');
  Route::get('/cofinacg/employes/{id}/edit', 'EmployecgController@edit')->name('cg.edit');
  Route::delete('/cofinacg/employes/{id}', 'EmployecgController@destroy')->name('cg.destroy');

  //GESTIONS DES CONGES
  Route::get('/cofinacg/conges/index', 'CongecgController@index')->name('cg.conges.index');
  Route::get('/cofinacg/conges/{id}/edit', 'CongecgController@edit')->name('cg.conges.edit');
  Route::post('/cofinacg/conges/{id}', 'CongecgController@store')->name('cg.conges.store');

  //GESTIONS DES EXTRACTIONS VERS DES FORMATS EXCEL
  Route::get('/cofinacg/reportings/export', 'ReportingcgController@export')->name('cg.reportings.export');
  Route::get('/cofinacg/reportings/index', 'ReportingcgController@index')->name('cg.reportings.index');
  Route::get('/cofinacg/reportings/exportdata', 'ExcelcgController@exportdata')->name('cg.reportings.exportdata');

  //GRAPHIQUE CONSOLETVs/CHARTS
  Route::get('/cofinacg/analyse/index', 'analysecgController@index')->name('cg.analyse.index');
  Route::get('/cofinacg/analyse/entite', 'Analyse_entitecgController@entite')->name('cg.analyse.entite');
  Route::get('/cofinacg/analyse/genre', 'Analyse_entitecgController@genre')->name('cg.analyse.genre');
  Route::get('/cofinacg/analyse/contrat', 'Analyse_contratcgController@contrat')->name('cg.analyse.contrat');

  //GESTION DES CONTRATS
  Route::get('/cofinacg/contrats', 'ContratcgController@index')->name('cg.contrats');
  Route::get('/cofinacg/contrats/index', 'ContratcgController@index')->name('cg.contrats.index');
  Route::get('/cofinacg/contrats/undefined', 'ContratcgController@index')->name('cg.contrats.undefined');
  Route::get('/cofinacg/contrats/{id}/edit', 'ContratcgController@edit')->name('cg.contrats.edit');
  Route::post('/cofinacg/contrats/{id}', 'ContratcgController@update')->name('cg.contrats.update');
  Route::get('/cofinacg/contrats/{id}', 'ContratcgController@show')->name('cg.contrats.show');

  //****************************************************************
  // PAGE D'ACCUEIL DU PROFIL MAKER FILIALE COFINA GN
  //****************************************************************
  //GESTION DE LA PERFORMANCE
  Route::get('/cofinagn/performances/{id}/modif', 'PerformancegnController@modif')->name('gn.performances.modif');
  Route::put('/cofinagn/performances/modif/{id}', 'PerformancegnController@update')->name('gn.performances.update');

  Route::get('/cofinagn/performances/index', 'PerformancegnController@index')->name('gn.performances.index');
  Route::get('/cofinagn/performances/{id}/edit', 'PerformancegnController@edit')->name('gn.performances.edit');
  Route::post('/cofinagn/performances/{id}', 'PerformancegnController@store')->name('gn.performances.store');
  Route::delete('/cofinagn/performances/{id}', 'PerformancegnController@destroy')->name('gn.performances.destroy');

  //GESTIONS DES DEPARTS
  Route::get('/cofinagn/departs/index', 'DepartgnController@index')->name('gn.departs.index');
  Route::get('/cofinagn/departs/{id}/edit', 'DepartgnController@edit')->name('gn.departs.edit');
  //Route::post('/departs/{id}', 'DepartController@store')->name('departs.store');
  Route::delete('/cofinagn/departs/{id}', 'DepartgnController@destroy')->name('gn.departs.destroy');
  Route::post('/cofinagn/departs/{id}', 'DepartgnController@update')->name('gn.departs.update');

  //GESTIONS DES SANCTIONS
  Route::get('/cofinagn/sanctions/index', 'SanctiongnController@index')->name('gn.sanctions.index');
  Route::get('/cofinagn/sanctions/{id}/edit', 'SanctiongnController@edit')->name('gn.sanctions.edit');
  Route::post('/cofinagn/sanctions/{id}', 'SanctiongnController@store')->name('gn.sanctions.store');
  Route::delete('/cofinagn/sanctions/{id}', 'SanctiongnController@destroy')->name('gn.sanctions.destroy');

//GESTION DU POSTE
Route::get('/cofinagn/postes/{id}/edit', 'PostegnController@edit')->name('gn.postes.edit');
Route::post('/cofinagn/postes/{id}', 'PostegnController@update')->name('gn.postes.update');

//GESTION DE L'EXPERIENCE PROFESSIONNELLE
Route::get('/cofinagn/experiences/{id}/edit', 'ExperiencegnController@edit')->name('gn.experiences.edit');
Route::post('/cofinagn/experiences/{id}', 'ExperiencegnController@store')->name('gn.experiences.store');

//GESTION DE LA FORMATION
Route::get('/cofinagn/formations/{id}/edit', 'FormationgnController@edit')->name('gn.formations.edit');
Route::post('/cofinagn/formations/{id}', 'FormationgnController@store')->name('gn.formations.store');

//PAGE D'ACCUEIL DU MASTER GROUPE
  Route::post('/cofinagn/accueil', 'ComptegnController@accueil')->name('gn.accueil');
  Route::get('/cofinagn/accueil', 'ComptegnController@accueil')->name('gn.accueil');
  Route::get('/cofinagn/accueil', 'ComptegnController@senegal')->name('gn.accueil');

//TABLEAU DE BOARD DES EMPLOYES
Route::get('/cofinagn/employes', 'EmployegnController@index')->name('gn.main');
Route::get('/cofinagn/employes/create', 'EmployegnController@create')->name('gn.create');
Route::post('/cofinagn/employes', 'EmployegnController@store')->name('gn.store');
Route::put('/cofinagn/employes/{id}', 'EmployegnController@update')->name('gn.update');
Route::get('/cofinagn/employes/{id}', 'EmployegnController@show')->name('gn.show');
Route::get('/cofinagn/employes/{id}/edit', 'EmployegnController@edit')->name('gn.edit');
Route::delete('/cofinagn/employes/{id}', 'EmployegnController@destroy')->name('gn.destroy');

//GESTIONS DES CONGES
Route::get('/cofinagn/conges/index', 'CongegnController@index')->name('gn.conges.index');
Route::get('/cofinagn/conges/{id}/edit', 'CongegnController@edit')->name('gn.conges.edit');
Route::post('/cofinagn/conges/{id}', 'CongegnController@store')->name('gn.conges.store');

//GESTIONS DES EXTRACTIONS VERS DES FORMATS EXCEL
Route::get('/cofinagn/reportings/export', 'ReportinggnController@export')->name('gn.reportings.export');
Route::get('/cofinagn/reportings/index', 'ReportinggnController@index')->name('gn.reportings.index');
Route::get('/cofinagn/reportings/exportdata', 'ExcelgnController@exportdata')->name('gn.reportings.exportdata');

//GRAPHIQUE CONSOLETVs/CHARTS
Route::get('/cofinagn/analyse/index', 'analysegnController@index')->name('gn.analyse.index');
Route::get('/cofinagn/analyse/entite', 'Analyse_entitegnController@entite')->name('gn.analyse.entite');
Route::get('/cofinagn/analyse/genre', 'Analyse_entitegnController@genre')->name('gn.analyse.genre');
Route::get('/cofinagn/analyse/contrat', 'Analyse_contratgnController@contrat')->name('gn.analyse.contrat');

//GESTION DES CONTRATS
Route::get('/cofinagn/contrats', 'ContratgnController@index')->name('gn.contrats');
Route::get('/cofinagn/contrats/index', 'ContratgnController@index')->name('gn.contrats.index');
Route::get('/cofinagn/contrats/undefined', 'ContratgnController@index')->name('gn.contrats.undefined');
Route::get('/cofinagn/contrats/{id}/edit', 'ContratgnController@edit')->name('gn.contrats.edit');
Route::post('/cofinagn/contrats/{id}', 'ContratgnController@update')->name('gn.contrats.update');
Route::get('/cofinagn/contrats/{id}', 'ContratgnController@show')->name('gn.contrats.show');


  //****************************************************************
  // PAGE D'ACCUEIL DU PROFIL MAKER FILIALE CSG
  //****************************************************************

  //GESTION DE LA PERFORMANCE
  Route::get('/csg/performances/{id}/modif', 'PerformancecsgController@modif')->name('csg.performances.modif');
  Route::put('/csg/performances/modif/{id}', 'PerformancecsgController@update')->name('csg.performances.update');

  Route::get('/csg/performances/index', 'PerformancecsgController@index')->name('csg.performances.index');
  Route::get('/csg/performances/{id}/edit', 'PerformancecsgController@edit')->name('csg.performances.edit');
  Route::post('/csg/performances/{id}', 'PerformancecsgController@store')->name('csg.performances.store');
  Route::delete('/csg/performances/{id}', 'PerformancecsgController@destroy')->name('csg.performances.destroy');

  //GESTIONS DES DEPARTS
  Route::get('/csg/departs/index', 'DepartcsgController@index')->name('csg.departs.index');
  Route::get('/csg/departs/{id}/edit', 'DepartcsgController@edit')->name('csg.departs.edit');
  //Route::post('/departs/{id}', 'DepartController@store')->name('departs.store');
  Route::delete('/csg/departs/{id}', 'DepartcsgController@destroy')->name('csg.departs.destroy');
  Route::post('/csg/departs/{id}', 'DepartcsgController@update')->name('csg.departs.update');

  //GESTIONS DES SANCTIONS
  Route::get('/csg/sanctions/index', 'SanctioncsgController@index')->name('csg.sanctions.index');
  Route::get('/csg/sanctions/{id}/edit', 'SanctioncsgController@edit')->name('csg.sanctions.edit');
  Route::post('/csg/sanctions/{id}', 'SanctioncsgController@store')->name('csg.sanctions.store');
  Route::delete('/csg/sanctions/{id}', 'SanctioncsgController@destroy')->name('csg.sanctions.destroy');

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
Route::get('/csg/reportings/index', 'ReportingcsgController@export')->name('csg.reportings.export');
Route::post('/csg/reportings/index', 'ReportingcsgController@index')->name('csg.reportings.index');
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

    //****************************************************************
    // PAGE D'ACCUEIL DU PROFIL CHECKER FILIALE CAC
    //****************************************************************


    //GESTION DE LA PERFORMANCE
    Route::get('/cac/performances/{id}/modif', 'PerformancecacController@modif')->name('cac.performances.modif');
    Route::put('/cac/performances/modif/{id}', 'PerformancecacController@update')->name('cac.performances.update');

    Route::get('/cac/performances/index', 'PerformancecacController@index')->name('cac.performances.index');
    Route::get('/cac/performances/{id}/edit', 'PerformancecacController@edit')->name('cac.performances.edit');
    Route::post('/cac/performances/{id}', 'PerformancecacController@store')->name('cac.performances.store');
    Route::delete('/cac/performances/{id}', 'PerformancecacController@destroy')->name('cac.performances.destroy');

    //GESTIONS DES DEPARTS
    Route::get('/cac/departs/index', 'DepartcacController@index')->name('cac.departs.index');
    Route::get('/cac/departs/{id}/edit', 'DepartcacController@edit')->name('cac.departs.edit');
    //Route::post('/departs/{id}', 'DepartController@store')->name('departs.store');
    Route::delete('/cac/departs/{id}', 'DepartcacController@destroy')->name('cac.departs.destroy');
    Route::post('/cac/departs/{id}', 'DepartcacController@update')->name('cac.departs.update');

    //GESTIONS DES SANCTIONS
    Route::get('/cac/sanctions/index', 'SanctioncacController@index')->name('cac.sanctions.index');
    Route::get('/cac/sanctions/{id}/edit', 'SanctioncacController@edit')->name('cac.sanctions.edit');
    Route::post('/cac/sanctions/{id}', 'SanctioncacController@store')->name('cac.sanctions.store');
    Route::delete('/cac/sanctions/{id}', 'SanctioncacController@destroy')->name('cac.sanctions.destroy');

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
  Route::get('/cac/reportings/index', 'ReportingcacController@export')->name('cac.reportings.export');
  Route::post('/cac/reportings/index', 'ReportingcacController@index')->name('cac.reportings.index');
  Route::get('/cac/reportings/exportdata', 'ExcelcacController@exportdata')->name('cac.reportings.exportdata');


  //GRAPHIQUE CONSOLETVs/CHARTS
  Route::get('/cac/analyse/index', 'analysecacController@index')->name('cac.analyse.index');
  Route::get('/cac/analyse/entite', 'Analyse_entitecacController@entite')->name('cac.analyse.entite');
  Route::get('/cac/analyse/genre', 'Analyse_entitecacController@genre')->name('cac.analyse.genre');
  Route::get('/cac/analyse/contrat', 'Analyse_contratcacController@contrat')->name('cac.analyse.contrat');
  Route::get('/cac/analyse/indicateur', 'Analyse_indicateurcacController@indicateur')->name('cac.analyse.indicateur');
  Route::post('/cac/analyse/indicateur', 'Analyse_indicateurcacController@indicateur')->name('cac.analyse.indicateur');

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



  //TABLEAU DE BOARD DES EMPLOYES
  //GESTIONS DES DEPARTS
  Route::get('/cofinasn/departs/index', 'DepartsnController@index')->name('sn.departs.index');
  Route::get('/cofinasn/departs/{id}/edit', 'DepartsnController@edit')->name('sn.departs.edit');
  //Route::post('/departs/{id}', 'DepartController@store')->name('departs.store');
  Route::delete('/cofinasn/departs/{id}', 'DepartsnController@destroy')->name('sn.departs.destroy');
  Route::post('/cofinasn/departs/{id}', 'DepartsnController@update')->name('sn.departs.update');

  //GESTIONS DES SANCTIONS
  Route::get('/cofinasn/sanctions/index', 'SanctionsnController@index')->name('sn.sanctions.index');
  Route::get('/cofinasn/sanctions/{id}/edit', 'SanctionsnController@edit')->name('sn.sanctions.edit');
  Route::post('/cofinasn/sanctions/{id}', 'SanctionsnController@store')->name('sn.sanctions.store');
  Route::delete('/cofinasn/sanctions/{id}', 'SanctionsnController@destroy')->name('sn.sanctions.destroy');

  //GESTION DE LA PERFORMANCE
  Route::get('/cofinasn/performances/{id}/modif', 'PerformancesnController@modif')->name('sn.performances.modif');
  Route::put('/cofinasn/performances/modif/{id}', 'PerformancesnController@update')->name('sn.performances.update');

  Route::get('/cofinasn/performances/index', 'PerformancesnController@index')->name('sn.performances.index');
  Route::get('/cofinasn/performances/{id}/edit', 'PerformancesnController@edit')->name('sn.performances.edit');
  Route::post('/cofinasn/performances/{id}', 'PerformancesnController@store')->name('sn.performances.store');
  Route::delete('/cofinasn/performances/{id}', 'PerformancesnController@destroy')->name('sn.performances.destroy');

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
  Route::get('/cofinasn/reportings/index', 'ReportingsnController@export')->name('sn.reportings.export');
  Route::post('/cofinasn/reportings/index', 'ReportingsnController@index')->name('sn.reportings.index');
  Route::get('/cofinasn/reportings/exportdata', 'ExcelsnController@exportdata')->name('sn.reportings.exportdata');


  //GRAPHIQUE CONSOLETVs/CHARTS
  Route::get('/cofinasn/analyse/index', 'analysesnController@index')->name('sn.analyse.index');
  Route::get('/cofinasn/analyse/entite', 'Analyse_entitesnController@entite')->name('sn.analyse.entite');
  Route::get('/cofinasn/analyse/genre', 'Analyse_entitesnController@genre')->name('sn.analyse.genre');
  Route::get('/cofinasn/analyse/contrat', 'Analyse_contratsnController@contrat')->name('sn.analyse.contrat');
  Route::get('/cofinasn/analyse/indicateur', 'Analyse_indicateursnController@indicateur')->name('sn.analyse.indicateur');
  Route::post('/cofinasn/analyse/indicateur', 'Analyse_indicateursnController@indicateur')->name('sn.analyse.indicateur');

  //GESTION DES CONTRATS
  Route::get('/cofinasn/contrats', 'ContratsnController@index')->name('sn.contrats');
  Route::get('/cofinasn/contrats/index', 'ContratsnController@index')->name('sn.contrats.index');
  Route::get('/cofinasn/contrats/undefined', 'ContratsnController@index')->name('sn.contrats.undefined');
  Route::get('/cofinasn/contrats/{id}/edit', 'ContratsnController@edit')->name('sn.contrats.edit');
  Route::post('/cofinasn/contrats/{id}', 'ContratsnController@update')->name('sn.contrats.update');
  Route::get('/cofinasn/contrats/{id}', 'ContratsnController@show')->name('sn.contrats.show');


  //****************************************************************
  // PAGE D'ACCUEIL DU PROFIL MAKER FILIALE CAC
  //****************************************************************

  //TABLEAU DE BOARD DES EMPLOYES
  //GESTIONS DES DEPARTS
  Route::get('/cote-d-ivoire/departs/index', 'DepartciController@index')->name('ci.departs.index');
  Route::get('/cote-d-ivoire/departs/{id}/edit', 'DepartciController@edit')->name('ci.departs.edit');
  //Route::post('/departs/{id}', 'DepartController@store')->name('departs.store');
  Route::delete('/cote-d-ivoire/departs/{id}', 'DepartciController@destroy')->name('ci.departs.destroy');
  Route::post('/cote-d-ivoire/departs/{id}', 'DepartciController@update')->name('ci.departs.update');

  //GESTIONS DES SANCTIONS
  Route::get('/cote-d-ivoire/sanctions/index', 'SanctionciController@index')->name('ci.sanctions.index');
  Route::get('/cote-d-ivoire/sanctions/{id}/edit', 'SanctionciController@edit')->name('ci.sanctions.edit');
  Route::post('/cote-d-ivoire/sanctions/{id}', 'SanctionciController@store')->name('ci.sanctions.store');
  Route::delete('/cote-d-ivoire/sanctions/{id}', 'SanctionciController@destroy')->name('ci.sanctions.destroy');

  //GESTION DE LA PERFORMANCE
  Route::get('/cote-d-ivoire/performances/{id}/modif', 'PerformanceciController@modif')->name('ci.performances.modif');
  Route::put('/cote-d-ivoire/performances/modif/{id}', 'PerformanceciController@update')->name('ci.performances.update');

  Route::get('/cote-d-ivoire/performances/index', 'PerformanceciController@index')->name('ci.performances.index');
  Route::get('/cote-d-ivoire/performances/{id}/edit', 'PerformanceciController@edit')->name('ci.performances.edit');
  Route::post('/cote-d-ivoire/performances/{id}', 'PerformanceciController@store')->name('ci.performances.store');
  Route::delete('/cote-d-ivoire/performances/{id}', 'PerformanceciController@destroy')->name('ci.performances.destroy');

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

  //GESTIONS DES DEPARTS
  Route::get('/cofinasn-checker/departs/index', 'DepartsnckController@index')->name('snck.departs.index');
  Route::get('/cofinasn-checker/departs/{id}/edit', 'DepartsnckController@edit')->name('snck.departs.edit');
  //Route::post('/departs/{id}', 'DepartController@store')->name('departs.store');
  Route::delete('/cofinasn-checker/departs/{id}', 'DepartsnckController@destroy')->name('snck.departs.destroy');
  Route::post('/cofinasn-checker/departs/{id}', 'DepartsnckController@update')->name('snck.departs.update');

  //GESTIONS DES SANCTIONS
  Route::get('/cofinasn-checker/sanctions/index', 'SanctionsnckController@index')->name('snck.sanctions.index');
  Route::get('/cofinasn-checker/sanctions/{id}/edit', 'SanctionsnckController@edit')->name('snck.sanctions.edit');
  Route::post('/cofinasn-checker/sanctions/{id}', 'SanctionsnckController@store')->name('snck.sanctions.store');
  Route::delete('/cofinasn-checker/sanctions/{id}', 'SanctionsnckController@destroy')->name('snck.sanctions.destroy');

  //GESTION DE LA PERFORMANCE
  Route::get('/cofinasn-checker/performances/{id}/modif', 'PerformancesnckController@modif')->name('snck.performances.modif');
  Route::put('/cofinasn-checker/performances/modif/{id}', 'PerformancesnckController@update')->name('snck.performances.update');

  Route::get('/cofinasn-checker/performances/index', 'PerformancesnckController@index')->name('snck.performances.index');
  Route::get('/cofinasn-checker/performances/{id}/edit', 'PerformancesnckController@edit')->name('snck.performances.edit');
  Route::post('/cofinasn-checker/performances/{id}', 'PerformancesnckController@store')->name('snck.performances.store');
  Route::delete('/cofinasn-checker/performances/{id}', 'PerformancesnckController@destroy')->name('snck.performances.destroy');

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

  //*******************************************************************************************************************************


Route::get('/includes/master', 'ConnexionController@comptemaker')->name('includes.headerdesktop-maker');


//GESTION DE LA PERFORMANCE
Route::get('/performances/{id}/modif', 'PerformanceController@modif')->name('performances.modif');
Route::put('/performances/modif/{id}', 'PerformanceController@update')->name('performances.update');

Route::get('/performances/index', 'PerformanceController@index')->name('performances.index');
Route::get('/performances/{id}/edit', 'PerformanceController@edit')->name('performances.edit');
Route::post('/performances/{id}', 'PerformanceController@store')->name('performances.store');
Route::delete('/performances/{id}', 'PerformanceController@destroy')->name('performances.destroy');

//GESTION DU POSTE
Route::get('/postes/{id}/edit', 'PosteController@edit')->name('postes.edit');
Route::post('/postes/{id}', 'PosteController@update')->name('postes.update');

//GESTION DE L'EXPERIENCE PROFESSIONNELLE
Route::get('/experiences/{id}/edit', 'ExperienceController@edit')->name('experiences.edit');
Route::post('/experiences/{id}', 'ExperienceController@store')->name('experiences.store');
Route::delete('/experiences/{id}', 'ExperienceController@destroy')->name('experiences.destroy');

//GESTION DE LA FORMATION
Route::get('/formations/{id}/edit', 'FormationController@edit')->name('formations.edit');
Route::post('/formations/{id}', 'FormationController@store')->name('formations.store');
Route::delete('/formations/{id}', 'FormationController@destroy')->name('formations.destroy');

//PAGE D'ACCUEIL DU MASTER GROUPE
  Route::post('/accueil', 'CompteController@accueil')->name('accueil');
  Route::get('/accueil', 'CompteController@accueil')->name('accueil');
  Route::get('/cote-d-ivoire/accueil', 'CompteController@cotedivoire')->name('cotedivoire.accueil');
//Route::post('/accueil', 'CompteController@store')->name('accueil.store');
  Route::get('/deconnexion', 'CompteController@deconnexion');


Route::get('/home', 'HomeController@index')->name('home');

Route::get('/includes/headerdesktop-checker', 'CompteController@sessionuser')->name('sessionuser');



//TABLEAU DE BOARD DES EMPLOYES
//GESTIONS DES DEPARTS
Route::get('/departs/index', 'DepartController@index')->name('departs.index');
Route::get('/departs/{id}/edit', 'DepartController@edit')->name('departs.edit');
//Route::post('/departs/{id}', 'DepartController@store')->name('departs.store');
Route::delete('/departs/{id}', 'DepartController@destroy')->name('departs.destroy');
Route::post('/departs/{id}', 'DepartController@update')->name('departs.update');

//GESTIONS DES SANCTIONS
Route::get('/sanctions/index', 'SanctionController@index')->name('sanctions.index');
Route::get('/sanctions/{id}/edit', 'SanctionController@edit')->name('sanctions.edit');
Route::post('/sanctions/{id}', 'SanctionController@store')->name('sanctions.store');
Route::delete('/sanctions/{id}', 'SanctionController@destroy')->name('sanctions.destroy');

Route::get('/employes', 'EmployeController@index')->name('main');
Route::post('/employes', 'EmployeController@index')->name('main');
Route::get('/employes/create', 'EmployeController@create')->name('create');
Route::post('/employes', 'EmployeController@store')->name('store');
Route::put('/employes/{id}', 'EmployeController@update')->name('update');
Route::get('/employes/{id}', 'EmployeController@show')->name('show');
Route::get('/employes/{id}/edit', 'EmployeController@edit')->name('edit');
Route::delete('/employes/{id}', 'EmployeController@destroy')->name('destroy');
//Route::get('/employe/afficher', 'EmployeController@afficher');

//CRUD DES PROFILS USERS
Route::get('/parametres/users', 'UserController@index')->name('users.index');
Route::get('/parametres/users/create', 'UserController@create')->name('users.create');
Route::post('/parametres/users', 'UserController@store')->name('users.store');
Route::put('/parametres/users/{id}', 'UserController@update')->name('users.update');
Route::get('/parametres/users/{id}', 'UserController@show')->name('users.show');
Route::get('/parametres/users/{id}/edit', 'UserController@edit')->name('users.edit');
Route::delete('/parametres/users/{id}', 'UserController@destroy')->name('users.destroy');

//CRUD DES ETABLISSEMENTS
Route::get('/parametres/etablissements', 'EtablissementController@index')->name('etablissements.index');
Route::get('/parametres/etablissements/create', 'EtablissementController@create')->name('etablissements.create');
Route::post('/parametres/etablissements', 'EtablissementController@store')->name('etablissements.store');
Route::put('/parametres/etablissements/{id}', 'EtablissementController@update')->name('etablissements.update');
Route::get('/parametres/etablissements/{id}', 'EtablissementController@show')->name('etablissements.show');
Route::get('/parametres/etablissements/{id}/edit', 'EtablissementController@edit')->name('etablissements.edit');
Route::delete('/parametres/etablissements/{id}', 'EtablissementController@destroy')->name('etablissements.destroy');


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
Route::delete('/conges/{id}', 'CongeController@destroy')->name('conges.destroy');

//GESTIONS DES EXTRACTIONS VERS DES FORMATS EXCEL

Route::get('/reportings/index', 'ReportingController@index')->name('reportings.index');
Route::post('/reportings/index', 'ReportingController@index')->name('reportings.index');
Route::get('/reportings/index', 'ReportingController@export')->name('reportings.export');
//Route::post('/reportings/index', 'ReportingController@export')->name('reportings.export');
Route::get('/reportings/preview', 'ReportingController@preview')->name('reportings.preview');
Route::post('/reportings/preview', 'ReportingController@preview')->name('reportings.preview');
Route::get('/reportings/exportdata', 'ExcelController@exportdata')->name('reportings.exportdata');

//GRAPHIQUE CONSOLETVs/CHARTS

Route::get('/analyse/DepartementExport', ['as'=>'DepartementExport','uses'=>'analyseController@DepartementExport']);
//Route::get('/analyse/exportdpt', 'analyseController@exportpdf')->name('analyse.enpdf');
Route::get('/analyse/index', 'analyseController@index')->name('analyse.index');

Route::get('/analyse/entite', 'Analyse_entiteController@entite')->name('analyse.entite');
Route::get('/analyse/genre', 'Analyse_entiteController@genre')->name('analyse.genre');
Route::get('/analyse/contrat', 'Analyse_contratController@contrat')->name('analyse.contrat');
Route::get('/analyse/indicateur', 'Analyse_indicateurController@indicateur')->name('analyse.indicateur');
Route::post('/analyse/indicateur', 'Analyse_indicateurController@indicateur')->name('analyse.indicateur');
Route::get('/analyse/indicateur-new-rapport', 'Analyse_indicateurController@indicateur_new')->name('analyse.indicateur-new');
Route::post('/analyse/indicateur-new-rapport', 'Analyse_indicateurController@indicateur_new')->name('analyse.export_excel');

Route::post('/analyse/tableau_indicateur-new', ['as'=>'indicateur_new','uses'=>'Analyse_indicateurController@indicateur_new']);
//Route::get('/analyse/indicateur-new-rapport', 'Analyse_indicateurController@indicateur_new')->name('analyse.export_excel');
//Route::get('/analyse/indicateur-new-rapport', 'Analyse_indicateurController@export_excel')->name('analyse.export_excel');

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
