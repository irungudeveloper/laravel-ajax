
@extends('layouts.app')

@section('content')


<div id="loadingDiv">

        
    <div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
        
        <div class="modal-body">

            <div class="text-center">
                <div class="spinner-border" role="status">
                    <span class="sr-only">Loading...</span>
                </div>
            </div>

        </div>
        </div>
    </div>
    </div>

</div>

    <div class="row bg-white p-2" id="spa-body">
        


        <table class="table table-bordered table-striped table-responsive" id="tableData">
    <thead>
        <tr>
            <th class="text-center" scope="col">Std. No</th>
            <th class="text-center" scope="col">Surname</th>
            <th class="text-center" scope="col">First Name</th>
            <th class="text-center" scope="col">Other Name</th>
            <th class="text-center" scope="col">Email</th>
            <th class="text-center" scope="col">Phone Number</th>
            <th class="text-center" scope="col">Gender</th>
            <th class="text-center" scope="col">Birth Date</th>
            
        </tr>
    </thead>
    
    <tbody>
        
    </tbody>

</table>

    </div>

    <div class="modal fade " id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Student Update Form</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                
            <form  id="updateForm" enctype="multipart/form-data" class="p-3 bg-white">
				
				<div class="row">
					<div class="col">
				    <label>Student_ID</label>
                    <input type="hidden" name="s_id" value="{{ old('student_id') }}" id="s_id">
				    <input type="text" class="form-control" placeholder="student_id" name="student_id" value="{{ old('student_id') }}" id="student_id">
				    </div>
				</div>

				<div class="row mt-3">

				    <div class="col">
				    	<label>Surname</label>
				      <input type="text" class="form-control" placeholder="Surname" name="surname" value="{{ old('surname') }}" id="surname">
				    </div>
				    <div class="col">
				    	<label>First Name</label>
				      <input type="text" class="form-control" placeholder="First Name" name="first_name" value="{{ old('first_name') }}" id="first_name">
				    </div>
				    <div class="col">
				    	<label>Middle name</label>
				      <input type="text" class="form-control" placeholder="Middle name" name="other_name" value="{{ old('other_name') }}" id="middle_name">
				    </div>
			  </div>

			  <div class="row mt-3">
			  	
			  		<div class="col">
				    	<label>Email</label>
				      <input type="email" class="form-control" placeholder="Email" name="email" value="{{ old('email') }}" id="email">
				    </div>
				    <div class="col">
				    	<label>Telephone</label>
				      <input type="text" class="form-control" placeholder="Telephone" name="telephone" value="{{ old('telephone') }}" id="telephone">
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
			  	<input type="date" name="date_of_birth" class="form-control" value="{{ old('date_of_birth') }}" id="d_o_b">
			  </div>

			  <div class="row justify-content-center mt-3">
			  	
			  	<!--  -->

			  </div>

			
			

            </div>
            <div class="modal-footer">
               
                <input type="submit" name="submit" class="btn btn-info pl-5 pr-5 text-white" value="Update" >
                <button type="button" class="btn btn-secondary pl-5 pr-5" data-dismiss="modal">Close</button>
            </div>
            </form>

            </div>
        </div>
    </div>


    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel">Delete Function</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                
                <p class="text-danger text-center">Confirm Delete</p>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-solid btn-danger pl-2 pr-2" id="confirm">Yes</button>
                <button type="button" class="btn btn-solid btn-secondary pl-2 pr-2" data-dismiss="modal">No</button>
            </div>
            </div>
        </div>
    </div>

    <script>

        $(document).ready(function loader()
        {

            

            var id;
            var student_number;
            var email;
            var first_name;
            var other_name;
            var phone_number;
            var d_o_b;
            var gender;
            var surname;

            var $loading = $('#loadingDiv').hide();

                $(document)
                .ajaxStart(function () {
                    $loading.show();
                })
                .ajaxStop(function () {
                    $loading.hide();
                });


            function dataTableLoader()
            {

                $.ajax({

                    url:"/studentData",
                    type:"GET",
                    cache: false,
                    dataType:'json',

                    async: true,

                    success: function(response)
                    {
                        //console.log(data);
                        var len = 0;


                        $('#tableData tbody').empty();

                        if(response['data'] != null)
                        {
                            len = response['data'].length;
                        }

                        if(len > 0)
                        {

                            for(var i=0; i<len; i++)
                            {

                                id = response['data'][i].id;
                                student_number = response['data'][i].student_number;
                                surname = response['data'][i].surname;
                                email = response['data'][i].email;
                                first_name = response['data'][i].first_name;
                                other_name = response['data'][i].other_name;
                                phone_number = response['data'][i].phone_number;
                                d_o_b = response['data'][i].d_o_b;
                                gender = response['data'][i].gender;


                                var tr_str = "<tr>"+
                                            "<td>"+student_number+"</td>"+
                                            "<td>"+surname+"</td>"+
                                            "<td>"+first_name+"</td>"+
                                            "<td>"+other_name+"</td>"+
                                            "<td>"+email+"</td>"+
                                            "<td>"+phone_number+"</td>"+
                                            "<td>"+gender+"</td>"+
                                            "<td>"+d_o_b+"</td>"+
                                            "<td>"+"<button class='btn btn-solid btn-info pl-2 pr-2' id="+"edit/"+student_number+" data-toggle='modal' data-target='#editModal'>View <i class='fa fa-eye' aria-hidden='true'></i></button>"+"</td>"+
                                            "<td>"+"<button class='btn btn-solid btn-danger pl-2 pr-2' id="+"delete/"+student_number+" data-toggle='modal' data-target='#deleteModal'>Delete <i class='fa fa-trash' aria-hidden='true'></i></button>"+"</td>"+
                                            "</tr>";

                                            $("#tableData tbody").append(tr_str);

                                            //   setTimeout(loader, 5000);

                            }

                        }else{

                                var tr_str = "<tr>"+
                                            "<td class='bg-danger text-center text-white' colspan='8'>No Records Have Been Found!! <a href='/student' class='btn btn-solid btn-info pl-5 pr-5 text-center'>Add New Student</a></td>"+
                                            "</tr>";

                                            $("#tableData tbody").append(tr_str);
                        }

                        console.log("It's Working Either Way");

                    },


                });


            }

            
            function modalDataLoader()
            {

              
                
                $("#tableData tbody").on('click', 'button', function()
                {
                    var str_data = this.id;
                    var res_data =str_data.split("/");

                    console.log(res_data[0]);
                    
                    var button_id = this.id;

                    if (res_data[0] == "edit") 
                    {

                          
                    $.ajax({

                        url:"/"+button_id,
                        type:"GET",
                        cache: false,
                        dataType:'json',

                        success: function(response)
                        {
                            console.log(response);

                            id = response['data'].id;
                            student_number = response['data'].student_number;
                            surname = response['data'].surname;
                            email = response['data'].email;
                            first_name = response['data'].first_name;
                            other_name = response['data'].other_name;
                            phone_number = response['data'].phone_number;
                            d_o_b = response['data'].d_o_b;
                            gender = response['data'].gender;

                            $("#student_id").val(student_number);
                            $("#surname").val(surname);
                            $("#first_name").val(first_name);
                            $("#middle_name").val(other_name);
                            $("#email").val(email);
                            $("#telephone").val(phone_number);
                            $("#gender").val(gender);
                            $("#d_o_b").val(d_o_b);
                            $("#s_id").val(id);

                        }

                    });

                        
                    }else{

                        document.getElementById("confirm").addEventListener('click',function ()
                            {
                            console.log("hello");
                            //validation code to see State field is mandatory.  

                            $.ajax({

                                url: "/"+button_id,
                                type:"POST",
                                data:{
                                "_token": "{{ csrf_token() }}",
                                del_id:res_data[1],
                                },
                                success:function(response)
                                {
                                    console.log(response);
                                    dataTableLoader();

                                }

                            });
                            
                          });

                    }
                   
                });

        }

            function updateDataPost()
            {

                 $("#updateForm").on('submit',function(e){

                e.preventDefault();

               
               student_number = $("#student_id").val();
               surname = $("#surname").val();
               first_name = $("#first_name").val();
               other_name = $("#middle_name").val();
               email = $("#email").val();
               phone_number = $("#telephone").val();
               gender = $("input:radio[name=gender]:checked").val();
               d_o_b = $("#d_o_b").val();
               s_id = $("#s_id").val();
               post_url = "update/"+s_id; 
               loadUrl = "/students/all";

               $.ajax({

                    url: "/update/"+s_id,
                    type:"POST",
                    data:{
                        "_token": "{{ csrf_token() }}",
                        student_number:student_number,
                        surname:surname,
                        first_name:first_name,
                        other_name:other_name,
                        email:email,
                        phone_number:phone_number,
                        gender:gender,
                        d_o_b:d_o_b,

                    },

                    success:function(response)
                    {
                        console.log(response);
                        dataTableLoader();

                    },
                    async: true


               });

            });

            }

           
            dataTableLoader();
            
            modalDataLoader();
            updateDataPost();



           

        });

    </script>



@endsection
