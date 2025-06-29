<?php

if(!isset($_SESSION['auth']))
{
    redirect("userLS.php", 'You are not authorized to view this page! Please login first');
}


?>