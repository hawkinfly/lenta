<?php
    if (empty($_GET['page'])) $active_page = 1;
    else $active_page = $_GET['page'];
?>
<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/views/css/style.css">
    <title>Новости</title>
</head>
<body>
    <div id="app">
        <header>
        <h1>Новости</h1>
        </header>
        <div id="content">
            <? foreach ($news_list as $news): ?>
            <div class="article">
                <p class="article-date-title"><span class="date"><?=date('d.m.Y', $news['idate'])?></span> <a href="?id=<?=$news['id']?>" class="article-title"><?=$news['title']?></a></p>
                <p class="article-announce"><?=$news['announce']?></p>
            </div>
            <? endforeach; ?>
        </div>
        <footer>
            <p>Страницы:</p>
            <div id="pagination">
                <? for ($i = 1; $i <= $pages; $i++): ?>
                <a <? if ($i == $active_page) echo 'id="active-page"'; ?> href="?page=<?=$i?>"><?=$i?></a>
                <? endfor; ?>
            </div>
        </footer>
    </div>
</body>
</html>