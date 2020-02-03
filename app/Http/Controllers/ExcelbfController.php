<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Excel;
use Maatwebsite\Excel\Concerns\FromCollection;
use League\Csv\Writer;
use League\Csv\Reader;


//use App\Http\Controllers\Auth\Request;
use App\Site;
use App\Employe;
use DB;



class ExcelbfController extends Controller
{

    public function exportdata()
    {

      //we fetch the info from a DB using a PDO object
  $sth = $dbh->prepare("SELECT matricule, nom, prenom,email FROM employes LIMIT 200");
  //because we don't want to duplicate the data for each row
  // PDO::FETCH_NUM could also have been used
  $sth->setFetchMode(PDO::FETCH_ASSOC);
  $sth->execute();

  //we create the CSV into memory
  $csv = Writer::createFromFileObject(new SplTempFileObject());

  //we insert the CSV header
  $csv->insertOne(['matricule', 'nom', 'prenom','email']);

  // The PDOStatement Object implements the Traversable Interface
  // that's why Writer::insertAll can directly insert
  // the data into the CSV
  $csv->insertAll($sth);

  // Because you are providing the filename you don't have to
  // set the HTTP headers Writer::output can
  // directly set them for you
  // The file is downloadable
  $csv->output('Employes.csv');
  die;
  return view('reportings/exportdata',['csv' => $csv]);

}

}
