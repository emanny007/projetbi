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
          'libelle' => 'RESSOURCES HUMAINES',
      ],
      [
          'libelle' => 'INFORMATIQUE',
      ],
      [
          'libelle' => 'FINANCE',
      ],
      [
          'libelle' => 'DMCC',
      ],
      [
          'libelle' => 'OPERATIONS',
      ],
      [
          'libelle' => 'CREDIT',
      ],
      [
          'libelle' => 'AUDIT',
      ],
      [
          'libelle' => 'CONTROLE INTERNE',
      ],
      [
          'libelle' => 'DIRECTION GENERALE',
      ],
      [
          'libelle' => 'RETAIL',
      ],
      [
          'libelle' => 'EXPLOITATION',
      ],
      [
          'libelle' => 'FACILITIES',
      ],
      [
          'libelle' => 'LEGAL',
      ],
      [
          'libelle' => 'PHOENIX',
      ],
  ]);
    }
}
