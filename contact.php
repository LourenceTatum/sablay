<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CONTACT - RENCEHART</title>
    <link rel="stylesheet" href="css/finals.css">
    <link href="https://fonts.googleapis.com/css2?family=UnifrakturCook:wght@700&family=Montserrat:wght@300;600&display=swap" rel="stylesheet">
    <script src="javascript/cart.js" defer></script>
    <script src="javascript/database.js" defer></script>
</head>
<body>
    <header class="main-header">
        <nav class="nav-menu">
            <a href="jewerly.html" class="nav-link">JEWELRY</a>
            <a href="apparel.html" class="nav-link">APPAREL</a>
            <a href="accessories.html" class="nav-link">ACCESSORIES</a>
        </nav>
        <a href="final.html" class="logo-link">RENCEHART</a>
        <nav class="nav-icons">
            <a href="about.html" class="nav-link">ABOUT</a>
            <a href="contact.html" class="nav-link current-page">CONTACT</a>
            <a href="#" class="nav-link" onclick="openModal('login')">LOGIN</a>
            <a href="#" class="nav-link" onclick="openCart()">CART (<span id="cart-count">0</span>)</a>
        </nav>
    </header>

    <main class="catalog-section">
        <h1 class="catalog-title">
            <span class="cross-icon">†</span>
            CONTACT US
            <span class="cross-icon">†</span>
        </h1>

        <div class="contact-content" style="max-width: 600px; margin: 0 auto; padding: 0 20px;">
            <p style="text-align: center; margin-bottom: 30px; font-size: 1.1rem;">
                Have a question or want to collaborate? Reach out to us using the form below:
            </p>
            
            <form class="contact-form" style="background: #111; padding: 30px; border: 1px solid #333;">
                <div style="margin-bottom: 20px;">
                    <label style="display: block; margin-bottom: 8px; text-transform: uppercase; font-size: 0.9rem;">Name</label>
                    <input type="text" style="width: 100%; padding: 12px; background: transparent; border: 1px solid #333; color: white;" placeholder="Your Name" required>
                </div>
                
                <div style="margin-bottom: 20px;">
                    <label style="display: block; margin-bottom: 8px; text-transform: uppercase; font-size: 0.9rem;">Email</label>
                    <input type="email" style="width: 100%; padding: 12px; background: transparent; border: 1px solid #333; color: white;" placeholder="you@example.com" required>
                </div>
                
                <div style="margin-bottom: 20px;">
                    <label style="display: block; margin-bottom: 8px; text-transform: uppercase; font-size: 0.9rem;">Message</label>
                    <textarea style="width: 100%; padding: 12px; background: transparent; border: 1px solid #333; color: white; height: 120px;" placeholder="Your message..." required></textarea>
                </div>
                
                <button type="submit" class="cta-button" style="width: 100%;">SEND MESSAGE</button>
            </form>
        </div>
    </main>

    <!-- Same Cart Drawer and Auth Modal as above -->
    <!-- Copy from the about.html code -->

    <footer class="site-footer">
        <p>&copy; 2025 RENCEHART. All Rights Reserved.</p>
    </footer>

    <!-- Same JavaScript as about.html -->
</body>
</html>