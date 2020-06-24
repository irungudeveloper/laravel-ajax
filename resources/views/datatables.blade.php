<!DOCTYPE html>
<html>
<head>
	<title>Data Tables Trials</title>

	<script src="//code.jquery.com/jquery-1.12.3.js"></script>
<script src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
<script
    src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
<link rel="stylesheet"
    href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<link rel="stylesheet"
    href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css">

</head>
<body>


	<table class="table" id="table">
    <thead>
        <tr>
            
            <th class="text-center">First Name</th>
            <th class="text-center">Last Name</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>Edwin</td>
            <td>Irungu</td>
        </tr>

        <tr>
            <td>Zach</td>
            <td>Mac</td>
        </tr>

        <tr>
            <td>Dennis</td>
            <td>Dee</td>
        </tr>

        <tr>
            <td>Charlie</td>
            <td>Frank</td>
        </tr>

        <tr>
            <td>Hello</td>
            <td>World</td>
        </tr>

    </tbody>
</table>

<script>
  $(document).ready(function() {
    $('#table').DataTable();
} );
 </script>

</body>
</html>