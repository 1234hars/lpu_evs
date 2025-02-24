<?php
session_start();
// Check if the user is logged in and is a driver
if (!isset($_SESSION['username']) || $_SESSION['usertype'] != 'driver') {
    header("Location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Driver Dashboard</title>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@600&display=swap" rel="stylesheet">
    <style>
        body {
            background: url('main-qimg-fe3b6c0b28474c5e471f76e3eaf569bd-lq.jpg') no-repeat center center;
            background-size: cover;
            font-family: 'Open Sans', sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .dashboard {
            width: 100%;
            max-width: 800px;
            background: #fff;
            padding: 30px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
            border-radius: 10px;
            text-align: center;
        }
        h2 {
            color: #333;
        }
        .navbar {
            display: flex;
            justify-content: space-around;
            margin-bottom: 80px;
            padding: 10px;
            background: linear-gradient(135deg, #4CAF50, #2E7D32); /* Gradient for navbar */
            border-radius: 5px;
        }
        .navbar a {
            text-decoration: none;
            color: #fff;
            font-weight: bold;
            padding: 10px 20px;
            border-radius: 5px;
            transition: background 0.3s, color 0.3s;
        }
        .navbar a:hover {
            background: #45a049;
            color: #fff;
        }
        .btn {
            display: block;
            width: 100%;
            padding: 15px;
            background: linear-gradient(135deg, #4CAF50, #45a049); /* Gradient for buttons */
            color: white;
            text-decoration: none;
            border-radius: 5px;
            margin: 10px 0;
            text-align: center;
            transition: background-color 0.3s, transform 0.3s;
        }
        .btn:hover {
            background: linear-gradient(135deg, #66BB6A, #388E3C);
            transform: translateY(-2px);
        }
        .wrapper {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            height: 100vh;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="navbar">
            <a href="add_trip.php">Add Trip</a>
            <a href="delete_trip.php">Delete Trip</a>
            <a href="view_bookings.php">View Bookings</a>
            <a href="logout.php">Logout</a>
        </div>
        <div class="dashboard">
            <h2>Welcome, <?= htmlspecialchars($_SESSION['username']); ?>!</h2>
            <p>Manage your trips and bookings efficiently.</p>
            <a class="btn" href="add_trip.php">Add New Trip</a>
            <a class="btn" href="view_bookings.php">View All Bookings</a>
        </div>
    </div>
</body>
</html>
