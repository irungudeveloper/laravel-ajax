@extends('layouts.app')

@section('content')

<div class="container container-fluid">

	<div class="row justify-content-center">
		
		<div class="col-md-10 bg-white">

			<form class="p-3 " id="fees_form" method="post">
				@csrf

				<div class="row bg-primary text-white text-center p-0 m-0">

					<div class="col-12 text-center">
							
						<p class="text-center pt-2 display-5">Fee Payment Form</p>

					</div>

					
				</div>

				<div class="row mt-3">

					
					 <div class="col-12">
						<label for="student_id">Student ID</label>
						<select class="form-control" id="student_id" name="student_id">
						<option value="Choose ID" selected>...Choose ID</option>
						@foreach($data as $s_id)

								<option value="{{ $s_id->student_number }}">{{ $s_id->student_number }}</option>

							@endforeach
						</select>
					</div>
			
				    
				</div>

			  <div class="row mt-3">
			  	
			  		<div class="col">
				    	<label>Balance</label>
				      <input type="number" class="form-control" placeholder="Old Balance" name="old_balance" id="old_balance" disabled="disabled">
				    </div>
				    <div class="col">
				    	<label>Amount To Pay</label>
				      <input type="number" class="form-control" placeholder="Amount" name="amount" id="current_amount">
				    </div>
				     <div class="col">
				    	<label>New Balance</label>
				      <input type="number" class="form-control" placeholder="New Balance" name="new_balance" id="new_balance" disabled="disabled">
				    </div>

			  </div>

			  

			   <div class="row mt-3">

			   	<div class="col">
			   		<label>Date Of Payment</label>
			  	<input type="date" name="date_of_payment" class="form-control" id="d_o_p">
			   	</div>

			  	
			  </div>

			  </form>		 

			  <div class="row justify-content-center mt-3 pb-2">

			  	<button id="submit" type="submit" class="btn btn-info pl-5 pr-5 text-white">Make Payment</button>
			  	
			  	<!-- <input type="submit" name="submit" value="Make Payment" > -->

			  </div>

			 
			
		</div>

	</div>
	
</div>

	<script>
	
	$(document).ready(function ()
        {

			const str_id = document.getElementById('student_id');
			const amt = document.getElementById('current_amount');
			
			str_id.addEventListener('input',updateValue);
			amt.addEventListener('input',newBalance);

			function updateValue(e)
			{
				console.log(e.target.value);

				$("#old_balance").val('');

				var st_id = e.target.value;
				var oldBalance;
				$.ajax({

					url: "/getBalance/"+st_id,
                    type:"POST",
                    data:{
                        "_token": "{{ csrf_token() }}",
                        student_number:st_id,
						},
					success: function(response){
						oldBalance = response[response.length-1];
						console.log(oldBalance);
						$("#old_balance").val(oldBalance);

					},

				});

				$('#current_amount').val('');
				$('#new_balance').val('');
				
			}

			function newBalance(amount)
			{

				var current_amount = amount.target.value; 
				var old_balance = $("#old_balance").val();
				var new_balance = old_balance - current_amount;

				$("#new_balance").val(new_balance);


			}

			document.getElementById("submit").addEventListener('click',function ()
            {
				
				// console.log("Submit Selected");

				var student_number = $('#student_id').val();
				var c_amount = $('#current_amount').val();
				var n_amount = $('#new_balance').val();
				var date_of_payment = $('#d_o_p').val();

				$.ajax({

					url: "/savePayment",
                    type:"POST",
                    data:{
                        "_token": "{{ csrf_token() }}",
                        student_number:student_number,
						c_amount:c_amount,
						n_amount:n_amount,
						d_o_p:date_of_payment,
						
						},
					success: function(response){
						console.log(response);
					},

				});
				

			});

		});
	
	</script>

@endsection