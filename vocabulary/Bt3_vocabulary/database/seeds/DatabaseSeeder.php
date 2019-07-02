<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
       DB::table('users')->insert(
       	['name'=>'Bac12','email'=>'bac@gmail.com','password'=>bcrypt('pass')],
        ['name'=>'Hang12','email'=>'hang@gmail.com','password'=>bcrypt('pass')]
       );

       DB::table('vocabularies')->insert(
        ['name'=>'Approve','sentence'=>'My boss approve his ideas','mean'=>'tán thành','user_id'=>1],
        ['name'=>'Admit','sentence'=>'My boss admit his mistake','mean'=>'thừa nhận','user_id'=>2]
       );
    }
}
