<!-- Assigns a patient to a doctor, as long as they aren't already assigned to each other -->
<?php
    // The user selected doctor's medical license number
    $looksafterdoctor = $_POST['looksafterdoctor'];
    // The user selected patient's OHIP number
    $looksafterpatient = $_POST['looksafterpatient'];

    if (isset($looksafterdoctor) && isset($looksafterpatient) && $looksafterdoctor != "" && $looksafterpatient != "") {
        // Adds a new assigned-to relationship between the doctor and patient in the database
        $query = "INSERT INTO looksafter VALUES ('$looksafterdoctor', '$looksafterpatient')";
        
        $result = mysqli_query($connection,$query);
        if (!$result) {
            echo "<div class='alert alert-danger my-2' role='alert'>Patient already assigned to this doctor.</div>";
        } else {
            echo "<div class='alert alert-success my-2' role='alert'>Patient $looksafterpatient is now assigned to doctor $looksafterdoctor.</div>";
        }
        
        mysqli_free_result($result);
    }
?>