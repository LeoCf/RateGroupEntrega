<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class student_grade extends Model
{


    protected $table = 'students_grades';
  

    

/**
    	* Inverse *  Relatin between users with the grade.
*/
    public function User()
    {
        return $this->belongsTo('App\Models\User');
    }


}