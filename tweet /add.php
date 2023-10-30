<?php
require_once('../app.php');

// POSTリクエスト以外は処理しない
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    exit('can not get access');
}

//TODO: サニタイズ
//POSTデータを取得
$post = $_POST;

//Tweet画面（トップページ）にリダイレクト
header('Location: ../');
exit;