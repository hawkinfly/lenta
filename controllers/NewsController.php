<?php
include_once ROOT . '/models/News.php';
class NewsController {
    private function checkGetParameter($get_parameter) {
        $reg = '/^\d{1,}$/';
        if (!(preg_match($reg, $get_parameter)) || $get_parameter == 0) {
            header('Location: /news.php');
            die;
        }
        return $get_parameter;
    }
    private function getArticleById($id)
    {
        $id = $this->checkGetParameter($id);
        $article =  News::getNewsItemById($id);
        require_once (ROOT . "/views/article.php");
    }
    private function getPageByIdPage($id_page)
    {
        $id_page = $this->checkGetParameter($id_page);
        $news_list = News::getNewsList($id_page);
        if (empty($news_list)) {
            header('Location: /news.php');
            die;
        }
        $pages = News::getCountPages();
        require_once (ROOT . "/views/news.php");
    }
    public function action()
    {
        if (isset($_GET['id'])) {
            $this->getArticleById($_GET['id']);
        } elseif (isset($_GET['page'])) {
            $this->getPageByIdPage($_GET['page']);
        } else {
            $this->getPageByIdPage(1);
        }
    }
}