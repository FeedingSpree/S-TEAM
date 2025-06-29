<?php
include 'connection.php';
include 'functions/myfunctions.php';

if (isset($_GET['category'])) {
    $category_slug = $_GET['category'];
    $category_data = getSlugActive("categories", $category_slug);

    if ($category_data && mysqli_num_rows($category_data) > 0) {
        $category = mysqli_fetch_array($category_data);
        $cid = $category['id'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>S-TEAM | SHOP</title>
    <link rel="stylesheet" href="shopstyle.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Alata&display=swap" rel="stylesheet">
</head>
<body>

<?php include('header2.php'); ?>

<!-- Alert for session messages -->
<?php if (isset($_SESSION['message'])) { ?>
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>Notice:</strong> <?= $_SESSION['message']; ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <?php unset($_SESSION['message']); ?>
<?php } ?>

<!-- Sidebar -->
<div class="sidebar">
    <div class="mobile-navbar" data-navbar>
        <ul class="navbar-list">
            <li><a href="shop-all.php" class="navbar-link">PRODUCTS</a></li>
            <li><a href="categories.php" class="navbar-link">CATEGORIES</a></li>
            <li><a href="#BLUSH" class="navbar-link">BLUSH</a></li>
            <li><a href="#LIPS" class="navbar-link">LIPS</a></li>
            <li><a href="#BASE" class="navbar-link">BASE</a></li>
            <li><a href="#POWDER" class="navbar-link">POWDER</a></li>
            <li><a href="#CONTOUR" class="navbar-link">CONTOUR</a></li>
            <li><a href="#EYES" class="navbar-link">EYES</a></li>
            <li><a href="#ABOUT" class="navbar-link">ABOUT</a></li>
        </ul>
    </div>
</div>

<!-- Page Title -->
<p id="allProducts">ALL PRODUCTS</p>
<p id="navEme">
    <a href="index.php" class="nav-link">HOME</a> / PRODUCTS
</p>

<!-- Product List -->
<div id="product-list">
    <?php
    $products = getProdByCategory($cid);

    if ($products && mysqli_num_rows($products) > 0) {
        foreach ($products as $item) { ?>
            <div class="product" onclick="window.location.href='productview.php?product=<?= $item['slug']; ?>';">
                <img src="uploads/<?= $item['image']; ?>" alt="<?= $item['name']; ?>" class="image-1">
                <img src="uploads/<?= $item['image']; ?>" alt="<?= $item['name']; ?>" class="image-2">
                <p class="prodTitle"><?= $item['name']; ?></p>
                <p class="prodPrice">&#8369; <?= $item['selling_price']; ?></p>
            </div>
        <?php }
    } else {
        echo "<p>No products found for this category.</p>";
    }
    ?>
</div>

<!-- Footer -->
<footer class="footer" data-section>
    <div class="container" style="margin-bottom: 40px;">
        <div class="footer-top">
            <ul class="footer-list">
                <li><img src="images/s-team.png" id="footer-logo"></li>
            </ul>
            <ul class="footer-list">
                <li><p class="footer-list-title">BRANDS</p></li>
                <li><a href="#" class="footer-link">BLK</a></li>
                <li><a href="#" class="footer-link">CARELINE</a></li>
                <li><a href="#" class="footer-link">ISSY</a></li>
                <li><a href="#" class="footer-link">GRWM</a></li>
                <li><a href="#" class="footer-link">VICE</a></li>
            </ul>
            <ul class="footer-list">
                <li><p class="footer-list-title">CATEGORIES</p></li>
                <li><a href="#" class="footer-link">BASE</a></li>
                <li><a href="#" class="footer-link">EYES</a></li>
                <li><a href="#" class="footer-link">LIPS</a></li>
                <li><a href="#" class="footer-link">BLUSH & CONTOUR</a></li>
                <li><a href="#" class="footer-link">POWDERS</a></li>
            </ul>
            <div class="footer-list">
                <p class="newsletter-title">Get ready with us!</p>
                <ul class="social-list">
                    <li><a href="#" class="social-link"><ion-icon name="logo-instagram"></ion-icon></a></li>
                    <li><a href="#" class="social-link"><ion-icon name="logo-tiktok"></ion-icon></a></li>
                    <li><a href="#" class="social-link"><ion-icon name="logo-facebook"></ion-icon></a></li>
                    <li><a href="#" class="social-link"><ion-icon name="logo-youtube"></ion-icon></a></li>
                    <li><a href="#" class="social-link"><ion-icon name="logo-twitter"></ion-icon></a></li>
                </ul>
                <form action="" class="newsletter-form">
                    <input type="email" name="email_address" placeholder="Enter your email address" required class="email-field" />
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
        <ul class="surname-list">
            <li>Sobrevega</li>
            <li>Tomagan</li>
            <li>Estrella</li>
            <li>Alconcel</li>
            <li>Mariano</li>
        </ul>
        <div class="footer-bottom">
            <p class="copyright">&copy; 2024, All Rights Reserved.</p>
        </div>
    </div>
</footer>

<!-- Back to Top Button -->
<a href="#top" class="back-top-btn" aria-label="back to top" data-back-top-btn>
    <ion-icon name="arrow-up" aria-hidden="true"></ion-icon>
</a>

<script src="js/script.js" defer></script>
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>

<?php
    } else {
        echo "<p>Category not found or inactive.</p>";
    }
} else {
    echo "<p>Category parameter missing from URL.</p>";
}
?>
