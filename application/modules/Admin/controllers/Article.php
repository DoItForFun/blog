<?php

/**
 * User: lizhe
 * Date: 2018/9/26
 * Time: 14:10
 */
class ArticleController extends \common\controllers\Admin
{

    private $tags;
    private $article;

    public function init()
    {
        parent::init();
        $this->tags = new Admin_TagsModel();
        $this->article = new Admin_ArticleModel();
        session_start();
    }

    public function addArticleAction()
    {

        if ($this->_request->isPost()) {

            var_dump($_POST);die;
            $insertData['title'] = $_POST['title'];
            $insertData['subtitle'] = $_POST['subtitle'];
            $insertData['tag'] = $_POST['tag'];
            $insertData['content'] = htmlspecialchars($_POST["article-html-code"]);
            $insertData['uid'] = $_SESSION['userinfo']['id'];
            $insertData['articlestatus'] = 1;

            $this->article->insertInfo($insertData);

        }
        if ($this->_request->isGet()) {

            $info = $this->tags::getData('id', '>', '0', ['id', 'tagname', 'pid']);
            $info = $this->infinitePoleClassification($info);
            $this->getView()->assign('info', $info);
        }
    }

    public function addTagsAction()
    {

        if ($this->_request->isGet()) {

            $info = $this->tags::getData('id', '>=', '1', array('*'));
            $info = $this->infinitePoleClassification($info);
            $this->getView()->assign('info', $info);
        }
        if ($this->_request->isPost()) {

            $res = $this->tags->insertData($_POST);
            if ($res > 0) {
                $this->successfulJump('添加成功', '/admin/Article/addArticle');
            }
        }
    }
}