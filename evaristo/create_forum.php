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

    <div class="max-w-3xl mx-auto flex mt-8">
        <div class="flex-1 pr-6">
            <form action="save_forum.php" method="POST" class="rounded-lg shadow-lg p-8 border border-gray-100 mb-4">
                <h2 class="text-xl font-bold">Create new post</h2>
                
                <div class="mt-2">
                    <input type="text" name="title" placeholder="Title" class="w-full border border-gray-300 rounded-lg px-3 py-2">
                </div>

                <div class="mt-2">
                    <input type="text" name="owner" placeholder="Owner" class="w-full border border-gray-300 rounded-lg px-3 py-2">
                </div>

                <div class="mt-2">
                    <textarea name="content" placeholder="Content" class="w-full border border-gray-300 rounded-lg px-3 py-2 resize-none" rows="10"></textarea>
                </div>

                <div class="mt-2 flex justify-end">
                    <button class="px-10 rounded-lg py-3 bg-green-500 hover:bg-green-600 text-white text-sm">
                        Save post
                    </button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>