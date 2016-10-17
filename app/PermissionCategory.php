<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PermissionCategory extends Model
{
    protected $fillable = ['name'];

    public function Permissions()
    {
        return $this->hasMany('Spatie\Permission\Models\Permission');
    }
}
