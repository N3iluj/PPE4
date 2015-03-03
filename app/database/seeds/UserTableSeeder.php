<?php
class UserTableSeeder extends Seeder {
 
    public function run()
    {


        /*DB::table('allergies')->insert(
 
            array(
                array(
                    'id' => 1,
                    'nom' => 'Gluten',
                    'created_at' => new DateTime,
                    'updated_at' => new DateTime,
                ),

                 array(
                    'id' => 2,
                    'nom' => 'Oeufs',
                    'created_at' => new DateTime,
                    'updated_at' => new DateTime,
                ),

                  array(
                    'id' => 3,
                    'nom' => 'Soja',
                    'created_at' => new DateTime,
                    'updated_at' => new DateTime,
                ),

                   array(
                    'id' => 4,
                    'nom' => 'Poissons',
                    'created_at' => new DateTime,
                    'updated_at' => new DateTime,
                ),

                    array(
                    'id' => 5,
                    'nom' => 'Lait',
                    'created_at' => new DateTime,
                    'updated_at' => new DateTime,
                ),

                     array(
                    'id' => 6,
                    'nom' => 'Fruits a coque',
                    'created_at' => new DateTime,
                    'updated_at' => new DateTime,
                ),


                     array(
                    'id' => 7,
                    'nom' => 'Celeri',
                    'created_at' => new DateTime,
                    'updated_at' => new DateTime,
                ),

                      array(
                    'id' => 8,
                    'nom' => 'Moutarde',
                    'created_at' => new DateTime,
                    'updated_at' => new DateTime,
                ),

                       array(
                    'id' => 9,
                    'nom' => 'Graines de sesame',
                    'created_at' => new DateTime,
                    'updated_at' => new DateTime,
                ),

                        array(
                    'id' => 10,
                    'nom' => 'Lupin',
                    'created_at' => new DateTime,
                    'updated_at' => new DateTime,
                ),

                         array(
                    'id' => 11,
                    'nom' => 'Mollusques',
                    'created_at' => new DateTime,
                    'updated_at' => new DateTime,
                ),

                          array(
                    'id' => 12,
                    'nom' => 'Crustaces',
                    'created_at' => new DateTime,
                    'updated_at' => new DateTime,
                ),





               )
        );*/



        DB::table('users')->insert(
 
            array(
                array(
                    'id' => 1,
                    'username' => 'admin',
                    'password' => Hash::make('admin'),
                    'nom' => 'Damerose',
                    'prenom' => 'Dominique',
                    'date_naissance' => '1990-01-01',
                    'tel' => 0666666666,
                    'adresse' => '42 rue du gouvernement',
                    'cp' => 39100,
                    'ville' => 'Dole',
                    'email' => 'dominique.damerose@gmail.com',
                    'statut' => 'admin',
                    'repas1mid' => 1,
                    'repas1soir' => 1,
                    'repas2mid' => 1,
                    'repas2soir' => 1,
                    'internat' => 1,
                    'salle' => 1,
                    'created_at' => new DateTime,
                    'updated_at' => new DateTime,
                ),
 
                array(
                    'id' => 2,
                    'username' => 'dupont',
                    'password' => Hash::make('dupont'),
                    'nom' => 'Dupont',
                    'prenom' => 'Dominique',
                    'date_naissance' => '1990-01-01',
                    'tel' => 0666666666,
                    'adresse' => '42 rue du gouvernement',
                    'cp' => 39100,
                    'ville' => 'Dole',
                    'email' => 'dominique.dupont@gmail.com',
                    'statut' => 'exposant',
                    'repas1mid' => 1,
                    'repas1soir' => 1,
                    'repas2mid' => 1,
                    'repas2soir' => 1,
                    'internat' => 1,
                    'salle' => 1,
                    'created_at' => new DateTime,
                    'updated_at' => new DateTime,
                ),
 
            )
        );

        

    
    }
}