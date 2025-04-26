<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>fetch image from the database</title>
</head>
<body>
<?php
$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '';
$dbname = 'rcti';

$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

// Check the connection
if (!$conn) {
    die("Connection Failed: " . mysqli_connect_error());
}

$sql = "SELECT * FROM image";
$stmt = mysqli_prepare($conn, $sql);

// Check if the query preparation was successful
if (!$stmt) {
    die("Query preparation failed: " . mysqli_error($conn));
}

// Execute the query
mysqli_stmt_execute($stmt);

// Check if the query execution was successful
if (mysqli_stmt_error($stmt)) {
    die("Query execution failed: " . mysqli_stmt_error($stmt));
}

// Get the result set
$result = mysqli_stmt_get_result($stmt);

// Display all data from the "students" table
    $id = isset($row['id']) ;
    $filename = isset($row['filename']) ;


    echo "ID: " . $id . ", Name: " . $filename . "<br>";


// Close the statement and database connection
mysqli_stmt_close($stmt);
mysqli_close($conn);
?>

</body>
</html>