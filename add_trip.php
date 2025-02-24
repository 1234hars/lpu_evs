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
// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $start_location = mysqli_real_escape_string($conn, $_POST['start_location']);
    $destination = mysqli_real_escape_string($conn, $_POST['destination']);
    $date = mysqli_real_escape_string($conn, $_POST['date']);
    $time = mysqli_real_escape_string($conn, $_POST['time']);
    $seats = intval($_POST['seats']);
    $price = floatval($_POST['price']);
    $driver_username = $_SESSION['username'];
    // Insert the trip into the database
    $sql = "INSERT INTO trips (start_location, destination, date, time, available_seats, price_per_seat, driver_username)
            VALUES ('$start_location', '$destination', '$date', '$time', '$seats', '$price', '$driver_username')";
    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Trip added successfully!'); window.location.href='driver_dashboard.php';</script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Trip</title>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&display=swap" rel="stylesheet">
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


.container {
  margin-top: 200px;
  width: 120%;
  max-width: 450px;
  background: #ffffffba;
  padding: 50px;
  box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
  border-radius: 50px;
}

h2 {
  text-align: center;
  color: #333;
  margin-bottom: 30px;
}

input {
  width: 100%;
  padding: 15px;
  margin: 12px 0;
  border-radius: 4px; /* Rounded corners */
  border: 1px solid #ced4da;
  transition: border-color 0.3s, box-shadow 0.3s;
  font-size: 16px;
}

input:focus {
  border-color: #007bff;
  box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
  outline: none;
}

.submit-btn {
  background-color: #28a745; /* Green button */
  color: white;
  border: none;
  padding: 15px;
  border-radius: 4px;
  cursor: pointer;
  width: 100%;
  font-size: 18px;
  font-weight: 500;
  transition: background-color 0.3s, transform 0.3s;
}

.submit-btn:hover {
  background-color: #218c3d;
  transform: translateY(-2px);
}

.form-group {
  margin-bottom: 15px;
  display: flex; /* Align labels and inputs horizontally */
  align-items: center; /* Align vertically */
}

.form-group label {
  flex: 0 0 100px; /* Fixed width for labels */
  margin-right: 10px; /* Spacing between label and input */
}

@media (max-width: 600px) {
  .container {
    width: 95%;
  }
}
    </style>
</head>
<body>
    <div class="container">
        <h2>Add Trip</h2>
        <form method="POST" action="">
            <input type="text" name="start_location" placeholder="Start Location" required>
            <input type="text" name="destination" placeholder="Destination" required>
            <input type="date" name="date" required>
            <input type="time" name="time" required>
            <input type="number" name="seats" placeholder="Number of Seats" required min="1">
            <input type="number" name="price" placeholder="Price per Seat" required step="0.01" min="0">
            <button type="submit" class="submit-btn">Add Trip</button>
        </form>
    </div>
</body>
</html>
<?php
$conn->close();
?>
