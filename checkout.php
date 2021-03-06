<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Checkout | Star Wars Collectables</title>
    <meta charset="UTF-8" />
    <meta name="author" content="" />
    <link rel="stylesheet" href="styles/checkout-style.css">
    <link rel="stylesheet" href="styles/header-nav-style.css">
    <link rel="stylesheet" href="styles/footer-style2.css">
    <link rel="icon" href="images/favicon_starwars.png" type="image/png" />
    <script src="https://kit.fontawesome.com/646e59b3d4.js" crossorigin="anonymous"></script>
    <script src="" defer></script>
</head>

<body>
    <!-- HEADER - NAVBAR -->
    <?php
    require_once "inc/header-nav.php"
    ?>
    <div class="nav-spacer"></div>
    <!-- START OF CHECKOUT PAGE CONTENT -->
    <div class="checkout-banner">
        <h1>Ready to Checkout Your Items?</h1>
    </div>
    <div class="row-main">
        <div class="column-75vh">
            <div class="container">
                <form action="thankyou.php" method="POST" id="order">

                    <div class="row-inner">
                        <div class="column-50vh">
                            <h3>Your Shipping Details</h3>
                            <label class="details" for="name"> Full Name</label>
                            <input class="details" type="text" id="name" name="name" placeholder="Scott Morrison" required>
                            <label class="details" for="email"> Email</label>
                            <input class="details" type="email" id="email" name="email" placeholder="scott@yourpm.com" required>
                            <label class="details" for="adr"> Address</label>
                            <input class="details" type="text" id="address" name="address" placeholder="101 Parliament House" required>
                            <label class="details" for="suburb"> Suburb</label>
                            <input class="details" type="text" id="suburb" name="suburb" placeholder="Canberra" required>

                            <div class="row-inner">
                                <div class="column-50vh">
                                    <label class="details" for="state">State</label>
                                    <select id="state" name="state" required default="South Australia" required>
                                        <option disabled selected value>-- Select --</option>
                                        <option value="ACT">Australian Capital Territory</option>
                                        <option value="NSW">New South Wales</option>
                                        <option value="NT">Northern Territory</option>
                                        <option value="QLD">Queensland</option>
                                        <option value="SA">South Australia</option>
                                        <option value="TAS">Tasmania</option>
                                        <option value="VIC">Victoria</option>
                                        <option value="WA">Western Australia</option>
                                    </select>
                                </div>
                                <div class="column-50vh">
                                    <label class="details" for="postcode">Post Code</label>
                                    <input class="details" type="text" id="postcode" name="postcode" placeholder="9000" minlength="4" maxlength="4" required>
                                </div>
                            </div>
                        </div>

                        <div class="column-50vh">
                            <h3>Payment</h3>

                            <label class="details" for="cardname">Name on Card</label>
                            <input class="details" type="text" id="cardname" name="cardname" placeholder="Scott Morrison" required>
                            <label class="details" for="cardno">Credit card number</label>
                            <input class="details" type="tel" id="cardno" name="cardno" placeholder="xxxx-xxxx-xxxx-xxxx" inputmode="numeric"
                            pattern="[0-9\s]{16,19}" maxlength="19" required>


                            <div class="row-inner">
                                <div class="column-50vh">
                                    <label class="details" for="valid">Valid Until: </label>
                                    <select name="month" id="month" required>
                                        <option disabled selected value>Month</option>
                                        <option value="jan">January</option>
                                        <option value="feb">February</option>
                                        <option value="mar">March</option>
                                        <option value="apr">April</option>
                                        <option value="may">May</option>
                                        <option value="jun">June</option>
                                        <option value="jul">July</option>
                                        <option value="aug">August</option>
                                        <option value="sep">September</option>
                                        <option value="oct">October</option>
                                        <option value="nov">November</option>
                                        <option value="dec">December</option>
                                    </select>
                                </div>
                                <div class="column-50vh">
                                    <label for="year"></label>
                                    <select name="year" id="year" required>
                                        <option disabled selected value>Year</option>
                                        <option value="2021">2021</option>
                                        <option value="2022">2022</option>
                                        <option value="2023">2023</option>
                                        <option value="2024">2024</option>
                                        <option value="2025">2025</option>
                                        <option value="2026">2026</option>
                                        <option value="2027">2027</option>
                                        <option value="2028">2028</option>
                                        <option value="2029">2029</option>
                                        <option value="2030">2030</option>
                                    </select>
                                </div>
                            </div>
                            <label class="details" for="cvv">CVV</label>
                            <input class="details" type="text" id="cvv" name="cvv" placeholder="xxx" minlength="3" maxlength="3" required>

                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="column-25vh">
            <div class="container">
                <h4>TOTAL ITEMS
                    <span class="price" style="color:white; font-size: 20px;">
                        <i class="fa fa-shopping-cart"></i>
                        <b><?php echo $_SESSION['totalItems'];?></b>
                    </span>
                </h4>
                <hr>
                <p class="total-price"><b style="color:white; font-size: 20px;">Total Price </b><span class="price" style="color:white; font-size: 20px;"><b>AUD$ <?php echo $_SESSION['total'];?></b></span></p>
                <button form="order" id="submit-button" type="submit" value="Place Order" class="btn-one">Place Order</button>
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