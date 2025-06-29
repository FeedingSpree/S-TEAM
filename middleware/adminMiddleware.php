<?php 

include ('../../functions/myfunctions.php');
// Check if the session variable for user authentication is not set or false
if(!isset($_SESSION['auth']) || $_SESSION['auth'] !== true){
    redirect("userLS.php", "You must log in to view this page");

}

// Check if the role of the user is not admin
if(isset($_SESSION['role_as']) && $_SESSION['role_as'] != 1){
    redirect('shop-all.php', 'Access denied! You are not authorized to view this page');
  
}
?>
