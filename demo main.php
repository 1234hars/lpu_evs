<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="demo.css">
    <title>E-Rikshaw Booking</title>
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

        .container {
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        button {
            padding: 15px 25px;
            margin: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }

        #onTimeBtn {
            background-color: #28a745;
            color: white;
        }

        #preBookingBtn {
            background-color: #007bff;
            color: white;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>E-Rikshaw Booking</h1>
        <button id="onTimeBtn">On-Time Booking</button>
        <button id="preBookingBtn">Pre-Booking</button>
        <div id="message"></div>
    </div>
    <script>
        document.getElementById('onTimeBtn').addEventListener('click', function() {
            document.getElementById("message").innerText =
                "You selected On-Time Booking but this feature is not available.";
        });

        document.getElementById('preBookingBtn').addEventListener('click', function() {
            window.location.href = 'log.php'; // Redirect to the login page
        });
    </script>
</body>
</html>