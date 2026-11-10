<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Portfolio | Webdevelopment</title>
    <!-- 1. Standard Search Engine Optimization (SEO) Meta Tags -->
    <meta name="description" content="Personal portfolio and hobby website for Webdevelopment Technology course at Opole University of Technology.">
    <meta name="keywords" content="portfolio, web development, politechnika opolska, hobby, html, css, js, php">
    <meta name="author" content="Your Full Name"> <!-- Replace with your real name -->

    <!-- 2. Open Graph (Social Media & Link Preview) Meta Tags -->
    <meta property="og:title" content="My Hobby & Portfolio Page">
    <meta property="og:description" content="Personal portfolio showcasing my hobby and web development technologies.">
    <meta property="og:type" content="website">
    <meta property="og:image" content="assets/profile.jpg">
    <link rel="stylesheet" href="css/style.css">

    <!-- Prevents flash of unstyled theme on page load -->
    <script>
        (function() {
            const savedTheme = localStorage.getItem('theme');
            if (savedTheme === 'dark') {
                document.documentElement.classList.add('dark-theme');
            }
        })();
    </script>
</head>
<body>
    <header>
        <div class="nav-container">
            <div class="brand-container">
                <img src="assets/university_logo.png" alt="Politechnika Opolska" class="header-logo">
                <span class="brand-text">Politechnika Opolska</span>
            </div>
            <div class="nav-links">
                <a href="index.php">Home</a>
                <a href="about.php">Hobbies</a>
                <a href="contact.php">Contact</a>
            </div>
            <button id="theme-toggle" type="button">Toggle Theme</button>
        </div>
    </header>
    <main>