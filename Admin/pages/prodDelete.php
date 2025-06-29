<?php
    include "config.php";

    // Retrieve the product ID from the URL parameter
    $productId = isset($_GET["id"]) ? $_GET["id"] : null;

    // Check if the product ID is set and is a valid integer
    if (!isset($productId) || !is_numeric($productId)) {
        die("Invalid or missing ID parameter");
    }

    // Use prepared statement to prevent SQL injection
    $stmt = mysqli_prepare($link, "SELECT prodImage FROM product WHERE productId = ?");
    mysqli_stmt_bind_param($stmt, "i", $productId);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_store_result($stmt);

    // Check if the product exists
    if (mysqli_stmt_num_rows($stmt) > 0) {
        // Bind the result
        mysqli_stmt_bind_result($stmt, $imageFilename);
        mysqli_stmt_fetch($stmt);

        // Delete the product
        $deleteStmt = mysqli_prepare($link, "DELETE FROM product WHERE productId = ?");
        mysqli_stmt_bind_param($deleteStmt, "i", $productId);
        mysqli_stmt_execute($deleteStmt);

        // Check if the deletion was successful
        if ($deleteStmt) {
            // Define the path to the image file
            $path = "../prodPhotos/";

            // Construct the full path to the image file
            $imagePath = $path . $imageFilename;

            // Check if the image file exists
            if (file_exists($imagePath)) {
                // Attempt to delete the image file
                if (unlink($imagePath)) {
                    echo "Product and image deleted successfully: $imagePath";
                } else {
                    echo "Failed to delete image file: $imagePath";
                }
            } else {
                echo "Image file not found: $imagePath";
            }
        } else {
            echo "Failed to delete product";
        }
    } else {
        echo "Product not found";
    }

    // Close the prepared statements
    mysqli_stmt_close($stmt);
    mysqli_stmt_close($deleteStmt);

    // Redirect to the category management page
    header("Location: add-product.php");
    exit(); // Ensure script execution stops after redirection
?>