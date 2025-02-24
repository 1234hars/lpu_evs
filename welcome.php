<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Rickshaw Booking | LPU</title>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@600&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Open Sans', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f7f7f7;
            color: #333;
            transition: background-color 0.3s ease;
        }
        header {
            background-color: #4CAF50; /* Eco-friendly Green */
            color: white;
            padding: 15px;
            text-align: center;
            position: fixed;
            width: 100%;
            top: 0;
            left: 0;
            z-index: 1000;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }
        nav ul {
            list-style-type: none;
            padding: 0;
            display: flex;
            justify-content: center;
        }
        nav ul li {
            margin: 0 15px;
        }
        nav ul li a {
            color: white;
            text-decoration: none;
            font-weight: bold;
            transition: color 0.3s;
        }
        nav ul li a:hover {
            color: #FFEB3B; /* Highlight color */
        }
        .hero {
            background: url('lpu-hero-image.jpg') no-repeat center center;
            background-size: cover;
            height: 80vh;
            color: white;
            text-align: center;
            display: flex;
            flex-direction: column;
            justify-content: center;
            margin-top: 60px;
            position: relative;
            box-shadow: inset 0 0 10px rgba(0,0,0,0.5);
        }
        .hero::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.5);
        }
        h1 {
            position: relative;
            z-index: 1;
        }
        .cta-button {
            background-color: #FFEB3B;
            color: #4CAF50;
            padding: 15px 30px;
            text-decoration: none;
            font-size: 1.2em;
            border-radius: 5px;
            margin-top: 20px;
            display: inline-block;
            transition: background-color 0.3s, transform 0.3s;
        }
        .cta-button:hover {
            background-color: #FFC107;
            transform: scale(1.05);
        }
        .section {
            padding: 60px 20px;
            text-align: center;
            animation: fadeIn 1s ease-out;
        }
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }
        .section h2 {
            margin-bottom: 20px;
            font-size: 2em;
            color: #4CAF50; /* Eco-friendly Green */
        }
        .steps, .services ul {
            display: flex;
            justify-content: center;
            gap: 20px;
            flex-wrap: wrap;
        }
        .step, .service {
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            flex: 1;
            max-width: 300px;
            transition: transform 0.3s;
        }
        .step:hover, .service:hover {
            transform: translateY(-5px);
        }
        .testimonials blockquote {
            font-style: italic;
            color: #666;
            margin: 10px;
            padding: 10px;
            border-left: 5px solid #4CAF50; /* Eco-friendly Green */
        }
        footer {
            background-color: #4CAF50; /* Eco-friendly Green */
            color: white;
            text-align: center;
            padding: 20px;
        }
        footer a {
            color: #FFEB3B;
            text-decoration: none;
        }
        footer a:hover {
            text-decoration: underline;
        }
        @media (max-width: 768px) {
            .hero {
                height: 50vh;
            }
            .steps, .services ul {
                flex-direction: column;
                align-items: center;
            }
        }
    </style>
</head>
<body>
    <header>
        <div class="logo">E-Rickshaw | LPU</div>
        <nav>
            <ul>
                <li><a href="#">Home</a></li>
                <li><a href="http://localhost/log/about.php">About</a></li>
                <li><a href="http://localhost/log/demo%20main.php">Services</a></li>
                <li><a href="http://localhost/log/help.php#">Help</a></li>
                <li><a href="http://localhost/log/log.php">Login/Register</a></li>
            </ul>
        </nav>
    </header>
    <section class="hero">
        <h1>Eco-Friendly Rides at Your Fingertips</h1>
        <a href="#" class="cta-button">Book Now</a>
    </section>
    <section class="section how-it-works">
        <h2>How It Works</h2>
        <div class="steps">
            <div class="step">Select Your Ride</div>
            <div class="step">Book Your Ride</div>
            <div class="step">Enjoy Your Ride</div>
        </div>
    </section>
    <section class="section services">
        <h2>Our Services</h2>
        <ul>
            <li class="service">Standard Ride - $5</li>
            <li class="service">Premium Ride - $10</li>
        </ul>
    </section>
    <section class="section testimonials">
        <h2>What Our Users Say</h2>
        <blockquote>"Great service and eco-friendly!" - User A</blockquote>
       
        <blockquote>"Easy to book and reliable!" - User B</blockquote>  
    </section>  
    <section class="section promotions">  
        <h2>Special Offers for LPU Students</h2>  
        <p>Show your student ID and get 10% off your first ride!</p>  
    </section>  
    <footer>  
        <div>Follow us on social media</div>  
        <div>Contact: info@erickshaw.com</div>  
        <div><a href="#">Privacy Policy</a> | <a href="#">Terms of Service</a></div>  
    </footer>  
</body>  
</html>