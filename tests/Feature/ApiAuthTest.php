<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Tests\TestCase;
use App\User;
use App\Doctor;
use JWTAuth;
use Config;
use Auth;
use DatabaseMigrations;

class ApiAuthTest extends TestCase
{
    ////////////////////////////********************////////////////////////////
    use RefreshDatabase;
    ////////////////////////////********************////////////////////////////


    /**
 * @test
 * Test registration for student
 */
public function test_register_for_std(){
    //User's data
    $data = [
        'email' => 'test0@gmail.com',
        'name' => 'Test',
        'password' => 'secret1234',
        'Year' => '5',
        'OtherCourses' => 'AB',
        'Class' => '2',
        'IsAdmin' => '0'
    ];
    //Send post request
    $response = $this->json('POST',route('api.user.register'),$data);
    //Assert it was successful
    $response->assertStatus(200);
    //Assert we received a token
    $this->assertArrayHasKey('access_token',$response->json());
    //Delete data
    User::where('email','test0@gmail.com')->delete();
}
/**
 * @test
 * Test login for student
 */
public function test_login_for_std()
{
    //Create user
    User::create([
        'name' => 'test',
        'email'=>'testi1@gmail.com',
        'password' => bcrypt('secret1234'),
        'Year' => '5',
        'OtherCourses' => 'AB',
        'Class' => '2',
        'IsAdmin' => '0'
    ]);
    //attempt login
    $response = $this->json('POST',route('api.user.login'),[
        'email' => 'testi1@gmail.com',
        'password' => 'secret1234',
    ]);
    //Assert it was successful and a token was received
    $response->assertStatus(200);
    $this->assertArrayHasKey('access_token',$response->json());
    //Delete the user
    User::where('email','testi1@gmail.com')->delete();
}
/**
 * @test
 * Test logout for student
 */
public function test_logout_for_std()
{
        //$user = User::first();  //not implement JWT
        $user = factory(User::class)->make();
        $token = \JWTAuth::fromUser($user);

        /*$this->get('api/user/logout?token=' . $token)//500
            ->assertStatus(200)
            ->assertJsonStructure(['message']);

        $this->assertGuest('api');*/
        //401
    $response = $this->actingAs($user,'api')->json('GET',route('api.user.logout'),[
        //'token' => $token,
        //'Authorization' => 'Bearer '.$token
        //'access_token' => $token,
        //'token_type' => 'bearer',
        'token'=>$token,
    ])->header('Authorization', 'Bearer ' . $token);
    $response->assertStatus(200);
}
///////////////////////////////-------------------------///////////////////////////
/**
 * @test
 * Test registration for doctor
 */
public function test_register_for_doctor(){
    //Doctor's data
    $data = [
        'name' => 'Test',
        'password' => 'secret1234',
        'Certification' => 'abcd'
    ];
    //Send post request
    $response = $this->json('POST',route('api.doctor.register'),$data);
    //Assert it was successful
    $response->assertStatus(200);
    //Assert we received a token
    $this->assertArrayHasKey('access_token',$response->json());
    //Delete data
    Doctor::where('name','Test')->delete();
}
/**
 * @test
 * Test login for doctor
 */
public function test_login_for_doctor()
{
    //Create doctor
    Doctor::create([
        'name' => 'test',
        'password' => bcrypt('secret1234'),
        'Certification' => 'abcd'
    ]);
    //attempt login
    $response = $this->json('POST',route('api.doctor.login'),[
        'name' => 'test',
        'password' => 'secret1234',
    ]);
    //Assert it was successful and a token was received
    $response->assertStatus(200);
    $this->assertArrayHasKey('access_token',$response->json());
    //Delete the doctor
    Doctor::where('name','test')->delete();
}
/**
 * @test
 * Test logout for doctor
 */
public function test_logout_for_doctor()
{
        //$doctor = Doctor::first();
        $doctor = factory(Doctor::class)->make();
        $token = \JWTAuth::fromUser($doctor);

        $this->get('api/doctor/logout?token=' . $token)
            ->assertStatus(200)
            ->assertJsonStructure(['message']);

        $this->assertGuest('doctors');
}
}
