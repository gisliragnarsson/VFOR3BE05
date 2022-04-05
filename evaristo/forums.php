<?php
    require "db.php";

    $query = $pdo->query("SELECT * FROM forums ORDER BY id DESC");
    $forums = $query->fetchAll();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Evaristo</title>
</head>
<body>
    <h1>Forums</h1>
    <?php foreach($forums as $forum): ?>
        <h2>
            <?php echo $forum["title"]; ?>
        </h2>
        <p>
            <?php echo $forum["content"]; ?>
        </p>
    <?php endforeach; ?>
</body>
</html>