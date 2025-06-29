<?php
    include "config.php";

    // Retrieve the product ID from the URL parameter
    $productId = isset($_GET["id"]) ? $_GET["id"] : null;

    // Check if the product ID is set and is a valid integer
    if (!isset($productId) || !is_numeric($productId)) {
        die("Invalid or missing ID parameter");
    }

    // Use prepared statement to prevent SQL injection
    $stmt = mysqli_prepare($link, "DELETE FROM categories WHERE categoryId = ?");
    mysqli_stmt_bind_param($stmt, "i", $productId);
    mysqli_stmt_execute($stmt);

    // Check for query execution errors
    if (!$stmt) {
        die("Query failed: " . mysqli_error($link));
    }

    // Redirect to the category management page
    header("Location: add-category.php");
    exit(); // Ensure script execution stops after redirection
?>
