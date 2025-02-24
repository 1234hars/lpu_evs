<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Register</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@600&display=swap" rel="stylesheet">
    <style>
        body {
            background: url('460808510_2489911791192530_7435389220325872079_n.jpg') no-repeat center center;
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
            border: 0.5px solid gray;
            font-family: "Montserrat", sans-serif;
            outline: none;
            margin-bottom: 10px;
            padding: 0 10px;
        }

        .wrapper {
            text-align: center;
        }

        .reg {
            font-size: small;
            color: #555;
        }

        .user-type {
            margin: 15px 0;
        }

        .error {
            color: red;
            margin: 10px 0;
        }

        .vehicle-number {
            display: none;
            margin-bottom: 10px;
        }

        .golf-cart {
            margin-top: 400px; 
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
        $username = mysqli_real_escape_string($conn, $_POST['username']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);
        $confirm_password = mysqli_real_escape_string($conn, $_POST['confirm_password']);
        $userType = mysqli_real_escape_string($conn, $_POST['userType']);
        $vehicleNumber = isset($_POST['vehicle_number']) ? mysqli_real_escape_string($conn, $_POST['vehicle_number']) : null;

        // Check if password and confirm password match
        if ($password !== $confirm_password) {
            echo "<div class='error'>Passwords do not match!</div>";
        } else {
            // Check if username or email already exists
            $checkUser  = $conn->query("SELECT * FROM users WHERE username='$username' OR email='$email'");
            if ($checkUser ->num_rows > 0) {
                echo "<div class='error'>User  already exists! Please enter a unique username and email ID.</div>";
            } else {
                // Hash the password
                $hashedPassword = password_hash($password, PASSWORD_DEFAULT );

                // Insert user into database
                if ($userType == 'driver') {
                    $sql = "INSERT INTO users (username, email, password, usertype, vehicle_number) VALUES ('$username', '$email', '$hashedPassword', '$userType', '$vehicleNumber')";
                } else {
                    $sql = "INSERT INTO users (username, email, password, usertype) VALUES ('$username', '$email', '$hashedPassword', '$userType')";
                }

                if ($conn->query($sql) === TRUE) {
                    // Redirect to login page after successful registration
                    header("Location: log.php");
                    exit(); // Ensure no further code is executed
                } else {
                    echo "<div class='error'>Error: " . $conn->error . "</div>";
                }
            }
        }
    }

    $conn->close();
    ?>
    <div class="container">
        <h2>Register for a Smooth Ride</h2>
        <div class="wrapper">
            <form method="POST" action="">
                <input placeholder="Username" type="text" name="username" required class="text">
                <input placeholder="Email" type="email" name="email" required class="text">
                <input placeholder="Password" type="password" name="password" required class="text">
                <input placeholder="Confirm Password" type="password" name="confirm_password" required class="text">
                <div class="user-type">
                    <label><input type="radio" name="userType" value="user" required onchange="toggleVehicleNumber(false)"> User</label>
                    <label><input type="radio" name="userType" value="driver" required onchange="toggleVehicleNumber(true)"> Driver</label>
                </div>
                <input placeholder="Vehicle Number" type="text" name="vehicle_number" class="text vehicle-number" id="vehicleNumber">
                <button class="btn" type="submit">Register</button>
            </form>
        </div>
    </div>
    <div class="animation-container">
        <img src="g_cart-removebg-preview.png" class="golf-cart" alt="Golf Cart">
    </div>

    <script>
        function toggleVehicleNumber(show) {
            const vehicleNumberField = document.getElementById('vehicleNumber');
            if (show) {
                vehicleNumberField.style.display = 'block';
                vehicleNumberField.required = true;
            } else {
                vehicleNumberField.style.display = 'none';
                vehicleNumberField.required = false;
            }
        }
    </script>
</body>

</html>