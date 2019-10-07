<?php

use Illuminate\Database\Seeder;

class SitesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('sites')->insert([

      [
          'pays' => NULL,
          'entite' => 'CTI',
          'nationnalite' => NULL,
          'lien' => 'groupecofina.jpg',
      ],
      [
        'pays' => 'GABON',
        'entite' => 'CSG',
        'nationnalite' => 'GABONAISE',
        'lien' => 'gabon.jpg',
      ],
      [
        'pays' => 'GUINEE',
        'entite' => 'COFINA GN',
        'nationnalite' => 'GUINEENNE',
        'lien' => 'guinee.png',
      ],
      [
        'pays' => 'MALI',
        'entite' => 'COFINA ML',
        'nationnalite' => 'MALIENNE',
        'lien' => 'mali.png',
      ],
      [
        'pays' => 'CONGO',
        'entite' => 'COFINA CG',
        'nationnalite' => 'CONGOLAISE',
        'lien' => 'congo.png',
      ],
      [
        'pays' => 'BURKINA FASO',
        'entite' => 'COFINA BF',
        'nationnalite' => 'BURKINABE',
        'lien' => 'burkina.png',
      ],
      [
        'pays' => 'COTE D IVOIRE',
        'entite' => 'CAC',
        'nationnalite' => 'IVOIRIENNE',
        'lien' => 'ci.png',
      ],
      [
        'pays' => 'SENEGAL',
        'entite' => 'COFINA SN',
        'nationnalite' => 'SENEGALAISE',
        'lien' => 'senegal.jpg',
      ],

  ]);
    }
}
