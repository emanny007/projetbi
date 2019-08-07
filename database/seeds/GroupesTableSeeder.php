<?php

use Illuminate\Database\Seeder;

class GroupesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('groupes')->insert([
      [
        'nom_groupe' => 'MAKER',
        'commentaire' => NULL,
      ],
      [
        'nom_groupe' => 'CHECKER',
        'commentaire' => NULL,
      ],
      [
        'nom_groupe' => 'CONSULTATION',
        'commentaire' => NULL,
      ],

  ]);
    }
}
