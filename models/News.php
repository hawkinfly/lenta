<?php
class News
{
    public static function getCountPages()
    {
        $db = Db::getConnection();
        $result = $db->query("SELECT COUNT(*) FROM `news`");
        $count = $result->fetch(PDO::FETCH_ASSOC);
        return ceil($count["COUNT(*)"] / 5);
    }
    public static function getNewsItemById($id)
    {
        $db = Db::getConnection();
        $result = $db->query("SELECT title, content FROM `news` WHERE id = $id");
        $article = $result->fetchAll(PDO::FETCH_ASSOC);
        return $article;

    }
    public static function getNewsList($id_page)
    {
        $db = Db::getConnection();
        $id_page = ($id_page - 1) * 5;
        $result = $db->query("SELECT id, idate, title, announce  FROM `news`"
                                     . "ORDER BY idate DESC LIMIT $id_page, 5");
        $news_arr = [];
        $i = 0;
        while($row = $result->fetch(PDO::FETCH_ASSOC)) {
            $news_arr[$i]['id'] = $row['id'];
            $news_arr[$i]['idate'] = $row['idate'];
            $news_arr[$i]['title'] = $row['title'];
            $news_arr[$i]['announce'] = $row['announce'];
            $i++;
        }
        return $news_arr;
    }
}