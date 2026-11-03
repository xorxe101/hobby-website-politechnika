<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Portfolio | Webdevelopment</title>
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
            <div class="nav-links">
                <a href="index.php">Home</a>
                <a href="contact.php">Contact</a>
            </div>
            <button id="theme-toggle" type="button">Toggle Theme</button>
        </div>
    </header>
    <main>