<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ABOUT - RENCEHART</title>
    <link rel="stylesheet" href="css/finals.css">
    <link href="https://fonts.googleapis.com/css2?family=UnifrakturCook:wght@700&family=Montserrat:wght@300;600&display=swap" rel="stylesheet">
    <script src="cart.js" defer></script>
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
            <a href="about.html" class="nav-link current-page">ABOUT</a>
            <a href="contact.html" class="nav-link">CONTACT</a>
            <a href="#" class="nav-link" onclick="openModal('login')">LOGIN</a>
            <a href="#" class="nav-link" onclick="openCart()">CART (<span id="cart-count">0</span>)</a>
        </nav>
    </header>

    <main class="catalog-section">
        <h1 class="catalog-title">
            <span class="cross-icon">†</span>
            ABOUT RENCEHART
            <span class="cross-icon">†</span>
        </h1>

        <section class="about-me" style="max-width: 800px; margin: 0 auto; text-align: center; padding: 0 20px;">
            <h1 class="catalog-title">
                <span class="cross-icon">†</span>
                ABOUT ME
                <span class="cross-icon">†</span>
            </h1>
        
            <p style="font-size: 1.1rem; line-height: 1.6; margin-bottom: 30px;">
                Hi! I’m <strong>Lourence Ymana</strong>, a 19-year-old college student from <strong>Caloocan City</strong> studying at <strong>Global Reciprocal Colleges</strong>.  
                I’m passionate about <strong>web design, development, and creative innovation</strong>.  
                I enjoy combining technology with creativity to bring unique and meaningful ideas to life through my projects.
            </p>
        
            <p style="font-size: 1.1rem; line-height: 1.6; margin-bottom: 30px;">
                My goal is to continue learning and improving my skills in front-end development and design, while exploring new trends and ideas that push creativity forward.  
                I believe every project is an opportunity to grow and express individuality through clean and thoughtful design.
            </p>
        </section>
        
        </div>
        
        
    </main>

    <!-- Cart Drawer -->
    <div id="cartDrawer" class="cart-drawer">
        <header class="cart-header">
            <h2 class="form-title">YOUR ORDER</h2>
            <span class="close-button" onclick="closeCart()">&times;</span>
        </header>
        <ul id="cart-items" class="cart-items-list"></ul>
        <footer class="cart-footer">
            <div class="cart-total-line">
                <p>TOTAL:</p>
                <p class="cart-total-amount">USD <span id="cart-total">0.00</span></p>
            </div>
            <button class="cta-button checkout-button">PROCEED TO CHECKOUT</button>
        </footer>
    </div>

    <!-- Auth Modal -->
    <div id="authModal" class="modal">
        <!-- Same modal content from your other pages -->
    </div>

    <footer class="site-footer">
        <p>&copy; 2025 RENCEHART. All Rights Reserved.</p>
    </footer>

    <script>
        // Same JavaScript from your other pages
        function openModal(formType) {
            document.getElementById('authModal').style.display = 'block';
            showForm(formType);
        }

        function closeModal() {
            document.getElementById('authModal').style.display = 'none';
        }

        function showForm(formId) {
            document.getElementById('loginForm').style.display = 'none';
            document.getElementById('signupForm').style.display = 'none';
            document.getElementById(formId + 'Form').style.display = 'block';
        }
        
        window.onclick = function(event) {
            const modal = document.getElementById('authModal');
            if (event.target == modal) {
                closeModal();
            }
        }

        function openCart() {
            document.getElementById('cartDrawer').classList.add('open');
        }
        
        function closeCart() {
            document.getElementById('cartDrawer').classList.remove('open');
        }
    </script>
</body>
</html>