<?php
session_start();
// Navbar partial: matches about.html theme
?>
<style>
    :root{--primary:#000;--muted:#6b7280;--accent:#ff6b6b;--bg:#f9f9f9}
    .navbar{display:flex;align-items:center;justify-content:space-between;padding:18px 28px;background:transparent}
    .navbar .logo{font-weight:700;font-size:20px;color:var(--primary);text-decoration:none}
    .nav-links{display:flex;gap:18px;list-style:none;margin:0;padding:0;align-items:center}
    .nav-links a{color:var(--primary);text-decoration:none;font-weight:600;padding:8px 10px;border-radius:6px}
    .nav-links a:hover{color:var(--accent)}
    .icons{display:flex;gap:12px;align-items:center}
    .cart-icon{position:relative}
    .cart-count{position:absolute;top:-6px;right:-8px;background:var(--accent);color:#fff;border-radius:50%;width:18px;height:18px;display:flex;align-items:center;justify-content:center;font-size:11px}
    @media (max-width:768px){.nav-links{display:none}}
</style>

<header>
    <nav class="navbar">
        <a class="logo" href="index.html">nuraya</a>
        <ul class="nav-links">
            <li><a href="index.html">Home</a></li>
            <li><a href="produits/index.php">Shop</a></li>
            <li><a href="about.html">About</a></li>
        </ul>
        <div class="icons">
            <?php if (isset($_SESSION['id'])): ?>
                <a href="mon_compte.php"><i class="fas fa-user"></i></a>
                <a href="panier.php" class="cart-icon"><i class="fas fa-shopping-bag"></i><span class="cart-count"><?php echo isset($_SESSION['panier'])?count($_SESSION['panier']):0; ?></span></a>
            <?php else: ?>
                <a href="login.php"><i class="fas fa-user"></i></a>
            <?php endif; ?>
        </div>
    </nav>
</header>