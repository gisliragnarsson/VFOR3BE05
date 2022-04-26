<?php
    require "db.php";

    $query = $pdo->query("SELECT forums.*,(select count(*) from comments where comments.forum_id = forums.id) as count FROM forums ORDER BY id DESC");
    $forums = $query->fetchAll();

    $query = $pdo->query("SELECT forums.*,(select count(*) from comments where comments.forum_id = forums.id) as count FROM forums ORDER BY count DESC LIMIT 5");
    $popularForums = $query->fetchAll();

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
            <a href="create_forum.php" class="px-10 rounded-lg ml-2 py-3 bg-green-500 hover:bg-green-600 text-white text-sm">New Post</a>
        </div>
    </div>

    <div>
        <img src="header.svg" alt="Header">
    </div>

    <div class="mx-20 flex mt-8 mb-8">
        <div class="flex-1 pr-6">
            <?php foreach($forums as $forum): ?>
                <div class="rounded-lg shadow-lg p-8 border border-gray-100">
                    <div class="flex justify-between">
                        <a href="single_forum.php?id=<?php echo $forum['id']; ?>" class="text-xl font-bold">
                            <?php echo $forum['title']; ?>
                        </a>

                        <div class="flex">
                            <div class="flex mr-4 text-green-500">
                                <span class="mr-2 font-bold"><?php echo $forum['count']; ?></span>
                                <span>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-message-circle"><path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"></path></svg>
                                </span>
                            </div>
                            <div class="flex text-blue-500">
                                <span class="mr-2 font-bold">
                                    <?php echo $forum['likes']; ?>
                                </span>
                                <a href="like_forum.php?id=<?php echo $forum['id']; ?>">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-thumbs-up"><path d="M14 9V5a3 3 0 0 0-3-3l-4 9v11h11.28a2 2 0 0 0 2-1.7l1.38-9a2 2 0 0 0-2-2.3zM7 22H4a2 2 0 0 1-2-2v-7a2 2 0 0 1 2-2h3"></path></svg>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="mt-2 pb-4 mb-4 border-b border-gray-300 font-light">
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
                </div>
            <?php endforeach; ?>
        </div>
        <div class="w-64">
            <div class="rounded-lg shadow-lg p-8 border border-gray-100">
                <h2 class="text-xl font-bold">Most popular</h2>

                <?php foreach($popularForums as $forum): ?>
                    <div class="mt-2 ml-2">
                        <a class="text-blue-500" href="#">
                            <?php echo $forum['title']; ?>
                        </a>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</body>
</html>