<?php
include 'models/db.php';

$errors = array();

if(isset($_POST['mode']) && $_POST['mode'] === "editcheck"){
    //取得したidからデータを取得する
    $id = $_POST['id'];
    $sql = "SELECT * FROM `post` WHERE id = $id";
    $result = mysql_query($sql,$link);

    //取得した結果を$postsに格納
    $posts = array();
    if ($result != false && mysql_num_rows($result)){
        while ($post = mysql_fetch_assoc($result)){
            $_SESSION = $post;
        }
    }
    // var_dump($_SESSION);exit;
//取得結果を開放して接続を閉じる
mysql_free_result($result);
}

    if(isset($_POST['mode']) && $_POST['mode'] === "editcheck_submit"){

        if(isset($_POST['edit_submit'])) {
            $name = null;
            if (!isset($_POST['name']) || !mb_strlen($_POST['name'])){
                $errors['name'] = '名前を入力してください';
            }elseif (mb_strlen($_POST['name']) > 20){
                $errors['name'] = '名前は20文字以内で入力してください';
            }
            $_SESSION['name'] = $_POST['name'];

            //ひとことが正しく入力されているかチェック
            $comment = null;
            if (!isset($_POST['comment']) || !mb_strlen($_POST['comment'])){
                $errors['comment'] = 'ひとことを入力してください';
            }elseif (mb_strlen($_POST['comment']) > 20){
                $errors['comment'] = 'ひとことは20文字以内で入力してください';
            }
            $_SESSION['comment'] = $_POST['comment'];
            //エラーがなければセッション情報にデータを登録して確認画面へ遷移
            if (count($errors) === 0){
                $_SESSION['id'] = $_POST['id'];
                header("Location: ./edit_check.php");
                break;
            }
        }elseif(isset($_POST['return'])) {
            /*submitボタンが「戻る」だった場合、登録フォームへ遷移*/
            session_destroy();
            header("Location: ./bbs.php");
        }
    }
mysql_close($link);
include 'views/edit_view.php';
?>