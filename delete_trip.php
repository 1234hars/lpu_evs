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

// Handle trip deletion
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $trip_id = mysqli_real_escape_string($conn, $_POST['trip_id']);
    $sql = "DELETE FROM trips WHERE id = '$trip_id' AND driver_username = '" . $_SESSION['username'] . "'";
    
    if ($conn->query($sql) === TRUE) {
        echo "<div class='message success'>Trip deleted successfully.</div>";
    } else {
        echo "<div class='message error'>Error: " . $conn->error . "</div>";
    }
}

// Retrieve trips assigned to this driver
$username = $_SESSION['username'];
$sql = "SELECT * FROM trips WHERE driver_username = '$username'";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Trip</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
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
        h2 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
          background: #ffffffba;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
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
            background-color: #007bff;
            color: white;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        tr:hover {
            background-color: #e0e0e0;
        }
        button {
            width: 100%;
            padding: 10px;
            background: #f44336;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            transition: background 0.3s;
        }
        button:hover {
            background: #d32f2f;
        }
        .message {
            margin: 10px 0;
            padding: 10px;
            border-radius: 5px;
            text-align: center;
        }
        .success {
            background-color: #d4edda;
            color: #155724;
        }
        .error {
            background-color: #f8d7da;
            color: #721c24;
        }
        .back-link {
            display: block;
            text-align: center;
            margin-top: 20px;
            text-decoration: none;
            color: #007bff;
            font-weight: 500;
        }
        .back-link:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Delete Trip</h2>
        <form method="POST" action="">
            <table>
                <thead>
                    <tr>
                        <th>Trip ID</th>
                        <th>Start Location</th>
 <th>Destination</th>
                        <th>Date</th>
                        <th>Time</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if ($result->num_rows > 0): ?>
                        <?php while ($row = $result->fetch_assoc()): ?>
                            <tr>
                                <td><?= $row['id']; ?></td>
                                <td><?= $row['start_location']; ?></td>
                                <td><?= $row['destination']; ?></td>
                                <td><?= $row['date']; ?></td>
                                <td><?= $row['time']; ?></td>
                                <td>
                                    <button type="submit" name="trip_id" value="<?= $row['id']; ?>">Delete</button>
                                </td>
                            </tr>
                        <?php endwhile; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="6">No trips assigned.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </form>
        <a href="driver_dashboard.php" class="back-link">Back to Dashboard</a>
    </div>
</body>
</html>

<?php
$conn->close();
?>