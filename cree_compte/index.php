<?php
session_start();
if (isset($_SESSION['authenticated']) && $_SESSION['authenticated'] === true) {
    header("Location: ../index.html");
    exit();
}
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Compte - NURAYA</title>
    <meta name="description" content="Connectez-vous à votre compte NURAYA">
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
            <a href="index.php" class="user-btn"><i class="fas fa-user"></i></a>
            <a href="../cart/index.php" class="cart-btn"><i class="fas fa-shopping-bag"></i></a>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="account-hero">
        <div class="account-hero-content">
            <h1>Mon Compte</h1>
            <p>Connectez-vous ou créez votre compte NURAYA</p>
        </div>
    </section>

    <!-- Account Section -->
    <section class="account-section">
        <div class="account-container">
            <div class="account-grid">
                <!-- Login Card -->
                <div class="login-card">
                    <div class="card-header">
                        <h2>Connexion</h2>
                        <p>Accédez à votre compte NURAYA</p>
                    </div>

                    <?php if (isset($_SESSION['error'])): ?>
                    <div class="alert alert-error">
                        <?php echo $_SESSION['error'];
                            unset($_SESSION['error']); ?>
                    </div>
                    <?php endif; ?>

                    <?php if (isset($_SESSION['success'])): ?>
                    <div class="alert alert-success">
                        <?php echo $_SESSION['success'];
                            unset($_SESSION['success']); ?>
                    </div>
                    <?php endif; ?>

                    <form action="main.php" method="POST">
                        <div class="form-group">
                            <label for="mail">Email</label>
                            <input type="email" name="mail" id="mail" placeholder="votre@email.com" required>
                        </div>

                        <div class="form-group">
                            <label for="password">Mot de passe</label>
                            <input type="password" name="password" id="password" placeholder="Entrez votre mot de passe"
                                required>
                        </div>

                        <button type="submit" name="login_btn" class="submit-btn">
                            <i class="fas fa-sign-in-alt"></i> Se connecter
                        </button>
                    </form>

                    <div class="divider">
                        <span>ou</span>
                    </div>

                    <div class="social-login">
                        <button class="social-btn facebook">
                            <i class="fab fa-facebook-f"></i>
                            Facebook
                        </button>
                        <button class="social-btn google">
                            <i class="fab fa-google"></i>
                            Google
                        </button>
                    </div>

                    <p>
                        <a href="#" class="forgot-password">Mot de passe oublié?</a>
                    </p>
                </div>

                <!-- Register Card -->
                <div class="register-card">
                    <div class="card-header">
                        <h2>Inscription</h2>
                        <p>Créez votre compte NURAYA</p>
                    </div>

                    <form action="main.php" method="POST">
                        <div class="form-group">
                            <label for="reg_name">Nom complet</label>
                            <input type="text" name="name" id="reg_name" placeholder="Entrez votre nom" required>
                        </div>

                        <div class="form-group">
                            <label for="reg_mail">Email</label>
                            <input type="email" name="mail" id="reg_mail" placeholder="votre@email.com" required>
                        </div>

                        <div class="form-group">
                            <label for="reg_password">Mot de passe</label>
                            <input type="password" name="password" id="reg_password"
                                placeholder="Choisissez un mot de passe" required>
                        </div>

                        <div class="form-group">
                            <label for="confirm_password">Confirmer le mot de passe</label>
                            <input type="password" name="confirm_password" id="confirm_password"
                                placeholder="Confirmez votre mot de passe" required>
                        </div>

                        <button type="submit" name="register_btn" class="submit-btn">
                            <i class="fas fa-user-plus"></i> Créer un compte
                        </button>
                    </form>

                    <p class="terms-text">
                        En créant un compte, vous acceptez nos
                        <a href="#">conditions d'utilisation</a>
                        et notre
                        <a href="#">politique de confidentialité</a>
                    </p>
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
</body>

</html>