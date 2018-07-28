<?php
class NewsController {
    public function action() {
        if (isset($_GET['id'])) {
            echo "Блок id";
        } elseif (isset($_GET['page'])) {
            echo "Блок page";
        } else {
            echo "Первая страница";
        }
    }
}