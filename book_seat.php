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

// Handle booking form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $trip_id = mysqli_real_escape_string($conn, $_POST['trip_id']);
    $passenger_name = mysqli_real_escape_string($conn, $_POST['passenger_name']);
    $seats = (int)$_POST['seats'];
    $username = $_SESSION['username'];

    // Insert booking into the database
    $sql = "INSERT INTO booking (trip_id, passenger_username, seats) VALUES ('$trip_id', '$username', '$seats')";
    
    if ($conn->query($sql) === TRUE) {
        // Update the available seats in trips table
        $conn->query("UPDATE trips SET available_seats = available_seats - $seats WHERE id = '$trip_id'");
        // Redirect to passenger dashboard after successful booking
        header("Location: passenger_dashboard.php");
        exit; // Always use exit after a header redirect
    } else {
        echo "<div style='color:red;'>Error: " . $conn->error . "</div>";
    }
}

// Fetch available trips along with vehicle numbers to display
$sql = "
    SELECT trips.id, trips.start_location, trips.destination, trips.available_seats, users.vehicle_number 
    FROM trips 
    JOIN users ON trips.driver_username = users.username 
    WHERE trips.available_seats > 0"; // Only fetch trips with available seats
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Seat - LPU EVS</title>
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

        .container {
            margin: 20px auto;
            width: 80%;
            max-width: 600px;
            background: #fff;
            padding: 20px;
            box-shadow: 0 8px 12px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
        }

        form {
            margin-bottom: 20px;
        }

        input[type="text"], input[type="number"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .btn {
            padding: 10px 20px;
            background-color: #74a4fc;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .btn:hover {
            background-color: lightblue;
        }

        .logout-btn {
            display: inline-block;
            padding: 10px 20px;
            background-color: #ff6b6b;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            margin-top: 10px;
            text-align: center;
        }

        .logout-btn:hover {
            background-color: #ff4c4c;
        }
    </style>
</head>
<body>

    <div class="container">
        <h2>Book a Seat</h2>
        
        <?php if ($result->num_rows > 0): ?>
            <form method="POST" action="">
                <select name="trip_id" required>
                    <option value="">Select a Trip</option>
                    <?php while ($row = $result->fetch_assoc()): ?>
                        <option value="<?= $row['id']; ?>">
                            <?= $row['start_location'] . " to " . $row['destination'] . " - Vehicle: " . $row['vehicle_number'] . " - Available Seats: " . $row['available_seats']; ?>
                        </option>
                    <?php endwhile; ?>
                </select>
                <input type="text" name="passenger_name" placeholder="Enter your name" required>
                <input type="number" name="seats" min="1" max="<?= $row['available_seats']; ?>" placeholder="Number of seats" required>
                <button class="btn" type="submit">Book</button>
            </form>
        <?php else: ?>
            <p>No available trips found.</p>
        <?php endif; ?>
        
        <a href="logout.php" class="logout-btn">Logout</a>
    </div>

</body>
</html>

<?php
$conn->close();
?>
