<?php
include "../../connection.php";
include ("../../middleware/adminMiddleware.php");

// Handle new category submission
if(isset($_POST['submit'])) {
    $category_name = mysqli_real_escape_string($link, $_POST['category_name']);
    $query = "INSERT INTO categories (name) VALUES ('$category_name')";
    $result = mysqli_query($link, $query);
    if($result) {
        echo "<script>alert('Category added successfully!');</script>";
    } else {
        echo "<script>alert('Failed to add category');</script>";
    }
}

// Retrieve existing categories
$categories_query = "SELECT * FROM categories";
$categories_result = mysqli_query($link, $categories_query);
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

        <link rel="stylesheet" href="../assets/css/allCategories.css">

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
            <h1> All Categories </h1>

            <!-- Recent Orders Table -->
            <div class="recent-orders">
                <div class="col-lg-12">
                    <table class="table table-bordered" style="margin-bottom: 35px;">
                        <thead>
                            <tr>
                                <th>Category Id</th>
                                <th>Category Name</th>
                                <th>Status</th>
                                <th>Edit</th>
                                
                                <th>Delete</th>
                               
                            </tr>
                        </thead>
                        
        <tbody>
            <?php 
                $category = getAll("categories");

                if(mysqli_num_rows($category) > 0)
                {
                    foreach($category as $item)
                    {
                        ?>
                         <tr>
                            <td> <?= $item['id']; ?> </td>
                            <td> <?= $item['name']; ?> </td>
                            
                            <td>
                                <?= $item['status'] == '0'? "Visible":"Hidden" ?>
                            </td>
                            
                            <td>
                                <a href="editCat.php?id=<?= $item['id']; ?> " class="edit-btn">Edit</a>
                                
                            </td>
                            <td>
                            <form action="code.php" method="POST">
                                    <input type="hidden" name="category_id" value="<?= $item['id']; ?>">
                                    <button type="submit"name="delete_category_btn" class="delete-btn" style="width:60px; background-color:red;">Delete</button>
                                </form>
                            </td>
                        </tr>

                <?php
                    }
                }
                else
                {
                    echo "No Records Found";
                }
            ?>
            
        </tbody>
                    </table>
                </div>

          </main>
          <!-- End of Main Content -->

        </div>

        
        <script src="../assets/js/dashboard.js"></script>
    </body>
</html>