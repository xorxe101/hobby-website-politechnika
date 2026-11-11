<?php
date_default_timezone_set('Europe/Warsaw');
session_start();

$feedback = '';
$feedbackClass = '';
$name = '';
$email = '';
$message = '';

// Check if visitor's name exists in cookie, fallback to empty string
$savedName = isset($_COOKIE['visitor_name']) ? htmlspecialchars($_COOKIE['visitor_name']) : '';

// Retrieve flash message from session after redirect
if (isset($_SESSION['feedback'])) {
    $feedback = $_SESSION['feedback'];
    $feedbackClass = $_SESSION['feedbackClass'];
    unset($_SESSION['feedback'], $_SESSION['feedbackClass']);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $rawName    = trim($_POST['name'] ?? '');
    $rawEmail   = trim($_POST['email'] ?? '');
    $rawMessage = trim($_POST['message'] ?? '');

    $name    = htmlspecialchars($rawName);
    $email   = filter_var($rawEmail, FILTER_SANITIZE_EMAIL);
    $message = htmlspecialchars($rawMessage);

    if (empty($rawName) || empty($rawEmail) || empty($rawMessage)) {
        $feedback = 'All fields are required.';
        $feedbackClass = 'error';
    } elseif (!filter_var($rawEmail, FILTER_VALIDATE_EMAIL)) {
        $feedback = 'Please provide a valid email address.';
        $feedbackClass = 'error';
    } else {
        // Save clean string to file
        $entry = date('Y-m-d H:i:s') . " | Name: $rawName | Email: $rawEmail | Msg: $rawMessage" . PHP_EOL;
        file_put_contents('messages.txt', $entry, FILE_APPEND | LOCK_EX);

        // Store cookie for 30 days only if the user has accepted
        if (isset($_COOKIE['cookie_consent']) && $_COOKIE['cookie_consent'] === 'accepted') {
            setcookie('visitor_name', $rawName, time() + (86400 * 30), "/");
        }

        // Flash message
        $_SESSION['feedback'] = "Thank you, {$name}! Your message has been received successfully.";
        $_SESSION['feedbackClass'] = 'success';

        // PRG redirect
        header('Location: contact.php');
        exit;
    }
}

include 'includes/header.php';
?>

<div class="contact-card">
    <div class="contact-header">
        <span class="badge">Contact Form</span>
        <h2>Let's Connect</h2>
        <p>Leave a note or feedback about my project.</p>
    </div>

    <?php if (!empty($feedback)): ?>
        <div class="alert <?= $feedbackClass; ?>">
            <?= $feedback; ?>
        </div>
    <?php endif; ?>

    <form action="contact.php" method="POST" id="contact-form" novalidate>
        <div class="form-group">
            <label for="name">Your Name</label>
            <input 
                type="text" 
                id="name" 
                name="name" 
                placeholder="e.g. Alex Smith"
                value="<?= !empty($name) ? $name : ($savedName ?? ''); ?>" 
                required
            >
            <span class="error-msg" id="name-error"></span>
        </div>

        <div class="form-group">
            <label for="email">Email Address</label>
            <input 
                type="email" 
                id="email" 
                name="email" 
                placeholder="alex@example.com"
                value="<?= $email ?? ''; ?>" 
                required
            >
            <span class="error-msg" id="email-error"></span>
        </div>

        <div class="form-group">
            <label for="message">Message</label>
            <textarea 
                id="message" 
                name="message" 
                rows="4" 
                placeholder="Write your message here..."
                required
            ><?= $message ?? ''; ?></textarea>
            <span class="error-msg" id="message-error"></span>
        </div>

        <button type="submit" class="btn submit-btn">
            <span>Send Message</span>
        </button>
    </form>
</div>

<?php include 'includes/footer.php'; ?>