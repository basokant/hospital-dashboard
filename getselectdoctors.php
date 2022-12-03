<!-- Creates a table for the doctors, which is sorted and filtered to the user's liking -->
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
        </tr>
    </thead>
<?php
    // By default, the query simply finds all doctors
    $query = "SELECT * FROM doctor";

    // The value that the rows are sorted by ('lastname' or 'birthdate')
    $orderby = $_POST['orderby'];
    
    // 'ascending' or 'descending' order
    $order = $_POST['order'];

    // The selected speciality to filter the doctor list by
    $speciality = $_POST['speciality'];

    /**
     * Builds the query depending on sort/filter user selection
     */
    if (isset($speciality) && $speciality != "Any") {
        $query = "$query WHERE speciality='$speciality'";
    }
    if (isset($orderby) && ($orderby == "lastname" || $orderby == "birthdate")) {
        $query = "$query ORDER BY $orderby";
    }
    if (isset($order) && ($order == "descending")) {
        $query = "$query DESC";
    }

    $result = mysqli_query($connection,$query);
    if (!$result) {
        die("databases query failed.");
    }
    while ($row = mysqli_fetch_assoc($result)) {
        // Each doctor gets a row in the table with all their information.
        if ($row['licensenum'] != $remove) {
            echo "<tr>";
            foreach ($row as $value) {
                echo "<td>$value</td>";
            }
            echo "</tr>";
        }
    }
    echo "</table>";

    if (isset($orderby) && isset($order) && isset($speciality)) {
        echo "<div class='alert alert-success my-2' role='alert'>Showing <b>$speciality</b> doctors ordered by <b>$orderby</b> in <b>$order</b> order.</div>";
    }
    mysqli_free_result($result);
?>

