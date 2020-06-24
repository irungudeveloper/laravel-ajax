<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    //

    protected $table = "students";

    protected $fillable = [

            'student_number',
            'surname',
            'first_name',
            'other_name',
            'gender',
            'email',
            'd_o_b',
            'phone_number'

    ];

}
