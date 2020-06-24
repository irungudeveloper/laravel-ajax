@extends('layouts.app')

@section('content')

<div class="container container-fluid">

	<div class="row justify-content-center">
		
		<div class="col-md-10">

			<form method="" action="" enctype="multipart/form-data" class="p-3 bg-white">
				@csrf

				<div class="row bg-info text-white text-center p-0 m-0">
					<p class="text-center">Student Registration Form</p>
				</div>

				<div class="row">
					<div class="col">
				    <label>Student_ID</label>
				    <input type="text" class="form-control" placeholder="student_id" name="student_id">
				    </div>
				</div>

				<div class="row mt-3">

				    <div class="col">
				    	<label>Surname</label>
				      <input type="text" class="form-control" placeholder="Surname" name="surname">
				    </div>
				    <div class="col">
				    	<label>First Name</label>
				      <input type="text" class="form-control" placeholder="First Name" name="first_name">
				    </div>
				    <div class="col">
				    	<label>Middle name</label>
				      <input type="text" class="form-control" placeholder="Middle name"
				      name="other_name">
				    </div>
			  </div>

			  <div class="row mt-3">
			  	
			  		<div class="col">
				    	<label>Email</label>
				      <input type="email" class="form-control" placeholder="Email" name="email">
				    </div>
				    <div class="col">
				    	<label>Telephone</label>
				      <input type="text" class="form-control" placeholder="Telephone" name="telephone">
				    </div>

			  </div>

			  <div class="row mt-3">
			  	<div class="col">
			  		<label>Gender</label>
			  	</div>
			  	
			  </div>

			  <div class="row">
			  	
			  	<div class="col">
			  		<div class="form-check form-check-inline">

				  <input class="form-check-input" type="radio" name="male" id="male" value="male">
				  <label class="form-check-label" for="male">Male</label>
				</div>
			  	</div>
			  
			  <div class="col">
			  	<div class="form-check form-check-inline">
				  <input class="form-check-input" type="radio" name="female" id="female" value="female">
				  <label class="form-check-label" for="female">Female</label>
				</div>
			  </div>
			  	
			  	<div class="col">
			  		
				<div class="form-check form-check-inline">
				  <input class="form-check-input" type="radio" name="other" id="other" value="other">
				  <label class="form-check-label" for="other">Other</label>
				</div>
			  	</div>
				

			  </div>

			   <div class="row mt-3">
			  	<label>Date Of Birth</label>
			  	<input type="date" name="date_of_birthday" class="form-control">
			  </div>

			  <div class="row justify-content-center mt-3">
			  	
			  	<input type="submit" name="submit" class="btn btn-info pl-5 pr-5 text-white" value="Save">

			  </div>

			</form>
			
		</div>

	</div>
	
</div>

@endsection