<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thank you for your Order</title>
    <link rel="stylesheet" href="styles/thankyou-style.css">
    <link rel="stylesheet" href="styles/header-nav-style.css">
    <link rel="stylesheet" href="styles/footer-style2.css">
    <script src="https://kit.fontawesome.com/646e59b3d4.js" crossorigin="anonymous"></script>
</head>

<body>
    <!-- HEADER - NAVBAR -->
    <?php
    require_once "inc/header-nav.php"
    ?>
    <div class="nav-spacer"></div>

    <div class="flex-container">
        <div class="column-30vh">
            <div class="icon-check"><i class="far fa-check-circle"></i></div>
            <h1>THANK YOU</h1>
            <h2>$Full Name</h1>
                <p>Sit back and relax, your Starwars Collectible Figurine is flying your way!</p>
                <button id="submit-button" type="" class="btn-one">GOT IT</button><br><br><br>
                <p>An order confirmation was sent to <b>$your-email</b></p>
                <p>Your order was confirmed at <b>$date-time.</b></p><br><br>
                <p>Questions?</p>
                <p><i class="fas fa-phone"></i> Call us at 08 8201 2345</p>
        </div>
    </div>


    </div>
    <!-- FOOTER -->
    <?php
    require_once "inc/footer2.php"
    ?>
</body>

</html>