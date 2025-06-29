<?php
session_start();


function getAll($table){
    global $link;
    $query = "SELECT * FROM $table";
    $query_run = mysqli_query($link, $query);
    return $query_run;
}

function getById($table, $id){
    global $link;
    $query = "SELECT * FROM $table where id = '$id'";
    $query_run = mysqli_query($link, $query);
    return $query_run;
}

function getAllActive($table){
    global $link;
    $query = "SELECT * FROM $table where status = '0' ";
    $query_run = mysqli_query($link, $query);
    return $query_run;
}

function getIDActive($table, $id){
    global $link;
    $query = "SELECT * FROM $table where id = '$id' AND status ='0' ";
    $query_run = mysqli_query($link, $query);
    return $query_run;
}

function getProdByCategory($category_id)
{
    global $link;
    $query = "SELECT * FROM product where category_id = '$category_id' AND status ='0'";
    $query_run = mysqli_query($link, $query);
    return $query_run;
}

function getAllProducts()
{
    global $link;
    $query = "SELECT * FROM product where status ='0'";
    $query_run = mysqli_query($link, $query);
    return $query_run;
}

function getSlugActive($table, $slug){
    global $link;
    $query = "SELECT * FROM $table where slug = '$slug' AND status ='0' LIMIT 1";
    $query_run = mysqli_query($link, $query);
    return $query_run;
}

function redirect($url, $message)
{
    $_SESSION['message'] = $message;
    header("location: $url");
    exit();
}





?>