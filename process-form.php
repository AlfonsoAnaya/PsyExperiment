<?php

$participantid = filter_input(INPUT_POST, "participantid", FILTER_VALIDATE_INT);
$age = filter_input(INPUT_POST, "age", FILTER_VALIDATE_INT);
$gender = $_POST["gender"];
$education =$_POST["education"];
$responsetime= filter_input(INPUT_POST, "responsetime", FILTER_VALIDATE_INT);
$response = $_POST["response"];

//ar_dump($participantid, $age, $gender, $education, $responsetime, $response)

$host= "localhost";
$dbname = "visual_recognition_experiment_db";
$username = "root";
$password = "";

$conn = mysqli_connect($host, $username, $password, $dbname);

if (mysqli_connect_errno()) {
    die("Connection error: " . mysqli_connect_error());
}

$sql = "INSERT INTO message (participantid, age, gender, education, responsetime, response)
        VALUES (?, ?, ?, ?)";

$stmt = mysqli_stmt_init($conn);

if ( ! mysqli_stmt_prepare($stmt, $sql)) {
    die(mysqli_error($conn));
}

mysqli_stmt_bind_param($stmt, "iissis",
                        $participantid,
                        $age,
                        $gender,
                        $education,
                        $responsetime,
                        $response);

mysqli_stmt_execute($stmt);

echo "Record saved."



//print_r($_POST);
?>