<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Fees;
use App\Payment_records;
use App\Student;

class PaymentRecordsController extends Controller
{
    //

    public function getStudentId()
    {

        $students = Student::all();

        // var_dump($students);
        return view('111841.payment_form')->with('data',$students);

    }

    public function getBalance($id,Request $request)
    {


        // echo json_encode($id);

        // $id = "111841";
        $payment_record = new Payment_records;
        $fees_original = new Fees; 

        $response = Payment_records::where('student_number',$id)->count();

        if($response == "0")
        {
            $fees = Fees::where('id',1)->pluck('total_fee')->toArray();

            return $fees;

        }else
        {

            $fees = Payment_records::where('student_number',$id)->latest()->first()->pluck('amount_left');

           return $fees;

        }


        echo json_encode($fees);


    }

    public function saveStudentPayment(Request $request)
    {

        $student_id = $request->student_number;
        $amount_paid = $request->c_amount;
        $amount_left = $request->n_amount;
        $date_of_pay = $request->d_o_p;

        $students = new Payment_records;

        $students->student_number = $student_id;
        $students->amount_paid = $amount_paid;
        $students->amount_left = $amount_left;
        $students->date_paid = $date_of_pay;

        $students->save();

        echo json_encode("Save Successful");
    }

    public function getAllRecords()
    {

        $records = Payment_records::all();

        return view('111841.fee_payment')->with('data',$records);


    }


}
