<?php
session_start();
require "../vendor/autoload.php";
include('../connection.php');
function redirect($url, $message = null)
{
    if ($message) {
        $_SESSION['message'] = $message;
    }
    header("Location: $url");
    exit();
}


$client = new Google\Client;

$client ->setClientId("384471289558-294t74epe697kh7o4e4mfssjq6givgog.apps.googleusercontent.com");
$client->setClientSecret("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");
$client->setRedirectUri("https://d0db-152-32-99-95.ngrok-free.app//S-TEAM/functions/authcode.php");
$client->addScope("email");
$client->addScope("profile");

if (isset($_GET['code'])) {
    $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
    if (!isset($token['error'])) {
        $client->setAccessToken($token['access_token']);
        $google_service = new Google\Service\Oauth2($client);
        $google_account_info = $google_service->userinfo->get();

        $google_id = mysqli_real_escape_string($link, $google_account_info->id);
        $name = mysqli_real_escape_string($link, $google_account_info->name);
        $email = mysqli_real_escape_string($link, $google_account_info->email);

        // Check if the user already exists
        $check_user_query = "SELECT * FROM users WHERE email = '$email'";
        $check_user_result = mysqli_query($link, $check_user_query);

        if (mysqli_num_rows($check_user_result) > 0) {
            // User exists, log them in
            $userdata = mysqli_fetch_array($check_user_result);
            $_SESSION['auth'] = true;
            $_SESSION['auth_user'] = [
                'user_id' => $userdata['id'],
                'name' => $userdata['name'],
                'email' => $userdata['email'],
            ];
            $_SESSION['role_as'] = $userdata['role_as'];
            redirect("../index.php", "You are logged in!");
        } else {
            // User doesn't exist, create a new user
            $insert_query = "INSERT INTO users(name, email, google_id) VALUES('$name', '$email', '$google_id')";
            $insert_query_run = mysqli_query($link, $insert_query);

            if ($insert_query_run) {
                $_SESSION['auth'] = true;
                $_SESSION['auth_user'] = [
                    'user_id' => mysqli_insert_id($link),
                    'name' => $name,
                    'email' => $email,
                ];
                $_SESSION['role_as'] = 0; // Default role
                redirect("../index.php", "Account created and logged in successfully!");
            } else {
                redirect("../userLS.php", "Failed to create account!");
            }
        }
    }
} 

else if(isset($_POST['register_btn'])) //will listen to a register button
{
    $name = mysqli_real_escape_string($link, $_POST['name']);
    $email = mysqli_real_escape_string($link, $_POST['email']);
    $phone = mysqli_real_escape_string($link, $_POST['phone']);
    $password = mysqli_real_escape_string($link, $_POST['password']);
    $cpassword = mysqli_real_escape_string($link, $_POST['cpassword']);
    
    $insert_query_run = mysqli_query($link, $insert_query);
    if (!$insert_query_run) {
        error_log('Query failed: ' . mysqli_error($link));
        // Handle error accordingly
    }
    //check if email already exists
    $check_email_query = "SELECT email FROM users WHERE email = '$email'";
    $check_email_query_run = mysqli_query($link, $check_email_query);

    if(mysqli_num_rows($check_email_query_run) > 0)
    {
        redirect("../register.php", "Email already exists!");
    }
    else
    {
    if($password == $cpassword)
    {
        $insert_query = "INSERT INTO users(name, email, password, phone) VALUES('$name', '$email', '$password', '$phone')";
        $insert_query_run = mysqli_query($link, $insert_query);
        //checking whether the query is executed or not
        if($insert_query_run)
        {
            redirect("../register.php", "Registration successful!");
           
        }
        else
        {
            redirect("../register.php", "Registration failed!");
        }
    
    }
    else
    {
        redirect("../register.php", "The two passwords do not match!");

    }
}
}

else if(isset($_POST['login_btn'])) //will be assigned to a button to listen to
{
    $email = mysqli_real_escape_string($link, $_POST['email']);
    $password = mysqli_real_escape_string($link, $_POST['password']);
    $login_query = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
    $login_query_run = mysqli_query($link, $login_query);






    
    if(mysqli_num_rows($login_query_run) > 0) 
    {
        $_SESSION['auth'] = true;

        
        $userdata = mysqli_fetch_array($login_query_run);
        $userid = $userdata['id'];
        $username = $userdata['name'];
        $useremail = $userdata['email'];
        $role_as = $userdata['role_as'];
        $_SESSION['auth_user'] = [
            'user_id'=> $userid,
            'name' => $username,
            'email' => $useremail,
        ];


        $_SESSION['role_as'] = $role_as; //Role Check

        if($role_as == 1){
            redirect("../Admin/pages/index.php", "Welcome to the Dashboard");
        
        } else{
            redirect("../index.php", "You are logged in as a user");
        }

    }
    else
    {
        redirect("../userLS.php", "Invalid email or password!");
    }
}


else {
    redirect("../userLS.php", "Failed to authenticate with Google!");
}




?>