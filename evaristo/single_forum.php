<?php
    require "db.php";

    $idVar = $_GET['id'];

    $query = $pdo->query("SELECT * FROM forums WHERE id=$idVar");
    $forum = $query->fetch();

    $query = $pdo->query("SELECT * FROM comments WHERE forum_id=$idVar ORDER BY id DESC");
    $comments = $query->fetchAll();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <a href="forums.php">Forums</a>
    <h1>
        <?php echo $forum['title']; ?>
    </h1>
    <p>
        <?php echo $forum['content']; ?>
    </p>
    <p>
        <?php echo $forum['owner']; ?> - <?php echo $forum['created_at']; ?>
    </p>
    <p>
        <?php echo $forum['likes']; ?>
        <a href="like_forum.php?id=<?php echo $idVar; ?>">Like</a>
    </p>

    <form action="save_comment.php" method="POST">
        <textarea name="content" rows="10"></textarea>

        <input type="text" name="owner">

        <input type="hidden" name="forum_id" value="<?php echo $idVar; ?>">

        <button>Save comment</button>
    </form>

    <?php foreach($comments as $comment): ?>
        <h2>
            <?php echo $comment["owner"]; ?>
        </h2>
        <p>
            <?php echo $comment["content"]; ?>
        </p>
    <?php endforeach; ?>
</body>
</html>