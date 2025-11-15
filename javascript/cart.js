// Combined cart and authentication system
let cart = [];
let currentUser = null;

// Cart Functions
function addToCart(button) {
    const productCard = button.closest('.jewelry-card');
    
    if (!productCard || !productCard.dataset.name || !productCard.dataset.price) {
        console.error("Missing product data");
        return;
    }
    
    const name = productCard.dataset.name;
    const price = parseFloat(productCard.dataset.price);

    const existingItem = cart.find(item => item.name === name);

    if (existingItem) {
        existingItem.quantity += 1;
    } else {
        cart.push({ name, price, quantity: 1 });
    }

    updateCartUI();
    openCart();
}

function removeFromCart(name) {
    cart = cart.filter(item => item.name !== name);
    updateCartUI();
}

function updateCartUI() {
    const cartList = document.getElementById('cart-items');
    const cartCountElement = document.getElementById('cart-count');
    const cartTotalElement = document.getElementById('cart-total');
    
    let total = 0;
    let count = 0;
    
    cartList.innerHTML = '';

    cart.forEach(item => {
        const itemTotal = item.price * item.quantity;
        total += itemTotal;
        count += item.quantity;

        const listItem = document.createElement('li');
        listItem.classList.add('cart-item');
        listItem.innerHTML = `
            <div class="item-details">
                <p class="item-name">${item.name}</p>
                <p>Qty: ${item.quantity} @ $${item.price.toFixed(2)}</p>
            </div>
            <div class="item-actions">
                <p>USD ${itemTotal.toFixed(2)}</p>
                <button class="remove-item-button" onclick="removeFromCart('${item.name}')">REMOVE</button>
            </div>
        `;
        cartList.appendChild(listItem);
    });

    cartCountElement.textContent = count;
    cartTotalElement.textContent = total.toFixed(2);
    
    if (count === 0) {
        closeCart();
    }
}

// Auth Functions
function handleLogin() {
    const email = document.getElementById('login-email').value;
    const password = document.getElementById('login-password').value;
    
    if (email && password) {
        currentUser = { name: email.split('@')[0], email: email };
        localStorage.setItem('currentUser', JSON.stringify(currentUser));
        updateNavigation();
        closeModal();
        alert(`Welcome back, ${currentUser.name}!`);
        document.getElementById('login-email').value = '';
        document.getElementById('login-password').value = '';
    } else {
        alert('Please fill in all fields');
    }
}

function handleSignup() {
    const name = document.getElementById('signup-name').value;
    const email = document.getElementById('signup-email').value;
    const password = document.getElementById('signup-password').value;
    
    if (name && email && password) {
        currentUser = { name: name, email: email };
        localStorage.setItem('currentUser', JSON.stringify(currentUser));
        updateNavigation();
        closeModal();
        alert(`Account created! Welcome, ${name}!`);
        document.getElementById('signup-name').value = '';
        document.getElementById('signup-email').value = '';
        document.getElementById('signup-password').value = '';
    } else {
        alert('Please fill in all fields');
    }
}

function handleLogout() {
    currentUser = null;
    localStorage.removeItem('currentUser');
    updateNavigation();
    alert('You have been logged out successfully.');
}

function updateNavigation() {
    const navIcons = document.querySelector('.nav-icons');
    const loginLink = navIcons.querySelector('a[onclick*="login"]');
    
    if (currentUser) {
        loginLink.innerHTML = `LOGOUT (${currentUser.name})`;
        loginLink.onclick = handleLogout;
    } else {
        loginLink.innerHTML = 'LOGIN';
        loginLink.onclick = () => openModal('login');
    }
}

// Initialize everything
document.addEventListener('DOMContentLoaded', function() {
    // Check login status
    const savedUser = localStorage.getItem('currentUser');
    if (savedUser) {
        currentUser = JSON.parse(savedUser);
    }
    updateNavigation();
    
    // Initialize cart
    updateCartUI();
    
    // Setup event listeners
    document.getElementById('loginForm')?.addEventListener('submit', (e) => {
        e.preventDefault();
        handleLogin();
    });
    
    document.getElementById('signupForm')?.addEventListener('submit', (e) => {
        e.preventDefault();
        handleSignup();
    });
    
    document.querySelector('.checkout-button')?.addEventListener('click', () => {
        if (cart.length > 0) {
            alert('Proceeding to checkout!');
            cart = [];
            updateCartUI();
        } else {
            alert('Your cart is empty');
        }
    });
});

// UI Functions
function openCart() {
    document.getElementById('cartDrawer').classList.add('open');
}

function closeCart() {
    document.getElementById('cartDrawer').classList.remove('open');
}

function openModal(formType) {
    if (currentUser) {
        alert(`You are already logged in as ${currentUser.name}`);
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

window.onclick = function(event) {
    const modal = document.getElementById('authModal');
    if (event.target == modal) {
        closeModal();
    }
}