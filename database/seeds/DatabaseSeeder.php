<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        DB::table('actors')->insert([
            'name' => 'Hugh Jackman',
            'birth_date' => '15/15/1980',
            'age' => '60',
            'bio' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quos soluta ratione iusto quasi, sapiente perferendis, aut qui unde optio, vero nisi. Ullam amet laboriosam quaerat, nihil, cumque consectetur dolore aliquam.',
            'image' => 'http://asasdadads',
        ]);
        DB::table('actors')->insert([
            'name' => 'Denzel Washington',
            'birth_date' => '15/15/1980',
            'age' => '60',
            'bio' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quos soluta ratione iusto quasi, sapiente perferendis, aut qui unde optio, vero nisi. Ullam amet laboriosam quaerat, nihil, cumque consectetur dolore aliquam.',
            'image' => 'http://asasdadads',
        ]);
        DB::table('actors')->insert([
            'name' => 'Mike Myers',
            'birth_date' => '15/15/1980',
            'age' => '60',
            'bio' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quos soluta ratione iusto quasi, sapiente perferendis, aut qui unde optio, vero nisi. Ullam amet laboriosam quaerat, nihil, cumque consectetur dolore aliquam.',
            'image' => 'http://asasdadads',
        ]);
        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'mail@jonnyeggins.com',
            'password' => 'admin',
            'api_token' => 'skdq90pokalsm4390weiojskm390weiosdklm29e0wioajslzk'
        ]);
        DB::table('movies')->insert([
            'name' => 'Shrek',
            'genre_id' => '1',
            'rating' => '3',
            'description' => 'Shrek is an ogre',
            'image' => 'http://asasdadads',
        ]);
        DB::table('movies_rel_actors')->insert([
            'movie_id' => '1',
            'actor_id' => '3',
            'actor_name' => 'Shrek'
        ]);
        DB::table('genres')->insert([
            'name' => 'Family'
        ]);


    }
}
