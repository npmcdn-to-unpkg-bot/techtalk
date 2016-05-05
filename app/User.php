<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token'
    ];

    /**
     * Get the orgs associated with the given user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\belongsTo
     */
    public function orgs()
    {
        return $this->hasMany('App\Org');
    }
    
    /**
     * Check to see if user is an admin.
     *
     * @return \Illuminate\Database\Eloquent\Relations\belongsTo
     */
    public function isAdmin()
    {
        return $this->role == 'admin';
    }
}
