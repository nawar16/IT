<?php

use Illuminate\Database\Seeder;

class DoctorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //DB::table('doctors')->truncate();
        
                /*$ds = array(
                array(  'Name' => 'd1',
                    'Certification' => 'com',
                    'password' => bcrypt(123456789),
                    //'last_seen' => new DateTime
                        )
                );
        
                 // make sure you do the insert
                 DB::table('doctors')->insert($ds);*/
        
        
        //$dctrs = 
        factory(App\Doctor::class,15)->create();

        /*foreach ($dctrs as $dctr){
            $crss = factory(App\Course::class,3)->create(['DoctorID' => $dctr->id]);
            foreach($crss as $crs){
                factory(App\Mark::class,5)->create(['CourseName' => $crs->Name]);
                factory(App\Attending::class,5)->create(['CourseName' => $crs->Name]);
                factory(App\DailyProgram::class,5)->create(['CourseName' => $crs->Name]);
            }
        }*/
    }
}
