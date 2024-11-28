<?php
session_start();

// Simulated login check. Replace this with your actual login validation logic.
$isLoggedIn = isset($_SESSION['user_id']); // Assuming 'user_id' is stored in session upon login.

if (isset($_GET['logout'])) {
    // Handle logout
    session_destroy();
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Huts for Paws</title>
    <style>
        /* General Reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
    font-family: 'Open Sans', sans-serif;
    color: #333;
}


        /* Header */
        header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: #f4f4f9;
            padding: 15px 30px;
        }

        header .logo {
            font-size: 24px;
            font-weight: bold;
            color: #5e3baf;
        }

        .logo img {
            max-width: 100px;
            height: auto;
        }

        header nav {
            justify-content: center;
            flex: 1;
            display: flex;
        }

        header nav a {
            display: inline-block;
            padding: 10px 20px;
            margin: 0 10px;
            background-color: #4a4a8a;
            text-decoration: none;
            color: rgba(255, 255, 255, 0.818);
            font-weight: bold;
            text-align: center;
            border-radius: 10px;
            transition: background-color 0.3s ease;
        }

        header nav a:hover {
            background-color: #7359b0;
            transform: scale(1.1);
        }

        .auth {
            padding: 5px;
            margin-right: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            display: inline-block;
            position: relative;
        }

        .auth button {
            background-color: #5e3baf;
            color: #fff;
            padding: 5px 10px;
            border: none;
            border-radius: 5px;
            margin-left: 5px;
            cursor: pointer;
            font-weight: bold;
            transition: background-color 0.3s ease, transform 0.2s ease;
        }

        .auth button:hover {
            background-color: #7359b0;
            transform: scale(1.1);
        }

        .dropdown {
            display: none;
            position: absolute;
            top: 40px;
            left: 0;
            background-color: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
            z-index: 1;
            border: 1px solid #ccc;
            width: 150px;
        }

        .dropdown a {
            display: block;
            padding: 10px 15px;
            text-decoration: none;
            font-size: 14px;
            color: #333;
            background-color: #fff;
            border-bottom: 1px solid #ddd;
            transition: background-color 0.2s ease;
        }

        .dropdown a:last-child {
            border-bottom: none;
            /* Remove bottom border for the last link */
        }

        .dropdown a:hover {
            background-color: #f0f0f0;
            color: #5e3baf;
        }

        /* Adjust dropdown visibility */
        .dropdown.active {
            display: block;
        }

        /* Hero Section */
        .hero {
            justify-content: space-between;
            width: 100%;
            height: 100%;
            display: flex;
            align-items: center;
            padding: 40px;
            background-color: #e9e1f7;
        }

        .hero-content {
            flex: 1;
        }

        .hero-content h1 {
            font-size: 2.5cm;
            color: #333;
        }

        .hero-content h1 span {
            color: #5e3baf;
        }

        .hero-content p {
            margin: 20px 0;
            color: #666;
        }

        .hero-content button {
            background-color: #5e3baf;
            color: #fff;
            padding: 10px 20px;
            margin-right: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .hero-content button:hover {
            background-color: #4a2f9e;
            transform: scale(1.2);
        }

        .hero-image img {
            width: 100%;
            height: auto;
        }

        /* Steps Section */
        .steps {
            text-align: center;
            padding: 40px;
        }

        .steps h2 {
            font-size: 2em;
            color: #333;
        }

        .steps h2 span {
            color: #5e3baf;
        }

        .step-container {
            display: flex;
            justify-content: center;
            margin-top: 30px;
        }

        .step {
            flex: 1;
            max-width: 200px;
            text-align: center;
            padding: 20px;
            background-color: #ffffff;
            margin: 0 10px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .step-icon {
            font-size: 2em;
            margin-bottom: 10px;
            color: #5e3baf;
        }
    </style>
</head>

<body>
    <header>
        <div class="logo">
            <img src="images/Logo.png" alt="Logo">
        </div>
        <nav>
            <a href="#Adopt">Adopt</a>
            <a href="#Rehome">Rehome</a>
            <a href="#Care Guide">Care Guide</a>
            <a href="#About Us">About Us</a>
        </nav>
        <div class="auth">
            <button
                onclick="window.location.href='http://localhost/htp2/login.php'">Login</button>
            <button
                onclick="window.location.href='http://localhost/htp2/register.php'">Register</button>
        </div>

        <script>
            // Dropdown toggle functionality
            const loginButton = document.getElementById('loginButton');
            const loginDropdown = document.getElementById('loginDropdown');

            loginButton.addEventListener('click', () => {
                loginDropdown.classList.toggle('active');
            });

            // Close dropdown when clicking outside
            window.addEventListener('click', (event) => {
                if (!loginButton.contains(event.target) && !loginDropdown.contains(event.target)) {
                    loginDropdown.classList.remove('active');
                }
            });
        </script>
    </header>

    <section class="hero">
        <div class="hero-content">
            <h1>Give a New Life to <span>Paw Friends</span></h1>
            <p>Pet adoption and rehoming are vital aspects of animal welfare, offering hope and a fresh start for pets
                in need. Open your heart and your home to a shelter pet.</p>
            <div class="hero-buttons">
                <button
                    onclick="window.location.href='http://localhost/htp2/login.php'">Adopt</button>
                <button
                    onclick="window.location.href='http://localhost/htp2/login.php'">Rehome</button>
            </div>
        </div>
        <div class="hero-image">
            <img src="Images/Dog & Cat.png" alt="Hero Image">
        </div>
    </section>

    <section class="steps">
        <h2>Adopt or Rehome a pet in just <span>3 Easy Steps</span></h2>
        <div class="step-container">
            <div class="step">
                <div class="step-icon">
                    <img src="Images/group_add.png" alt="Step Icon">
                </div>
                <p>Set up your profile including photos in minutes</p>
            </div>
            <div class="step">
                <div class="step-icon">
                    <img src="Images/Vector.png" alt="Search Icon">
                </div>
                <p>Describe your home and routine so animals can see if it’s right for their pet</p>
            </div>
            <div class="step">
                <div class="step-icon">
                    <img src="Images/content_paste_search.png" alt="Home Icon">
                </div>
                <p>Start your search!</p>
            </div>
        </div>
    </section>
</body>

</html>