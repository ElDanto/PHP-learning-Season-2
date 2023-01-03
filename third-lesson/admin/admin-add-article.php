<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Mono:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <title>Edit Article</title>
</head>
<body>
    <form action="admin-handler.php?create" method="post" class="article-wrapper">
        <input type="text" name="title" value="Title">
        <textarea name="content">Content</textarea>
        <input type="submit" value="Send">
    </form>
</body>
</html>