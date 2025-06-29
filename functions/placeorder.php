<?php 

require __DIR__ . "../../vendor/autoload.php";

include '../connection.php';
require 'userfunctions.php';
if(isset($_SESSION['auth']))
{

    if(isset($_POST['placeOrderBtn']))
    {
        $name = mysqli_real_escape_string($link, $_POST['name']);
        $email = mysqli_real_escape_string($link, $_POST['email']);
        $phone = mysqli_real_escape_string($link, $_POST['phone']);
        $pincode = mysqli_real_escape_string($link, $_POST['pincode']);
        $address = mysqli_real_escape_string($link, $_POST['address']);
        $payment_mode = mysqli_real_escape_string($link, $_POST['payment_mode']);
        $payment_id = '1';
        //$payment_id = mysqli_real_escape_string($link, $_POST['payment_id']);
        if($name =="" || $email == "" || $phone == "" || $pincode == "" || $address == "")
        {
            $_SESSION['message'] = "All Fields are required!";
            header("location: ../checkout2.php");
            exit(0);
        }
        


        $user_id = $_SESSION['auth_user']['user_id']; 
        $query = "SELECT c.id as cid, c.prod_id, c.prod_qty, p.id as pid, p.name, p.image, p.selling_price
              FROM carts c JOIN product p ON c.prod_id = p.id
              WHERE c.user_id = '$user_id'
              ORDER BY c.id DESC";
        $query_run = mysqli_query($link, $query);

        $totalPrice = 0;
            foreach ($query_run as $citem) {
            $totalPrice += $citem['selling_price'] * $citem['prod_qty'];
            }
        echo $totalPrice;
        $tracking_no = "steam".rand(1111,9999).substr($phone,2);

       $insert_query = "INSERT INTO orders (tracking_no, user_id, name, email, phone, address, pincode, total_price,payment_mode, payment_id) VALUES ('$tracking_no','$user_id','$name','$email','$phone','$address','$pincode','$totalPrice','$payment_mode','$payment_id' )";
       $insert_query_run = mysqli_query($link, $insert_query);

         if($insert_query_run)
         {
            $order_id = mysqli_insert_id($link);
            foreach($query_run as $citem)
            {
                $prod_id = $citem['prod_id'];
                $prod_qty = $citem['prod_qty'];
                $price = $citem['selling_price'];
                $insert_items_query = "INSERT INTO order_items (order_id, prod_id, qty, price) VALUES
                ('$order_id','$prod_id','$prod_qty','$price')";
                $insert_items_query_run = mysqli_query($link, $insert_items_query);

                $product_query = "SELECT * FROM product WHERE id = '$prod_id' LIMIT 1";
                $product_query_run = mysqli_query($link, $product_query);
               

                $product_data = mysqli_fetch_array($product_query_run);
                $current_qty = $product_data['qty'];

                $new_qty = $current_qty - $prod_qty;

                $updateQty_query = "UPDATE product SET qty ='$new_qty' WHERE id = '$prod_id'";
                $updateQty_query_run = mysqli_query($link, $updateQty_query);
            }
   
            $deleteCart_query = "DELETE FROM carts WHERE user_id = '$user_id'";
            $deleteCart_query_run = mysqli_query($link, $deleteCart_query);
        
         $_SESSION['message'] = "Order Placed Successfully!";
         header('Location: ../my-orders.php');
         die();
        }
    }

    if (isset($_POST['stripebtn'])) {
        $name = mysqli_real_escape_string($link, $_POST['name']);
        $email = mysqli_real_escape_string($link, $_POST['email']);
        $phone = mysqli_real_escape_string($link, $_POST['phone']);
        $pincode = mysqli_real_escape_string($link, $_POST['pincode']);
        $address = mysqli_real_escape_string($link, $_POST['address']);
    
        if ($name == "" || $email == "" || $phone == "" || $pincode == "" || $address == "") {
            $_SESSION['message'] = "All Fields are required!";
            header("location: ../checkout2.php");
            exit(0);
        }
    
        $user_id = $_SESSION['auth_user']['user_id'];
        $query = "SELECT c.id as cid, c.prod_id, c.prod_qty, p.id as pid, p.name, p.image, p.selling_price
                  FROM carts c JOIN product p ON c.prod_id = p.id
                  WHERE c.user_id = '$user_id'
                  ORDER BY c.id DESC";
        $query_run = mysqli_query($link, $query);
    
        $totalPrice = 0;
        $line_items = []; // Array to hold Stripe line items
    
        foreach ($query_run as $citem) {
            $totalPrice += $citem['selling_price'] * $citem['prod_qty'];
            $line_items[] = [
                "quantity" => $citem['prod_qty'],
                "price_data" => [
                    "currency" => "php",
                    "unit_amount" => $citem['selling_price'] * 100, // Convert to cents
                    "product_data" => [
                        "name" => $citem['name']
                    ]
                ]
            ];
        }
    
        $stripe_secret_key = "sk_test_51QRA94CTcDuhVo1r2INxKuxNZVaiGv2VgBRjHwnyGyllJMCg9FBMtPUwhr27VWe3mpnkob4DL5x0jrZMgnns6Egl000OSGYlni";
        \Stripe\Stripe::setApiKey($stripe_secret_key);
    
        // Generate tracking number
        $tracking_no = "steam" . rand(1111, 9999) . substr($phone, 2);
    
        // Create Stripe Checkout Session
        $checkout_session = \Stripe\Checkout\Session::create([
            "mode" => "payment",
            "success_url" => "https://d0db-152-32-99-95.ngrok-free.app/S-TEAM/success.php?session_id={CHECKOUT_SESSION_ID}", // Redirect after success change for webhost
            "cancel_url" => "https://d0db-152-32-99-95.ngrok-free.app/S-TEAM/checkout2.php", // Redirect after failure change for webhost
            "line_items" => $line_items,
        ]);
    
        // Save order to the database temporarily (or flag as pending)
        $insert_query = "INSERT INTO orders (tracking_no, user_id, name, email, phone, address, pincode, total_price, payment_mode) 
                         VALUES ('$tracking_no', '$user_id', '$name', '$email', '$phone', '$address', '$pincode', '$totalPrice', 'Stripe')";
        mysqli_query($link, $insert_query);
    
        http_response_code(303);
        header("Location: " . $checkout_session->url);
    }
    
}



else
{
    header('Location: ../register.php');
}
?>