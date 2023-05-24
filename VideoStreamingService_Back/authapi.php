<?php
require_once 'db_credentials.php';


// Connect to MySQL database
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Register user
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['register'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Check if username or email already exists
    $checkQuery = "SELECT * FROM users WHERE username = '$username' OR email = '$email'";
    $checkResult = $conn->query($checkQuery);
    if ($checkResult->num_rows > 0) {
        echo "Username or email already exists";
    } else {
        // Insert user data into the database
        $registerQuery = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password')";
        if ($conn->query($registerQuery) === TRUE) {
            echo "User registered successfully";
        } else {
            echo "Error: " . $registerQuery . "<br>" . $conn->error;
        }
    }
}

// Login user
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Check if username and password are correct
    $loginQuery = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
    $loginResult = $conn->query($loginQuery);
    if ($loginResult->num_rows == 1) {
        echo "Login successful";
    } else {
        echo "Invalid username or password";
    }
}

// Forgot password
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['forgot'])) {
    $email = $_POST['email'];

    // Check if email exists
    $forgotQuery = "SELECT * FROM users WHERE email = '$email'";
    $forgotResult = $conn->query($forgotQuery);
    if ($forgotResult->num_rows == 1) {
        // Generate a new password
        $newPassword = generateRandomPassword();

        // Update the user's password in the database
        $updateQuery = "UPDATE users SET password = '$newPassword' WHERE email = '$email'";
        if ($conn->query($updateQuery) === TRUE) {
            // Send the new password to the user's email
            // (Code to send email is not included in this example)

            echo "New password generated and sent to your email";
        } else {
            echo "Error updating password: " . $conn->error;
        }
    } else {
        echo "Email does not exist";
    }
}

// Function to generate a random password
function generateRandomPassword($length = 8) {
    $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
    $password = '';
    for ($i = 0; $i < $length; $i++) {
        $password .= $characters[rand(0, strlen($characters) - 1)];
    }
    return $password;
}

// Close the database connection
$conn->close();

?>
