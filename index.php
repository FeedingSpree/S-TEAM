<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8"/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <title>S-TEAM | Your Supreme Team</title>
        <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon"/>
        <link rel="stylesheet" href="css/style.css"/>
        <link rel="preconnect" href="https://fonts.googleapis.com"/>
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin/>
        <link href="https://fonts.googleapis.com/css2?family=Urbanist:wght@400;500;600;700;800&display=swap" rel="stylesheet"/>
        <link rel="preload" as="image" href="images/logo.png"/>
    </head>

    <body id="top">
        <?php include ('header.php'); ?>

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
                        <a href="categories.html" class="navbar-link"
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

        <main>
            <article>
                <section class="section hero" id="home" aria-label="hero"
                    data-section>
                    <div class="container">
                        <ul class="has-scrollbar">
                            <li class="scrollbar-item">
                                <div
                                    class="hero-card has-bg-image"
                                    style="background-image: url('images/landing.png')">
                                    <div class="card-content">
                                        <h1 class="h1 hero-title">
                                            GRWM Cosmetics <br />
                                            EYE COLLECTION VOL 1
                                        </h1>
                                        <p class="hero-text">
                                            What’s not to love about the newest release, right? 🖤
                                        </p>
                                        <a href="#" class="btn btn-primary">Shop
                                            Now</a>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </section>

                <section
                    class="section collection"
                    id="collection"
                    aria-label="collection"
                    data-section>
                    <div class="container">
                        <ul class="collection-list">
                            <li>
                                <div
                                    class="collection-card has-before hover:shine">
                                    <h2 class="h2 card-title">Giveaway Alert</h2>
                                    <p class="card-text">Happy Vice Co. Day!</p>
                                    <a href="#" class="btn-link">
                                        <span class="span">Visit Now</span>
                                        <ion-icon
                                            name="arrow-forward"
                                            aria-hidden="true"></ion-icon>
                                    </a>
                                    <div
                                        class="has-bg-image"
                                        style="background-image: url('images/allstar.png')"></div>
                                </div>
                            </li>
                            <li>
                                <div
                                    class="collection-card has-before hover:shine">
                                    <h2 class="h2 card-title">What’s New?</h2>
                                    <p class="card-text">BLK's Soft Blur Blush</p>
                                    <a href="#" class="btn-link">
                                        <span class="span">Discover Now</span>
                                        <ion-icon
                                            name="arrow-forward"
                                            aria-hidden="true"></ion-icon>
                                    </a>
                                    <div
                                        class="has-bg-image"
                                        style="background-image: url('images/new.png')"></div>
                                </div>
                            </li>
                            <li>
                                <div
                                    class="collection-card has-before hover:shine">
                                    <h2 class="h2 card-title">Buy 1 Get 1</h2>
                                    <p class="card-text">On Careline's Jelly Tints</p>
                                    <a href="#" class="btn-link">
                                        <span class="span">Shop Now</span>
                                        <ion-icon
                                            name="arrow-forward"
                                            aria-hidden="true"></ion-icon>
                                    </a>
                                    <div
                                        class="has-bg-image"
                                        style="background-image: url('images/b1t1.png')"></div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </section>

                <section class="section shop" id="shop" aria-label="shop"
                    data-section>
                    <div class="container">
                        <div class="title-wrapper">
                            <h2 class="h2 section-title">Shop by Category</h2>
                            <a href="front3/categories.html" class="btn-link">
                                <span class="span">All Products</span>
                                <ion-icon name="arrow-forward"
                                    aria-hidden="true"></ion-icon>
                            </a>
                        </div>
                        <ul class="has-scrollbar">
                            <li class="scrollbar-item">
                                <div class="shop-card">
                                    <a href="#"
                                        class="card-banner img-holder">
                                        <img
                                            src="images/base.png"
                                            width="540"
                                            height="auto"
                                            loading="lazy"
                                            alt="base"
                                            class="img-cover"
                                            onclick="">
                                    </div>
                            </li>
                            <li class="scrollbar-item">
                                <div class="shop-card">
                                    <a href="#"
                                        class="card-banner img-holder">
                                        <img
                                            src="images/blush.png"
                                            width="540"
                                            height="auto"
                                            loading="lazy"
                                            alt="blush"
                                            class="img-cover" />
                                </div>
                            </li>
                            <li class="scrollbar-item">
                                <div class="shop-card">
                                    <a href="#"
                                        class="card-banner img-holder">
                                        <img
                                            src="images/contour.png"
                                            width="540"
                                            height="720"
                                            loading="lazy"
                                            alt="contour"
                                            class="img-cover" />
                                </div>
                            </li>

                            <li class="scrollbar-item">
                                <div class="shop-card">
                                    <a href="#"
                                        class="card-banner img-holder">
                                        <img
                                            src="images/lips.png"
                                            width="540"
                                            height="auto"
                                            loading="lazy"
                                            alt="lips"
                                            class="img-cover" />
                                </div>
                            </li>
                            <li class="scrollbar-item">
                                <div class="shop-card">
                                    <a href="#"
                                        class="card-banner img-holder">
                                        <img
                                            src="images/eyes.png"
                                            width="540"
                                            height="auto"
                                            loading="lazy"
                                            alt="eyes"
                                            class="img-cover" />
                                </div>
                            </li>
                            <li class="scrollbar-item">
                                <div class="shop-card">
                                    <a href="#"
                                        class="card-banner img-holder">
                                        <img
                                            src="images/powder.png"
                                            width="540"
                                            height="auto"
                                            loading="lazy"
                                            alt="powder"
                                            class="img-cover" />
                                </div>
                            </li>
                        </ul>
                    </div>
                </section>

                <section class="section feature" aria-label="feature"
                    data-section>
                    <div class="container">
                        <h2 class="h2-large section-title">Why S-TEAM is the BESTeam?</h2>
                        <ul class="flex-list">
                            <li class="flex-item">
                                <div class="feature-card">
                                    <img
                                        src="images/feature-1.jpg"
                                        width="204"
                                        height="236"
                                        loading="lazy"
                                        alt="Guaranteed PURE"
                                        class="card-icon" />

                                    <h3 class="h3 card-title">Guaranteed
                                        PURE</h3>

                                    <p class="card-text">
                                        S-TEAM brands adhere to strict
                                        purity standards and
                                        does not contain harsh or toxic
                                        ingredients
                                    </p>
                                </div>
                            </li>
                            <li class="flex-item">
                                <div class="feature-card">
                                    <img
                                        src="images/feature-2.jpg"
                                        width="204"
                                        height="236"
                                        loading="lazy"
                                        alt="Completely Cruelty-Free"
                                        class="card-icon" />
                                    <h3 class="h3 card-title">Completely
                                        Cruelty-Free</h3>
                                    <p class="card-text">
                                        S-TEAM promotes and ensures
                                        product testing without any harm to
                                        our lovebugs
                                    </p>
                                </div>
                            </li>
                            <li class="flex-item">
                                <div class="feature-card">
                                    <img
                                        src="images/feature-3.jpg"
                                        width="204"
                                        height="236"
                                        loading="lazy"
                                        alt="Ingredient Sourcing"
                                        class="card-icon" />
                                    <h3 class="h3 card-title">Ingredient
                                        Sourcing</h3>
                                    <p class="card-text">
                                        S-TEAM adhereS to strict
                                        purity standards and
                                        does not contain harsh or toxic
                                        ingredients
                                    </p>
                                </div>
                            </li>
                        </ul>
                    </div>
                </section>

                <section class="section blog" id="blog" aria-label="blog"
                    data-section>
                    <div class="container">
                        <h2 class="h2-large section-title">Featured</h2>
                        <ul class="flex-list">
                            <li class="flex-item">
                                <div class="blog-card">
                                    <figure
                                        class="card-banner img-holder has-before hover:shine"
                                        style="width: 100%; height: auto; display: block;">
                                        <video controls autoplay>
                                            <source src="images/issy-featured.mp4" type="video/mp4">
                                        </video>
                                    </figure>
                                </div>
                            </li>
                        </ul>
                    </div>
                </section>
            </article>
        </main>

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

        <script src="js/script.js" defer></script>

        <script
            type="module"
            src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
        <script
            nomodule
            src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    </body>
</html>