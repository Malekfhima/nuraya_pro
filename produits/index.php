<?php
include '../cnx.php';
$result = mysqli_query($cnx,"SELECT * from products");
$i = 0 ;
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Page Title</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='main.css'>
    <link href="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
    <header>
        <?php //include('../navbar.php');?>
        <nav class="navbar">
            <a href="#" class="logo">nuraya</a>
            
            <button class="mobile-menu-btn">
                <i class="fas fa-bars"></i>
            </button>
            
            
            
            
            <ul class="nav-links">
                <li><a href="../index.html">Home</a></li>
                <li><a href="../about.html">About</a></li>
                <li><a href="../contact_us.php">Contact</a></li>
            </ul>
            
            <div class="icons">
                <a href="#"><i class="fas fa-user"></i></a>
                <a href="#" class="cart-icon">
                    <i class="fas fa-shopping-bag"></i>
                    <span class="cart-count">0</span>
                </a>
            </div>
        </nav>
    </header>
    <section class="featured-products">
        <h2 class="section-title">Featured Products</h2>
        <div class="products">
            <?php while($t= mysqli_fetch_assoc($result)) : 
            $i++ ;
            ?>
            <div class="product-card">
                <div class="product-image">
                    <img src="<?php echo $t['image_url'] ; ?>">
                </div>
                <div class="product-info">
                    <h3 class="product-title"><?php echo $t['name'] ; ?></h3>
                    <div class="product-price">
                        <div>
                            <span class="current-price"><?php echo $t['price'] ; ?> DT</span>
                        </div>
                        <button class="add-to-cart" data-product-id = "<?php echo $t['product_id'] ; ?>" data-id="<?php echo $i ; ?>" data-name="<?php echo $t['name'] ; ?>" data-price="<?php echo $t['price'] ; ?>" data-image="<?php echo $t['image_url'] ; ?>">
                            <i class="fas fa-plus"></i>
                        </button>
                    </div>
                </div>
            </div>
        <?php endwhile ; ?>
    </section>
                    
    <div class="modal-overlay">
        <div class="cart-modal">
            <div class="cart-header">
                <h2>Your Cart</h2>
                <button class="close-cart">
                    <i class="fas fa-times"></i>
                </button>
            </div>
<form action="main.php" method="post">
            <div class="cart-items">
                <!-- Cart items will be added here dynamically -->
                <div class="empty-cart">
                    <i class="fas fa-shopping-bag" style="font-size: 40px; margin-bottom: 15px;"></i>
                    <p>Your cart is empty</p>
                </div>
            </div>
            <div class="cart-total">
                Total: <span>0.00 DT</span>
            </div>
            <input class="checkout-btn" type="submit" value="Checkout">
        </div>
    </div>
</form>
    <script src="main.js"></script>
    <?php mysqli_close($cnx); ?>
    </body>
</html>