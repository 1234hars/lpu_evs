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
// Get driver's username
$username = $_SESSION['username'];
// Retrieve bookings for trips assigned to this driver
$sql = "SELECT booking.id AS booking_id, booking.passenger_username, trips.start_location, trips.destination, trips.date, trips.time, booking.seats
        FROM booking
        JOIN trips ON booking.trip_id = trips.id
        WHERE trips.driver_username = '$username'";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Bookings</title>
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
            width: 90%;
            max-width: 800px;
          background: #ffffffba;
            padding: 30px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
        }
        h2 {
            text-align: center;
            color: #343a40;
            margin-bottom: 20px;
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
            padding: 15px;
            text-align: center;
        }
        th {
            background-color: #f4f4f9;
        }
        .complete-btn {
            background-color: #28a745;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background 0.3s, transform 0.3s;
        }
        .complete-btn:hover {
            background-color: #218838;
            transform: translateY(-2px);
        }
        .btn {
            display: inline-block;
            background-color: #007bff;
            color: white;
            padding: 10px 20px;
            border-radius: 5px;
            text-decoration: none;
            transition: background 0.3s, transform 0.3s;
            text-align: center;
        }
        .btn:hover {
            background-color: #0056b3;
            transform: translateY(-2px);
        }
        @media (max-width: 600px) {
            .dashboard {
                width: 95%;
            }
        }
    </style>
</head>
<body>
    <div class="dashboard">
        <h2>Your Bookings</h2>
        <?php if ($result->num_rows > 0): ?>
        <table>
            <thead>
                <tr>
                    <th>Passenger</th>
                    <th>Start Location</th>
                    <th>Destination</th>
                    <th>Date</th>
                    <th>Time</th>
                    <th>Seats</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?= htmlspecialchars($row['passenger_username']); ?></td>
                    <td><?= htmlspecialchars($row['start_location']); ?></td>
                    <td><?= htmlspecialchars($row['destination']); ?></td>
                    <td><?= htmlspecialchars($row['date']); ?></td>
                    <td><?= htmlspecialchars($row['time']); ?></td>
                    <td><?= htmlspecialchars($row['seats']); ?></td>
                    <td>
                        <button class="complete-btn" onclick="completeBooking(<?= $row['booking_id']; ?>)">Complete</button>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
        <?php else: ?>
        <p>No bookings found.</p>
        <?php endif; ?>
        <a href="driver_dashboard.php" class="btn">Back to Dashboard</a>
    </div>
    <script>
        function completeBooking(bookingId) {
            if (confirm('Are you sure you want to complete this booking?')) {
                window.location.href = `complete_booking.php?booking_id=${bookingId}`;
            }
        }
    </script>
</body>
</html>
<?php
$conn->close();
?>
