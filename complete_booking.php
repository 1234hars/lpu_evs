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

// Check if booking_id is provided
if (isset($_GET['booking_id'])) {
    $booking_id = $_GET['booking_id'];

    // Query to delete the booking
    $sql = "DELETE FROM booking WHERE id = '$booking_id'";

    if ($conn->query($sql) === TRUE) {
        echo "<div style='color:green;'>Booking completed successfully!</div>";
    } else {
        echo "<div style='color:red;'>Error: " . $sql . "<br>" . $conn->error . "</div>";
    }
} else {
    echo "<div style='color:red;'>No booking ID provided!</div>";
}

$conn->close();
?>
<a href="view_bookings.php">Back to View Bookings</a>


