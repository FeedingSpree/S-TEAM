<?php
session_start();
function getCartItems() {
    global $link;
    $user_id = $_SESSION['auth_user']['user_id']; 
    $query = "SELECT c.id as cid, c.prod_id, c.prod_qty, p.id as pid, p.name, p.image, p.selling_price
              FROM carts c JOIN product p ON c.prod_id = p.id
              WHERE c.user_id = '$user_id'
              ORDER BY c.id DESC";

    $query_run = mysqli_query($link, $query);

    if ($query_run) {
        $items = mysqli_fetch_all($query_run, MYSQLI_ASSOC);
        return $items;
    } else {
        // Optionally, handle the error, e.g., log it or display a message
        error_log('SQL error: ' . mysqli_error($link));
        return []; // Return an empty array if the query fails
    }
}


function getOrders(){
    global $link;
    $user_id = $_SESSION['auth_user']['user_id']; 
    $query = "SELECT * FROM orders WHERE user_id = '$user_id' ORDER BY id DESC";
    return $query_run = mysqli_query($link, $query);
}


function checkTrackingNoValid($trackingNo)
{
    global $link;
    $userId = $_SESSION['auth_user']['user_id'];
    $query = "SELECT * FROM orders WHERE tracking_no = '$trackingNo' AND user_id = '$userId'";
    return mysqli_query($link, $query);
}
?>