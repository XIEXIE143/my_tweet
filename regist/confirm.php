<?php
// POSTリクエスト以外は処理しない
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    exit('can not get access');
}
// POSTリクエストされたデータを取得
$post = $_POST;

// バリデーション
$errors = validate($post);

// エラーだったら、入力画面にリダイレクト
if ($errors) {
    header('Location: input.php');
    exit;
}

//デバッグ関数で確認
// var_dump($post);

function validate($data) {
    $errors = [];
    if (empty($data['name'])) {
        $errors['name'] = "Nameが入力されていません";
    }
    if (empty($data['email'])) {
        $errors['email'] = "Emailが入力されていません";
    }
    if (empty($data['password'])) {
        $errors['password'] = "Passwordが入力されていません";
    }
    return $errors;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Tweet</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <main id="id" class="d-flex justify-content-center">
        <div class="w-50 mt-3 p-5 bg-light">
            <h2 class="h2 mb-3 fw-normal text-center">Regist</h2>
            <p>この内容で登録しますか？</p>
            <form action="" method="post">
                <div class="mb-2">
                    <label for="" class="form-label">Name</label>
                    <!-- PHPの変数を表示 -->
                    <?= $post['name'] ?>
                </div>
                <div class="mb-2">
                    <label for="" class="form-label">Email</label>
                    <?= $post['email'] ?>
                </div>
                <div>
                    <button class="w-100 mb-2 btn btn-primary">Regist</button>
                    <a href="input.php" class="w-100 btn btn-outline-primary">Back</a>
                </div>
            </form>
        </div>
    </main>
</body>
</html>