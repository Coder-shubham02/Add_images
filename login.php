<?php

session_start(); // Start the session

function login() {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    // Check if username and password are correct
    if ($username === 'Anamika' && $password === 'Anamika@123') {
        echo "<script>window.location.href = 'addproduct.php';</script>";
        // Add code to execute after successful login
    } else {
        echo "<script>alert('Invalid username or password. Please try again.');</script>";
    }
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    login(); // Call the login function
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .login-container {
            max-width: 400px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
        }
        .login-container h2 {
            margin-bottom: 20px;
            text-align: center;
            color: #333;
        }
        .login-container label {
            display: block;
            margin-bottom: 10px;
            color: #555;
        }
        .login-container input[type="text"],
        .login-container input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }
        .login-container input[type="submit"] {
            width: 100%;
            padding: 10px;
            border: none;
            border-radius: 5px;
            background-color: #007bff;
            color: #fff;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        .login-container input[type="submit"]:hover {
            background-color: #0056b3;
        }
        .error-message {
            color: red;
            margin-top: 5px;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h2>Admin Login</h2>
        <form id="login-form" method="post" action="">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required><br>
            
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required><br>
            
            <input type="submit" value="Login">
        </form>
    </div>
</body>
</html>
