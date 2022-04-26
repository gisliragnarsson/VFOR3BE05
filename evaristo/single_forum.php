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
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Forums</title>
</head>
<body>
    <div class="flex justify-between items-center py-4 px-5">
        <div class="flex items-center">
            <img src="Logo.svg" alt="Logo">
            <a href="landing.php" class="text-2xl ml-4">Evaristo</a>
            <a href="forums.php" class="text-blue-500 ml-10 font-medium">Home</a>
            <a href="forums.php" class="text-blue-500 ml-10 font-medium">Browse</a>
        </div>
        <div>
            <a href="" class="px-10 rounded-lg ml-2 py-3 bg-green-500 hover:bg-green-600 text-white text-sm">New Post</a>
        </div>
    </div>

    <div>
        <img src="header.svg" alt="Header">
    </div>

    <div class="mx-20 flex mt-8">
        <div class="flex-1 pr-6">
            <div class="p-8">
                <div class="flex justify-between pb-4 mb-4 border-b border-gray-300">
                    <h1 class="text-xl font-bold">
                        <?php echo $forum['title']; ?>
                    </h1>

                    <div class="flex">
                        <div class="flex text-blue-500">
                            <span class="mr-2 font-bold">
                                <?php echo $forum['likes']; ?>
                            </span>
                            <a href="like_forum.php?id=<?php echo $idVar; ?>">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-thumbs-up"><path d="M14 9V5a3 3 0 0 0-3-3l-4 9v11h11.28a2 2 0 0 0 2-1.7l1.38-9a2 2 0 0 0-2-2.3zM7 22H4a2 2 0 0 1-2-2v-7a2 2 0 0 1 2-2h3"></path></svg>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="mt-2 pb-4 font-light">
                    <p>
                        <?php echo $forum['content']; ?>
                    </p>
                </div>
                <div class="flex text-xs">
                    <p>Posted by <span class="font-bold"><?php echo $forum['owner']; ?></span></p>
                    <p class="flex items-center ml-8">
                        <span class="w-2 h-2 bg-green-500 rounded-full mr-2"></span>
                        <?php echo date_format(date_create($forum['created_at']), "j. F Y"); ?>
                    </p>
                </div>

                <div class="mt-8">
                    <h2 href="#" class="text-xl font-bold mb-4">Comments (<?php echo count($comments); ?>)</h2>

                    <form action="save_comment.php" method="POST" class="mb-4">
                        <div class="mt-2">
                            <input type="text" name="owner" placeholder="Owner" class="w-full text-sm border border-gray-300 rounded-lg px-3 py-2">
                        </div>
        
                        <div class="mt-2">
                            <textarea placeholder="Content" name="content" class="w-full text-sm border border-gray-300 rounded-lg px-3 py-2 resize-none" rows="2"></textarea>
                        </div>

                        <input type="hidden" name="forum_id" value="<?php echo $idVar; ?>">

                        <div class="mt-2 flex justify-end">
                            <button class="px-10 text-sm rounded-lg py-3 bg-green-500 hover:bg-green-600 text-white text-sm">
                                Post comment
                            </button>
                        </div>
                    </form>

                    <?php foreach($comments as $comment): ?>
                        <div class="rounded-lg border border-gray-300 p-6 mb-4">
                            <div class="flex justify-between">
                                <div class="flex items-center">
                                    <span class="flex justify-center items-center bg-gray-200 rounded-full w-8 h-8">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                                    </span>
                                    <h4 class="font-bold ml-3">
                                        <?php echo $comment['owner']; ?>
                                    </h4>
                                    <p class="flex text-xs items-center ml-8">
                                        <span class="w-2 h-2 bg-green-500 rounded-full mr-2"></span>
                                        <?php echo date_format(date_create($comment['created_at']), "j. F Y"); ?>
                                    </p>
                                </div>

                                <div class="flex">
                                    <div class="flex text-blue-500">
                                        <span class="mr-2 font-bold">
                                            <?php echo $comment['likes']; ?>
                                        </span>
                                        <a href="like_comment.php?id=<?php echo $comment['id']; ?>&forumId=<?php echo $idVar; ?>">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-thumbs-up"><path d="M14 9V5a3 3 0 0 0-3-3l-4 9v11h11.28a2 2 0 0 0 2-1.7l1.38-9a2 2 0 0 0-2-2.3zM7 22H4a2 2 0 0 1-2-2v-7a2 2 0 0 1 2-2h3"></path></svg>
                                        </a>
                                    </div>
                                </div>
                            </div>    

                            <p class="mt-4 font-light">
                                <?php echo $comment['content']; ?>
                            </p>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</body>
</html>


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