<?php

require "db.php";

// id, title, content, likes, owner, created_at
$idVar = $_GET['forumId'];

$data = [$_GET['id']];

$pdo->prepare("UPDATE comments SET likes = likes + 1 WHERE id=?")->execute($data);

header("Location: single_forum.php?id=$idVar");