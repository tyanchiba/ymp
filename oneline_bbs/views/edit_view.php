<?php
include 'template/header.php';
?>
<body>
    <h1>編集画面</h1>
    <h2>編集が完了したら「確認」ボタンを押して下さい</h2>
    <form action="edit.php" method="post">
        <?php if (count($errors)): ?>
        <ul class="error_list">
            <?php foreach ($errors as $error): ?>
            <li>
                <?php echo htmlspecialchars($error,ENT_QUOTES,'UTF-8'); ?>
            </li>
            <?php endforeach; ?>
        </ul>
        <?php endif; ?>
        名前： <input type="text" name="name" value="<?php
        isset($_SESSION['name']) ? print $_SESSION['name'] : "";
        ?>"/><br />
        ひとこと: <input type="text" name="comment" size="60" value="<?php isset($_SESSION['comment']) ? print $_SESSION['comment'] : ""; ?>"/><br />
        <input type="submit" name="return" value="戻る" />
        <input type="submit" name="edit_submit" value="確認"　/>
        <input type="hidden" name="mode" value="editcheck_submit" />
        <input type="hidden" name="id" value="<?php isset($_SESSION['id']) ? print $_SESSION['id'] : ""; ?>" />

   </form>
</body>
</html>