<?php
include("auth_session.php");
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap4.min.css">
	

	<title>Recruiter actions</title>
	
</head>
<body>

<!-- main modal -->
<div class="modal fade" id="compnayModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add company details</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      	<form action="insert.php" method="POST">
      <div class="modal-body">
        
      

			  	<div class="mb-3">
					<label >Company Name:</label>
					<input type="text" name="cname" class="form-control" placeholder="enter company name" required >
			  	</div>


			  	<div class="mb-3">
			  	 <label >Company Website:</label>
			  		<input type="url" name="cwebsite" class="form-control" placeholder="enter url"
						       pattern="http(s?)(:\/\/)((www.)?)(([^.]+)\.)?([a-zA-z0-9\-_]+)(.com|.net|.gov|.org|.in)(\/[^\s]*)?"  required > 
				</div>
			  	
			  	<div class="mb-3">
					<label >Phone Number:</label>
					<input type="text" name="cnum" class="form-control" placeholder="Enter phone Number" required>
			  	</div>

			 
				<div class="mb-3">
					<label >Company Address:</label>
					<textarea name="caddress" rows="5" cols="40" placeholder="enter company address" class="form-control" required></textarea>
			  	</div>
				
				<div class="mb-3">
					<label >Company City:</label>
					<input type="text" name="ccity" class="form-control" placeholder="enter city" required>
			  	</div>

				<div class="mb-3">
					<label >Company State:</label>
					<input type="text" name="cstate" class="form-control" placeholder="enter state" >
			  	</div>

			  	<div class="mb-3">
					<label >Company country:</label>
					<input type="text" name="ccountry" class="form-control" placeholder="enter country" required>
			  	</div>
	
				<div class="mb-3">
				<label for="industrylist" required >Industry List:</label>
				<select name="industrylist" id="industrylist" class="form-control" >
						<option > --industry list---</option>
						<option >Account</option>
						<option >IT</option>
						<option >Sales</option>
						<option >Health Care</option>
				</select>
				</div>			

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" name="insertion" class="btn btn-primary">Save data</button>
      </div>
      </form>
    </div>
  </div>
</div>
<!--  -->

<!-- edit from -->
<div class="modal fade" id="editmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Company Details</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      	<form action="update.php" method="POST">
      <div class="modal-body">
        
      
					<input type="hidden" name="update_id" id="update_id">

			  	<div class="mb-3">		  		
					<label >Company Name</label>
					<input type="text" name="cname" id="cname" class="form-control" placeholder="enter company name">
			  	</div>

						
			  	<div class="mb-3">
			  	 <label >Company Website:</label>
			  		<input type="url" name="cwebsite" id="cwebsite" class="form-control" placeholder="https://example.com"
						        pattern="http(s?)(:\/\/)((www.)?)(([^.]+)\.)?([a-zA-z0-9\-_]+)(.com|.net|.gov|.org|.in)(\/[^\s]*)?" size="30" required > 
				</div>
			  	
			  	<div class="mb-3">
					<label >Phone Number :</label>
					<input type="text" name="cnum" id="cnum" class="form-control" placeholder="Enter phone Number">
			  	</div>

			 
				<div class="mb-3">
					<label >Company Address</label>
					<textarea name="caddress" rows="5" cols="40" id="caddress" placeholder="enter company address" class="form-control"></textarea>
			  	</div>
				
				<div class="mb-3">
					<label >Company City</label>
					<input type="text" name="ccity" id="ccity" class="form-control" placeholder="enter city">
			  	</div>

				<div class="mb-3">
					<label >Company State</label>
					<input type="text" name="cstate" id="cstate" class="form-control" placeholder="enter state">
			  	</div>

			  	<div class="mb-3">
					<label >Company country</label>
					<input type="text" name="ccountry" id="ccountry" class="form-control" placeholder="enter country">
			  	</div>
	
				<div class="mb-3">
				<label for="industrylist">Industry List :</label>
				<select name="industrylist" id="industrylist" class="form-control">
						<option >---Industry List ---</option>
						<option >Account</option>
						<option >IT</option>
						<option >Sales</option>
						<option >Health Care</option>
				</select>
				</div>			

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" name="updation" class="btn btn-primary">Update Data</button>
      </div>
      </form>
    </div>
  </div>
</div>

<!--  -->

