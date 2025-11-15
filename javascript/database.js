// database.js - COMPLETE VERSION
const API_BASE = "http://localhost/rencehart/api/api.php";


// Product functions
async function getProducts() {
    try {
        const response = await fetch(`${API_BASE}?action=getProducts`);
        const data = await response.json();
        return data.success ? data.data : [];
    } catch (error) {
        console.error('Error fetching products:', error);
        return [];
    }
}

async function getProductsByCategory(category) {
    try {
        const products = await getProducts();
        return products.filter(product => product.category === category);
    } catch (error) {
        console.error('Error filtering products:', error);
        return [];
    }
}

// User functions
async function loginUser(email, password) {
    try {
        const response = await fetch(`${API_BASE}?action=login`, {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({ email, password })
        });
        return await response.json();
    } catch (error) {
        console.error('Login error:', error);
        return { success: false, message: 'Network error' };
    }
}

async function registerUser(name, email, password) {
    try {
        const response = await fetch(`${API_BASE}?action=register`, {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({ name, email, password })
        });
        return await response.json();
    } catch (error) {
        console.error('Registration error:', error);
        return { success: false, message: 'Network error' };
    }
}

// Local storage functions
function saveUserToLocalStorage(user) {
    localStorage.setItem('currentUser', JSON.stringify(user));
}

function getUserFromLocalStorage() {
    const user = localStorage.getItem('currentUser');
    return user ? JSON.parse(user) : null;
}

function removeUserFromLocalStorage() {
    localStorage.removeItem('currentUser');
}

// Check if user is admin
function isAdmin() {
    const user = getUserFromLocalStorage();
    return user && user.user_type === 'admin';
}

// Auto-redirect to admin if admin user
function checkAdminRedirect() {
    if (isAdmin() && !window.location.href.includes('admin.html')) {
        window.location.href = 'admin.html';
    }
}