<?php
session_start();

//データベースに接続
$link = mysql_connect('localhost','root','root');
if (!$link){
    die('データベースに接続できません:'.mysql_error());
}

//データベースを選択する
mysql_select_db('chiba',$link);