<!-- delete from -->
<div class="modal fade" id="deletemodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Delete Company Details</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      	<form action="delete.php" method="POST">
      <div class="modal-body">
        
      
					<input type="hidden" name="delete_id" id="delete_id">

<h4>Do you want to delete ?</h4>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">NO</button>
        <button type="submit" name="deletion" class="btn btn-primary">YES</button>
      </div>
      </form>
    </div>
  </div>
</div>

<!--  -->

	<div class="container">
		<div class="jumbotron">
			<div class="card"> 
				<h2 align="center"> Recruiter CRM </h2>
				<p align="center">Hey, <?php echo $_SESSION['email']; ?>!</p>
				<p align="center"><a href="logout.php">Logout</a></p>
				
				

			</div>
			<br>
			<div class="card">
				<div class="card-body" >
					<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#compnayModal">Add New Company</button>

				</div>
			</div>

			<div class="card">
				<div class="card-body">

						

						<?php
						$connection = mysqli_connect("localhost","root","");
						$db = mysqli_select_db($connection, 'signup');

						$query = "SELECT * FROM company_databse";
						$res1 = mysqli_query($connection, $query)
						?>

						<table id="datatableid" class="table table-dark">
						  <thead>
						    <tr>
						      <th scope="col">id</th>
						      <th scope="col">company name</th>
						      <th scope="col">company website</th>
						      <th scope="col">company number</th>
						      <th scope="col">company address</th>
						      <th scope="col">company city</th>
						      <th scope="col">company state</th>
						      <th scope="col">company country</th>
						      <th scope="col">industry</th>
						      <th scope="col">Edit</th>
						      <th scope="col">DEL</th>

						    </tr>
						  </thead>

						  <?php
						if($res1)
						{
							foreach($res1 as $row)
							{
						?>	
						  <tbody>
						    <tr>
						      <td><?php echo $row['id'] ?></td>
						      <td><?php echo $row['cname'] ?></td>
						      <td><?php echo $row['cwebsite'] ?></td>
						      <td><?php echo $row['cnum'] ?></td>
						      <td><?php echo $row['caddress'] ?></td>
						      <td><?php echo $row['ccity'] ?></td>
						      <td><?php echo $row['cstate'] ?></td>
						      <td><?php echo $row['ccountry'] ?></td>
						      <td><?php echo $row['industrylist'] ?></td>
						      <td>
						      	<button type="button" class="btn btn-primary editbtn">EDIT</button>
						      </td>
						      <td>
						      	<button type="button" class="btn btn-danger delbtn">DEL</button>
						      </td>
						    </tr>
						    
						  </tbody>
						  <?php
							}
						}
							
						   else
						    {
						        echo "no record found!";
						    }
	
						?>
						</table>
				</div>
				
			</div>

		</div>
		
	</div>



<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap4.min.js"></script>

<!-- customize datatable -->
<script>
        $(document).ready(function () {

            $('#datatableid').DataTable({
                "pagingType": "full_numbers",
                "lengthMenu": [
                    [10, 25, 50, -1],
                    [10, 25, 50, "All"]
                ],
                responsive: true,
                language: {
                    search: "_INPUT_",
                    searchPlaceholder: "Search Your Data",
                }
            });

        });
    </script>

<!-- delete button  -->
<script>
        $(document).ready(function () {

            $('.delbtn').on('click', function () {

                $('#deletemodal').modal('show');

                $tr = $(this).closest('tr');

                var data = $tr.children("td").map(function () {
                    return $(this).text();
                }).get();

                console.log(data);

			          $('#delete_id').val(data[0]);      
         
						});
        });
    </script>

<!-- edit button -->
<script>
        $(document).ready(function () {

            $('.editbtn').on('click', function () {

                $('#editmodal').modal('show');

                $tr = $(this).closest('tr');

                var data = $tr.children("td").map(function () {
                    return $(this).text();
                }).get();

                console.log(data);

			                
             			$('#update_id').val(data[0]);
						$('#cname').val(data[1]);
						$('#cwebsite').val(data[2]);
						$('#cnum').val(data[3]);
						$('#caddress').val(data[4]);
						$('#ccity').val(data[5]);
						$('#cstate').val(data[6]);
						$('#ccountry').val(data[7]);
						$('#industrylist').val(data[8]);
						});
        });
    </script>
</body>
</html>