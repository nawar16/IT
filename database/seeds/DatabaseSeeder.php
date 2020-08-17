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
        $this->call(NewsTableSeeder::class);
        $this->call(UserTableSeeder::class);
        $this->call(DoctorTableSeeder::class);
        $this->call(CourseTableSeeder::class);
        $this->call(DailyProgramTableSeeder::class);

        $this->call(MarkTableSeeder::class);
        $this->call(AttendingTableSeeder::class);
        // $this->call(UserSeeder::class);
    }
}
