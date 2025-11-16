<?php
session_start();
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Navigation</title>
    <link rel="stylesheet" href="css/style.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>

<body>

    <!-- Navigation -->
    <nav class="main-navigation">
        <ul>
            <?php if (isset($_SESSION['role'])): ?>
                <?php if ($_SESSION['role'] === 'admin'): ?>
                    <!-- 🛠️ Menu Admin -->
                    <li><a href="index.php"><i class="fas fa-home"></i> Accueil</a></li>
                    <li><a href="main.php"><i class="fas fa-plus-circle"></i> Ajouter Produits</a></li>
                    <li><a href="gere_users.php"><i class="fas fa-edit"></i> Gérer Produits</a></li>
                    <li><a href="liste_commandes.php"><i class="fas fa-clipboard-list"></i> Commandes</a></li>
                    <li><a href="ajouter_habit.php"><i class="fas fa-tshirt"></i> Ajouter Habits</a></li>
                    <li><a href="modifier_habit.php"><i class="fas fa-pen"></i> Modifier Habits</a></li>

                <?php elseif ($_SESSION['role'] === 'user'): ?>
                    <!-- 👤 Menu Utilisateur -->
                    <li><a href="/nuraya_pro/index.html"><i class="fas fa-home"></i> Accueil</a></li>
                    <li><a href="/nuraya_pro/produits/index.php"><i class="fas fa-store"></i> Boutique</a></li>
                    <li><a href="#"><i class="fas fa-history"></i> Mes Commandes</a></li>
                    <li><a href="/nuraya_pro/contact_us.php"><i class="fas fa-envelope"></i> Contact</a></li>
                    <li><a href="/nuraya_pro/about.html"><i class="fas fa-info-circle"></i> À propos</a></li>
                <?php endif; ?>

            <?php else: ?>
                <!-- 👀 Menu Visiteur -->
                <li><a href="/nuraya_pro/index.html"><i class="fas fa-home"></i> Accueil</a></li>
                <li><a href="/nuraya_pro/produits/index.php"><i class="fas fa-store"></i> Boutique</a></li>
                <li><a href="/nuraya_pro/contact_us.php"><i class="fas fa-envelope"></i> Contact</a></li>
                <li><a href="/nuraya_pro/about.html"><i class="fas fa-info-circle"></i> À propos</a></li>
            <?php endif; ?>
        </ul>

        <div class="admin-nav">
            <?php if (isset($_SESSION['email'])): ?>
                <span class="user-badge">
                    <i class="fas fa-user-circle"></i>
                    <?php echo htmlspecialchars($_SESSION['email']); ?>
                    (<?php echo $_SESSION['role'] === 'admin' ? 'Admin' : 'Utilisateur'; ?>)
                </span>
            <?php endif; ?>

            <div class="icons">
                <?php if (isset($_SESSION['id'])): ?>
                    <a href="mon_compte.php"><i class="fas fa-user"></i></a>
                    <a href="panier.php" class="cart-icon">
                        <i class="fas fa-shopping-bag"></i>
                        <span class="cart-count">
                            <?php echo isset($_SESSION['panier']) ? count($_SESSION['panier']) : '0'; ?>
                        </span>
                    </a>
                    <a href="/nuraya_pro/logout.php" title="Déconnexion"><i class="fas fa-sign-out-alt"></i></a>
                <?php else: ?>
                    <a href="/nuraya_pro/cree_compte/index.php" title="Connexion"><i class="fas fa-sign-in-alt"></i></a>
                    <a href="/nuraya_pro/cree_compte/index.php" title="Inscription"><i class="fas fa-user-plus"></i></a>
                <?php endif; ?>
            </div>
        </div>
    </nav>

</body>

</html>