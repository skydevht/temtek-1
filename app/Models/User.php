<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Laravel\Lumen\Auth\Authorizable;
use Illuminate\Database\Eloquent\Model;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;

class User extends Model implements JWTSubject, AuthenticatableContract, AuthorizableContract
{
    use Authenticatable, Authorizable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'avatar', 'facebook_id'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password',
    ];

    /*
     * Link to all terms posted by this users
     *
     */
    public function terms() {
        return $this->hasMany('App\Models\Term', 'author_id');
    }

    /*
     * Link to all translations proposed by this users
     *
     */
    public function translations() {
        return $this->hasMany('App\Models\Translation', 'author_id');
    }

    /*
     * Link to all the translations of terms' definitions proposed by this user
     *
     */
    public function def_translations() {
        return $this->hasMany('App\Models\Definition', 'author_id');
    }

    /*
     * Link to all the translation voted by the user
     *
     */
    public function translation_voted() {
        return $this->belongsToMany('App\Models\Translation', 'votes', 'user_id', 'trans_id');
    }

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }
}
