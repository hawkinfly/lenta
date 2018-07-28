<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/views/css/style.css">
    <title><?=$article[0]['title']?></title>
</head>
<body>
    <div id="app">
        <header>
            <h1><?=$article[0]['title']?></h1>
        </header>
        <div id="content" class="article-content">
            <?=$article[0]['content']?>
        </div>
        <div id="footer">
            <a href="news.php">Все новости >></a>
        </div>
    </div>
</body>
</html>