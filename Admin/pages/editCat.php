<?php
include "../../connection.php";
include ("../../middleware/adminMiddleware.php");

if(isset($_GET['id'])) {
    $id = $_GET['id'];
    $category = getById('categories', $id);

    if(mysqli_num_rows($category) > 0) {
        $data = mysqli_fetch_array($category);
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

    <link rel="stylesheet" href="../assets/css/addCat.css">

    <title>Admin Dashboard</title>
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

    <!-- Main Content -->
    <main>
        <h1>Edit Category</h1>
        <div class="recent-orders">
            <div class="-addCat-container">
                <form method="post" action="code.php" enctype="multipart/form-data">
                    <input type="hidden" name="category_id" value="<?= $data['id'] ?>">

                    <div class="form-group">
                        <label for="category_name">Category Name:</label>
                        <input type="text" name="name" class="form-control" placeholder="Insert Category" value="<?= $data['name'] ?>">
                    </div>

                    <div class="form-group">
                        <label for="slug">Slug:</label>
                        <input type="text" name="slug" class="form-control" placeholder="Insert Slug" value="<?= $data['slug'] ?>">
                    </div>

                    <div class="form-group">
                        <label for="description">Description:</label>
                        <textarea name="description" class="form-control" rows="3" placeholder="Enter description"><?= $data['description'] ?></textarea>
                    </div>

                    <div class="form-group">
                        <label for="image">Upload Image:</label>
                        <input type="file" name="image" class="form-control">
                        <img src="uploads/<?= $data['image'] ?>" alt="" style="max-height: 100px; max-width: 200px;">
                        <input type="hidden" name="old_image" value="<?= $data['image'] ?>">
                    </div>

                    <div class="form-group">
                        <label for="meta_title">Meta Title:</label>
                        <input type="text" name="meta_title" class="form-control" placeholder="Insert Meta Title" value="<?= $data['meta_title'] ?>">
                    </div>

                    <div class="form-group">
                        <label for="meta_description">Meta Description:</label>
                        <textarea name="meta_description" class="form-control" rows="3" placeholder="Enter Meta Description"><?= $data['meta_description'] ?></textarea>
                    </div>

                    <div class="form-group">
                        <label for="meta_keywords">Meta Keywords:</label>
                        <textarea name="meta_keywords" class="form-control" rows="3" placeholder="Enter Meta Keywords"><?= $data['meta_keywords'] ?></textarea>
                    </div>

                    <div class="form-group">
                        <label>Status:</label>
                        <input type="checkbox" name="status" <?= $data['status'] ? "checked" : "" ?>>
                        <label>Popular:</label>
                        <input type="checkbox" name="popular" <?= $data['popular'] ? "checked" : "" ?>>
                    </div>

                    <div>
                        <button type="submit" name="update_category_btn" class="add-btn">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </main>
</div>

<script src="../assets/js/dashboard.js"></script>
</body>
</html>

<?php
    } else {
        echo "Category not found";
    }
} else {
    echo "Id missing from URL";
}
?>


          <!-- Right Section -->
        
          <!-- End of Right Section -->

        </div>

        
        <script src="../assets/js/dashboard.js"></script>
    </body>
</html>