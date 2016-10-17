<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $fillable = [
        'company', 'phone', 'address'
    ];

    public function Department() {
        return $this->belongsToMany('App\Department', 'company_departments', 'company_id', 'department_id')->withPivot(['user_id']);
    }

    public function User() {
        return $this->belongsToMany('App\User', 'company_departments', 'company_id', 'user_id');
    }
}
