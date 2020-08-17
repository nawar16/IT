<?php

use Illuminate\Database\Seeder;

class MarkTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Mark::class,20)->create();
    }
}
