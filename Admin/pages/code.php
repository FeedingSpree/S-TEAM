<?php

include "../../connection.php";
include ("../../middleware/adminMiddleware.php");


if (isset($_POST['add_category_btn'])) {
    $name = $_POST['name'];
    $slug = $_POST['slug'];
    $description = $_POST['description'];
    $meta_title = $_POST['meta_title'];
    $meta_description = $_POST['meta_description'];
    $meta_keywords = $_POST['meta_keywords'];
    $status = isset($_POST['status']) ? '1' : '0';
    $popular = isset($_POST['popular']) ? '1' : '0';

    $image = $_FILES['image']['name'];

    $path = "../../uploads";

    $image_ext = pathinfo($image, PATHINFO_EXTENSION);
    $filename = time() . '.' . $image_ext;


    $cate_query = "INSERT INTO categories (name, slug, description, meta_title, meta_description, meta_keywords, status, popular, image) VALUES ('$name', '$slug', '$description', '$meta_title', '$meta_description', '$meta_keywords', '$status', '$popular', '$filename')";

    $cate_query_run = mysqli_query($link, $cate_query);

    if ($cate_query_run) {
        move_uploaded_file($_FILES['image']['tmp_name'], $path . '/' . $filename);
        redirect('addCat.php', 'Category Added Successfully');
    } else {
        redirect('addCat.php', 'Category Not Added');
    }
} else if (isset($_POST['update_category_btn'])) {
    $category_id = $_POST['category_id'];
    $name = $_POST['name'];
    $slug = $_POST['slug'];
    $description = $_POST['description'];
    $meta_title = $_POST['meta_title'];
    $meta_description = $_POST['meta_description'];
    $meta_keywords = $_POST['meta_keywords'];
    $status = isset($_POST['status']) ? '1' : '0';
    $popular = isset($_POST['popular']) ? '1' : '0';

    $new_image = $_FILES['image']['name'];
    $old_image = $_POST['old_image'];

    if ($new_image != "") {
        //$update_filename = $new_image;
        $image_ext = pathinfo($new_image, PATHINFO_EXTENSION);
        $update_filename = time() . '.' . $image_ext;
    } else {
        $update_filename = $old_image;
    }

    $update_query = "UPDATE categories SET name = '$name', slug = '$slug', description = '$description',
    meta_title = '$meta_title', meta_description = '$meta_description', meta_keywords = '$meta_keywords', 
    status = '$status', popular = '$popular', image = '$update_filename' WHERE id = '$category_id'";

    $update_query_run = mysqli_query($link, $update_query);

    if ($update_query_run) {
        if ($_FILES['image']['name'] != "") {
            move_uploaded_file($_FILES['image']['tmp_name'], "../../uploads" . '/' . $update_filename);

            if (file_exists("../../uploads" . '/' . $old_image)) {
                unlink("../../uploads" . '/' . $old_image);
            }
        }
        redirect("editCat.php?id=$category_id", "Category Updated Successfully");
    } else {
        redirect("editCat.php?id=$category_id", "Category Not Updated");
    }
} else if (isset($_POST['delete_category_btn'])) {
    $category_id = mysqli_real_escape_string($link, $_POST['category_id']);

    $category_query = "SELECT * FROM categories WHERE id = '$category_id'";
    $category_query_run = mysqli_query($link, $category_query);
    $category_data = mysqli_fetch_array($category_query_run);
    $image = $category_data['image'];

    $delete_query = "DELETE FROM categories WHERE id = '$category_id'";
    $delete_query_run = mysqli_query($link, $delete_query);

    if ($delete_query_run) {
        if (file_exists("../../uploads" . '/' . $image)) {
            unlink("../../uploads" . '/' . $image);
        }
        redirect("allCategories.php", "Category Deleted Successfully");
    } else {
        redirect("allCategories.php", "Category Not Deleted");
    }
} else if (isset($_POST['add_product_btn'])) {
    $category_id = $_POST['category_id'];
    $name = $_POST['name'];
    $slug = $_POST['slug'];
    $small_description = $_POST['small_description'];
    $description = $_POST['description'];
    $original_price = $_POST['original_price'];
    $selling_price = $_POST['selling_price'];
    $qty = $_POST['qty'];
    $meta_title = $_POST['meta_title'];
    $meta_description = $_POST['meta_description'];
    $meta_keywords = $_POST['meta_keywords'];
    $status = isset($_POST['status']) ? '1' : '0';
    $trending = isset($_POST['trending']) ? '1' : '0';

    $image = $_FILES['image']['name'];

    $path = "../../uploads";

    $image_ext = pathinfo($image, PATHINFO_EXTENSION);
    $filename = time() . '.' . $image_ext;

    if ($name != "" && $slug != "" && $description != "") {

        $product_query = "INSERT INTO product (category_id, name, slug, small_description, description, original_price, selling_price,
qty, meta_title, meta_description, meta_keywords, status, trending, image) VALUES 
('$category_id', '$name', '$slug', '$small_description', '$description', '$original_price', '$selling_price', '$qty', '$meta_title',
 '$meta_description', '$meta_keywords', '$status', '$trending', '$filename')";


        $product_query_run = mysqli_query($link, $product_query);

        if ($product_query_run) {
            move_uploaded_file($_FILES['image']['tmp_name'], $path. '/' . $filename);
            redirect('addProd.php', 'Product Added Successfully');
        } else {
            redirect('addProd.php', 'Something went wrong');
        }

    }else {
        redirect('addProd.php', 'All fields are required');
    }
} else if (isset($_POST['update_product_btn'])) {
    $product_id = $_POST['product_id'];
    $category_id = $_POST['category_id'];
    $name = $_POST['name'];
    $slug = $_POST['slug'];
    $small_description = $_POST['small_description'];
    $description = $_POST['description'];
    $original_price = $_POST['original_price'];
    $selling_price = $_POST['selling_price'];
    $qty = $_POST['qty'];
    $meta_title = $_POST['meta_title'];
    $meta_description = $_POST['meta_description'];
    $meta_keywords = $_POST['meta_keywords'];
    $status = isset($_POST['status']) ? '1' : '0';
    $trending = isset($_POST['trending']) ? '1' : '0';

    $path = "../../uploads";

    $new_image = $_FILES['image']['name'];
    $old_image = $_POST['old_image'];

    if ($new_image != "") {
        //$update_filename = $new_image;
        $image_ext = pathinfo($new_image, PATHINFO_EXTENSION);
        $update_filename = time() . '.' . $image_ext;
    } else {
        $update_filename = $old_image;
    }
    $update_product_query = "UPDATE product SET category_id = '$category_id', name = '$name', slug = '$slug',
     small_description = '$small_description', description = '$description', original_price = '$original_price',
      selling_price = '$selling_price', qty = '$qty', meta_title = '$meta_title', meta_description = '$meta_description',
       meta_keywords = '$meta_keywords', status = '$status', trending = '$trending', image = '$update_filename'
        WHERE id = '$product_id'";
    $update_product_query_run = mysqli_query($link, $update_product_query);
    if ($update_product_query_run) {
        if ($_FILES['image']['name'] != "") {
            move_uploaded_file($_FILES['image']['tmp_name'], "../../uploads" . '/' . $update_filename);

            if (file_exists("../../uploads" . '/' . $old_image)) {
                unlink("../../uploads" . '/' . $old_image);
            }
        }
        redirect("editProd.php?id=$product_id", "Product Updated Successfully");
    }else{
        redirect("editProd.php?id=$product_id", "Product Not Updated");
    }
} else if(isset($_POST['delete_product_btn'])){

    $product_id = mysqli_real_escape_string($link, $_POST['product_id']);

    $product_query = "SELECT * FROM product WHERE id = '$product_id'";
    $product_query_run = mysqli_query($link, $product_query);
    $product_data = mysqli_fetch_array($product_query_run);
    $image = $product_data['image'];

    $delete_query = "DELETE FROM product WHERE id = '$product_id'";
    $delete_query_run = mysqli_query($link, $delete_query);

    if ($delete_query_run) {
        if (file_exists("../../uploads" . '/' . $image)) {
            unlink("../../uploads" . '/' . $image);
        }
        echo 200;
       redirect("allProducts.php", "Product Deleted Successfully");
       
    } else {
       redirect("allProducts.php", "product Not Deleted");
        echo 500;
    }
}




/*
else if(isset($_POST['delete_product_btn'])){
    $product_id = mysqli_real_escape_string($link, $_POST['product_id']);

    $product_query = "SELECT * FROM product WHERE id = '$product_id'";
    $product_query_run = mysqli_query($link, $product_query);
    $product_data = mysqli_fetch_array($product_query_run);
    $image = $product_data['image'];

    $delete_query = "DELETE FROM product WHERE id = '$product_id'";
    $delete_query_run = mysqli_query($link, $delete_query);

    if ($delete_query_run) {
        if (file_exists("uploads" . '/' . $image)) {
            unlink("uploads" . '/' . $image);
        }
        redirect("products.php", "Product Deleted Successfully");
    } else {
        redirect("products.php", "Product Not Deleted");
    }
}
*/
else{
    redirect('index.php', 'Unauthorized Access');
}
?>

