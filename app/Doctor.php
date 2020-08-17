<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Doctor extends Authenticatable implements JWTSubject
{
    use Notifiable;
    protected $guard = 'doctors';
    protected $table = 'doctors';
    protected $primaryKey = 'id';
    protected $fillable = [
         'name', 'Certification', 'password',
    ];
    protected $hidden = [
        'password', 'remember_token',
    ];
    public function courses(){

        return $this->hasMany('App\Course','DoctorID');

    }
    public function coursesLAB(){

        return $this->hasMany('App\Course','TeacherID');

    }
        /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }
}
