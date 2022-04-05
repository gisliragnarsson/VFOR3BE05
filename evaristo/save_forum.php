<?php

require "db.php";

// id, title, content, likes, owner, created_at

$data = [null, $_POST['title'], $_POST['content'], 0, $_POST['owner']];

$pdo->prepare("INSERT INTO forums VALUES (?,?,?,?,?,NOW())")->execute($data);

header("Location: forums.php");