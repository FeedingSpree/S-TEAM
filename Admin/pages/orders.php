<?php
include "../../connection.php";
include ("../../middleware/adminMiddleware.php");
include ('../../functions/userfunctions.php')
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- Material Icons -->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">

        <!-- Line Chart -->
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

        <link rel="stylesheet" href="../assets/css/customers.css">

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
            <h1> Order Management </h1>

            <!-- Recent Orders Table -->
            <div class="recent-orders">
              <table style="padding: 20px; margin-bottom: 35px;">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Tracking No</th>
                        <th>Total Price</th>
                        <th>Date</th>
                        
                    </tr>
                </thead>
                <tbody>
    <?php
    $orders = getOrders();
    if (mysqli_num_rows($orders) > 0) {
        while ($item = mysqli_fetch_assoc($orders)) {
            ?>
            <tr>
                <td class="center-text"><?= $item['id']; ?></td>
                <td class="center-text"><?= $item['tracking_no']; ?></td>
                <td class="center-text">₱<?= $item['total_price']; ?></td>
                <td width:100% class="center-text"><?= $item['created_at']; ?></td>
             
            </tr>
            <?php
        }
    } else {
        ?>
        <tr>
            <td colspan="5" class="center-text">No Orders Yet</td>
        </tr>
        <?php
    }
    ?>
    </tbody>
            </table>
              <!-- <a href="#"> Show All </a> -->
            </div>
            <!-- End of Recent Orders -->

            <!-- Line Graph -->
            <!-- <div class="card">
              <div class="card-content">
                  <div id="line-chart"></div>
              </div>
            </div> -->

          </main>
          <!-- End of Main Content -->


        </div>

        
        <script src="../assets/js/dashboard.js"></script>
    </body>
</html>