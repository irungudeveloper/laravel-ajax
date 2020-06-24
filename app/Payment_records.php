<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment_records extends Model
{
    //
    protected $table = "paymentrecords";

    protected $fillable = [

                    'student_number',
                    'amount_paid',
                    'amount_left',
                    'date_paid'

            ];
}
