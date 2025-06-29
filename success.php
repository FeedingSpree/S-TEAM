<?php
require __DIR__ . "/vendor/autoload.php";
include 'connection.php';

$stripe_secret_key = "sk_test_51QRA94CTcDuhVo1r2INxKuxNZVaiGv2VgBRjHwnyGyllJMCg9FBMtPUwhr27VWe3mpnkob4DL5x0jrZMgnns6Egl000OSGYlni";
\Stripe\Stripe::setApiKey($stripe_secret_key);

if (isset($_GET['session_id'])) {
    $session_id = $_GET['session_id'];
    $session = \Stripe\Checkout\Session::retrieve($session_id);

    if ($session->payment_status == 'paid') {
        // Retrieve user_id or other info from session metadata
        $user_id = $_SESSION['auth_user']['user_id'];
        $order_id = mysqli_insert_id($link); // Retrieve last inserted order ID

        // Update order with payment confirmation
        $update_order_query = "UPDATE orders SET payment_id = '$session_id' WHERE id = '$order_id'";
        mysqli_query($link, $update_order_query);

        // Clear user's cart
        $deleteCart_query = "DELETE FROM carts WHERE user_id = '$user_id'";
        $deleteCart_query_run = mysqli_query($link, $deleteCart_query);

        $_SESSION['message'] = "Payment successful! Order placed.";
        header("Location: my-orders.php");
    } else {
        $_SESSION['message'] = "Payment failed. Please try again.";
        header("Location: checkout2.php");
    }
}
