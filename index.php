<!DOCTYPE html>
<html>
<head>
	<!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	
	<title>Canadian Hospital Dashboard</title>
	<!-- Compiled Bootstrap 5.2.3 CSS Library used for utility CSS classes, themeing, and 
		general styling. See https://getbootstrap.com/docs/5.2/getting-started/introduction/ 
		for details on the library. -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
	<link rel="stylesheet" href="styles.css" type="text/css">
</head>
<body>
	<!-- Navbar -->
	<nav class="navbar navbar-light bg-light p-3">
		<a class="navbar-brand px-3" href="#">
			<div class="d-flex align-items-center justify-content-center">
				<img class="align-middle" src="./logo.png" width="50" height="50" alt="">
				<h3 class="align-middle px-4">Canadian Hospital Dashboard</h3>
			</div>
		</a>
	</nav>

	<div id="content" class="container py-4 px-5">
		<?php
			include "connecttodb.php";
		?>

		<!-- Tasks 1 and 2 (Ordering and Filtering a List of the Doctors) -->
		<div class="container py-3">
			<h2 id="1" class="my-3">List Doctor Information</h2>
			<!-- Form for ordering and filtering  -->
			<form action="" method="post">
				<div class="row">
					<div class="col-md-3 form-group">
						<h4>Order By:</h4>
						<div class="form-check">
							<input class="form-check-input" type="radio" name="orderby" value="lastname" 
							<?php 
								if (isset($orderby) && $orderby == "lastname") echo "checked";
								else if (!isset($orderby)) echo "checked";
							?>
							/>
							<label for="lastname">Last Name</label>
						</div>
						
						<div class="form-check">
							<input class="form-check-input" type="radio" name="orderby" value="birthdate" 
							<?php if (isset($orderby) && $orderby == "birthdate") echo "checked"?>
							/>
							<label for="birthdate">Birthdate</label>
						</div>
					</div>
			
					<!-- Sort the doctors in ascending or descending order -->
					<div class="col form-group">
						<h4>Order (ascending or descending)</h4>
						<div class="form-check">
							<input class="form-check-input" type="radio" name="order" value="ascending" 
							<?php 
								if (isset($order) && $order == "ascending") echo "checked";
								else if (!isset($orderby)) echo "checked";
							?>
							/>
							<label for="ascending">Ascending</label>
						</div>
			
						<div class="form-check form-check-inline">
							<input class="form-check-input" type="radio" name="order" value="descending"
							<?php if (isset($order) && $order == "descending") echo "checked"?>
							/>
							<label for="descending">Descending</label>
						</div>
					</div>

					<!-- Filter the doctor's by their speciality -->
					<div class="col from-group">
						<h4>Select Speciality</h4>
						<select class="form-control mb-4" name="speciality">
							<option value="Any">Any</option>
							<?php
								include "getspecialities.php";
							?>
						</select>
					</div>
				</div>
				<button class="btn btn-outline-primary my-4" type="submit">Reorder and Select</button>
			</form>
			<div class="row">
				<?php
					include 'getselectdoctors.php';
				?>
			</div>
		</div>

		<!-- Task 3 (Insert a New Doctor) -->
		<div class="container py-3">
			<h2 id="3">Insert a New Doctor</h2>
			<!-- Form for inputting the new doctor's data -->
			<form action="" method="post">
				<div class="form-row row mb-4">
					<div class="col">
						<label for="newlicensenum">License Number</label>
						<input type="text" class="form-control" name="newlicensenum" required>
					</div>
		
					<div class="col">
						<label for="newfirstname">First Name</label>
						<input class="form-control" type="text" name="newfirstname" required>
					</div>
		
					<div class="col">
						<label for="newlastname">Last Name</label>
						<input class="form-control" type="text" name="newlastname" required>
					</div>
				</div>

				<div class="form-row row mb-4">
					<div class="col">
						<label>License Date</label>
						<input class="form-control" type="date" name="newlicensedate" required>
					</div>
		
					<div class="col">
						<label>Birthdate</label>
						<input class="form-control" type="date" name="newbirthdate" required>
					</div>
				</div>

				<div class="form-row row">
					<div class="col form-group">
						<label>Works at Hospital</label>
						<select class="form-control" name="newhoscode" required>
							<option value="" selected disabled hidden>Select a hospital</option>
							<?php
								include 'hospitalsselectmenu.php';
							?>
						</select>
					</div>
		
					<div class="col form-group">
						<label>Speciality</label>
						<input class="form-control" type="text" name="newspeciality" required>
					</div>
				</div>

				<button class="btn btn-outline-primary mt-4" type="submit">Insert Doctor</button>
				</fieldset>
			</form>

			<?php
				include "insertdoctor.php";
			?>
		</div>

		<!-- Task 4 (Remove a Doctor from the database) -->
		<div class="container py-3">
			<h2 id="4">Remove a Doctor</h2>
			<form action="" method="post">

				<?php
					include "getdoctors.php";
				?>
				<button 
					type="submit" 
					class="btn btn-outline-danger" 
					onclick="return confirm('Are you sure you want to remove this doctor permanantly?');"
				>
				Remove Doctor
				</button>

			</form>
			<?php
				include "removedoctor.php";
			?>
		</div>

		<!-- Task 5 (Assign a Doctor to a Patient in the database) -->
		<div class="container py-3">
			<h2 id="5">Assign a Doctor to a Patient</h2>
			<form action="" method="post">
				<div class="form-row row">
					<div class="col form-group">
						<label>Select a Doctor</label>
						<select class="form-control" name="looksafterdoctor" required>
							<option value="" selected disabled hidden>Select a doctor</option>
							<?php
								include "doctorsselectmenu.php";
							?>
						</select>
					</div>
					<div class="col form-group">
						<label>Select a Patient</label>
						<select class="form-control" name="looksafterpatient" required>
							<option value="" selected disabled hidden>Select a patient</option>
							<?php
								include "patientselectmenu.php";
							?>
						</select>
					</div>
				</div>
				<button type="submit" class="btn btn-outline-primary mt-4">Assign Doctor to Patient</button>
			</form>

			<?php
				include "insertlooksafter.php"
			?>
		</div>

		<!-- Task 6 (List the Patients Assigned to a Doctor) -->
		<div class="container py-3">
			<h2 id="6">List Patients Assigned to Doctor</h2>
			<form action="" method="post">
				<div class="form-row row">
					<div class="col-6 form-group">
					<label>Select a Doctor</label> 
						<select class="form-control" name="doctor" required>
							<option value="" selected disabled hidden>Select a doctor</option>
							<?php
								include "doctorsselectmenu.php";
							?>
						</select>
					</div>
				</div>
				<button type="submit" class="btn btn-outline-primary mt-4">List Assigned Patients</button>
			</form>

			<?php
				include "getpatientsfromdoctor.php"
			?>
		</div>

		<!-- Task 7 (List the Information for a Hospital) -->
		<div class="container py-3">
			<h2 id="7">List Hospital Information</h2>
			<form action="" method="post">
				<div class="form-row row">
					<div class="col-6 form-group">
					<label>Select a Hospital</label> 
						<select class="form-control" name="hospital" required>
							<option value="" selected disabled hidden>Select a hospital</option>
							<?php
								include "hospitalsselectmenu.php";
							?>
						</select>
					</div>
				</div>
				<button type="submit" class="btn btn-outline-primary mt-4">Get Hospital Information</button>
			</form>

			<?php
				include "gethospital.php"
			?>
		</div>

		<!-- Task 8 (Update the Number of Beds of a Hospital) -->
		<div class="container py-3">
		<h2 id="8">Update the Number of Beds of a Hospital</h2>
			<form action="" method="post">
				<div class="form-row row">
					<div class="col form-group">
						<label>Select a Hospital</label> 
						<select class="form-control" name="updatehospital" required>
							<option value="" selected disabled hidden>Select a hospital</option>
							<?php
								include "hospitalsselectmenu.php";
							?>
						</select>
					</div>
					<div class="col form-group">
						<label>New Number of Beds</label> 
						<input type="text" class="form-control" name="newnumofbed" required>
					</div>
				</div>
				<button type="submit" class="btn btn-outline-primary mt-4">Update Number of Beds</button>
			</form>

			<?php
				include "updatenumofbeds.php"
			?>
		</div>

	</div>

</body>
</html>