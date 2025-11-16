<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panier - NURAYA</title>
    <meta name="description" content="Consultez votre panier d'achats NURAYA">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<body>
    <!-- Navigation -->
    <nav>
        <div class="nav-links">
            <a href="../index.html">Accueil</a>
            <a href="../produits/index.php">Produits</a>
            <a href="../produits/index.php">Boutique</a>
            <a href="../contact_us.php">contact</a>
            <a href="../about.html">A propos</a>
            <a href="../logout.php">deconnexion</a>
        </div>

        <div class="nav-icons">
            <a href="#" class="search-btn"><i class="fas fa-search"></i></a>
            <a href="../cree_compte/index.php" class="user-btn"><i class="fas fa-user"></i></a>
            <a href="index.php" class="cart-btn"><i class="fas fa-shopping-bag"></i></a>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="cart-hero">
        <div class="cart-hero-content">
            <h1>Votre Panier</h1>
            <p>Consultez et finalisez vos achats NURAYA</p>
        </div>
    </section>

    <!-- Cart Section -->
    <section class="cart-section">
        <div class="cart-container">
            <div class="cart-grid">
                <!-- Cart Items -->
                <div class="cart-items">
                    <div class="cart-header">
                        <h2>Articles dans votre panier</h2>
                        <span class="cart-count">3 articles</span>
                    </div>

                    <div id="cartItemsContainer">
                        <!-- Cart items will be dynamically loaded here -->
                        <div class="cart-item">
                            <div class="cart-item-image">
                                <img src="../img/droit.png" alt="Human Hotdle">
                            </div>
                            <div class="cart-item-details">
                                <div>
                                    <div class="cart-item-name">Legacy of Carthage: Human Hotdle</div>
                                    <div class="cart-item-price">85.000 DT</div>
                                </div>
                                <div class="cart-item-quantity">
                                    <button class="quantity-btn" onclick="updateQuantity(this, -1)">-</button>
                                    <input type="number" class="quantity-input" value="1" min="1" readonly>
                                    <button class="quantity-btn" onclick="updateQuantity(this, 1)">+</button>
                                </div>
                            </div>
                            <div class="cart-item-remove">
                                <div class="item-total">85.000 DT</div>
                                <button class="remove-btn" onclick="removeItem(this)">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                        </div>

                        <div class="cart-item">
                            <div class="cart-item-image">
                                <img src="../img/gauche.png" alt="Human Hotdle Vue 2">
                            </div>
                            <div class="cart-item-details">
                                <div>
                                    <div class="cart-item-name">Legacy of Carthage: Human Hotdle Deluxe</div>
                                    <div class="cart-item-price">120.000 DT</div>
                                </div>
                                <div class="cart-item-quantity">
                                    <button class="quantity-btn" onclick="updateQuantity(this, -1)">-</button>
                                    <input type="number" class="quantity-input" value="2" min="1" readonly>
                                    <button class="quantity-btn" onclick="updateQuantity(this, 1)">+</button>
                                </div>
                            </div>
                            <div class="cart-item-remove">
                                <div class="item-total">240.000 DT</div>
                                <button class="remove-btn" onclick="removeItem(this)">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                        </div>

                        <div class="cart-item">
                            <div class="cart-item-image">
                                <img src="../img/1.png" alt="Produit Premium">
                            </div>
                            <div class="cart-item-details">
                                <div>
                                    <div class="cart-item-name">Collection Exclusive NURAYA</div>
                                    <div class="cart-item-price">65.000 DT</div>
                                </div>
                                <div class="cart-item-quantity">
                                    <button class="quantity-btn" onclick="updateQuantity(this, -1)">-</button>
                                    <input type="number" class="quantity-input" value="1" min="1" readonly>
                                    <button class="quantity-btn" onclick="updateQuantity(this, 1)">+</button>
                                </div>
                            </div>
                            <div class="cart-item-remove">
                                <div class="item-total">65.000 DT</div>
                                <button class="remove-btn" onclick="removeItem(this)">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Cart Summary -->
                <div class="cart-summary">
                    <h3 class="summary-title">Récapitulatif</h3>

                    <div class="summary-row">
                        <span>Sous-total</span>
                        <span id="subtotal">390.000 DT</span>
                    </div>

                    <div class="summary-row">
                        <span>Livraison</span>
                        <span>7.000 DT</span>
                    </div>

                    <div class="summary-row">
                        <span>Taxes</span>
                        <span>39.000 DT</span>
                    </div>

                    <div class="promo-code">
                        <div class="promo-input-group">
                            <input type="text" class="promo-input" placeholder="Code promo">
                            <button class="promo-btn">Appliquer</button>
                        </div>
                    </div>

                    <div class="summary-row total">
                        <span>Total</span>
                        <span id="total">436.000 DT</span>
                    </div>

                    <button class="checkout-btn" onclick="proceedToCheckout()">
                        <i class="fas fa-lock"></i> Commander sécurisé
                    </button>

                    <div class="continue-shopping">
                        <a href="../produits/index.php">
                            <i class="fas fa-arrow-left"></i> Continuer vos achats
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="footer-content">
                <div class="footer-section">
                    <h3>NURAYA</h3>
                    <p>L'Art de la Modestie</p>
                    <div class="social-links">
                        <a href="#"><i class="fab fa-facebook"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                    </div>
                </div>
                <div class="footer-section">
                    <h4>Liens Utiles</h4>
                    <ul>
                        <li><a href="../index.html">Accueil</a></li>
                        <li><a href="../produits/index.php">Produits</a></li>
                        <li><a href="../about.html">À Propos</a></li>
                        <li><a href="../contact_us.php">Contact</a></li>
                    </ul>
                </div>
                <div class="footer-section">
                    <h4>Service Client</h4>
                    <ul>
                        <li><a href="#">Livraison</a></li>
                        <li><a href="#">Retours</a></li>
                        <li><a href="#">Guide des tailles</a></li>
                        <li><a href="#">FAQ</a></li>
                    </ul>
                </div>
                <div class="footer-section">
                    <h4>Contact</h4>
                    <p><i class="fas fa-envelope"></i> contact@nuraya.com</p>
                    <p><i class="fas fa-phone"></i> +216 XX XXX XXX</p>
                </div>
            </div>
            <div class="footer-bottom">
                <p>&copy; 2024 NURAYA. Tous droits réservés.</p>
            </div>
        </div>
    </footer>

    <script src="../js/main.js"></script>
    <script>
    // Cart functionality
    function updateQuantity(button, change) {
        const input = button.parentElement.querySelector('.quantity-input');
        const currentValue = parseInt(input.value);
        const newValue = Math.max(1, currentValue + change);
        input.value = newValue;

        // Update item total and cart summary
        updateCartTotals();
    }

    function removeItem(button) {
        const item = button.closest('.cart-item');
        item.style.animation = 'fadeOut 0.3s ease-out';
        setTimeout(() => {
            item.remove();
            updateCartTotals();
            updateCartCount();
        }, 300);
    }

    function updateCartTotals() {
        const items = document.querySelectorAll('.cart-item');
        let subtotal = 0;

        items.forEach(item => {
            const priceText = item.querySelector('.cart-item-price').textContent;
            const price = parseFloat(priceText.replace(' DT', '').replace(',', '.'));
            const quantity = parseInt(item.querySelector('.quantity-input').value);
            const itemTotal = price * quantity;

            item.querySelector('.item-total').textContent = itemTotal.toFixed(3).replace('.', ',') + ' DT';
            subtotal += itemTotal;
        });

        const shipping = 7.000;
        const taxes = subtotal * 0.1;
        const total = subtotal + shipping + taxes;

        document.getElementById('subtotal').textContent = subtotal.toFixed(3).replace('.', ',') + ' DT';
        document.getElementById('total').textContent = total.toFixed(3).replace('.', ',') + ' DT';
    }

    function updateCartCount() {
        const items = document.querySelectorAll('.cart-item').length;
        document.querySelector('.cart-count').textContent = items + ' article' + (items > 1 ? 's' : '');

        // Update cart icon count
        const cartIcon = document.querySelector('.cart-btn');
        if (cartIcon) {
            cartIcon.setAttribute('data-count', items);
        }
    }

    function proceedToCheckout() {
        // Show notification
        showNotification('Redirection vers la page de paiement...', 'success');

        // Simulate checkout process
        setTimeout(() => {
            showNotification('Finalisation de votre commande...', 'info');
        }, 1500);
    }

    // Load cart from localStorage on page load
    document.addEventListener('DOMContentLoaded', function() {
        updateCartTotals();
        updateCartCount();

        // Load cart items from localStorage if available
        const savedCart = localStorage.getItem('nurayaCart');
        if (savedCart) {
            try {
                const cartItems = JSON.parse(savedCart);
                if (cartItems.length > 0) {
                    renderCartItems(cartItems);
                }
            } catch (e) {
                console.error('Error loading cart:', e);
            }
        }
    });

    function renderCartItems(items) {
        const container = document.getElementById('cartItemsContainer');
        if (!container) return;

        container.innerHTML = '';

        items.forEach((item, index) => {
            const itemElement = document.createElement('div');
            itemElement.className = 'cart-item';
            itemElement.innerHTML = `
                    <div class="cart-item-image">
                        <img src="${item.image}" alt="${item.name}">
                    </div>
                    <div class="cart-item-details">
                        <div>
                            <div class="cart-item-name">${item.name}</div>
                            <div class="cart-item-price">${item.price} DT</div>
                        </div>
                        <div class="cart-item-quantity">
                            <button class="quantity-btn" onclick="updateQuantity(this, -1)">-</button>
                            <input type="number" class="quantity-input" value="${item.quantity || 1}" min="1" readonly>
                            <button class="quantity-btn" onclick="updateQuantity(this, 1)">+</button>
                        </div>
                    </div>
                    <div class="cart-item-remove">
                        <div class="item-total">${(parseFloat(item.price.replace(',', '.')) * (item.quantity || 1)).toFixed(3).replace('.', ',')} DT</div>
                        <button class="remove-btn" onclick="removeItem(this)">
                            <i class="fas fa-trash"></i>
                        </button>
                    </div>
                `;
            container.appendChild(itemElement);
        });

        updateCartTotals();
        updateCartCount();
    }

    // Add fadeOut animation
    const style = document.createElement('style');
    style.textContent = `
            @keyframes fadeOut {
                from { opacity: 1; transform: translateX(0); }
                to { opacity: 0; transform: translateX(-20px); }
            }
        `;
    document.head.appendChild(style);
    </script>
</body>

</html>