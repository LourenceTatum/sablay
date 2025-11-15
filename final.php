<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RENCEHART</title>
    <link rel="stylesheet" href="css/finals.css">
    <link href="https://fonts.googleapis.com/css2?family=UnifrakturCook:wght@700&family=Montserrat:wght@300;600&display=swap"
     rel="stylesheet">
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
            <nav class="nav-icons">
                <a href="about.html" class="nav-link">ABOUT</a>
                <a href="contact.html" class="nav-link">CONTACT</a>
                <a href="admin.html" class="nav-link">ADMIN</a>
                <a href="#" class="nav-link" onclick="openModal('login')">LOGIN</a>
                <a href="#" class="nav-link" onclick="openCart()">CART</a>
            </nav>
        </nav>
    </header>

    <main class="hero-section">
        <div class="hero-content">
            <div class="product-image">
                <image src="pictures/gegegege.png" alt="Example Image" style="height: 400px;"></image>
                <h1 class="hero-title">
                    <span class="cross-icon">†</span>
                    THE RENCE COLLECTION
                    <span class="cross-icon">†</span>
                </h1>
                <p class="hero-subtitle">Handcrafted Luxury. Caloocan, Philippines</p>
            </div>
        </div>
    </main>

    <section class="gallery-preview">
        <h2>NEW ARRIVALS</h2>
        <div class="product-grid">
           
            <div class="product-card"> 
                <img src="pictures/jewely.jpg" alt="Example Image" style=" height: 350px;
                background-color: #111111; /* Dark gray for product placeholders */
                border: 1px solid #333333;
                display: flex;
                justify-content: center;
                align-items: center;
                font-size: 1.2rem;
                text-transform: uppercase;
                font-weight: 300;">
            </div>
            <div class="product-card">
                <img src="pictures/gegege.webp" alt="Example Image" style="height: 250px;
                display: flex;
                justify-content: center;
                align-items: center;
                text-transform: uppercase;">
            </div>
            
            <div class="product-card"> 
                <img src="pictures/cap.webp" alt="Example Image" style=" height: 350px;
                background-color: #111111; /* Dark gray for product placeholders */
                border: 1px solid #333333;
                display: flex;
                justify-content: center;
                align-items: center;
                font-size: 1.2rem;
                text-transform: uppercase;
                font-weight: 300;">
            </div>
        </div>
    </section>

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
    
    <script>
document.addEventListener('DOMContentLoaded', function () {
    checkLoginStatus();
    setupEventListeners();
});

// Setup events
function setupEventListeners() {
    // Login Handler
    document.getElementById('loginForm').addEventListener('submit', async function (e) {
        e.preventDefault();
        await handleLogin();
    });

    // Signup Handler
    document.getElementById('signupForm').addEventListener('submit', async function (e) {
        e.preventDefault();
        await handleSignup();
    });

    // Checkout button
    const checkoutBtn = document.querySelector('.checkout-button');
    if (checkoutBtn) {
        checkoutBtn.addEventListener('click', function () {
            alert('Proceeding to checkout! (Demo only)');
        });
    }
}

// LOGIN FUNCTION — REAL DATABASE LOGIN
async function handleLogin() {
    const email = document.getElementById('login-email').value;
    const password = document.getElementById('login-password').value;

    const response = await loginUser(email, password);

    if (!response.success) {
        alert(response.message || 'Wrong email or password!');
        return;
    }

    // Save user to localStorage
    saveUserToLocalStorage(response.user);

    closeModal();
    alert(`Welcome back, ${response.user.name}!`);
    updateNavigation();
}

// SIGNUP FUNCTION — REAL DATABASE REGISTER
async function handleSignup() {
    const name = document.getElementById('signup-name').value;
    const email = document.getElementById('signup-email').value;
    const password = document.getElementById('signup-password').value;

    const response = await registerUser(name, email, password);

    if (!response.success) {
        alert(response.message || 'Registration failed');
        return;
    }

    saveUserToLocalStorage(response.user);

    closeModal();
    alert(`Account created! Welcome, ${response.user.name}!`);

    updateNavigation();
}

// LOGOUT FUNCTION
function handleLogout() {
    removeUserFromLocalStorage();
    updateNavigation();
    alert('You have been logged out.');
}

// CHECK IF LOGGED IN
function checkLoginStatus() {
    const user = getUserFromLocalStorage();
    updateNavigation();
}

// UPDATE NAV UI
function updateNavigation() {
    const navIcons = document.querySelector('.nav-icons');
    const loginLink = navIcons.querySelector('a[onclick*="login"]');

    const user = getUserFromLocalStorage();

    if (user) {
        loginLink.innerHTML = `LOGOUT (${user.name})`;
        loginLink.onclick = function (e) {
            e.preventDefault();
            handleLogout();
        };
    } else {
        loginLink.innerHTML = "LOGIN";
        loginLink.onclick = function (e) {
            e.preventDefault();
            openModal('login');
        };
    }
}

// OPEN/CLOSE MODAL
function openModal(formType) {
    if (getUserFromLocalStorage()) {
        alert("You are already logged in.");
        return;
    }
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

// CART FUNCTIONS
function openCart() {
    document.getElementById('cartDrawer').classList.add('open');
}

function closeCart() {
    document.getElementById('cartDrawer').classList.remove('open');
}
</script>

</body>
</html>

</body>
</html>