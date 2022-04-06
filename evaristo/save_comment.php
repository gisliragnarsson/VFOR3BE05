<?php

require "db.php";

// id, content, likes, owner, created_at, forum_id
$idVar = $_POST["forum_id"];

$data = [null, $_POST['content'], 0, $_POST['owner'], $_POST["forum_id"]];

$pdo->prepare("INSERT INTO comments VALUES (?,?,?,?,NOW(),?)")->execute($data);

header("Location: single_forum.php?id=$idVar");