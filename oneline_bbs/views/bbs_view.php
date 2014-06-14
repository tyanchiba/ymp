<?php
include 'template/header.php';
?>
<link type="text/css" rel="stylesheet" href="./bbs.css">
    <title>ひとこと掲示板</title>
</head>
<body>
    <h1>ひとこと掲示板</h1>

    <form action="bbs.php" method="post">
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
        ひとこと: <input type="text" name="comment" size="60" value="<?php isset($_SESSION['comment']) ? print $_SESSION['comment'] : "";?>"/><br />
        <input type="submit" name="submit" value="確認"　/>
        <input type="hidden" name="mode" value="check" />
   </form>

    <?php if (count($posts) > 0): ?>
    <ul>
        <?php foreach ($posts as $post): ?>
        <li>
            <?php echo htmlspecialchars($post['name'],ENT_QUOTES,'UTF-8'); ?>:
            <?php echo htmlspecialchars($post['comment'],ENT_QUOTES,'UTF-8'); ?>
            - <?php echo htmlspecialchars($post['created_at'],ENT_QUOTES,'UTF-8'); ?>
        <form action="edit.php" method="post">
            <input type="submit" name="edit" value="編集" />
            <input type="hidden" name="id" value="<?php echo htmlspecialchars($post['id'],ENT_QUOTES,'UTF-8'); ?>" />
            <input type="hidden" name="mode" value="editcheck" />
        </form>
        <form action="delete.php" method="post">
            <input type="submit" name="delete" value="削除" />
            <input type="hidden" name="id" value="<?php echo htmlspecialchars($post['id'],ENT_QUOTES,'UTF-8'); ?>" />
            <input type="hidden" name="mode" value="delecheck" />
        </form>
        </li>
        <?php endforeach; ?>
    </ul>
    <?php endif; ?>
</body>
</html>