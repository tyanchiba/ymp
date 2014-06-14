<?php
include 'template/header.php';
?>
<body>
    <h1>削除確認画面</h1>

    <form action="delete.php" method="post">
        <h2>削除しますか？OKの場合は、「削除する」ボタンを押して下さい。</h3>
        <table>
            <tr>
            <th>名前:</th>
            <td><?php echo htmlspecialchars($posts[0]['name'],ENT_QUOTES,'UTF-8'); ?></td>
            </tr>
            <tr>
            <th>コメント:</th>
            <td><?php echo htmlspecialchars($posts[0]['comment'],ENT_QUOTES,'UTF-8'); ?></td>
            </tr>
            <tr>
            <th>日付:</th>
            <td><?php echo htmlspecialchars($posts[0]['created_at'],ENT_QUOTES,'UTF-8'); ?></td>
            </tr>
        </table>
        <input type="submit" name="return" value="戻る" />
        <input type="submit" name="dele" value="削除" />
        <input type="hidden" name="mode" value="deletecomplete">
        <input type="hidden" name="id" value="<?php echo htmlspecialchars($posts[0]['id'],ENT_QUOTES,'UTF-8'); ?>" />

    </form>
</body>
</html>