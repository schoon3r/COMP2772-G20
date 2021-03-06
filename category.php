<!DOCTYPE html>
<html lang="en">

<head>
  <title>Category | Star Wars Collectables</title>
  <meta charset="UTF-8" />
  <meta name="author" content="" />
  <link rel="stylesheet" href="styles/category-style.css">
  <link rel="stylesheet" href="styles/header-nav-style.css">
  <link rel="stylesheet" href="styles/footer-style2.css">
  <link rel="icon" href="images/favicon_starwars.png" type="image/png" />
  <script src="https://kit.fontawesome.com/646e59b3d4.js" crossorigin="anonymous"></script>
</head>

<body>
  <!-- Richard's Code -->
  <!-- HEADER - NAVBAR -->
  <?php
  require_once "inc/header-nav.php"
  ?>
  <div class="nav-spacer"></div>

  <!-- CATEGORY PAGE BANNER -->
  <div class="productPage-banner">
    <div class="productPage-bannerInformation">
      <h1>Collection</h1>
    </div>
  </div>

  <!-- CATEGORY PAGE BANNER -->

  <div class='flex-container'>
    <?php
    require_once "inc/dbconn.php";

    $category = htmlspecialchars(($_GET["category"]));
    $association = htmlspecialchars(($_GET["association"]));
    $sql = "SELECT * FROM product, productimage WHERE product.prodID = productimage.prodID AND category = '$category' AND imageRef LIKE '%1.png';";
    $assocsql = "SELECT * FROM product, productimage WHERE product.prodID = productimage.prodID AND association = '$association' AND imageRef LIKE '%1.png';";
 
    if ($result = mysqli_query($conn, $sql)) {
      if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
          echo "<div class='categoryPage-productInformationCard'>";
          echo "<div class='categoryPage-productImage'>";
          echo "<a href='product.php?id=$row[prodID]'>";
          echo "<img src='$row[imageRef]'/>";
          echo "<div class='categoryPage-productData'>";
          echo "<h1 class='categoryPage-productName'>$row[prodName]</h1>";
          echo "<p class='categoryPage-productPrice'>AUD$$row[price]</p>";
          echo "</div>";
          echo "</div>";
          echo "</div>";
          echo "</a>";
        }
        mysqli_free_result($result);
      }
    }

    if ($result = mysqli_query($conn, $assocsql)) {
      if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
          echo "<div class='categoryPage-productInformationCard'>";
          // echo "<div class='column-24p'>";
          echo "<div class='categoryPage-productImage'>";
          echo "<a href='product.php?id=$row[prodID]'>";
          echo "<img src='$row[imageRef]'/>";
          echo "<div class='categoryPage-productData'>";
          echo "<h1 class='categoryPage-productName'>$row[prodName]</h1>";
          echo "<p class='categoryPage-productPrice'>AUD$$row[price]</p>";
          echo "</div>";
          echo "</div>";
          echo "</div>";
          echo "</a>";
        }
        mysqli_free_result($result);
      }
    }

    mysqli_close($conn);

    ?>

  </div>

  <!-- FOOTER -->
  <?php
  require_once "inc/footer2.php"
  ?>

</body>

</html>