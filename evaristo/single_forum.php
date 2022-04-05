<?php
    require "db.php";

    $idVar = $_GET['id'];

    $query = $pdo->query("SELECT * FROM forums WHERE id=$idVar");
    $forum = $query->fetch();
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
</body>
</html>