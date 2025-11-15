// database.js - WORKING VERSION
const API_BASE = 'http://localhost/rencehart/api/api.php';

// Product functions
async function getProducts() {
    try {
        const response = await fetch(`${API_BASE}?action=getProducts`);
        const data = await response.json();
        console.log('Products loaded:', data);
        return data.success ? data.data : [];
    } catch (error) {
        console.error('Error fetching products:', error);
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