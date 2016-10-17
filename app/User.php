<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasRoles;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'firstname', 'lastname', 'username', 'email', 'password', 'dob', 'gender', 'physical_address', 'postal_address'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function Company() {
        return $this->belongsToMany('App\Company', 'company_departments', 'user_id', 'company_id');
    }

    public function Department() {
        return $this->belongsToMany('App\Department', 'company_departments', 'user_id', 'department_id');
    }

    public function Songs()
    {
        return $this->hasMany('App\Songs');
    }
}
