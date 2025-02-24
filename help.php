<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LPU E-VS Help Center</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@600&family=Roboto:wght@400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        body {
            font-family: 'Open Sans', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
            color: #333;
        }
        header {
            background-color: #800000; /* LPU Maroon */
            color: white;
            padding: 15px 0;
            text-align: center;
            position: fixed;
            width: 100%;
            top: 0;
            left: 0;
            z-index: 1000;
        }
        .logo {
            font-size: 1.5em;
            font-weight: bold;
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
            transition: color 0.3s, border-bottom 0.3s;
        }
        nav ul li a:hover {
            color: #f44336; /* Highlight color */
            border-bottom: 2px solid #f44336;
        }
        .section {
            padding: 80px 20px;
            text-align: center;
            margin-top: 60px;
        }
        h1 {
            color: #800000; /* LPU Maroon */
            margin-bottom: 20px;
        }
        h2 {
            margin-bottom: 20px;
            font-size: 1.8em;
        }
        .faq {
            text-align: left;
            margin: 20px auto;
            max-width: 600px;
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            transition: transform 0.2s;
        }
        .faq:hover {
            transform: translateY(-2px);
        }
        .faq h3 {
            margin: 10px 0;
            color: #800000; /* LPU Maroon */
        }
        footer {
            background-color: #800000; /* LPU Maroon */
            color: white;
            text-align: center;
            padding: 20px;
            position: relative;
            bottom: 0;
            width: 100%;
        }
        footer a {
            color: #f44336;
            text-decoration: none;
        }
        footer a:hover {
            text-decoration: underline;
        }
        @media (max-width: 768px) {
            .section {
                padding: 40px 10px;
            }
            nav ul {
                flex-direction: column;
            }
            nav ul li {
                margin: 10px 0;
            }
        }
    </style>
</head>
<body>
    <header>
        <div class="logo">LPU E-VS Help Center</div>
        <nav>
            <ul>
                <li><a href="http://localhost/log/welcome.php">Home</a></li>
                <li><a href="http://localhost/log/demo%20main.php">Services</a></li>
                <li><a href="http://localhost/log/help.php#">Help</a></li>
                <li><a href="#">FAQs</a></li>
                <li><a href="#">Feedback</a></li>
            </ul>
        </nav>
    </header>

    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="rx3fqizl.png"  height="350px" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="rx3fqizl.png" height="350px" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="rx3fqizl.png"  height="350px"class="d-block w-100" alt="...">
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>

    <section class="section">
        <h1>Welcome to the LPU E-VS Help Center</h1>
        <p>Your guide to navigating the LPU Electric Vehicle Services. Below you will find answers to frequently asked questions, contact information, and useful resources.</p>
    </section>

    <section class="section">
        <h2>Frequently Asked Questions (FAQs)</h2>

        <div class="faq">
            <h3>1. How do I book an e-rickshaw?</h3>
            <p>You can book an e-rickshaw through our mobile app or website by selecting your pick-up and drop-off locations.</p>
        </div>

        <div class="faq">
            <h3>2. What are the payment options?</h3>
            <p>We accept various payment methods including credit/debit cards, digital wallets, and cash.</p>
        </div>

        <div class="faq">
            <h3>3. Is there a student discount available?</h3>
            <p>Yes! LPU students get a 10% discount on their first ride by showing their student ID.</p>
        </div>

        <div class="faq">
            <h3>4. What should I do if I left something in the e-rickshaw?</h3>
            <p>Please contact our customer service immediately at the provided contact details below.</p>
        </div>

        <div class="faq">
            <h3>5. How can I provide feedback about my ride?</h3>
            <p>You can submit your feedback through our website or by contacting us directly via email.</p>
        </div>
    </section>

    <section class="section">
        <h2>Contact Us</h2>
        <p>If you have any further questions or need assistance, please reach out to us:</p>
        <p>Email: <a href="mailto:info@lpu-ebike.com">info@lpu-ebike.com</a></p>
        <p>Phone: +91 123 456 7890</p>
    </section>

    <footer>
        <div>Follow us on social media</div>
        <div>&copy; 2023 LPU E-VS. All rights reserved.</div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>