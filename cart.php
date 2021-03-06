<?php
session_start();
require_once "inc/dbconn.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="styles/cart-style.css">
    <link rel="stylesheet" href="styles/header-nav-style.css">
    <link rel="stylesheet" href="styles/footer-style2.css">
    <link rel="icon" href="images/favicon_starwars.png" type="image/png" />
    <script src="https://kit.fontawesome.com/646e59b3d4.js" crossorigin="anonymous"></script>
    <meta charset="utf-8" />
    <meta name="author" content="Illia Sheshyn" />
    <meta name="description" content="Shopping Cart" />
    <title>Shopping Cart | Star Wars Collectables</title>
</head>

<body>
    <!-- HEADER - NAVBAR -->
    <?php require_once "inc/header-nav.php"; ?>
    <div class="nav-spacer"></div>

    <!-- PAGE CONTENT -->
    <div class="checkout-banner">
        <h1>Shopping Cart</h1>
    </div>
    <div class="row-main">
        <div class="column-75vh">
            <div class="container">
                <h2>Your Cart Items</h2>

                <?php if (isset($_SESSION)) {
                    foreach ($_SESSION as $key => $val) {

                        $sql = "SELECT * FROM product WHERE prodID = '$key'";
                        $sqlimage = "SELECT imageRef FROM productimage WHERE prodID = '$key'";


                        if ($result = mysqli_query($conn, $sql)) {
                            if (mysqli_num_rows($result) > 0) {
                                $product = mysqli_fetch_assoc($result);
                                mysqli_free_result($result);

                                $result = mysqli_query($conn, $sqlimage);
                                $productImage = mysqli_fetch_row($result);
                                $total += ($product['price'] * $val);
                                $totalItems += $val;
                ?>
                                <div class="cart-items row-inner">
                                    <div class="item-image column-20vh">
                                        <p><img src="<?php echo $productImage[0]; ?>"></p>
                                    </div>
                                    <div class="item-desc column-20vh">
                                        <h2><?php echo $product['prodName']; ?></h2>
                                        <h3>AUD$ <?php echo $product['price'];  ?></h3>
                                    </div>
                                    <div class="item-qty column-20vh">
                                        <h2><?php echo $val; ?></h2>
                                    </div>
                                    <div class="item-sub column-20vh">
                                        <h2>AUD$ <?php echo ($product['price'] * $val);  ?></h2>
                                        <form action="removeFromCart.php" method="GET">
                                            <div>
                                                <div>
                                                    <p><button class="remove-button" type="submit">Remove</button></p>
                                                </div>
                                                <div class="cart-quantityInput">
                                                    <input id="hideme" name="prodID" value=<?php echo "$product[prodID]"; ?>>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                <?php
                            }
                        }
                    }
                }
                $_SESSION['total'] = $total;
                $_SESSION['totalItems'] = $totalItems;
                ?>

            </div>
        </div>
        <div class="column-25vh">
            <div class="container">
                <h4>TOTAL ITEMS
                    <span class="price" style="color:white; font-size: 20px;">
                        <i class="fa fa-shopping-cart"></i>
                        <b><?php echo $_SESSION['totalItems']; ?></b>
                    </span>
                </h4>
                <hr>
                <?php if ($_SESSION['totalItems'] < 1 ) {
                    echo '<br><h5><i>"A disturbance in the force I feel..."</i></h5>';
                    echo '<h5><i>"No items in your cart there are."</i></h5><br>';
                }
                ?>
                <p class="total-price"><b style="color:white; font-size: 20px;">Total Price </b><span class="price" style="color:white; font-size: 20px;"><b>AUD$ <?php echo $_SESSION['total']; ?></b></span></p>
                <?php
                if ($totalItems > 0) {
                ?>
                <button onclick="window.location.href='checkout.php'" id="submit-button" type="submit" value="Place Order" class="btn-one">CHECKOUT</button>
                <?php
                } else {
                    echo "<div id='submit-button-Dead' class='btn-Dead'><div id='noCheckout'>CHECKOUT</div></div>";
                }
                ?>
            </div>
        </div>
    </div>
    <!-- FOOTER -->
    <div class="nav-spacer"></div>
    <?php
    require_once "inc/footer2.php"
    ?>

</body>

</html>