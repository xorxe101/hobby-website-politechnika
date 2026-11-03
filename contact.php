<?php
$feedback = '';$feedbackClass = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = htmlspecialchars(trim($_POST['name'] ?? ''));
    $email = filter_var(trim($_POST['email'] ?? ''), FILTER_SANITIZE_EMAIL);
    $message = htmlspecialchars(trim($_POST['message'] ?? ''));

    if (empty($name) || empty($email) || empty($message)) {
        $feedback = 'All fields are required.';$feedbackClass = 'error';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $feedback = 'Please provide a valid email address.';$feedbackClass = 'error';
    } else {
        $feedback = "Thanks {$name}! Your message has been sent.";
        $feedbackClass = 'success';$name = $email =$message = '';
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
                value="<?= $name ?? ''; ?>" 
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
            <span>Send Message &rarr;</span>
        </button>
    </form>
</div>

<?php include 'includes/footer.php'; ?>