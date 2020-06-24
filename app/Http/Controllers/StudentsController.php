<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;
use DataTables;

class StudentsController extends Controller
{
    
	public function index()
	{

		$students = Student::all();

		echo json_encode(array('data'=>$students));

	}

		
	public function save(Request $request)
	{

		 $obj_student = new Student();


		 $request->validate([
            'student_id' => 'required',
            'surname' => 'required',
            'first_name' => 'required',
            'other_name' => 'required',
            'gender' => 'required',
            'date_of_birth' => 'required',
            'telephone' => 'required',
            'email' => 'required'
        ]);


		 $obj_student->student_number = $request->input('student_id');
		 $obj_student->surname = $request->input('surname');
		 $obj_student->first_name = $request->input('first_name');
 		 $obj_student->other_name = $request->input('other_name');
  		 $obj_student->gender = $request->input('gender');
  		 $obj_student->d_o_b = $request->input('date_of_birth');
  		 $obj_student->phone_number = $request->input('telephone');
  		 $obj_student->email = $request->input('email');

  		 $obj_student->save();


  		 return back()->with('success','Student is Registered.');
  		 
	}

	public function edit($id)
	{
		$response = Student::where('student_number',$id)->first();

		echo json_encode(array('data'=>$response));

	}

	public function update($id,Request $request)
	{

		$std_number = $id;

		$students = Student::find($id);

		$students->student_number = $request->student_number;
		$students->surname = $request->surname;
		$students->first_name = $request->first_name;
		$students->other_name = $request->other_name;
		$students->gender = $request->gender;
		$students->d_o_b = $request->d_o_b;
		$students->phone_number = $request->phone_number;
		$students->email = $request->email;

		$students->save();
		 
		$response = "You Are Updating";			
		echo json_encode($std_number);

	} 

	public function delete($id,Request $request)
	{
		$n_id = $request->del_id;

		$students = Student::where('student_number',$n_id)->first();
        $students->delete();

		$response = "Delete Function Repporting For Duty";

		echo json_encode($n_id);

	}


}
