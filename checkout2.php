<?php
include 'connection.php';
include('functions/userfunctions.php');
include 'authenticate.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>S-TEAM | Checkout</title>
    <link rel="stylesheet" href="checkout.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Alata&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.14.0/build/css/themes/bootstrap.min.css"/>
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.14.0/build/css/alertify.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body id="top">
    <?php include('header3.php'); ?>

    <div class="sidebar">
        <div class="mobile-navbar" data-navbar>
            <div class="wrapper">
            </div>
            <ul class="navbar-list">
                <li>
                    <a href="shop-all.php" class="navbar-link" data-nav-link>PRODUCTS</a>
                </li>
                <li>
                    <a href="categories.html" class="navbar-link" data-nav-link>CATEGORIES</a>
                </li>
                <li>
                    <a href="BLUSH" class="navbar-link" data-nav-link>BLUSH</a>
                </li>
                <li>
                    <a href="#LIPS" class="navbar-link" data-nav-link>LIPS</a>
                </li>
                <li>
                    <a href="#BASE" class="navbar-link" data-nav-link>BASE</a>
                </li>
                <li>
                    <a href="#POWDER" class="navbar-link" data-nav-link>POWDER</a>
                </li>
                <li>
                    <a href="#CONTOUR" class="navbar-link" data-nav-link>CONTOUR</a>
                </li>
                <li>
                    <a href="#EYES" class="navbar-link" data-nav-link>EYES</a>
                </li>
                <li>
                    <a href="#ABOUT" class="navbar-link" data-nav-link>ABOUT</a>
                </li>
            </ul>
        </div>
        <div class="overlay" data-nav-toggler data-overlay></div>
    </div>

    <!-- CHECKOUT CONTAINER -->
    <div class="checkout-container">
        <div class="tab_box">
            <button class="tab_btn active">Delivery</button>
            <button class="tab_btn">Payment</button>
        </div>

        <div class="content_box">
            <div class="pill-content active">
                <h3>Fill out <span style="color: #FFC5C5">Delivery</span> Information</h3>
                <div class="row">
                    <div class="col-1">
                        <div class="checkout-container-form">
                            <form action="functions/placeorder.php" method="POST">
                                <div class="col-2-cols">
                                    <input type="text" id="fname" name="name" placeholder="Name" required>
                                    <input type="text" id="streetaddress" name="address" placeholder="Street Address" required>
                                </div>
                                <div class="col-2-cols">
                                    <input type="number" id="zipcode" name="pincode" placeholder="Zip Code" maxlength="5" required>
                                </div>
                                <div class="row" id="cols2">
                                    <div class="col-2">
                                        <input type="email" id="email" name="email" placeholder="Email" required>
                                    </div>
                                    <div class="col-2">
                                        <input type="number" id="contact" name="phone" placeholder="Contact Number" maxlength="11" required>
                                    </div>
                                </div>
                                <div class="checkout-button">
                                    <input type="hidden" name="payment_mode" value="COD">
                                    <button type="submit" name="placeOrderBtn">PLACE ORDER</button>
                                    <button type="submit" name="stripebtn">PAY WITH STRIPE</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="pill-content">
                <h3>Select a <span style="color: #FFC5C5">Payment</span> method</h3>
                <div class="payment-container">
                    <form action="#" class="clicks">
                        <input type="radio" name="payment" id="paypal">
                        <input type="radio" name="payment" id="gcash">
                        <div class="category">
                            <label for="paypal" class="paypalMethod">
                                <div class="imgName">
                                    <div class="imgContainer paypal">
                                        <img src="images/paypal.png" alt="">
                                    </div>
                                </div>
                                <span class="check"><i class="fa-solid fa-circle-check" style="color: #6064b6;"></i></span>
                            </label>
                            <label for="gcash" class="gcashMethod">
                                <div class="imgName">
                                    <div class="imgContainer gcash">
                                        <img src="images/gcash.png" alt="">
                                    </div>
                                </div>
                                <span class="check"><i class="fa-solid fa-circle-check" style="color: #6064b6;"></i></span>
                            </label>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="checkout-summary">
        <div class="inyourcart">
            <p>IN YOUR CART</p>
        </div>
        <?php 
            $items = getCartItems();
            $totalPrice = 0;
            foreach ($items as $citem) {
        ?>
            <div class="card shadow-sm">
                <div class="row align-items-center">
                    <div class="col-md-2">
                        <img src="uploads/<?= $citem['image']?>" alt="image" style="width: 50px; margin-left: 30px; margin-top:5px;">
                    </div>
                    <div class="col-md-3">
                        <h5 style="font-size: 10px;"><?= $citem['name']?></h5>
                    </div>
                    <div class="col-md-3">
                        <h5 style="font-size: 10px;">₱<?= $citem['selling_price']?></h5>
                    </div>
                    <div class="col-md-3">
                        <h5 style="font-size: 10px;">x <?= $citem['prod_qty']?></h5>
                    </div>
                </div>
            </div>
        <?php
            $totalPrice += $citem['selling_price'] * $citem['prod_qty'];
            }
        ?>
        <hr style="width: 90%; background-color: #5d0e7c77; color:#5d0e7c77; margin-right: 5px; margin-left: 25px; margin-top:15px">
        <div class="total-text">
            <h3>TOTAL: ₱ <?= $totalPrice?></h3>
        </div>
    </div>

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
                        <input type="email" name="email_address" placeholder="Enter your email address" required class="email-field"/>
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
        </div>
        <div class="footer-bottom">
            <p class="copyright">&copy; 2024, All Rights Reserved.</p>
        </div>
    </footer>

    <a href="#top" class="back-top-btn" aria-label="back to top" data-back-top-btn>
        <ion-icon name="arrow-up" aria-hidden="true"></ion-icon>
    </a>

    <script>
        const tabs = document.querySelectorAll('.tab_btn');
        const all_content = document.querySelectorAll('.pill-content');

        tabs.forEach((tab, index) => {
            tab.addEventListener('click', (e) => { 
                tabs.forEach(tab => { tab.classList.remove('active') });
                tab.classList.add('active');

                var line = document.querySelector('.line');
                line.style.width = e.target.offsetWidth + "px";
                line.style.left = e.target.offsetLeft + "px";

                all_content.forEach(content => { content.classList.remove('active') });
                all_content[index].classList.add('active');
            });
        });
    </script>

    <script src="js/script.js" defer></script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script src="js/script.js"></script>
</body>
</html>
