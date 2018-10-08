<?php
/**
 * User: lizhe
 * Date: 2018/9/21
 * Time: 17:38
 */
class IndexController extends \common\controllers\Web {
    private $article;
    public function init()
    {
        parent::init();
        $this->article = new Admin_ArticleModel();
    }
    public function indexAction()
    {
        $articleList = $this->article->getDataList();
        $this->getView()->assign('list',$articleList);
        return true;
    }
}