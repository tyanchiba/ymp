<?php

//オブジェクト指向
/*
クラス：設計図
ーメンバー変数
ーメソッド（関数）
ーコンストラクタ

インスタンス：クラスを実体化したもの



*/

class User{
    public $name;
    private $email;

    public function __construct($name,$email) {
        $this->name = $name;
        $this->email = $email;
    }

    public function sayHi() {
        echo "hi! my name is ".$this->name;
    }
}

class SuperUser extends User{

    public function superSayHi() {
        echo "hiiiiiiiiiiiiii! my name is ".$this->name;
    }
}

$tom = new User("tom", "dummy@dummy.com");
$bob = new SuperUser("bob", "dummy@dummybob.com");

$bob->superSayHi();


/*
//セッション（サーバー側にデータを保存）

session_start();

$_SESSION['userName'] = "taguchi";

echo $_SESSION['userName'];

//データベースへの接続
//MySQL
//try{
//$link = new PDO('mysql:host=localhost;dbname=chiba','root','root');
//}catch(PDOException $e){
//    var_dump($e->getMessage());
//    exit;
//}
//処理
//$stmt = $link->prepare("update users set email = :email where name like :name");
//$stmt->execute(array(":email"=>"dummy","name"=>"n%"));

//$stmt = $link->prepare("delete from users where password = :password");
//$stmt->execute(array(":password"=>"p10"));

//echo $stmt->rowCount() . "records deleted";

//echo "done";
//処理
//$stmt = $link->prepare("insert into users (name,email,password) value (?,?,?)");
//$stmt->execute(array("n","e","p"));
/*
$stmt = $link->prepare("insert into users (name,email,password) values(:name,:email,:password)");
$stmt->bindParam(":name",$name);
$stmt->bindParam(":email",$email);
$stmt->bindParam(":password",$password);

$name = "n10";
$email = "e10";
$password = "p10";

$stmt->execute();

echo "done";
/*
$sql = "select * from users";
$stmt = $link->query($sql);
foreach ($stmt->fetchAll(PDO::FETCH_ASSOC) as $user){

}

echo $link->query("select count(*) from users")->fetchColumn() . "records found";

*/
//切断
$link = null;

