<?php
include 'models/db.php';

//取得したidからデータを取得する
$id = $_POST['id'];
$sql = "SELECT * FROM `post` WHERE id = $id";
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

    /*削除確認画面からの遷移かどうかチェック
    　POSTで渡った値が正しいかどうかを確認*/
    if(isset($_POST['mode']) && $_POST['mode'] === "deletecomplete"){
        /*入力値によって処理を切り分け
        nameがreturnの場合、削除せずに入力画面に強制遷移
        nameがdeleの場合、削除処理を実行*/
        if(isset($_POST['dele'])) {
            $link = mysql_connect('localhost','root','root');
            mysql_select_db('chiba');

            //削除するためのSQL文を作成
            $sql = "DELETE FROM `post` WHERE id = $id";
            if(!$res = mysql_query($sql)){
                echo "SQL実行時エラー";
                exit;
            }
            //保存する
            mysql_query($sql);

            session_destroy();

            header("Location: ./bbs.php");

        }elseif(isset($_POST['return'])) {
            /*submitボタンが「戻る」だった場合、登録フォームへ遷移*/
            header("Location: ./bbs.php");
        }
    }
mysql_close($link);
include 'views/delete_view.php';
?>