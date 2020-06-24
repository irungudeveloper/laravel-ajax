@extends('layouts.app')

@section('content')

	<div class="row justify-content-center">

		 @if ($message = Session::get('success'))
            <div class="alert alert-success alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>    
                    <strong>{{ $message }}</strong>
            </div>
        @endif

        @if(count($errors))
            <div class="form-group">
                <div class="alert alert-danger alert-block">
                	 <button type="button" class="close" data-dismiss="alert">×</button>
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        @endif

		
		<div class="col-md-10">

			<form method="POST" action="/register_student" enctype="multipart/form-data" class="p-3 bg-white">
				@csrf

				<div class="row bg-info text-white text-center p-0 m-0">
					<p class="text-center">Student Registration Form</p>
				</div>

				<div class="row">
					<div class="col">
				    <label>Student_ID</label>
				    <input type="text" class="form-control" placeholder="student_id" name="student_id" value="{{ old('student_id') }}">
				    </div>
				</div>

				<div class="row mt-3">

				    <div class="col">
				    	<label>Surname</label>
				      <input type="text" class="form-control" placeholder="Surname" name="surname" value="{{ old('surname') }}">
				    </div>
				    <div class="col">
				    	<label>First Name</label>
				      <input type="text" class="form-control" placeholder="First Name" name="first_name" value="{{ old('first_name') }}">
				    </div>
				    <div class="col">
				    	<label>Middle name</label>
				      <input type="text" class="form-control" placeholder="Middle name"
				      name="other_name" value="{{ old('other_name') }}">
				    </div>
			  </div>

			  <div class="row mt-3">
			  	
			  		<div class="col">
				    	<label>Email</label>
				      <input type="email" class="form-control" placeholder="Email" name="email" value="{{ old('email') }}">
				    </div>
				    <div class="col">
				    	<label>Telephone</label>
				      <input type="text" class="form-control" placeholder="Telephone" name="telephone" value="{{ old('telephone') }}">
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

				  <input class="form-check-input" type="radio" name="gender" id="male" value="male">
				  <label class="form-check-label" for="male">Male</label>
				</div>
			  	</div>
			  
			  <div class="col">
			  	<div class="form-check form-check-inline">
				  <input class="form-check-input" type="radio" name="gender" id="female" value="female">
				  <label class="form-check-label" for="female">Female</label>
				</div>
			  </div>
			  	
			  	<div class="col">
			  		
				<div class="form-check form-check-inline">
				  <input class="form-check-input" type="radio" name="gender" id="other" value="other">
				  <label class="form-check-label" for="other">Other</label>
				</div>
			  	</div>
				

			  </div>

			   <div class="row mt-3">
			  	<label>Date Of Birth</label>
			  	<input type="date" name="date_of_birth" class="form-control" value="{{ old('date_of_birth') }}">
			  </div>

			  <div class="row justify-content-center mt-3">
			  	
			  	<input type="submit" name="submit" class="btn btn-info pl-5 pr-5 text-white" value="Save">

			  </div>

			</form>
			
		</div>

	</div>

@endsection