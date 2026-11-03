<?php
// Initialize feedback variables
$feedback = '';$feedbackClass = '';

// Check if form is submitted via POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Sanitize and trim inputs
    $name = htmlspecialchars(trim($_POST['name'] ?? ''));
    $email = filter_var(trim($_POST['email'] ?? ''), FILTER_SANITIZE_EMAIL);
    $message = htmlspecialchars(trim($_POST['message'] ?? ''));

    // Basic validation
    if (empty($name) || empty($email) || empty($message)) {
        $feedback = 'All fields are required.';$feedbackClass = 'error';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $feedback = 'Please provide a valid email address.';$feedbackClass = 'error';
    } else {
        // Success response (satisfies project requirements without needing mail server setup)
        $feedback = "Thank you, {$name}! Your message has been received successfully.";
        $feedbackClass = 'success';
        // Reset form values on success
        $name = $email =$message = '';
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Me</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <header>
        <nav>
            <a href="index.php">Home</a>
            <a href="contact.php">Contact</a>
            <button id="theme-toggle" type="button">Toggle Theme</button>
        </nav>
    </header>

    <main class="container">
        <h2>Get in Touch</h2>

        <?php if (!empty($feedback)): ?>
            <div class="alert <?= $feedbackClass; ?>">
                <?= $feedback; ?>
            </div>
        <?php endif; ?>

        <form action="contact.php" method="POST" id="contact-form" novalidate>
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" value="<?= $name ?? ''; ?>" required>
                <span class="error-msg" id="name-error"></span>
            </div>

            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" value="<?= $email ?? ''; ?>" required>
                <span class="error-msg" id="email-error"></span>
            </div>

            <div class="form-group">
                <label for="message">Message:</label>
                <textarea id="message" name="message" rows="5" required><?= $message ?? ''; ?></textarea>
                <span class="error-msg" id="message-error"></span>
            </div>

            <button type="submit">Send Message</button>
        </form>
    </main>

    <footer>
        <p>&copy; <?= date('Y'); ?> - Webdevelopment Technology</p>
    </footer>

    <script src="js/main.js"></script>
</body>
</html>