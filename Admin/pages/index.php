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

        <link rel="stylesheet" href="../assets/css/dashboard.css">

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
            <h1> Dashboard </h1>

            <!-- Graphs -->
            <div class="analyze">
              <!-- Sales -->
              <div class="sales">
                <div class="status">
                  <div class="info">
                    <h3> Today's Sales </h3>
                    <h1> ₱65,024 </h1>
                  </div>
                  <div class="progresss">
                    <svg>
                      <circle cx="38" cy="38" r="36"></circle>
                    </svg>
                    <div class="percentage">
                      <p> 81% </p>
                    </div>
                  </div>
                </div>
              </div>

              <!-- Delievered Orders -->
              <div class="dOrd">
                <div class="status">
                  <div class="info">
                    <h3> Delivered Orders </h3>
                    <h1> 10,100 </h1>
                  </div>
                  <div class="progresss">
                    <svg>
                      <circle cx="38" cy="38" r="36"></circle>
                    </svg>
                    <div class="percentage">
                      <p> 90% </p>
                    </div>
                  </div>
                </div>
              </div>

              <!-- Canceled orders -->
              <div class="cOrd">
                <div class="status">
                  <div class="info">
                    <h3> Canceled Orders </h3>
                    <h1> 1,500 </h1>
                  </div>
                  <div class="progresss">
                    <svg>
                      <circle cx="38" cy="38" r="36"></circle>
                    </svg>
                    <div class="percentage">
                      <p> 20% </p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- End of Graphs -->

            <!-- Bar Graph Section -->
            <!-- Chart container with black border -->
            <div class="chart-container">
              <canvas id="performanceChart" width="600" height="400"></canvas>
            </div>
            <!-- End of Bar Graph Section -->

            <!-- New Users Section -->
            <div class="new-users">
              <h2 style="margin-top: 30px;"> New Users </h2>
              <div class="user-list">
                <div class="user">
                  <img src="../assets/img/prof1.jpg" alt="">
                  <h2> Jack </h2>
                  <p> 54 Min Ago </p>
                </div>
                <div class="user">
                  <img src="../assets/img/prof2.jpg" alt="">
                  <h2> Jill </h2>
                  <p> 3 Hours Ago </p>
                </div>
                <div class="user">
                  <img src="../assets/img/prof3.jpg" alt="">
                  <h2> John </h2>
                  <p> 6 Hours Ago </p>
                </div>
                <div class="user">
                  <img src="../assets/img/prof4.jpg" alt="">
                  <h2> Jake </h2>
                  <p> 9 Hours Ago </p>
                </div>
                <div class="user">
                  <img src="../assets/img/prof5.jpg" alt="">
                  <h2> Jaspher </h2>
                  <p> 12 Hours Ago </p>
                </div>
                <div class="user">
                  <img src="../assets/img/plus.png" alt="">
                  <h2> More </h2>
                  <p> New User </p>
                </div>
              </div>
            </div>
            <!-- End of New Users Section -->
             

            <!-- Recent Orders Table -->
            <div class="recent-orders">
              <h2> Recent Orders </h2>
              <table>
                <thead>
                  <tr>
                    <th> Course Name </th>
                    <th> Course Number </th>
                    <th> Payment </th>
                    <th> Status </th>
                    <th></th>
                  </tr>
                </thead>
                <tbody></tbody>
              </table>
              <a href="orders.html"> Show All </a>
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
             
            <div class="user-profile">
              <!-- Logo -->
              <div class="logo">
                <img src="../assets/img/logoBW.png">
                <h2> S-TEAM </h2>
                <p> E-commerse Website </p>
              </div>
            </div>

            <!-- Reminders -->
            <div class="reminders">
              <div class="header">
                <h2> Reminders </h2>
                <span class="material-icons-round">
                  notifications_none
                </span>
              </div>

              <div class="notification">
                <div class="icon">
                  <span class="material-icons-round">
                    volume_up
                  </span>
                </div>
                <div class="content">
                  <div class="info">
                    <h3> Workshop </h3>
                    <small class="text_muted">
                      08:00 AM - 12:00 PM
                    </small>
                  </div>
                  <span class="material-icons-round">
                    more_vert
                  </span>
                </div>
              </div>

              <div class="notification deactive">
                <div class="icon">
                  <span class="material-icons-round">
                    edit
                  </span>
                </div>
                <div class="content">
                  <div class="info">
                    <h3> Workshop </h3>
                    <small class="text_muted">
                      08:00 AM - 12:00 PM
                    </small>
                  </div>
                  <span class="material-icons-round">
                    delete_outline
                  </span>
                </div>
              </div>

              <div class="notification add-reminder">
                <div>
                  <span class="material-icons-round">
                    add
                  </span>
                  <h3> Add Reminder </h3>
                </div>
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
        <script src="../assets/js/orders.js"></script>
        <script src="../assets/js/dashboard.js"></script>
    </body>
</html>