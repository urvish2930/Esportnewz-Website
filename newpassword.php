<?php
session_start();

// Check if user is logged in
// if (!isset($_SESSION['user_id'])) {
//     // If the user is not logged in, redirect to the login page
//     header('Location: signin.php');
//     exit;
// }

// Check if the form has been submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the user's ID from the session variable
    $user_id = $_SESSION['user_id'];

    // Get the new password from the form
    $new_password = $_POST['new_password'];

    // Check if the new password meets the complexity requirements
    if (!preg_match('/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%]{8,}$/', $new_password)) {
        // Set an error message in a session variable
           // Password doesn't meet complexity requirements, redirect with failed message
           header("Location: passreset.php?remarks=passworderror");
           exit();
       }

    // Hash the password using bcrypt
    $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);

    // Update the user's password in the database using prepared statements
    $db = new PDO('mysql:host=localhost;dbname=tutorialhub', 'root', '');
    $stmt = $db->prepare('UPDATE user_table SET U_PASSWORD = :hashed_password WHERE U_ID = :user_id');
    $stmt->bindParam(':hashed_password', $hashed_password);
    $stmt->bindParam(':user_id', $user_id);
    $stmt->execute();

    // Set a success message in a session variables

    // Redirect the user to the login page after a short delay
    header("Location: passreset.php?remarks=passwordresetsuccess");
        exit();
}
?>