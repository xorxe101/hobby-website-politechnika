# Webdevelopment Technology - Hobby & Portfolio Website

A responsive, dynamic personal portfolio and hobby website developed for the **Webdevelopment Technology** course in the Winter Semester 2026/2027 at the **Opole University of Technology** (*Politechnika Opolska*).

---

## 📌 Project Overview

* **Author:** Georgios Koliavras
* **Course:** Webdevelopment Technology
* **Academic Year:** 2026/2027
* **Institution:** Opole University of Technology
* **Deadline:** January 15, 2027

This web application showcases a personal profile, athletic achievements, and engineering hobbies while satisfying all course criteria across client-side and server-side technologies, web security practices, and compliance standards.

---

## 🚀 Tech Stack & Implemented Features

### 1. HTML5 & Semantic Architecture
* Built with modern semantic structure (`<header>`, `<nav>`, `<main>`, `<article>`, `<section>`, `<footer>`).
* Modular multi-page layout using reusable PHP partials (`includes/header.php`, `includes/footer.php`).
* Dedicated **Hobbies & Passions page** (`about.php`) presenting competitive sports (10m Air Rifle Panhellenic Champion), club basketball (Athinaikos BC), and tech projects (WRO LEGO EV3 Robotics & IoT Weather Stations).
* Embedded **Search Engine Optimization (SEO)** and Open Graph (`og:*`) meta tags for rich social media indexing and link previews.

### 2. CSS3 / Modern Styling
* **Fluid & Responsive Layout:** Clean grid and flexbox alignment (`hobbies-grid`, `nav-container`) with responsive breakpoint handling.
* **Consistent University Branding:** Integrated university emblem (`assets/university_logo.png`) seamlessly aligned to the header bar.
* **Shift-Free Navigation:** Fixed-width theme toggle element (`min-width: 110px`) preventing navigation item jitter or layout shifts when alternating button text ("Light Mode" vs "Dark Mode").
* **Theming Engine:** Light and dark mode powered by CSS custom properties (`:root` variables) with full color-inversion support for dark theme logos and UI cards.
* **Clean UI/UX:** Polished card designs with compact action callouts, high-contrast typography, and smooth CSS entrance animations (`fadeInUp`, `cookiePop`).

### 3. JavaScript (Client-Side Interactivity)
* **Persistent Theme Switcher:** Uses `localStorage` combined with an early-execution `document.documentElement` script in the `<head>` to eliminate Theme Flash of Unstyled Content (FOUC).
* **Client-Side Form Validation:** Validates field completeness, regex email formatting, and minimum message length before network dispatch.
* **Mandatory Cookie Wall & Banner:** Modal backdrop locking viewport scroll (`cookie-locked`) until explicit user consent is provided.

### 4. PHP 7/8 (Server-Side Scripting & Security)
* **Post/Redirect/Get (PRG) Pattern:** Eliminates duplicate form resubmissions on browser refresh using PHP session-based flash messaging (`$_SESSION`).
* **Input Sanitization & Validation:** Defense against Cross-Site Scripting (XSS) via `htmlspecialchars()` and email sanitization/validation filters (`filter_var`).
* **File Operations (`File Write`):** Appends contact form submissions into a server-side storage log (`messages.txt`) using atomic file locking (`FILE_APPEND | LOCK_EX`).
* **State & Cookie Management:** Respects GDPR data minimization by storing only the visitor's name in a persistent 30-day cookie (`setcookie`) upon explicit user consent, keeping sensitive communication records on the server.

---

## 📂 Project Directory Structure

```text
webdev-project/
├── assets/
│   ├── profile.jpg             # Profile/portrait photo
│   └── university_logo.png     # Politechnika Opolska university emblem
├── css/
│   └── style.css               # Global stylesheet (themes, layouts, components)
├── includes/
│   ├── header.php              # Global <head>, SEO tags, persistent nav, theme script
│   └── footer.php              # Global <footer>, cookie modal overlay, script imports
├── js/
│   └── main.js                 # Theme toggle, form validation, cookie modal logic
├── .gitignore                  # Ignored local files, system logs, and caches
├── about.php                   # Hobbies & athletic background (Air Rifle, Basketball, WRO)
├── contact.php                 # Contact form with PHP processing, validation, and PRG
├── index.php                   # Landing hero card with static avatar & dynamic server clock
├── messages.txt                # Server-side message storage (generated upon submission)
└── README.md                   # Project documentation
```

---

## 🛠️ Local Development Setup

### Prerequisites
* **PHP 7.4+ or PHP 8.x** (via standalone PHP CLI or XAMPP)
* Web browser (Chrome, Firefox, Edge, Safari)

### Running Locally

1. **Using PHP Built-In Server:**
   ```bash
   # Navigate to the project root directory
   cd webdev-project

   # Start the development server
   php -S localhost:8000
   ```
2. Open your browser and navigate to:
   ```text
   http://localhost:8000
   ```

3. **Using XAMPP:**
   * Place the project directory inside `C:\xampp\htdocs\webdev-project` (or `/opt/lampp/htdocs/webdev-project` on Linux).
   * Start **Apache** from the XAMPP Control Panel.
   * Open your browser at `http://localhost/webdev-project/`.

---

## 🧪 Testing Features

* **Multi-Page Navigation:** Verify seamless routing between `Home` (`index.php`), `Hobbies` (`about.php`), and `Contact` (`contact.php`) via the persistent top navigation bar.
* **Dark/Light Theme:** Click the toggle button in the top bar. Verify that the button retains its width without nudging neighboring nav links, and check that the setting persists across page refreshes and page hops.
* **Form Validation:** Submit an invalid email on `contact.php` to observe client-side inline warnings.
* **Form Submission & PRG:** Send a valid message. Verify the success message, confirm no duplicate entry on page refresh (`F5`), and inspect `messages.txt` for recorded output.
* **Resetting Cookie Banner:** Open browser DevTools (`F12`), navigate to the **Console**, and run:
  ```javascript
  localStorage.removeItem('cookie_consent');
  document.cookie = "cookie_consent=; max-age=0; path=/";
  document.cookie = "visitor_name=; max-age=0; path=/";
  location.reload();
  ```