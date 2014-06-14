<?php
include 'models/db.php';
    /*確認画面からの遷移かどうかチェック
    　POSTで渡った値が正しいかどうかを確認*/
$id = $_SESSION['id'];
$name = $_SESSION['name'];
$comment = $_SESSION['comment'];

        if(isset($_POST['mode']) && $_POST['mode'] === "editcheckcomplete"){

            /*入力値によって処理を切り分け
            nameがreturnの場合、登録せずに入力画面に強制遷移
            nameがregistの場合、登録処理を実行*/
            if($_POST['regist']) {

                /*name値registが真の場合、
                登録情報のエスケープ処理を行って登録処理を実行*/

                //保存するためのSQL文を作成
                $sql = "UPDATE `post` SET `name` = '{$name}' , `comment` = '{$comment}' WHERE `id` = '{$id}'";
                // var_dump($sql);exit;
                //保存する
                mysql_query($sql, $link);

                mysql_close($link);

                $_SESSION = array();
                session_destroy();

                header("Location: ./bbs.php");

            }elseif(isset($_POST['return'])) {
                /*submitボタンが「戻る」だった場合、登録フォームへ遷移*/
                header("Location: ./edit.php");
            }else{
            /*hidden値が不正、もしくはsubmitボタンのname値が不正の場合、
            エラーメッセージを表示し、セッション情報を破棄*/
            print("不正なURLから呼び出された可能性があります");
            session_destroy();
            }
        }
include 'views/editcheck_view.php';
?>