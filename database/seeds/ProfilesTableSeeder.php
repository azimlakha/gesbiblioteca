<?php

use Illuminate\Database\Seeder;

class ProfilesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('profiles')->insert([
            'name' => 'superuser'
        ]);
        DB::table('profiles')->insert([
            'name' => 'bibliotecario'
        ]);
        DB::table('profiles')->insert([
            'name' => 'estudante'
        ]);
        DB::table('profiles')->insert([
            'name' => 'professor'
        ]);
    }
}
