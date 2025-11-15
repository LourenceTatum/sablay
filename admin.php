<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADMIN - RENCEHART</title>
    <link rel="stylesheet" href="css/finals.css">
    <link href="https://fonts.googleapis.com/css2?family=UnifrakturCook:wght@700&family=Montserrat:wght@300;600&display=swap" rel="stylesheet">
    <script src="css/cart.js" defer></script>
    <script src="javascript/admin.js" defer></script> 
</head>
<body>
    <header class="main-header">
        <nav class="nav-menu">
            <a href="jewerly.html" class="nav-link">JEWELRY</a>
            <a href="apparel.html" class="nav-link">APPAREL</a>
            <a href="accessories.html" class="nav-link">ACCESSORIES</a>
        </nav>
        <a href="final.html" class="logo-link">RENCEHART ADMIN</a>
        <nav class="nav-icons">
            <a href="final.html" class="nav-link">VIEW SITE</a>
            <a href="#" class="nav-link" onclick="logoutAdmin()">LOGOUT</a>
        </nav>
    </header>

    <main class="catalog-section">
        <h1 class="catalog-title">
            <span class="cross-icon">†</span>
            ADMIN DASHBOARD
            <span class="cross-icon">†</span>
        </h1>

        <!-- SIMPLE ADMIN LOGIN FORM (No database needed) -->
        <div id="admin-login" style="max-width: 400px; margin: 0 auto; background: #111; padding: 30px; border: 1px solid #333;">
            <h2 style="text-align: center; margin-bottom: 20px; font-family: 'UnifrakturCook', serif;">ADMIN LOGIN</h2>
            <input type="password" id="admin-password" placeholder="Enter Admin Password" style="width: 100%; padding: 12px; background: transparent; border: 1px solid #333; color: white; margin-bottom: 15px;">
            <button class="cta-button" onclick="checkAdminPassword()" style="width: 100%;">ACCESS ADMIN</button>
        </div>

        <!-- ADMIN DASHBOARD (Hidden by default) -->
        <div id="admin-dashboard" style="display: none;">
            <div class="admin-stats" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 20px; margin-bottom: 40px;">
                <div class="stat-card" style="background: #111; border: 1px solid #333; padding: 30px; text-align: center;">
                    <h3 style="font-family: 'Montserrat', sans-serif; font-size: 0.9rem; text-transform: uppercase; margin-bottom: 10px; color: #aaa;">TOTAL PRODUCTS</h3>
                    <p style="font-family: 'UnifrakturCook', serif; font-size: 2rem; color: #fff;" id="total-products">21</p>
                </div>
                <div class="stat-card" style="background: #111; border: 1px solid #333; padding: 30px; text-align: center;">
                    <h3 style="font-family: 'Montserrat', sans-serif; font-size: 0.9rem; text-transform: uppercase; margin-bottom: 10px; color: #aaa;">TOTAL ORDERS</h3>
                    <p style="font-family: 'UnifrakturCook', serif; font-size: 2rem; color: #fff;">8</p>
                </div>
                <div class="stat-card" style="background: #111; border: 1px solid #333; padding: 30px; text-align: center;">
                    <h3 style="font-family: 'Montserrat', sans-serif; font-size: 0.9rem; text-transform: uppercase; margin-bottom: 10px; color: #aaa;">TOTAL SALES</h3>
                    <p style="font-family: 'UnifrakturCook', serif; font-size: 2rem; color: #fff;">$12,450</p>
                </div>
            </div>
    </main>

    <footer class="site-footer">
        <p>&copy; 2025 RENCEHART. All Rights Reserved.</p>
    </footer>
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const user = getUserFromLocalStorage();
        
            // If not logged in → kick back to home
            if (!user) {
                alert("You must log in first.");
                window.location.href = "final.html";
                return;
            }
        
            // If logged in but NOT admin → deny access
            if (user.user_type !== "admin") {
                alert("Access denied. Admins only.");
                window.location.href = "final.html";
                return;
            }
        
            // Show admin dashboard
            document.getElementById("admin-login").style.display = "none";
            document.getElementById("admin-dashboard").style.display = "block";
        
            // Load products for stats
            loadProductStats();
        });
        
        // Logout admin
        function logoutAdmin() {
            removeUserFromLocalStorage();
            window.location.href = "final.html";
        }
        
        // Load total products from DB
        async function loadProductStats() {
            const products = await getProducts();
            document.getElementById("total-products").textContent = products.length;
        }
        
    </script>
</body>
</html>