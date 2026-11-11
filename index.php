<?php 
date_default_timezone_set('Europe/Warsaw');
include 'includes/header.php'; ?>

<section class="hero-card">
    <div class="avatar-container">
        <img src="assets/profile.jpg" alt="Profile Picture" class="profile-pic">
    </div>
    
    <h1>Welcome to My Hobby Page</h1>
    <p class="hero-desc">
        Exploring web technologies through code, design, and interactive development.
    </p>
    <div class="timestamp">
        Server Time: <strong><?= date('Y-m-d H:i:s'); ?></strong>
    </div>
    <div>
        <a href="contact.php" class="btn" style="text-decoration: none; display: inline-block; margin-top: 1rem;">Get in Touch</a>
    </div>
</section>

<?php include 'includes/footer.php'; ?>