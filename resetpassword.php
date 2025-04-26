<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $CODE = $_POST['code'];

    // Connect to the database
    $db = new PDO('mysql:host=localhost;dbname=tutorialhub','root','');

    // Check if the code is correct
    $stmt = $db->prepare('SELECT U_ID FROM user_table WHERE CODE = ?');
    $stmt->execute([$CODE]);
    $user = $stmt->fetch();

    if ($user) {
        // Store the user's ID in a session variable
        session_start();
        $_SESSION['user_id'] = $user['U_ID'];

        // Redirect the user to the password reset page
        header('Location: passreset.php');
        exit;
    }
}
