<?php
// http://localhost/insert.php

// Connect to the SQL database
$servername = 'localhost';
$username = 'root';
$password = '';
$database_name = 'review_comments';

// Establish Connection to DB
try{
    $conn = new PDO($servername, $username, $password, $database_name);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connection Successful!";
}catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}


// Collect & Sanitize Data
$page_id = 1; // UPDATE TO BE UNIQUE TO EACH PAGE **************
$display_name = mysqli_real_escape_string($conn, $_POST['display_name']);
$comment = mysqli_real_escape_string($conn, $_POST['comment']);
$date = date("Y-m-d");
$time = date("H:i:s");

if($conn->connect_error) {
    // If there is an error with the connection, stop the script and display the error
    die('Connection Failed: '. $conn->connect_error);
}else{
    $stmt = $conn->prepare("INSERT INTO comments (page_id, display_name, review_date, comment, review_time) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("issss", $page_id, $display_name, $date, $comment, $time);
    $stmt->execute();
    echo "Input successfull";
    $stmt->close();
    $conn->close();
}


// Insert data into db
//$sql = "INSERT INTO comments (display_name, comment, date, time) VALUES ('$display_name', '$comment', $date, $time)";

// Error Handling
/*
if(mysqli_query($conn, $sql)){
    echo "<h3>New record created successfully</h3>";
    echo nl2br("\n$display_name\n$comment\n$date\n$time");
}else{
    echo "Error: $sql. " . mysqli_error($conn);
}

// Close connection
mysqli_close($conn);
*/
?>