<?php
// Database connection
$servername = "";
$username = "";
$password = "";
$dbname = "";

// Create connection
$conn = new mysqli($host, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Process form data when the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data and sanitize it
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $message = nl2br(htmlspecialchars($_POST['message']));

    // Insert data into the database
    $sql = "INSERT INTO messages (name, email, message) VALUES ('$name', '$email', '$message')";

    if ($conn->query($sql) === TRUE) {
        // Successfully inserted data, now display it
        echo "<h2>Message Received</h2>";
        echo "<p><strong>Name:</strong> $name</p>";
        echo "<p><strong>Email:</strong> $email</p>";
        echo "<p><strong>Message:</strong> $message</p>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close the database connection
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="img/SBFAV.png">
    <title>Submitted Message</title>
    <style>
        body {
            background-color: #1a1a1a;
            color: #fff;
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            padding: 12px;
        }
        .message-box {
            background-color: #333;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 4px 20px rgba(0, 0, 0, 0.5);
            width: 400px;
            margin-top: 20px;
        }
        .message-box h2 {
            text-align: center;
            color: #3b79f7;
        }
        .message-box p {
            font-size: 1.1em;
            margin-bottom: 10px;
        }
        .message-box .label {
            font-weight: bold;
            color: #3b79f7;
        }
    </style>
</head>
<body>

    <div class="message-box">
        <h2>Message Received</h2>
        <p><span class="label">Name:</span> <?php echo $name; ?></p>
        <p><span class="label">Email:</span> <?php echo $email; ?></p>
        <p><span class="label">Message:</span> <?php echo $message; ?></p>
    </div>

</body>
</html>
