<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@600&display=swap" rel="stylesheet">
    <style>
    body {
            background: url('lpu  main gate.jpg') no-repeat center center;
            background-size: cover;
            font-family: 'Open Sans', sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .container {
            width: 90%;
            max-width: 400px;
            padding: 20px;
            background: whitesmoke;
            border-radius: 25px;
            box-shadow: 0 8px 12px 0 rgba(0, 0, 0, 0.4);
            text-align: center;
            transition: 0.3s;
        }

        .container h2 {
            margin-bottom: 20px;
            color: #333;
        }

        .btn {
            width: 80%;
            height: 40px;
            border-radius: 25px;
            border-width: 0px;
            background: #74a4fc;
            border-style: solid;
            outline: none;
            cursor: pointer;
            font-family: "Montserrat", sans-serif;
            box-shadow: 0 8px 12px 0 rgba(0, 0, 0, 0.1);
            transition: 0.3s;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .btn:hover {
            background: lightblue;
        }

        .text {
            width: 80%;
            height: 40px;
            border-radius: 10px;
            border-color: gray;
            border-width: 0.5px;
            border-style: solid;
            font-family: "Montserrat", sans-serif;
            outline: none;
            margin-bottom: 10px;
            padding: 0 10px;
        }

        .wrapper {
            text-align: center;
        }

        .message {
            margin-top: 10px;
            color: red;
        }

        .animation-container {
            position: absolute;
            right: 80%;
            top: 95%;
            transform: translateY(-50%);
        }

        .golf-cart {
            width: 500px;
            height: 300px;
            animation: drive 5s infinite;
        }

        @keyframes drive {
            0% {
                transform: translateX(0);
            }

            50% {
                transform: translateX(20px);
            }

            100% {
                transform: translateX(0);
            }
        }
    </style>
</head>

<body>
    <?php
    // Start session
    session_start();
    
    // Database connection
    $conn = new mysqli("localhost", "root", "", "lpu_evs");
    
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Handle form submission
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $email = mysqli_real_escape_string($conn, $_POST['email']);

        // Check if the email exists in the database
        $sql = "SELECT * FROM users WHERE email='$email'";
        $result = $conn->query($sql);
        
        if ($result->num_rows > 0) {
            // Simulate sending a reset email (you can implement actual email sending here)
            // mail($email, "Password Reset", "Click this link to reset your password: <reset_link>");

            echo "<div class='message'>A password reset link has been sent to your email!</div>";
        } else {
            echo "<div class='message'>Email not found!</div>";
        }
    }

    $conn->close();
    ?>

    <div class="container">
        <h2>Forgot Password</h2>
        <div class="wrapper">
            <form method="POST" action="">
                <input placeholder="Email" type="email" name="email" required class="text">
                <button class="btn" type="submit">Submit</button>
            </form>
        </div>
    </div>
    <div class="animation-container">
        <img src="g_cart-removebg-preview.png" class="golf-cart" alt="Golf Cart">
    </div>
</body>

</html>
