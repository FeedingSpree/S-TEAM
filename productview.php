<?php

include 'connection.php';
include 'functions/myfunctions.php';

if (isset($_GET['product'])) {
    $product_slug = $_GET['product'];
    $product_data = getSlugActive("product", $product_slug);
    $product = mysqli_fetch_array($product_data);

    if ($product) {

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>S-TEAM | PRODUCT VIEW</title>
 <link rel="stylesheet" href="shopstyle.css">
 <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Alata&display=swap" rel="stylesheet">
<script src="jquery-3.7.1.min.js" defer></script>
</head>
<body>
<?php include ('header2.php'); ?>
   

    <div class="sidebar">
        <div class="mobile-navbar" data-navbar>
            <div class="wrapper">
            </div>
            <ul class="navbar-list">
                <li>
                    <a href="shop-all.php" class="navbar-link"
                        data-nav-link>PRODUCTS</a>
                </li>
                <li>
                    <a href="categories.php" class="navbar-link"
                        data-nav-link>CATEGORIES</a>
                </li>
                <li>
                    <a href="BLUSH" class="navbar-link"
                        data-nav-link>BLUSH</a>
                </li>
                <li>
                    <a href="#LIPS" class="navbar-link"
                        data-nav-link>LIPS</a>
                </li>
                <li>
                    <a href="#BASE" class="navbar-link"
                        data-nav-link>BASE</a>
                </li>
                <li>
                    <a href="#POWDER" class="navbar-link"
                        data-nav-link>POWDER</a>
                </li>
                <li>
                    <a href="#CONTOUR" class="navbar-link"
                        data-nav-link>CONTOUR</a>
                </li>
                <li>
                    <a href="#EYES" class="navbar-link"
                        data-nav-link>EYES</a>
                </li>
                <li>
                    <a href="#ABOUT" class="navbar-link"
                        data-nav-link>ABOUT</a>
                </li>
            </ul>
        </div>

        <div class="overlay" data-nav-toggler data-overlay></div>
    </div>

    <table>
        <tr>
            <td>
                <div id="back-button" onclick="history.back()">&#10094;</div>
            </td>

            <td>
                <div id="navEme-products">
                </div>
            </td>
        </tr>
    </table>
    
    
    <div id="product-details">
    <table>
        <tr>
            <td rowspan="5">
                <div class="slideshow-container">
                    <img id="product-image" src="uploads/<?= $product['image'] ?>" alt="sample">
                    
                </div>

                <div class="thumbnails">
                    <p class="thumbnail"></p>
                    <p class="thumbnail"></p>
                    <p class="thumbnail"></p>
                    <p class="thumbnail"></p>
                </div>
            </td>
            <td>
                <p id="prodTitle-details"><?= $product['name'] ?></p>
            </td>
        </tr>

        <tr>
            <td>
                <p id="prodPrice-details">₱ <?= $product['selling_price'] ?></p>
            </td>
        </tr>

        <tr>
            <td>
                <div class="shade-picker">
                </div> 
                <p id="selected-shade"></p>
            </td>
        </tr>

        <tr>
            <td>
                <p id="prodDesc-details"><?= $product['small_description'] ?></p>
            </td>
        </tr>

        <!-- Add to Cart Section -->
        <tr>
            <td>

                <!-- Required hidden structure -->
                <div class="container product_data mt-3">
    <div class="row">
        <div class="col-md-4">
            <div class="input-group mb-3 quantity-control">
                <button class="input-group-text decrement-btn">-</button>
                <input type="text" class="form-control text-center bg-white input-qty" value="1">
                <button class="input-group-text increment-btn">+</button>
            </div>
        </div>
    </div>
    <!-- Add the button inside the same container -->
    <button class="addToCartBtn" id="addToCart" value="<?= $product['id'] ?>">Add To Cart</button>
</div>
    

            </td>
        </tr>
    </table>
</div>

    <script src="script2.js"></script>


        
    <script>
// Function to display shades
function displayShades(shades) {
    const shadePickerContainer = document.querySelector('.shade-picker');
    shadePickerContainer.innerHTML = ''; // Clear existing shades
    
    shades.forEach(shade => {
        const shadeButton = document.createElement('div');
        shadeButton.classList.add('shade-button');
        shadeButton.style.backgroundColor = shade.color;
        shadeButton.onclick = () => selectShade(shade.name); // Set click event

        shadePickerContainer.appendChild(shadeButton);
    });

    // Clear the selected shade text when new product is selected
    document.getElementById('selected-shade').innerText = '';
}

// Function to show selected shade name
function selectShade(shadeName) {
    document.getElementById('selected-shade').innerText = shadeName;
}

// Example shades (Replace this with dynamic data from PHP or your database)
const exampleShades = [
    { name: "Fair", color: "#f2d7d5" },
    { name: "Medium", color: "#d2b48c" },
    { name: "Tan", color: "#a67b5b" },
    { name: "Deep", color: "#6c4f3b" }
];

// Initialize shade picker with example shades
displayShades(exampleShades);
</script>


<footer class="footer" data-section>
    <div class="container" style="margin-bottom: 40px;">
        <div class="footer-top">
            <ul class="footer-list">
                <li>
                    <img src="images/s-team.png" id="footer-logo">
                </li>
            </ul>
            <ul class="footer-list">
                <li>
                    <p class="footer-list-title">BRANDS</p>
                </li>
                <li>
                    <a href="#" class="footer-link">BLK</a>
                </li>
                <li>
                    <a href="#" class="footer-link">CARELINE</a>
                </li>
                <li>
                    <a href="#" class="footer-link">ISSY</a>
                </li>
                <li>
                    <a href="#" class="footer-link">GRWM</a>
                </li>
                <li>
                    <a href="#" class="footer-link">VICE</a>
                </li>
            </ul>

            <ul class="footer-list">
                <li>
                    <p class="footer-list-title">CATEGORIES</p>
                </li>
                <li>
                    <a href="#" class="footer-link">BASE</a>
                </li>
                <li>
                    <a href="#" class="footer-link">EYES</a>
                </li>
                <li>
                    <a href="#" class="footer-link">LIPS</a>
                </li>
                <li>
                    <a href="#" class="footer-link">BLUSH & CONTOUR</a>
                </li>
                <li>
                    <a href="#" class="footer-link">POWDERS</a>
                </li>
            </ul>

            <div class="footer-list">
                <p class="newsletter-title">Get ready with us!</p>
                <ul class="social-list">
                    <li>
                        <a href="#" class="social-link">
                            <ion-icon name="logo-instagram"></ion-icon>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="social-link">
                            <ion-icon name="logo-tiktok"></ion-icon>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="social-link">
                            <ion-icon name="logo-facebook"></ion-icon>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="social-link">
                            <ion-icon name="logo-youtube"></ion-icon>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="social-link">
                            <ion-icon name="logo-twitter"></ion-icon>
                        </a>
                    </li>
                </ul>
                <p class="newsletter-text">
                    Be the first to know about our new collections & launches!
                </p>

                <form action class="newsletter-form">
                    <input
                        type="email"
                        name="email_address"
                        placeholder="Enter your email address"
                        required
                        class="email-field"/>
                    <button type="submit"
                        class="btn btn-primary">Submit</button>
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
        </div>
        <div class="footer-bottom">
                <p class="copyright">&copy; 2024, All Rights Reserved.</p>
            </div>
    </div>
</footer>

<a
href="#top"
class="back-top-btn"
aria-label="back to top"
data-back-top-btn>
<ion-icon name="arrow-up" aria-hidden="true"></ion-icon>
</a>




<script
type="module"
src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script
nomodule
src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
<script src="js/script.js"></script>

</body>
</html>
<?php
    }
} ?>