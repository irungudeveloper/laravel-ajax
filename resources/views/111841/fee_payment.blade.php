@extends('layouts.app')

@section('content')


<div class="container container-fluid">

	<div class="row justify-content-center bg-white p-2">

		<table class="table table-bordered table-striped">
			
			<thead>
				<tr>
			      <th scope="col">Student_ID</th>
			      <th scope="col">Amount Paid</th>
			      <th scope="col">Amount Left</th>
			      <th scope="col">Date Paid</th>
			    </tr>
			</thead>

			<tbody>

				@foreach($data as $records)
				<tr>
				<td>{{ $records->student_number }}</td>
				<td>{{ $records->amount_paid }}</td>
				<td> {{ $records->amount_left }} </td>
				<td> {{ $records->date_paid }} </td>
				</tr>
				@endforeach

			</tbody>

		</table>
		
	</div>
	
</div>


@endsection