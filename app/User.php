<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use DB;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'address','phone','password','user_type','description','image','cost','city_id',
        'request_status'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function food(){
        return $this->hasMany('App\Food','res_id');
    }


    public function city(){
        return $this->belongsTo('App\City','city_id');
    }
    public function review(){
        return $this->hasMany('App\Review','res_id');
    }
     public function avgreview(){
        return $this->hasOne('App\Review','res_id')
                    ->select('res_id', DB::raw( 'cast(AVG(rating) as decimal(10,2)) AS avgRating'))
                    ->groupBy( 'res_id');
    }




  
}
