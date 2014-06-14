<?php
include 'models/db.php';
$errors = array();
//投稿された内容を取得するSQL文を作成して結果を取得
$sql = "SELECT * FROM `post` ORDER BY `created_at` DESC";
$result = mysql_query($sql,$link);
//取得した結果を$postsに格納
$posts = array();
if ($result != false && mysql_num_rows($result)){
    while ($post = mysql_fetch_assoc($result)){
        $posts[] = $post;
    }
}
//取得結果を開放して接続を閉じる
mysql_free_result($result);
mysql_close($link);

//POSTなら保存処理実行
if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    //名前が正しく入力されているかチェック
    $name = null;
    if (!isset($_POST['name']) || !mb_strlen($_POST['name'])){
        $errors['name'] = '名前を入力してください';
    }elseif (mb_strlen($_POST['name']) > 10){
        $errors['name'] = '名前は10文字以内で入力してください';
    }
    $_SESSION['name'] = $_POST['name'];

    //ひとことが正しく入力されているかチェック
    $comment = null;
    if (!isset($_POST['comment']) || !mb_strlen($_POST['comment'])){
        $errors['comment'] = 'ひとことを入力してください';
    }elseif (mb_strlen($_POST['comment']) > 10){
        $errors['comment'] = 'ひとことは10文字以内で入力してください';
    }
    $_SESSION['comment'] = $_POST['comment'];
    //エラーがなければセッション情報にデータを登録して確認画面へ遷移
    if (count($errors) === 0){
        header("Location: ./check.php");
        break;
    }
}
include 'views/bbs_view.php';
?>