<?php
include 'models/db.php';

//エラーメッセージを格納する変数を初期化
$error_message = "";
//ログインボタンが押されたか判定_
//初めてのアクセスでは承認は行わずエラーメッセージは表示しない
if (isset($_POST['login'])) {
    if ($_POST['userid'] === "php" && $_POST['password'] === "password") {
        $_SESSION['USERID'] = $_POST['userid'];
       header("Location: ./bbs.php");
       break;
    }
    else{
        $error_message = "ユーザーIDまたはパスワードに誤りがあります。";
        // var_dump($viewUserId);exit;
        // $viewUserId = isset($_POST['userid']);
    }
}
include 'views/login_view.php';
?>