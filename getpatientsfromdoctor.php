<!-- Creates a table of the patients who are assigned to a user selected doctor  -->
<table class="table table-striped my-3">
    <thead>
        <tr>
            <th scope="col">First Name</th>
            <th scope="col">Last Name</th>
            <th scope="col">OHIP Number</th>
        </tr>
    </thead>
<?php
    // The selected doctor's medical license number
    $doctor = $_POST['doctor'];

    if (isset($doctor) && $doctor != "") {
        // Finds info on the patients who are assigned to the doctor
        $query = "SELECT firstname, lastname, patient.ohipnum FROM looksafter, patient WHERE looksafter.ohipnum = patient.ohipnum AND looksafter.licensenum = '$doctor'";
    
        $result = mysqli_query($connection,$query);
        if (!$result) {
            echo "<div class='alert alert-danger' role='alert'>The patient/looksafter table selection failed.</div>";
        }
        while ($row = mysqli_fetch_assoc($result)) {
            // Creates a row for every patient
            echo "<tr>";
            foreach ($row as $value) {
                echo "<td>$value</td>";
            }
            echo "</tr>";
        }
    }
?>
</table>
<?php
    if (isset($doctor) && $doctor != "") {
        echo "<div class='alert alert-success' role='alert'>Showing patients assigned to doctor $doctor.</div>";
    }
?>