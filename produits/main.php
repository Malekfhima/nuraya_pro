<?php
include '../cnx.php';
if ($_SERVER['REQUEST_METHOD'] === "POST"):
    extract($_POST);
    $i = 0;
    ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Checkout | Adducts</title>
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="../css/style.css">
    </head>

    <body>
        <div class="checkout-container">
            <div class="checkout-header">
                <div class="logo">nuraya</div>
            </div>

            <main class="checkout-main">
                <div class="checkout-card">
                    <h2 class="section-title">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
                            <circle cx="12" cy="10" r="3"></circle>
                        </svg>
                        Delivery Information
                    </h2>
                    <form action="order.php" method="post">
                        <div class="form-row">
                            <div class="form-group">
                                <label class="form-label">First name</label>
                                <input type="text" name="Fname" placeholder="your first name" class="form-control">
                            </div>
                            <div class="form-group">
                                <label class="form-label">Last name</label>
                                <input type="text" name="Lname" placeholder="your last name" class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="form-label">Address</label>
                            <input type="text" name="addr" placeholder="your address" class="form-control">
                        </div>

                        <div class="form-row">
                            <div class="form-group">
                                <label class="form-label">Postal code</label>
                                <input type="text" name="codep" class="form-control" placeholder="Optional">
                            </div>
                            <div class="form-group">
                                <label class="form-label">City</label>
                                <input type="text" name="city" placeholder="where are you from?" class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="form-label">Phone</label>
                            <input type="tel" name="tel" placeholder="your number" class="form-control">
                        </div>
                        <div class="form-group">
                            <label class="form-label">email</label>
                            <input type="email" name="email" placeholder="your email" class="form-control">
                        </div>
                        <button type="submit" class="btn btn-primary">Complete Order</button>
                </div>
                <aside class="checkout-sidebar">
                    <div class="checkout-card">
                        <h3 class="summary-title">Order Summary</h3>
                        <?php
                        $total = 0;
                        foreach ($idp as $id):
                            $result = mysqli_query($cnx, "SELECT * from products where product_id = '$id' ;");
                            while ($t = mysqli_fetch_assoc($result)):
                                $total = $total + ($t['price'] * $qua[$i]);
                                ?>
                                <div class="product-item"><!--hadhi ili bich yssir 3laha il php -->
                                    <input type="hidden" name="idp[]" value="<?php echo $id; ?>">
                                    <input type="hidden" name="qua[]" value="<?php echo $qua[$i]; ?>">
                                    <div class="product-image"><img src="<?php echo $t['image_url']; ?>"></div>
                                    <div class="product-details">
                                        <div class="product-name"> <?php echo $t['name']; ?></div>
                                        <div class="product-price"> Prix d'une piece : <?php echo $t['price']; ?> DT</div>
                                        <div class="product-name">Quentite : <?php echo $qua[$i]; ?></div>
                                    </div>
                                </div>
                            <?php endwhile;
                            $i++;
                        endforeach; ?>
                        </form>
                        <div class="divider"></div>

                        <div class="summary-item">
                            <span>Total</span>
                            <span><?php echo $total; ?> DT</span>
                        </div>
                        <div class="summary-item">
                            <span>Livraison</span>
                            <span>9.000 DT</span>
                        </div>

                        <div class="divider"></div>

                        <div class="summary-item summary-total">
                            <span>Total</span>
                            <span><?php echo $total + 8 ?> DT</span>
                        </div>
                    </div>
                </aside>
        </div>
    </body>

    </html>
    <?php
    mysqli_close($cnx);
endif; ?>