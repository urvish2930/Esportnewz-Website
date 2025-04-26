<?php
// Connect to database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "login";
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Prepare and execute SQL statement to retrieve data
$sql = "SELECT image, briefinfo, fullinfo FROM publish";
$result = $conn->query($sql);

// Check for errors
if ($result === FALSE) {
    echo "Error retrieving data: " . $conn->error;
} else {
    // Loop through results and display data
    while ($row = $result->fetch_assoc()) {
        echo "<div>";
        echo "<img src='" . $row['image'] . "' style='max-width: 200px; max-height: 200px;'>";
        echo "<h2>" . $row['briefinfo'] . "</h2>";
        echo "<p>" . $row['fullinfo'] . "</p>";
        echo "</div>";
    }
}

// Close database connection
$conn->close();
?>
