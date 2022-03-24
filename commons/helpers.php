<?php
const BASE_URL = "http://localhost/web16305-php2/asm1/";
function checkSessionUser(){
    if (!isset($_SESSION['user'])) {
        header("location:".BASE_URL."index.php");
        die;
    }
}
function checkSessionAdmin(){
    if (!isset($_SESSION['admin'])) {
        header("location:".BASE_URL."index.php");
        die;
    }
}
function checkSessionNoIsset()
{
    if (!isset($_SESSION['admin']) && !isset($_SESSION['user'])) {
        header("location:".BASE_URL);
        die;
    }
}
function checkSessionIsset(){
    if (isset($_SESSION['admin']) || isset($_SESSION['user'])) {
        header("location:".BASE_URL."mon-hoc");
        die;
    }
}
?>