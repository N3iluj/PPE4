<?php
class UserTableSeeder extends Seeder {
 
    public function run()
    {


        DB::table('allergies')->insert(
 
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
        );



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
                    'tel' => "0666666666",
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
                array(
                    'id' => 3,
                    'username' => 'MyTiiK',
                    'password' => Hash::make('pro'),
                    'nom' => 'Charles',
                    'prenom' => 'Geoffrey',
                    'date_naissance' => '1995-06-27',
                    'tel' => "0662098405",
                    'adresse' => '17B rue du moulin',
                    'cp' => 39700,
                    'ville' => 'Rans',
                    'email' => 'geofcsm@gmail.com',
                    'statut' => 'vendeur',
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
                    'id' => 4,
                    'username' => 'GhostDragon',
                    'password' => Hash::make('noob'),
                    'nom' => 'Moncet',
                    'prenom' => 'Pehdy',
                    'date_naissance' => '1995-06-27',
                    'tel' => "0663098405",
                    'adresse' => '18 rue des retards',
                    'cp' => 39800,
                    'ville' => 'Banlieue',
                    'email' => 'pehdymoncet@gmail.com',
                    'statut' => 'vendeur',
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
                    'id' => 5,
                    'username' => 'Geogg',
                    'password' => Hash::make('noob2'),
                    'nom' => 'Gurand',
                    'prenom' => 'Deoffrey',
                    'date_naissance' => '1995-06-28',
                    'tel' => "0664098405",
                    'adresse' => '70 rue des plow',
                    'cp' => 70000,
                    'ville' => 'Rioz-Bresil',
                    'email' => 'leplow@gmail.com',
                    'statut' => 'vendeur',
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
                    'id' => 6,
                    'username' => 'antih3r0',
                    'password' => Hash::make('skate'),
                    'nom' => 'Cars',
                    'prenom' => 'Julien',
                    'date_naissance' => '1995-06-29',
                    'tel' => "0665098405",
                    'adresse' => '11 rue du petard',
                    'cp' => 39500,
                    'ville' => 'Dole',
                    'email' => 'carslavoiture@gmail.com',
                    'statut' => 'vendeur',
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