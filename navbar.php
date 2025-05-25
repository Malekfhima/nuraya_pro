<?php
session_start();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Navigation</title>
    <!-- Styles -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="main.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        /* Styles supplémentaires */
        .main-navigation {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0 2rem;
            background-color: #f8f9fa;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        .main-navigation ul {
            display: flex;
            list-style: none;
            margin: 0;
            padding: 0;
        }
        .main-navigation li {
            margin: 0 1rem;
        }
        .main-navigation a {
            text-decoration: none;
            color: #333;
            font-weight: 500;
            padding: 1rem 0;
            transition: color 0.3s;
        }
        .main-navigation a:hover {
            color: #007bff;
        }
        .admin-nav {
            display: flex;
            align-items: center;
        }
        .user-badge {
            margin-right: 1rem;
            font-weight: bold;
            color: #6c757d;
        }
        .cart-icon {
            position: relative;
        }
        .cart-count {
            position: absolute;
            top: -8px;
            right: -8px;
            background: #007bff;
            color: white;
            border-radius: 50%;
            width: 18px;
            height: 18px;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 10px;
        }
    </style>
</head>
<body>

<!-- Navigation -->
<nav class="main-navigation">
    <ul>
        <?php if (isset($_SESSION['role']) ): ?>
            <?php if ($_SESSION['role'] === 'admin') : ?>
                <!-- 🛠️ Menu Admin -->
                <li><a href="index.php"><i class="fas fa-home"></i> Accueil</a></li>
                <li><a href="main.php"><i class="fas fa-plus-circle"></i> Ajouter Produits</a></li>
                <li><a href="gere_users.php"><i class="fas fa-edit"></i> Gérer Produits</a></li>
                <li><a href="liste_commandes.php"><i class="fas fa-clipboard-list"></i> Commandes</a></li>
                <li><a href="ajouter_habit.php"><i class="fas fa-tshirt"></i> Ajouter Habits</a></li>
                <li><a href="modifier_habit.php"><i class="fas fa-pen"></i> Modifier Habits</a></li>
                
            <?php elseif ($_SESSION['role'] === 'user') : ?>
                <!-- 👤 Menu Utilisateur -->
                <li><a href="index1.php"><i class="fas fa-home"></i> Accueil</a></li>
                <li><a href="boutique.php"><i class="fas fa-store"></i> Boutique</a></li>
                <li><a href="mes_commandes.php"><i class="fas fa-history"></i> Mes Commandes</a></li>
                <li><a href="contact.php"><i class="fas fa-envelope"></i> Contact</a></li>
                <li><a href="about.php"><i class="fas fa-info-circle"></i> À propos</a></li>
            <?php endif; ?>
            
        <?php else : ?>
            <!-- 👀 Menu Visiteur -->
            <li><a href="index.php"><i class="fas fa-home"></i> Accueil</a></li>
            <li><a href="boutique.php"><i class="fas fa-store"></i> Boutique</a></li>
            <li><a href="contact.php"><i class="fas fa-envelope"></i> Contact</a></li>
            <li><a href="about.php"><i class="fas fa-info-circle"></i> À propos</a></li>
        <?php endif; ?>
    </ul>

    <div class="admin-nav">
        <?php if (isset($_SESSION['email'])) : ?>
            <span class="user-badge">
                <i class="fas fa-user-circle"></i> 
                <?php echo htmlspecialchars($_SESSION['email']); ?>
                (<?php echo $_SESSION['role'] === 'admin' ? 'Admin' : 'Utilisateur'; ?>)
            </span>
        <?php endif; ?>
        
        <div class="icons">
            <?php if (isset($_SESSION['id'])) : ?>
                <a href="mon_compte.php"><i class="fas fa-user"></i></a>
                <a href="panier.php" class="cart-icon">
                    <i class="fas fa-shopping-bag"></i>
                    <span class="cart-count">
                        <?php echo isset($_SESSION['panier']) ? count($_SESSION['panier']) : '0'; ?>
                    </span>
                </a>
                <a href="php/logout.php" title="Déconnexion"><i class="fas fa-sign-out-alt"></i></a>
            <?php else : ?>
                <a href="login.php" title="Connexion"><i class="fas fa-sign-in-alt"></i></a>
                <a href="register.php" title="Inscription"><i class="fas fa-user-plus"></i></a>
            <?php endif; ?>
        </div>
    </div>
</nav>

</body>
</html>