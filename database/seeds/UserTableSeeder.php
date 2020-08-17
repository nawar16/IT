<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //$stds = 
        factory(App\User::class,10)->create();
        /*foreach ($stds as $std){
            $mrks = factory(App\Mark::class,3)->create(['StudentID' => $std->id]);
            $ats = factory(App\Attending::class,3)->create(['StudentID' => $std->id]);
        }*/
        /*$strd = factory(App\User::class,3)->create()->each(function($c){
            $c->marks()->saveMany(factory(App\Mark::class,3)->make());
            $c->attendings()->saveMany(factory(App\Attending::class,3)->make());*/
    }
}
