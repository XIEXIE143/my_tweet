<?php
//セッション開始
session_start();
session_regenerate_id(true);

// POSTリクエスト以外は処理しない
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    exit('can not get access');
}

// セッションから入力されたデータを取得
$post = $_SESSION['regist'];

// TODO: MySQLに保存

// 完了画面にリダイレクト
header('Location: result.php');