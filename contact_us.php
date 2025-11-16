<?php
include("cnx.php");
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact - NURAYA</title>
    <meta name="description" content="Contactez NURAYA pour toute question sur nos collections de mode modeste">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<body>
    <!-- Navigation -->
    <nav>
        <div class="nav-links">
            <a href="index.html">Accueil</a>
            <a href="produits/index.php">Produits</a>
            <a href="produits/index.php">Boutique</a>
            <a href="contact_us.php" class="active">contact</a>
            <a href="about.html">A propos</a>
            <a href="logout.php">deconnexion</a>
        </div>

        <div class="nav-icons">
            <a href="#" class="search-btn"><i class="fas fa-search"></i></a>
            <a href="cree_compte/index.php" class="user-btn"><i class="fas fa-user"></i></a>
            <a href="cart/index.php" class="cart-btn"><i class="fas fa-shopping-bag"></i></a>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="contact-hero">
        <div class="contact-hero-content">
            <h1>Contactez NURAYA</h1>
            <p>Nous sommes là pour répondre à toutes vos questions sur nos collections</p>
        </div>
    </section>

    <!-- Contact Section -->
    <section class="contact-section">
        <div class="contact-container">
            <div class="contact-grid">
                <!-- Contact Information -->
                <div class="contact-info">
                    <div class="info-card">
                        <h3><i class="fas fa-map-marker-alt"></i> Adresse</h3>
                        <p><i class="fas fa-home info-icon"></i>123 Avenue Habib Bourguiba</p>
                        <p>Tunis, Tunisie 1000</p>
                    </div>

                    <div class="info-card">
                        <h3><i class="fas fa-phone"></i> Téléphone</h3>
                        <p><i class="fas fa-phone info-icon"></i>+216 XX XXX XXX</p>
                        <p><i class="fas fa-mobile info-icon"></i>+216 XX XXX XXX</p>
                    </div>

                    <div class="info-card">
                        <h3><i class="fas fa-envelope"></i> Email</h3>
                        <p><i class="fas fa-envelope info-icon"></i>contact@nuraya.com</p>
                        <p><i class="fas fa-envelope info-icon"></i>support@nuraya.com</p>
                    </div>

                    <div class="info-card">
                        <h3><i class="fas fa-clock"></i> Horaires</h3>
                        <p><i class="fas fa-clock info-icon"></i>Lundi - Vendredi: 9h00 - 18h00</p>
                        <p><i class="fas fa-clock info-icon"></i>Samedi: 9h00 - 13h00</p>
                        <p><i class="fas fa-times info-icon"></i>Dimanche: Fermé</p>
                    </div>

                    <div class="social-links">
                        <h3>Suivez-nous</h3>
                        <div class="social-icons">
                            <a href="#"><i class="fab fa-facebook"></i></a>
                            <a href="#"><i class="fab fa-instagram"></i></a>
                            <a href="#"><i class="fab fa-twitter"></i></a>
                            <a href="#"><i class="fab fa-pinterest"></i></a>
                        </div>
                    </div>
                </div>

                <!-- Contact Form -->
                <div class="contact-form">
                    <div class="form-card">
                        <h2>Envoyez-nous un message</h2>

                        <?php
                        if (isset($_GET['status']) && $_GET['status'] == 'success') {
                            echo '<div class="contact-success">Votre message a été envoyé avec succès!</div>';
                        }
                        ?>

                        <form method="POST" action="send.php">
                            <div class="form-group">
                                <label for="name">Nom complet *</label>
                                <input type="text" name="name" id="name" required placeholder="Entrez votre nom">
                            </div>

                            <div class="form-group">
                                <label for="email">Email *</label>
                                <input type="email" name="email" id="email" required placeholder="votre@email.com">
                            </div>

                            <div class="form-group">
                                <label for="phone">Téléphone</label>
                                <input type="tel" name="phone" id="phone" placeholder="+216 XX XXX XXX">
                            </div>

                            <div class="form-group">
                                <label for="subject">Sujet</label>
                                <input type="text" name="subject" id="subject" placeholder="Sujet de votre message">
                            </div>

                            <div class="form-group">
                                <label for="comment">Message *</label>
                                <textarea name="comment" id="comment" required
                                    placeholder="Écrivez votre message ici..."></textarea>
                            </div>

                            <button type="submit" class="submit-btn">
                                <i class="fas fa-paper-plane"></i> Envoyer le message
                            </button>
                        </form>
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
                        <li><a href="index.html">Accueil</a></li>
                        <li><a href="produits/index.php">Produits</a></li>
                        <li><a href="about.html">À Propos</a></li>
                        <li><a href="contact_us.php">Contact</a></li>
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

    <script src="js/main.js"></script>
</body>

</html>