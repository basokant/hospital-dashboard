<!-- Creates the options for a select menu containing all the hospitals in the database -->
<?php
    $query = "SELECT hoscode, hosname FROM hospital";
    $result = mysqli_query($connection,$query);
    if (!$result) {
        die("database query failed.");
    }
    while ($row = mysqli_fetch_assoc($result)) {
        $value = $row['hoscode'];
        $name = $row['hosname'];
        echo "<option value=$value>$value - $name</option>";
    }
    mysqli_free_result($result);
?>