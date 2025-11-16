<?php
include '../cnx.php';
$result = mysqli_query($cnx, "SELECT * from products");
$i = 0;
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Produits - NURAYA</title>
    <meta name="description" content="Découvrez notre collection de mode modeste NURAYA">
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<body>
    <!-- Navigation -->
    <nav>
        <div class="nav-links">
            <a href="../index.html">Accueil</a>
            <a href="index.php" class="active">Produits</a>
            <a href="index.php">Boutique</a>
            <a href="../contact_us.php">contact</a>
            <a href="../about.html">A propos</a>
            <a href="../logout.php">deconnexion</a>
        </div>

        <div class="nav-icons">
            <a href="#" class="search-btn"><i class="fas fa-search"></i></a>
            <a href="../cree_compte/index.php" class="user-btn"><i class="fas fa-user"></i></a>
            <a href="../cart/index.php" class="cart-btn"><i class="fas fa-shopping-bag"></i></a>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="products-hero">
        <div class="products-hero-content">
            <h1>Nos Collections</h1>
            <p>Découvrez notre sélection exclusive de mode modeste</p>
        </div>
    </section>

    <!-- Products Section -->
    <section class="products-section">
        <div class="products-container">
            <!-- Filter Section -->
            <div class="filter-section">
                <button class="filter-btn active" data-filter="all">Tous</button>
                <button class="filter-btn" data-filter="new">Nouveautés</button>
                <button class="filter-btn" data-filter="legacy">Legacy</button>
                <button class="filter-btn" data-filter="carthage">Carthage</button>
            </div>

            <!-- Products Grid -->
            <div class="products">
                <div class="products-grid">
                    <?php while ($t = mysqli_fetch_assoc($result)):
                        $i++;
                        ?>
                    <div class="product-card">
                        <div class="product-image">
                            <img src="<?php echo $t['image_url']; ?>" alt="<?php echo $t['name']; ?>">
                            <?php if ($i <= 3): ?>
                            <span class="product-badge">Nouveau</span>
                            <?php endif; ?>
                        </div>
                        <div class="product-info">
                            <h3 class="product-title"><?php echo $t['name']; ?></h3>
                            <div class="product-price">
                                <span class="current-price"><?php echo $t['price']; ?> DT</span>
                                <button class="add-to-cart" data-product-id="<?php echo $t['product_id']; ?>"
                                    data-id="<?php echo $i; ?>" data-name="<?php echo $t['name']; ?>"
                                    data-price="<?php echo $t['price']; ?>" data-image="<?php echo $t['image_url']; ?>">
                                    <i class="fas fa-plus"></i>
                                    Ajouter
                                </button>
                            </div>
                        </div>
                    </div>
                    <?php endwhile; ?>
                </div>
            </div>
        </div>
    </section>

    <!-- Cart Modal -->
    <div class="cart-modal-overlay">
        <div class="cart-modal">
            <div class="cart-header">
                <h2>Votre Panier</h2>
                <button class="close-cart">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <form action="main.php" method="post">
                <div class="cart-items">
                    <!-- Cart items will be added here dynamically -->
                    <div class="empty-cart">
                        <i class="fas fa-shopping-bag"></i>
                        <p>Votre panier est vide</p>
                    </div>
                </div>
                <div class="cart-total">
                    Total: <span>0.00 DT</span>
                </div>
                <input class="checkout-btn" type="submit" value="Commander">
            </form>
        </div>
    </div>

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
                        <li><a href="index.php">Produits</a></li>
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

    <script>
    // Cart functionality
    let cart = JSON.parse(localStorage.getItem('nurayaCart')) || [];
    let cartCount = cart.reduce((total, item) => total + item.quantity, 0);

    function updateCartCount() {
        const cartBtn = document.querySelector('.cart-btn');
        if (cartBtn) {
            cartBtn.setAttribute('data-count', cartCount);
        }
    }

    function showNotification(message, type = 'success') {
        const notification = document.createElement('div');
        notification.className = `notification ${type}`;
        notification.textContent = message;
        notification.style.cssText = `
                position: fixed;
                top: 20px;
                right: 20px;
                background: ${type === 'success' ? '#4CAF50' : '#f44336'};
                color: white;
                padding: 15px 20px;
                border-radius: 8px;
                z-index: 10000;
                animation: slideInRight 0.3s ease-out;
            `;
        document.body.appendChild(notification);

        setTimeout(() => {
            notification.style.animation = 'slideOutRight 0.3s ease-out';
            setTimeout(() => notification.remove(), 300);
        }, 3000);
    }

    // Add to cart functionality
    document.querySelectorAll('.add-to-cart').forEach(button => {
        button.addEventListener('click', function(e) {
            e.preventDefault();
            const productName = this.getAttribute('data-name');
            const productPrice = this.getAttribute('data-price');
            const productImage = this.getAttribute('data-image');

            const existingItem = cart.find(item => item.name === productName);
            if (existingItem) {
                existingItem.quantity++;
            } else {
                cart.push({
                    name: productName,
                    price: productPrice,
                    image: productImage,
                    quantity: 1
                });
            }

            cartCount++;
            updateCartCount();
            localStorage.setItem('nurayaCart', JSON.stringify(cart));

            showNotification('Produit ajouté au panier!', 'success');

            // Button feedback
            const originalHTML = this.innerHTML;
            this.innerHTML = '<i class="fas fa-check"></i> Ajouté!';
            this.style.background = '#4CAF50';

            setTimeout(() => {
                this.innerHTML = originalHTML;
                this.style.background = '';
            }, 2000);
        });
    });

    // Cart modal functionality
    const cartModal = document.querySelector('.cart-modal');
    const cartModalOverlay = document.querySelector('.cart-modal-overlay');
    const closeCartBtn = document.querySelector('.close-cart');

    function openCart() {
        cartModalOverlay.style.display = 'block';
        setTimeout(() => cartModal.classList.add('active'), 10);
    }

    function closeCart() {
        cartModal.classList.remove('active');
        setTimeout(() => cartModalOverlay.style.display = 'none', 300);
    }

    document.querySelector('.cart-btn')?.addEventListener('click', openCart);
    closeCartBtn?.addEventListener('click', closeCart);
    cartModalOverlay?.addEventListener('click', closeCart);

    // Filter functionality
    document.querySelectorAll('.filter-btn').forEach(btn => {
        btn.addEventListener('click', function() {
            document.querySelectorAll('.filter-btn').forEach(b => b.classList.remove('active'));
            this.classList.add('active');

            const filter = this.getAttribute('data-filter');
            // Add filtering logic here if needed
        });
    });

    // Initialize
    updateCartCount();
    </script>


    <?php mysqli_close($cnx); ?>
</body>

</html>