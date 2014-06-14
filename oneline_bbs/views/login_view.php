<?php
include 'template/header.php';
?>
<body>
    <h1>ログイン画面</h1>
    <h2>ログインID、パスワードを入力してください。</h2>
    <fieldset>
    <form action="login.php" method="post">
    <?php echo htmlspecialchars($error_message,ENT_QUOTES,'UTF-8'); ?>
    <label for="userid">ユーザーID</label><input type="text" name="userid" id="userid" value="<?php
        isset($_POST['userid']) ? print $_POST['userid'] : ""; ?>" />
    <br>
    <label for="password">パスワード</label><input type="password" name="password" id="password" value="" />
    <br>
    <label></label><input type="submit" id="login" name="login" value="ログイン" />
    </fieldset>
    </form>
</body>
</html>