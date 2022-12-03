<!-- Generates a table to list all doctors, their information, and a corresponding removal radio button. -->

<table class="table table-striped my-3">
    <thead>
        <tr>
            <th scope="col">License Number</th>
            <th scope="col">First Name</th>
            <th scope="col">Last Name</th>
            <th scope="col">License Date</th>
            <th scope="col">Birthdate</th>
            <th scope="col">Works at Hospital:</th>
            <th scope="col">Speciality</th>
            <th scope="col">Remove?</th>
        </tr>
    </thead>
<?php
    // Finds all doctors in the database
    $query = "SELECT * FROM doctor";

    $result = mysqli_query($connection,$query);
    if (!$result) {
        echo "<div class='alert alert-danger my-2' role='alert'>The doctor table selection failed.</div>";
    }
    while ($row = mysqli_fetch_assoc($result)) {
        if ($row['licensenum'] != $remove) {
            // Creates a row in the table for each doctor in the database
            echo "<tr>";
            foreach ($row as $value) {
                echo "<td>$value</td>";
            }
            $removelicensenum = $row['licensenum'];
            echo "<td><input class='form-check-input' type='radio' name='remove' value='$removelicensenum' required></input></td>";
            echo "</tr>";
        }
    }
    mysqli_free_result($result);
?>
</table>