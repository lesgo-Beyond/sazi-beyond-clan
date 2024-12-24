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

// Fetch all messages from the database
$sql = "SELECT * FROM messages ORDER BY created_at DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="img/SBFAV.png">
    <title>All Submitted Messages</title>
    <style>
        body {
            background-color: #1a1a1a;
            color: #fff;
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: flex-start;
            flex-direction: column;
            height: 100vh;
            margin: 0;
            padding: 20px;
        }
        .message-box {
            background-color: #333;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 4px 20px rgba(0, 0, 0, 0.5);
            width: 400px;
            margin-bottom: 20px;
        }
        .message-box h3 {
            color: #3b79f7;
            text-align: center;
            margin-bottom: 10px;
        }
        .message-box p {
            font-size: 1.1em;
            margin-bottom: 10px;
        }
        .message-box .label {
            font-weight: bold;
            color: #3b79f7;
        }
        .message-box .timestamp {
            text-align: right;
            color: #aaa;
            font-size: 0.9em;
        }
    </style>
</head>
<body>

    <h1 style="text-align: center; color: #3b79f7;">All Submitted Messages</h1>

    <?php
    if ($result->num_rows > 0) {
        // Loop through all the messages
        while ($row = $result->fetch_assoc()) {
            $name = $row['name'];
            $email = $row['email'];
            $message = $row['message'];
            $created_at = $row['created_at'];
            
            echo "<div class='message-box'>
                    <h3>Message from $name</h3>
                    <p><span class='label'>Email:</span> $email</p>
                    <p><span class='label'>Message:</span> $message</p>
                    <p class='timestamp'>Submitted on: $created_at</p>
                  </div>";
        }
    } else {
        echo "<p style='text-align: center; color: #f44336;'>No messages found!</p>";
    }

    // Close the database connection
    $conn->close();
    ?>

</body>
</html>
