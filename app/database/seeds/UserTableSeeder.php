<?php
class UserTableSeeder extends Seeder {
 
    public function run()
    {
        DB::table('users')->insert(
 
            array(
                array(
                    'id' => 1,
                    'username' => 'admin',
                    'password' => Hash::make('admin'),
                    'nom' => 'Damerose',
                    'prenom' => 'Dominique',
                    'date_naissance' => '01/01/1990',
                    'tel' => 0666666666,
                    'adresse' => '42 rue du gouvernement',
                    'cp' => 39100,
                    'ville' => 'Dole',
                    'email' => 'dominique.damerose@gmail.com',
                    'statut' => 'admin',
                    'created_at' => new DateTime,
                    'updated_at' => new DateTime,
                ),
 
                array(
                    'id' => 2,
                    'username' => 'dupont',
                    'password' => Hash::make('dupont'),
                    'nom' => 'Dupont',
                    'prenom' => 'Dominique',
                    'date_naissance' => '01/01/1990',
                    'tel' => 0666666666,
                    'adresse' => '42 rue du gouvernement',
                    'cp' => 39100,
                    'ville' => 'Dole',
                    'email' => 'dominique.dupont@gmail.com',
                    'statut' => 'exposant',
                    'created_at' => new DateTime,
                    'updated_at' => new DateTime,
                ),
 
            )
        );
    }
}