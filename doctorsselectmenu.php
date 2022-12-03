<!-- Generates an option element for each doctor in the database to be placed in a select form element -->
<?php
    // Finds all doctors in the database
    $query = "SELECT * FROM doctor";

    $result = mysqli_query($connection, $query);
    if (!$result) {
        echo "<div class='alert alert-danger my-2' role='alert'>Doctor table selection failed.</div>";
    }
    while ($row = mysqli_fetch_assoc($result)) {
        $licensenum = $row['licensenum'];
        $name = $row['firstname'] . " " . $row['lastname'];

        echo "<option value=$licensenum>$licensenum - $name</option>";
    }
    mysqli_free_result($result);
?>