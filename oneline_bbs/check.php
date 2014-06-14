<?php
include 'models/db.php';
    /*確認画面からの遷移かどうかチェック
    　POSTで渡った値が正しいかどうかを確認*/
        if(isset($_POST['mode']) && $_POST['mode'] === "registComplete"){

            /*入力値によって処理を切り分け
            nameがreturnの場合、登録せずに入力画面に強制遷移
            nameがregistの場合、登録処理を実行*/
            if($_POST['regist']) {
                /*name値registが真の場合、
                登録情報のエスケープ処理を行って登録処理を実行*/
                $link = mysql_connect('localhost','root','root');
                mysql_select_db('chiba');

                //保存するためのSQL文を作成
                $sql = "INSERT INTO `post`(`name`,`comment`,`created_at`) VALUES ('"
                    . mysql_real_escape_string($_SESSION['name']) . "','"
                    . mysql_real_escape_string($_SESSION['comment']) . "','"
                    . date('Y-m-d H:i:s') . "')";

                //保存する
                mysql_query($sql);

                mysql_close($link);

                session_destroy();

                header("Location: ./bbs.php");

            }elseif($_POST['return']){
                /*submitボタンが「戻る」だった場合、登録フォームへ遷移*/

                $_SESSION = array();
                session_destroy();
                header("Location: ./bbs.php");
            }else{
            /*hidden値が不正、もしくはsubmitボタンのname値が不正の場合、
            エラーメッセージを表示し、セッション情報を破棄*/
            print("不正なURLから呼び出された可能性があります");
            session_destroy();
            }
        }
include 'views/check_view.php';
?>