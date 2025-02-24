<?php
session_start();

if (!isset($_SESSION['username']) || $_SESSION['usertype'] != 'user') {
    header("Location: login.php");
    exit;
}

// Database connection
$conn = new mysqli("localhost", "root", "", "lpu_evs");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$username = $_SESSION['username'];

// Retrieve passenger's booking history along with vehicle number
$sql = "SELECT trips.start_location, trips.destination, trips.date, trips.time, booking.seats, users.vehicle_number 
        FROM booking
        JOIN trips ON booking.trip_id = trips.id
        JOIN users ON trips.driver_username = users.username
        WHERE booking.passenger_username = '$username'";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Passenger Dashboard - LPU EVS</title>
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

        h2 {
            text-align: center;
            color: #333;
        }

        .dashboard {
            margin: 20px auto;
            width: 90%;
            max-width: 800px;
            background: #ffffff8f;
            padding: 20px;
            box-shadow: 0 8px 12px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }

        table,
        th,
        td {
            border: 1px solid #ddd;
        }

        th,
        td {
            padding: 12px;
            text-align: center;
        }

        th {
            background-color: #74a4fc;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tr:hover {
            background-color: #e0e7ff;
        }

        .btn, .logout-btn {
            display: inline-block;
            padding: 10px 20px;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            margin-top: 10px;
            transition: background-color 0.3s;
        }

        .btn {
            background-color: #74a4fc;
        }

        .btn:hover {
            background-color: #5a8bf1;
        }

        .logout-btn {
            background-color: #ff6b6b;
        }

        .logout-btn:hover {
            background-color: #ff4c4c;
        }

        @media (max-width: 600px) {
            .dashboard {
                width: 95%;
                padding: 15px;
            }

            th, td {
                padding: 10px;
            }
        }
    </style>
</head>

<body>
    <div class="dashboard">
        <h2>Welcome, <?= htmlspecialchars($_SESSION['username']); ?>!</h2>

        <h3>Your Booking History</h3>
        <?php if ($result->num_rows > 0): ?>
            <table>
                <thead>
                    <tr>
                        <th>Start Location</th>
                        <th>Destination</th>
                        <th>Date</th>
                        <th>Time</th>
                        <th>Seats</th>
                        <th>Vehicle Number</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = $result->fetch_assoc()): ?>
                        <tr>
                            <td><?= htmlspecialchars($row['start_location']); ?></td>
                            <td><?= htmlspecialchars($row['destination']); ?></td>
                            <td><?= htmlspecialchars($row['date']); ?></td>
                            <td><?= htmlspecialchars($row['time']); ?></td>
                            <td><?= htmlspecialchars($row['seats']); ?></td>
                            <td><?= htmlspecialchars($row['vehicle_number']); ?></td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>No bookings found.</p>
        <?php endif; ?>

        <h3>Actions</h3>
        <a href="book_seat.php" class="btn">Book a Seat</a>
        <a href="logout.php" class="logout-btn">Logout</a>
    </div>
</body>

</html>

<?php
$conn->close();
?>