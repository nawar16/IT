<?php

use Illuminate\Database\Seeder;

class DailyProgramTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\DailyProgram::class,3)->create();
    }
}
