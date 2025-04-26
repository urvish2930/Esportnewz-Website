
<?php
// Start the session
session_start();

// Check if the user is already authenticated
if (isset($_SESSION['authenticated']) && $_SESSION['authenticated'] === true) {
    // Redirect to the admin dashboard or any other admin panel page
    header("Location: admin_dashboard.php");
    exit();
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the form data
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Perform authentication logic (replace with your own logic)
    if ($username === "admin" && $password === "admin") {
        // Authentication successful, set session variable
        $_SESSION['authenticated'] = true;

        // Redirect to the admin dashboard or any other admin panel page
        header("Location: admin_dashboard.php");
        exit();
    } else {
        // Invalid credentials
        $error = "Invalid username or password";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
        }

        .container {
            width: 300px;
            padding: 20px;
            margin: 0 auto;
            background-color: #fff;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-top: 100px;
        }

        h2 {
            text-align: center;
        }

        label, input[type="password"], input[type="submit"] {
            display: block;
            margin-bottom: 10px;
        }

        input[type="password"], input[type="submit"] {
            width: 100%;
            padding: 5px;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: #fff;
            border: none;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
</head>
<body>
    <div class="container">
        <h2>Admin Login</h2>
        <?php if (isset($error)) { ?>
            <p><?php echo $error; ?></p>
        <?php } ?>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>
            
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
            
            <input type="submit" value="Login">
        </form>
    </div>
</body>
</html>


