<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BRACELETS - RENCEHART</title>
    <link rel="stylesheet" href="css/finals.css"> 
    <link href="https://fonts.googleapis.com/css2?family=UnifrakturCook:wght@700&family=Montserrat:wght@300;600&display=swap" rel="stylesheet">
    <script src="javascript/cart.js" defer></script>
    <script src="javascript/database.js" defer></script> 
</head>
<body>
    <header class="main-header">
        <nav class="nav-menu">
            <a href="jewerly.html" class="nav-link current-page">JEWELRY</a>
            <a href="apparel.html" class="nav-link">APPAREL</a>
            <a href="accessories.html" class="nav-link">ACCESSORIES</a>
        </nav>
        <a href="final.html" class="logo-link">RENCEHART</a> 
        <nav class="nav-icons">
            <a href="about.html" class="nav-link">ABOUT</a>
            <a href="contact.html" class="nav-link">CONTACT</a>
            <a href="#" class="nav-link" onclick="openModal('login')">LOGIN</a>
            <a href="#" class="nav-link" onclick="openCart()">CART (<span id="cart-count">0</span>)</a>
        </nav>
    </header>

    <main class="catalog-section">
        <h1 class="catalog-title">
            <span class="cross-icon">†</span>
            BRACELETS COLLECTION
            <span class="cross-icon">†</span>
        </h1>

        <div class="product-filters">
            <a href="rings.html" class="filter-button">RINGS</a>
            <a href="necklaces.html" class="filter-button">NECKLACES</a>
            <a href="bracelet.html" class="filter-button current-filter">BRACELETS</a>
        </div>

        <div class="jewelry-grid">
            <div class="jewelry-card" data-name="Retro Dice" data-price="2100">
                <a href="#" class="item-link">
                    <div class="item-image"> 
                        <img src="pictures/dice.webp" alt="Example Image" style=" height: 350px; width: 398px;">
                    </div>
                    <h3 class="item-name">Chrome Hearts Retro Dice Bracelet</h3>
                    <p class="item-price">USD 2,100</p>
                </a>
                <button class="add-to-cart-button" onclick="addToCart(this)">ADD TO CART</button>
            </div>
            
            <div class="jewelry-card" data-name="Cross Ball" data-price="1500">
                <a href="#" class="item-link">
                    <div class="item-image"> 
                        <img src="pictures/ball.webp" alt="Example Image" style=" height: 350px; width: 398px;">
                    </div>
                    <h3 class="item-name">Chrome Hearts Cross Ball Bracelet</h3>
                    <p class="item-price">USD 1,500</p>
                </a>
                <button class="add-to-cart-button" onclick="addToCart(this)">ADD TO CART</button>
            </div>
            
            <div class="jewelry-card" data-name="Rolling Stone" data-price="950">
                <a href="#" class="item-link">
                    <div class="item-image"> 
                        <img src="pictures/rollingstone.jpg" alt="Example Image" style=" height: 350px; width: 398px;">
                    </div>
                    <h3 class="item-name">Chrome Hearts Rolling Stone Bracelet</h3>
                    <p class="item-price">USD 950</p>
                </a>
                <button class="add-to-cart-button" onclick="addToCart(this)">ADD TO CART</button>
            </div>
        </div>
    </main>
    
    <div id="cartDrawer" class="cart-drawer">
        <header class="cart-header">
            <h2 class="form-title">YOUR ORDER</h2>
            <span class="close-button" onclick="closeCart()">&times;</span>
        </header>
        <ul id="cart-items" class="cart-items-list">
        </ul>
        <footer class="cart-footer">
            <div class="cart-total-line">
                <p>TOTAL:</p>
                <p class="cart-total-amount">USD <span id="cart-total">0.00</span></p>
            </div>
            <button class="cta-button checkout-button">PROCEED TO CHECKOUT</button>
        </footer>
    </div>

    <footer class="site-footer">
        <p>&copy; 2025 RENCEHART. All Rights Reserved.</p>
    </footer>

    <div id="authModal" class="modal">
        <div class="modal-content">
            <span class="close-button" onclick="closeModal()">&times;</span>
            
            <form id="loginForm" class="auth-form" style="display: block;">
                <h2 class="form-title">MEMBER LOGIN</h2>
                <div class="form-group">
                    <input type="email" id="login-email" required placeholder="EMAIL ADDRESS">
                </div>
                <div class="form-group">
                    <input type="password" id="login-password" required placeholder="PASSWORD">
                </div>
                <button type="submit" class="auth-button">ENTER</button>
                <p class="switch-link">
                    Not a member? <a href="#" onclick="showForm('signup')">Create an Account</a>
                </p>
            </form>

            <form id="signupForm" class="auth-form" style="display: none;">
                <h2 class="form-title">CREATE ACCOUNT</h2>
                <div class="form-group">
                    <input type="text" id="signup-name" required placeholder="FULL NAME">
                </div>
                <div class="form-group">
                    <input type="email" id="signup-email" required placeholder="EMAIL ADDRESS">
                </div>
                <div class="form-group">
                    <input type="password" id="signup-password" required placeholder="PASSWORD">
                </div>
                <button type="submit" class="auth-button">REGISTER</button>
                <p class="switch-link">
                    Already have an account? <a href="#" onclick="showForm('login')">Login Here</a>
                </p>
            </form>
        </div>
    </div>
    
    <script>
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