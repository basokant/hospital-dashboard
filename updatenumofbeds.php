<!-- Updates the number of beds for a user specified doctor to a user specified amount -->
<?php
    // The hoscode of the hospital to be updated
    $updatehospital = $_POST['updatehospital'];
    // The updated value for the bed count
    $newnumofbed = $_POST['newnumofbed'];

    if (isset($updatehospital) && $updatehospital != "" && isset($newnumofbed) && isset($newnumofbed) != "") {
        // Updates the bed count for the specific hospital in the database
        $query = "UPDATE hospital SET numofbed = $newnumofbed WHERE hoscode='$updatehospital'";
        $result = mysqli_query($connection, $query);

        if (!$result) {
            echo "<div class='alert alert-danger my-2' role='alert'>Failed to update the number of beds of hospital $updatehospital to $newnumofbed beds.</div>";
        } else {
            echo "<div class='alert alert-success my-2' role='alert'>Hospital $updatehospital now has $newnumofbed.</div>";
        }
        mysqli_free_result($result);
    }
?>