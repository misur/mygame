<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        // $this->call(UserTableSeeder::class);

        $this->call(MyGamesTableSeeder::class);

        Model::reguard();
    }

    
}

class GamesTableSeeder extends Seeder {

    public function run(){
        for($i=1; $i<100; $i++){
            DB::table('games')->insert(array(
              'name' => 'game '.$i,
              'about' => 'about '. $i,
              'best_score' => 'best score '.$i
            ));
        }

    }
}

class MyGamesTableSeeder extends Seeder {

    public function run(){
        for($i=1; $i<100; $i++){
            if($i< 50){
                 DB::table('mygames')->insert(array(
                    'user_id' => 5,
                    'game_id' =>  $i,
                    'best_score' => 'best score 0'
                 ));
            }else{
                DB::table('mygames')->insert(array(
                    'user_id' => 6,
                    'game_id' =>  $i,
                    'best_score' => 'best score 0'
                 ));
            }
        }

    }
}
