<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - LPU EVS</title>
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

        .quote {
            font-size: 34px;
            color: #fff;
            margin-bottom: 20px;
            animation: slideIn 2s ease-in-out;
            text-align: center;
            position: absolute;
            right: 30%;
            top: 9%;
            transform: translateY(-50%);
            font-weight: bold;
            background: linear-gradient(90deg, #ff7e5f, #feb47b, #fd2760, #12e933, #74a4fc);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            text-fill-color: transparent;
        }

        @keyframes slideIn {
            0% {
                transform: translateX(-100%);
                opacity: 0;
            }

            100% {
                transform: translateX(0);
                opacity: 1;
            }
        }

        .container {
            width: 90%;
            max-width: 400px;
            padding: 20px;
            background: rgba(255, 255, 255, 0.8);
            border-radius: 25px;
            box-shadow: 0 8px 12px 0 rgba(0, 0, 0, 0.4);
            text-align: center;
            transition: 0.3s;
            animation: fadeIn 1.5s ease-in-out;
        }

        @keyframes fadeIn {
            0% {
                opacity: 0;
                transform: scale(0.8);
            }

            100% {
                opacity: 1;
                transform: scale(1);
            }
        }

        .container h2 {
            margin-bottom: 20px;
            color: #333;
        }

        .btn {
            width: 80%;
            height: 40px;
            border-radius: 25px;
            border: none;
            background: #74a4fc;
            cursor: pointer;
            font-family: "Montserrat", sans-serif;
            box-shadow: 0 8px 12px 0 rgba(0, 0, 0, 0.1);
            transition: 0.3s;
            font-weight: bold;
            margin: 10px 0;
        }

        .btn:hover {
            background: lightblue;
            transform: scale(1.05);
        }

        .text {
            width: 80%;
            height: 40px;
            border-radius: 10px;
            border: 0.5px solid gray;
            font-family: "Montserrat", sans-serif;
            outline: none;
            margin-bottom: 10px;
            padding: 0 10px;
            transition: 0.3s;
        }

        .text:focus {
            border-color: #74a4fc;
            box-shadow: 0 0 8px rgba(116, 164, 252, 0.8);
        }

        .wrapper {
            text-align: center;
        }

        .forgot-password {
            margin-top: 10px;
            font-size: small;
        }

        .forgot-password a {
            color: #74a4fc;
            text-decoration: none;
        }

        .forgot-password a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>

    <?php
    session_start();

    // Database connection
    $conn = new mysqli("localhost", "root", "", "lpu_evs");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Handle login form submission
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = mysqli_real_escape_string($conn, $_POST['username']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);

        // Query to check user in the database
        $sql = "SELECT * FROM users WHERE username='$username'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            if (password_verify($password, $row['password'])) {
                // If password is correct, set session and redirect
                $_SESSION['user_id'] = $row['id'];
                $_SESSION['username'] = $row['username'];
                $_SESSION['usertype'] = $row['usertype']; // Using 'usertype' instead of 'role'

                if ($row['usertype'] == 'user') {
                    header("Location: passenger_dashboard.php"); // Redirect passengers
                } else if ($row['usertype'] == 'driver') {
                    header("Location: driver_dashboard.php"); // Redirect drivers
                }
                exit;
            } else {
                echo "<div style='color:red;'>Invalid password!</div>";
            }
        } else {
            echo "<div style='color:red;'>No user found!</div>";
        }
    }

    $conn->close();
    ?>

    <div class="quote">Ride the smart way with LPU EVS</div>
    <div class="container">
        <h2>Welcome Back!</h2>
        <div class="wrapper">
            <form method="POST" action="">
                <input placeholder="Username" type="text" name="username" required class="text">
                <input placeholder="Password" type="password" name="password" required class="text">
                <button class="btn" type="submit">Login</button>
            </form>
            <button class="btn" onclick="window.location.href='register.php';">Register</button>
            <div class="forgot-password">
                <a href="forgotpassword.php">Forgot Password?</a>
            </div>
        </div>
    </div>
</body>

</html>
