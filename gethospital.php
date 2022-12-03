<!-- Lists the information for the hospital selected by the user -->
<table class="table table-striped my-3">
    <thead>
        <tr>
            <th scope="col">Hospital Name</th>
            <th scope="col">City</th>
            <th scope="col">Province</th>
            <th scope="col">Number of Beds</th>
            <th scope="col">Head Doctor First and Last Name</th>
            <th scope="col">Doctors Who Work Here (First and Last Name)</th>
        </tr>
    </thead>

<?php
    // The selected hospital's hoscode
    $hospital = $_POST['hospital'];

    if (isset($hospital) && $hospital != "") {
        // Finds the selected hospital information, including the head doctor's full name
        $query1 = "SELECT hosname, city, prov, numofbed, firstname, lastname FROM hospital, doctor WHERE headdoc = licensenum AND hoscode = '$hospital'";
        // Finds the first and last names of all doctors working at the selected hospital
        $query2 = "SELECT firstname, lastname FROM hospital, doctor WHERE hoscode = hosworksat AND hoscode = '$hospital'";

        $result1 = mysqli_query($connection,$query1);
        $result2 = mysqli_query($connection,$query2);
        if (!$result1) {
            echo "<div class='alert alert-danger' role='alert'>Error with selecting hospital $hospital.</div>";
        } else {
		while ($row1 = mysqli_fetch_assoc($result1)) {
		    echo "<tr>";

		    $hosname = $row1['hosname'];
		    $city = $row1['city'];
		    $prov = $row1['prov'];
		    $numofbed = $row1['numofbed'];
		    $headdocfullname = $row1['firstname'] . " " . $row1['lastname'];

		    echo "<td>$hosname</td>";
		    echo "<td>$city</td>";
		    echo "<td>$prov</td>";
		    echo "<td>$numofbed</td>";
		    echo "<td>$headdocfullname</td>";
		    
            // The final column contains the full names of all doctors who work there.
		    echo "<td>";
		    while ($row2 = mysqli_fetch_assoc($result2)) {
			$doctorfullname = $row2['firstname'] . " " . $row2['lastname'];
			echo "$doctorfullname<br>";
		    }
		    echo "</td>";

		    echo "</tr>";
		}
        }
    }
?>
</table>
<?php
    if (isset($hospital) && $hospital != "") {
        echo "<div class='alert alert-success' role='alert'>Showing information on hospital $hospital.</div>";
    }
?>
