<?php
// header.php
$page = substr($_SERVER['SCRIPT_NAME'], strrpos($_SERVER['SCRIPT_NAME'], '/') + 1);
?>
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.14.0/build/css/alertify.min.css"/>
<script src="jquery-3.7.1.min.js" defer></script>
<header class="header">
          <div class="header-top" data-header>
            <div class="container">
                <button class="nav-open-btn" aria-label="open menu"
                    data-nav-toggler>
                    <span class="line line-1"></span>
                    <span class="line line-2"></span>
                    <span class="line line-3"></span>
                </button>
                <a href="index.php" class="logo">
                    <img src="images/s-team.png" width="179" height="26"
                        alt="S-TEAM" />
                </a>
                <div class="header-actions">
                    <div class="input-wrapper">
                        <input
                            type="search"
                            name="search"
                            placeholder="Search product"
                            class="search-field" />
                        <button class="search-submit" aria-label="search" style="color: #D14D72;">
                            <ion-icon name="search-outline"
                                aria-hidden="true"></ion-icon>
                        </button>
                    </div>

                <?php
                if(isset($_SESSION['auth']))
                {
                    ?>
               <a href="custprofile.html">
               <button class="header-action-btn" aria-label="user">
                   <ion-icon 
                       name="person-outline"
                       aria-hidden="true"
                       aria-hidden="true"></ion-icon>
               </button>

               <?php
                }else{
                    ?>
                    <li><a href="register.php"><super>Login/Register</super></a></li>
                    <?php
                }

            ?>
                    </a>
                    <a href="SHOPPINGCART.php">
                    <button class="header-action-btn"
                        aria-label="cart item">
                        <ion-icon
                            name="bag-handle-outline"
                            aria-hidden="true"
                            aria-hidden="true"></ion-icon>
                    </button>
                    </a>
                </div>

                <nav class="navbar" style="background-color: #FFD1D1;">
                    <ul class="navbar-list">
                        <li>
                            <a href="shop-blk.html"
                                class="navbar-link has-after">BLK</a>
                        </li>
                        <li>
                            <a href="shop-careline.html"
                                class="navbar-link has-after">CARELINE</a>
                        </li>
                        <li>
                            <a href="shop-grwm.html"
                                class="navbar-link has-after">GRWM</a>
                        </li>
                        <li>
                            <a href="shop-issy.html"
                                class="navbar-link has-after">ISSY</a>
                        </li>
                        <li>
                            <a href="shop-vice.html"
                                class="navbar-link has-after">VICE</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </header>