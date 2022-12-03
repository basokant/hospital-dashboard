<!-- Removes a user selected doctor from the database as long as they aren't assigned to a patient and/or a head doctor of a hospital -->
<?php
    // The user selected doctor's medical license number
    $remove = $_POST['remove'];

    if (isset($remove) && $remove != "") {
        // Deletes the doctor from the doctor table in the database
        $query = "DELETE FROM doctor WHERE licensenum='$remove'";

        $result = mysqli_query($connection, $query);
        if (!$result) {
            // A foreign key constraint fails, (the doctor is either a head doctor or assigned to a patient)
            echo "<div class='alert alert-danger my-2' role='alert'>Failed to remove doctor (licensenum=$remove) because they are currently a head doctor and/or taking patients.</div>";
        } else {
            echo "<div class='alert alert-success my-2' role='alert'>Removed doctor $remove.</div>";
        }
        mysqli_free_result($result);
    }
?>