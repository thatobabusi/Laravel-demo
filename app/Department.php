<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $fillable = [
        'department'
    ];

    public function Company() {
        return $this->belongsToMany('App\Company', 'company_departments', 'department_id', 'company_id');
    }
}
