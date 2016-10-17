<?php

namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;

class Song extends Eloquent {

    /**
     * Fallible fields for a song
     * @var array
     */
    protected $fillable = [
        'title', 'lyrics', 'slug', 'created_by'
    ];

    public function User()
    {
        return $this->belongsTo('App\User', 'created_by');
    }

}