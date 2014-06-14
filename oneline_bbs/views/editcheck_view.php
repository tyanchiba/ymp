<?php
include 'template/header.php';
?>
<body>
    <h1>確認画面</h1>

    <form action="edit_check.php" method="post">
        <h2>入力内容はこれでよろしいですか？OKの場合は、「登録する」ボタンを押して下さい。</h3>

        <table>
            <tr>
            <th>名前:</th>
            <td><?php print(htmlspecialchars($_SESSION['name'])); ?></td>
            </tr>

            <tr>
            <th>コメント:</th>
            <td><?php print(htmlspecialchars($_SESSION['comment'])); ?></td>
            </tr>
        </table>
        <input type="submit" name="return" value="戻る" />
        <input type="submit" name="regist" value="登録" />
        <input type="hidden" name="mode" value="editcheckcomplete">
        <input type="hidden" name="name" value="<?php isset($_SESSION['name']) ? print $_SESSION['name'] : ""; ?>"/>
        <input type="hidden" name="name" value="<?php isset($_SESSION['comment']) ? print $_SESSION['comment'] : ""; ?>"
        />
        <input type="hidden" name="name" value="<?php isset($_SESSION['id']) ? print $_SESSION['id'] : ""; ?>"
        />
    </form>
</body>
</html>