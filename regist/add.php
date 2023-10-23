<?php

session_start();
session_regenerate_id(true);

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    exit('can not get access');
}

$post = $_SESSION['regist'];

header('Location: result.php');