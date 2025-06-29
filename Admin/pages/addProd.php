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

        <link rel="stylesheet" href="../assets/css/addProd.css">

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
            <h1> Add Product </h1>

            <!-- Recent Orders Table -->
            <div class="recent-orders">
              <div class="-addCat-container">
                <form action="code.php" name="form1" method="post" enctype="multipart/form-data">

                    <div class="form-group">
                    <label for="">Select Category</label>
                      <select class="form-control" name="category_id" id="">
                        
                      <option selected>-Select Category-</option>
                      <?php
                      $categories = getAll("categories");

                      if(mysqli_num_rows($categories) > 0)
                      {
                          foreach($categories as $item){
                          ?>
                              <option value="<?= $item['id']; ?>"><?= $item['name']; ?></option>
                          <?php
                      }
                  } else{
                      echo "No Category Available";
                  }
                      ?>
                      
              
                      </select>

                            <div class="form-group row">
                            <div class="col">
                                </div>

                                <div class="col">
                              
                                    <label for="">Product Name:</label>
                                    <input type="text" required name="name" class="form-control" placeholder="Insert Product Name">
                                </div>

                                <div class="col">
                                <label for="">Original Price:</label>
                                <input type="text" required name="original_price" class="form-control" placeholder="Insert Original Price">

                                    <label for="">Selling Price:</label>
                                    <input type="text" class="form-control" required name="selling_price" class="input" placeholder="Insert Selling Price">
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col">
                                    <label for="">Quantity:</label>
                                    <input type="number" required name="qty" class="form-control" placeholder="Insert Quantity">
                                </div>

                                <div class="col">
                                    <label for="">Slug:</label>
                                    <input type="text" required name="slug" class="form-control" placeholder="Insert Slug">
                                </div>
                        
                                <div class="col">
                                    <label for="">Upload Image:</label>
                                    <input type="file" name="image" required class="form-control" placeholder="Insert Image">
                                </div>
                            </div>
                        <br>
                        <label for="">Meta Title</label>
                        <input type="text" name="meta_title" required class="form-control" placeholder="Insert Meta Title">

                        <label for="">Meta description</label>
                        <textarea name="meta_description" rows="3"class="form-control" required placeholder='Enter Meta description'></textarea>

                        <label for="">Meta keywords</label>
                         <input type="text" name="meta_keywords" required class="form-control" placeholder="Insert Meta keywords">
                            <!-- reco: less spacing; for url -->
                            <br>
                            <label for="">Official Description:</label>
                            <textarea name="small_description" class="form-control" required rows="3" placeholder='Enter small description'></textarea>

                            <label for="">Description:</label>
                            <textarea name="description" rows="3" class="form-control" placeholder='Enter description' style="font-family: 'Poppins', sans-serif;"></textarea>
            
                            <input type="checkbox" name="status" style="width: 20px;">
                            <label for="status">Status</label>

                            <br>
                        
                            <input type="checkbox" name="trending" style="width: 20px; margin-top: 10px;">
                            <label for="featured">Featured</label>
                    </div>

                    <br><br>

                    <div style="text-align: center;">
                        <button type="submit" name="add_product_btn" class="add-btn">Add</button>
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