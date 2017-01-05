<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Institution extends Model
{
    protected $table = 'Institutions';

        public function users()
    {
        return $this->hasMany('App\User');
    }

           public function courses()
    {
        return $this->hasMany('App\Models\Course');
    }

}
