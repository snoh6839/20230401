<?php
function execute_query($sql)
{
    // connect to db
    $dbc = mysqli_connect("localhost", "root", "root506", "employees", 3306);

    // execute query
    $result = mysqli_query($dbc, $sql);

    // check if there are any results
    if (mysqli_num_rows($result) > 0) {
        // create an array to store the results
        $rows = array();
        while ($row = mysqli_fetch_assoc($result)) {
            $rows[] = $row;
        }
        // close db connection
        mysqli_close($dbc);

        // return the results
        return $rows;
    } else {
        // close db connection
        mysqli_close($dbc);

        // return 0 if no results found
        return 0;
    }
}

// execute query
$sql = "SELECT emp_no, concat(last_name, ' ' , first_name) as full_name, gender, birth_date FROM employees Where emp_no <= 10005;";
$result = execute_query($sql);

// output results
if ($result) {
    foreach ($result as $row) {
        echo "emp_no: " . $row["emp_no"] . " full_name: " . $row["full_name"] . " gender: " . $row["gender"] . " birth_date: " . $row["birth_date"] . "\n";
    }
} else {
    echo "0 results";
}

?>