<!-- Inserts a new user defined doctor into the database -->
<?php
    $newlicensenum = $_POST['newlicensenum'];
    $newfirstname = $_POST['newfirstname'];
    $newlastname = $_POST['newlastname'];
    $newlicensedate = $_POST['newlicensedate'];
    $newbirthdate = $_POST['newlicensedate'];
    $newhoscode = $_POST['newhoscode'];
    $newspeciality = $_POST['newspeciality'];

    if (isset($newlicensenum)) {
        /**
         * Ensure that the doctor's license number is unique.
         */

        // Finds all doctors with the same medical license number as the user defined doctor.
        $query = "SELECT licensenum FROM doctor WHERE licensenum='$newlicensenum'";
        $result = mysqli_query($connection,$query);
        if (!$result) {
            echo "database query failed.";
        }
        
        $row = mysqli_fetch_assoc($result);
        
        // Only insert the new doctor if the license number is unique.
        if (sizeof($row) > 0) {
            echo "<div class='alert alert-danger' role='alert'>Doctor with this license number already exists.</div>";
        } else {
            $query = "INSERT INTO doctor VALUES 
            ('$newlicensenum', '$newfirstname', 
            '$newlastname', '$newlicensedate', 
            '$newbirthdate', '$newhoscode', '$newspeciality')";
        
            $result = mysqli_query($connection,$query);
            if (!$result) {
                echo "Insert database query failed.";
            } else {
                echo "<div class='alert alert-success py-3' role='alert' ->New Doctor 
                ('$newlicensenum', '$newfirstname', 
                '$newlastname', '$newlicensedate', 
                '$newbirthdate', '$newhoscode', '$newspeciality')
                was added to the database.</div>";
            }
        }
    
    
        mysqli_free_result($result);
    }
?>