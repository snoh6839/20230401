<?php

//함수만들기
function execute_query($sql)
{
    $dbc = mysqli_connect("localhost", "root", "root506", "employees", 3306);
    $result = mysqli_query($dbc, $sql);

    if (mysqli_num_rows($result) > 0) {
        $rows = array();
        while ($row = mysqli_fetch_assoc($result)) {
            $rows[] = $row;
        }

        mysqli_close($dbc);

        return $rows;
    } else {
        mysqli_close($dbc);

        return 0;
    }
}

// 함수 사용 예시
$sql = "SELECT emp_no, concat(last_name, ' ' , first_name) as full_name, gender, birth_date FROM employees Where emp_no <= 10005;";
$result = execute_query($sql);

if ($result) {
    foreach ($result as $row) {
        echo "emp_no: " . $row["emp_no"] . " full_name: " . $row["full_name"] . " gender: " . $row["gender"] . " birth_date: " . $row["birth_date"] . "\n";
    }
} else {
    echo "0 results";
}

?>