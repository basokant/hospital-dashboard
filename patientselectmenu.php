<!-- Creates the options for the select menu of all the patients in the database -->
<?php
    // Finds all patients in the database
    $query = "SELECT * FROM patient";

    $result = mysqli_query($connection, $query);
    if (!$result) {
        echo "<div class='alert alert-danger' role='alert'>The patient selection failed.</div>";
    }
    while ($row = mysqli_fetch_assoc($result)) {
        $ohipnum = $row['ohipnum'];
        $name = $row['firstname'] . " " . $row['lastname'];
        
        // For every patient, create an option element for the select form element
        echo "<option value=$ohipnum>$ohipnum - $name</option>";
    }
    mysqli_free_result($result);
?>