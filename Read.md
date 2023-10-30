<?php
//初期設定読み込み
require_once('app.php');

// ログインユーザチェック
$auth_user = $_SESSION['auth_user'];
if (empty($auth_user)) {
    //ユーザがいなかったらログイン画面にリダイレクト
    header('Location: login/');
    exit;
}

//Tweet投稿一覧を取得
$tweet = new Tweet();
$tweets = $tweet->get();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tweet</title>
    <!-- Bootstrap5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/default.css">
</head>

<body>

    <div class="container-fluid">
        <div class="row">
            <header class="col-md-3">
                <nav id="side-menu">
                    <ul>
                        <li>
                            <img src="svg/home.svg">
                            <a href="">Home</a>
                        </li>
                        <li>
                            <img src="svg/profile.svg">
                            <a href="">Profile</a>
                        </li>
                        <li>
                            <a href="user/logout.php">Sign out</a>
                        </li>
                    </ul>
                </nav>
            </header>

            <main class="col-md-9">
                <h2>Home</h2>

                <div class="row">
                    <!-- Tweet投稿フォーム -->
                    <form action="tweet/add.php" method="post">
                        <textarea required name="message" class="form-control" placeholder="いまどうしてる？"></textarea>
                        <div class="mt-3 mb-3 text-center">
                            <button class="btn btn-primary rounded-pill w-25">Tweet</button>
                        </div>
                    </form>
                </div>

                <div class="row">
                    <!-- Tweetの繰り返し表示 -->
                    <?php foreach($tweets as $value): ?>
                    <div class="tweet d-flex">
                        <!-- profile image -->
                        <div class="profile-image">
                            <img src="images/me.png">
                        </div>
                        <!-- tweet body -->
                        <div class="tweet-body">
                            <!-- user info -->
                            <div class="tweet-user">
                                <span class="fw-bold">@<?= $value['user_name'] ?></span>
                                <span class="ms-1 text-secondary"><?= date('Y/m/d H:i', strtotime($value['created_at'])) ?></span>
                            </div>

                            <!-- post -->
                            <div class="tweet-text mt-2 mb-2">
                                <?= nl2br($value['message']) ?>
                            </div>

                            <!-- tweet nav -->
                            <nav class="tweet-nav">
                                <ul class="d-flex">
                                    <li>
                                        <a href="#">
                                            <img src="svg/bubble.svg" alt="">
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <img src="svg/heart.svg" alt="">
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <img src="svg/loop.svg" alt="">
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <img src="svg/trash.svg" alt="">
                                        </a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                    <?php endforeach ?>
                </div>

            </main>

        </div>
    </div>

</body>

</html>