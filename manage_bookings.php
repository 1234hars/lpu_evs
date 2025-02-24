<?php
session_start();

// Check if the user is logged in and is a driver
if (!isset($_SESSION['username']) || $_SESSION['usertype'] != 'driver') {
    header("Location: login.php");
    exit;
}

// Database connection
$conn = new mysqli("localhost", "root", "", "lpu_evs");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get trips assigned to this driver
$username = $_SESSION['username'];
$sql = "SELECT * FROM trips WHERE driver_username = '$username'";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Bookings</title>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@600&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Open Sans', sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 20px;
        }
        h2 {
            text-align: center;
        }
        .dashboard {
            margin: 20px auto;
            width: 80%;
            max-width: 600px;
            background: #fff;
            padding: 20px;
            box-shadow: 0 8px 12px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 12px;
            text-align: center;
        }
        th {
            background-color: #f4f4f9;
        }
        .logout-btn {
            display: inline-block;
            padding: 10px 20px;
            background-color: #74a4fc;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            margin-top: 10px;
            display: block;
            text-align: center;
        }
        .logout-btn:hover {
            background-color: lightblue;
        }
    </style>
</head>
<body>
    <div class="dashboard">
        <h2>Your Assigned Trips</h2>
        <?php if ($result->num_rows > 0): ?>
        <table>
            <thead>
                <tr>
                    <th>Start Location</th>
                    <th>Destination</th>
                    <th>Date</th>
                    <th>Time</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?= $row['start_location']; ?></td>
                    <td><?= $row['destination']; ?></td>
                    <td><?= $row['date']; ?></td>
                    <td><?= $row['time']; ?></td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
        <?php else: ?>
        <p>No trips assigned.</p>
        <?php endif; ?>
        
        <a href="logout.php" class="logout-btn">Logout</a>
    </div>
</body>
</html>

<?php
$conn->close();
?>
