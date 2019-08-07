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
          'nationnalite' => NULL
      ],
      [
        'pays' => 'GABON',
        'entite' => 'CSG',
        'nationnalite' => 'GABONAISE'
      ],
      [
        'pays' => 'GUINEE',
        'entite' => 'COFINA GN',
        'nationnalite' => 'GUINEENNE'
      ],
      [
        'pays' => 'MALI',
        'entite' => 'COFINA ML',
        'nationnalite' => 'MALIENNE'
      ],
      [
        'pays' => 'CONGO',
        'entite' => 'COFINA CG',
        'nationnalite' => 'CONGOLAISE'
      ],
      [
        'pays' => 'BURKINA FASO',
        'entite' => 'COFINA BF',
        'nationnalite' => 'BURKINABE'
      ],
      [
        'pays' => 'COTE D IVOIRE',
        'entite' => 'CAC',
        'nationnalite' => 'IVOIRIENNEE'
      ],
      [
        'pays' => 'SENEGAL',
        'entite' => 'COFINA SN',
        'nationnalite' => 'SENEGALAISE'
      ],

  ]);
    }
}
