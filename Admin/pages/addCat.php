<?php
include "../../connection.php";
include ("../../middleware/adminMiddleware.php");

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- Material Icons -->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
        <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.14.0/build/css/alertify.min.css"/>
        <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.14.0/build/css/themes/bootstrap.min.css"/>
        <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.14.0/build/alertify.min.js"></script>
        <!-- Line Chart -->
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

        <link rel="stylesheet" href="../assets/css/addCat.css">

        <title> Admin Dashboard </title>

    </head>

    <body>

        <div class="container">
          <!-- Sidebar Section -->
          <aside>
            <div class="toggle">
              <!-- Text with Logo -->
              <div class="logo">
                <img src="../assets/img/logoBW.png" alt="small_logo">
                <h2> S-TEAM </h2>
              </div>
              <!-- Close Button -->
              <div class="close" id="close-btn">
                <span class="material-icons-round"> close </span>
              </div>
            </div>

            <div class="sidebar">
              <!-- Dashboard -->
              <a href="index.php" class="active">
                <span class="material-icons-round"> dashboard </span>
                <h3> Dashboard </h3>
              </a>

              <!-- Orders -->
              <a href="orders.php">
                <span class="material-icons-round"> local_mall </span>
                <h3> Orders </h3>
              </a>

              <!-- Inventory -->
              <a href="inventory.php">
                <span class="material-icons-round"> inventory_2 </span>
                <h3> Inventory </h3>
              </a>

              <!-- Customers -->
              <a href="customers.php">
                <span class="material-icons-round"> people </span>
                <h3> Customers </h3>
              </a>

              <!-- All Categories -->
              <a href="allCategories.php">
                <span class="material-icons-round"> ballot </span>
                <h3> All Categories </h3>
              </a>

              <!-- All Products -->
              <a href="allProducts.php">
                <span class="material-icons-round"> category </span>
                <h3> All Products </h3>
              </a>

              <!-- Divider -->
              <div class="divider"></div>

              <!-- Add Category -->
              <a href="addCat.php">
                <span class="material-icons-round"> post_add </span>
                <h3> Add Category </h3>
              </a>

              <!-- Add Product -->
              <a href="addProd.php">
                <span class="material-icons-round"> add_shopping_cart </span>
                <h3> Add Product </h3>
              </a>

              <!-- Logout -->
              <a href="#">
                <span class="material-icons-round"> logout </span>
                <h3> Logout </h3>
              </a>
            </div>

          </aside>
          <!-- End of Sidebar Section -->


          <!-- Main Content -->
          <main>
            <h1> Add Category </h1>

            <!-- Recent Orders Table -->
            <div class="recent-orders">
              <div class="-addCat-container">
                  <form action="code.php" name="form1" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                            <label for="category_name"style="padding-bottom: 10px;  font-weight: 600;">Category Name:</label>
                            <input type="text" name="name" class="form-control" id="category" placeholder="Insert Category">
                            <br><br>
                        
                            <label for="category_name" style="padding-top: 10px; font-weight: 600;">Slug:</label>
                            <input type="text" name="slug" class="form-control" placeholder=" Enter product slug">
                            <br><br>

                            <label for="category_name" style="padding-top: 10px; font-weight: 600;">Description:</label>
                            <textarea class="form-control" name="description" rows="3" placeholder='Enter description'></textarea>
                            <br><br>

                            <label for="category_name" style="font-weight: 600;">Upload Image:</label>
                            <input type="file" name="image" class="form-control" placeholder="Insert Image">

                            <br><br>
                            <label for="category_name">Meta Title</label>
                            <input type="text" name="meta_title" class="form-control" placeholder="Insert Meta Title">
                            <br><br>

                            <label for="category_name">Meta description</label>
                            <textarea name="meta_description" class="form-control" rows="3" placeholder='Enter Meta description'></textarea>
                            <br><br>

                            <label for="category_name">Meta keywords</label>
                            <input type="text" name="meta_keywords" class="form-control" placeholder="Insert Meta keywords">
                            <br><br>

                            <input type="checkbox" name="status" style="width: 20px;">
                            <label for="status" style="font-weight: 600;">Status</label>

                            <br>
                        
                            <input type="checkbox" name="popular" style="width: 20px; margin-top: 14px;">
                            <label for="popular" style="font-weight: 600;">Best Seller</label>
                    </div>

                    <br><br>

                    <div>
                        <button type="submit" name="add_category_btn" class="add-btn">Add</button>
                    </div>

                    <br><br>

                </form>
              </div>
            </div>
            <!-- End of Recent Orders -->

          </main>
          <!-- End of Main Content -->


          <!-- Right Section -->
          <div class="right-section">
            <div class="nav">
              <button id="menu-btn">
                <span class="material-icons-round">
                  menu
                </span>
              </button>

              <div class="profile">
                <div class="info">
                  <p> Hey, <b> HAGSHSDGA </b> </p>
                  <small class="text-muted"> Admin </small>
                </div>
                <div class="profile-photo">
                  <img src="../assets/img/prof1.jpg">
                </div>
              </div>

            </div>
            <!-- End of Nav -->
            
            <!-- Search Section -->
            <!-- <div class="search-container">
                <input type="text" placeholder="Search..." name="search" class="input" id="searchInput">
                <button type="button" id="searchButton" class="search-button">🔍</button>
            </div>   -->
            <!-- End of Search Section -->

            <!-- Reminders -->
            <div class="user-profile">
              <!-- Logo -->
              <div class="logo">
                <img src="../assets/img/logoBW.png">
                <h2> S-TEAM </h2>
                <p> E-commerse Website </p>
              </div>
            </div>


          </div>
          <!-- End of Right Section -->

        </div>

        <script>
    <?php if (isset($_SESSION['message'])) { ?>

     alertify.set('notifier','position', 'top-right');
      alertify.success('<?= $_SESSION['message']; ?>');

      <?php
        unset($_SESSION['message']);
    } ?>
        </script>
        <script src="../assets/js/dashboard.js"></script>
    </body>
</html>