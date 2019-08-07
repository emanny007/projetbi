<?php

use Illuminate\Database\Seeder;

class DepartementsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('departements')->insert([

      [
          'libelle' => 'RESSOURCE HUMAINE'
      ],
      [
          'libelle' => 'INFORMATIQUE'
      ],
      [
          'libelle' => 'FINANCE'
      ],
      [
          'libelle' => 'DMCC'
      ],
      [
          'libelle' => 'DIRECTION'
      ],
      [
          'libelle' => 'EXPLOITATION'
      ],
      [
          'libelle' => 'CREDIT'
      ],
      [
          'libelle' => 'AUDIT'
      ],
      [
          'libelle' => 'CONTROL-INTERNE'
      ],
      [
          'libelle' => 'DIRECTION'
      ],
      ,
      [
          'libelle' => 'RETAIL'
      ],
      [
          'libelle' => 'LEGAL'
      ],
  ]);
    }
}
