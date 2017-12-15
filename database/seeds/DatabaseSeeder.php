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
        DB::table('users')->insert([
            'name' => 'Test API User',
            'email' => 'mail@jonnyeggins.com',
            'password' => str_random(60),
            'api_token' => 'skdq90pokalsm4390weiojskm390weiosdklm29e0wioajslzk'
        ]);
    }
}
