<!DOCTYPE html>
<html>

<head>
    <title>Publisher Panel</title>
    <style>
        /* General Styling */
        body {
            font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
            background: rgb(40, 40, 40);
    background: linear-gradient(38deg, rgba(40, 40, 40, 1) 0%, rgba(70, 70, 70, 1) 50%, rgba(25, 25, 25, 1) 100%);
            color: #fff;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            background-color: rgba(255, 255, 255, 0.05);
            max-width: 500px;
            padding: 40px;
            background-color: rgba(255, 255, 255, 0.1);
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            margin-top: 0;
        }

        form {
            margin-top: 20px;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

            textarea,
            input[type="file"],
            button {
                width: 100%;
                margin-bottom: 10px;
                background-color: rgba(255, 255, 255, 0.1);
                border: none;
                padding: 10px;
                color: #fff;
                border-radius: 5px;
                transition: all 0.3s ease;
            }

            textarea:focus,
            input[type="file"]:focus,
            button:focus {
                outline: none;
                box-shadow: 0 0 5px rgba(0, 0, 0, 0.3);
            }

            button[type="submit"] {
    background-color: #8266ff;
        cursor: pointer;
        
            }

            button[type="submit"]:hover {
            background-color: #524cff;
        }

        button[type="submit"]:hover {
    background-color: #4a33cc;
    transform: scale(1.05);
}

        /* Dark Mode */
        .dark-mode {
            background-color: #282c36;
            color: #fff;
        }

        .dark-mode textarea,
        .dark-mode input[type="file"],
        .dark-mode button[type="submit"] {
            background-color: rgba(255, 255, 255, 0.2);
        }

        .dark-mode button[type="submit"] {
            background-color: #42475e;
        }

        .image-preview {
            max-width: 100%;
            height: auto;
            margin-top: 10px;
        }
        
    </style>
</head>

<body>

    <div class="container">
        <h1>Publisher Panel</h1>
        <form  method="post" enctype="multipart/form-data">
            <label for="brief">Brief Info</label>
            <textarea name="brief" rows="4" required></textarea>
            <label for="fullInfo">Full Info</label>
            <textarea  name="fullinfo" rows="8" required></textarea>
            <label for="image">Image</label>
            <input type="file" name="image" accept="image/*" onchange="previewImage(event);" required>
            <img id="preview" style="max-width: 200px; max-height: 200px;">
            <button type="submit" name ="publish" >Submit</button>
        </form>
    </div>

    <script src="dark-mode.js"></script> <!-- Replace with your JavaScript file path -->
</body>

</html>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['publish'])) {
    // Retrieve form data
    $image = $_FILES['image']['name'];
    $brief = $_POST['brief'];
    $fullinfo = $_POST['fullinfo'];

$image_type = $_FILES['image']['type'];

if ($image_type != 'image/png') {
    echo "Error: only PNG images are allowed";
    exit();
}

// Move uploaded file to permanent location
$target_dir = "C:/Users/urvish/Pictures/";
$target_file = $target_dir . basename($image);

move_uploaded_file($_FILES['image']['tmp_name'], $target_file);


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

    // Prepare and execute SQL statement
    $sql = "INSERT INTO publish (image, briefinfo, fullinfo) VALUES ('$image', '$brief', '$fullinfo')";
    if ($conn->query($sql) === TRUE) {
        // Redirect to a different page to prevent re-submission of form data
        header("Location: welcome.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close database connection
    $conn->close();
}
?>