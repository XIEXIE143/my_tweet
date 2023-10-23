<?php

session_start();
session_regenerate_id(true);

$post = $_SESSION['regist'];

header('Location: result.php');