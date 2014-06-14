<?php
include 'template/header.php';
?>
<body>
    <h1>確認画面</h1>

    <form action="check.php" method="post">
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
        <input type="submit" name="regist" value="送信" />
        <input type="hidden" name="mode" value="registComplete">
    </form>
</body>
</html>