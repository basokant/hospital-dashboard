<!-- Creates the options in a specialities select menu based on what specialities are currently in the database -->
<?php
    // Finds all unique specialities in the doctor table
    $query = "SELECT speciality FROM doctor GROUP BY speciality";

    $result = mysqli_query($connection,$query);
    if (!$result) {
        echo "<div class='alert alert-danger' role='alert'>The doctor table is selection failed.</div>";
    }

    while ($row = mysqli_fetch_assoc($result)) {
        // For every speciality create a option element to be used in the select menu
        $value = $row['speciality'];
        echo "<option value=$value ";
        if (isset($speciality) && $speciality == $value) {
            echo "selected";
        }
        echo ">$value</option>";
    }
    mysqli_free_result($result);
?>