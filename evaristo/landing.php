<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Landing</title>
</head>
<body class="min-h-screen" style="background-image: url('landing.jpg')">
    <div class="flex flex-col min-h-screen bg-black/50">
        <div class="pl-4 pt-4">
            <img src="logo.svg" alt="Logo">
        </div>
    
        <div class="flex justify-center items-center flex-1">
            <div>
                <div class="flex items-end text-white">
                    <h1 class="text-4xl">Evaristo</h1>
                    <span class="text-4xl font-thin pl-2 pr-2">|</span>
                    <h3 class="text-2xl">Forum for Italy stuff</h3>
                </div>

                <div class="flex justify-center mt-8">
                    <div>
                        <a href="forums.php" class="px-10 rounded-lg mr-2 py-3 bg-blue-500 hover:bg-blue-600 text-white text-sm">Browse</a>
                        <a href="create_forum.php" class="px-10 rounded-lg ml-2 py-3 bg-green-500 hover:bg-green-600 text-white text-sm">New Post</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>