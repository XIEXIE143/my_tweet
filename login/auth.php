<?php
// TODO: MySQLから email でユーザ取得
// TODO: パスワードチェック
$auth_user['id'] = 1;
$auth_user['name'] = 'YSE';
$auth_user['email'] = 'test@test.com';

if (!empty($auth_user)) {
    //成功したら、Tweet画面にリダイレクト
    header('Location: ../');
    exit;
} else {
    //失敗したら、ログイン入力画面にリダイレクト
    header('Location: ./');
    exit;
}
?>