<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Forum</title>
</head>
<body>
    <h1>Create Forum</h1>
    <form action="save_forum.php" method="POST">
        <input type="text" name="title">

        <textarea name="content" rows="10"></textarea>

        <input type="text" name="owner">

        <button>Publish forum</button>
    </form>
</body>
</html>