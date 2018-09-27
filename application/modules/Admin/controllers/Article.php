<?php
/**
 * User: lizhe
 * Date: 2018/9/26
 * Time: 14:10
 */
class ArticleController extends \common\controllers\Admin{
    public function init()
    {
        parent::init();
    }
    public function addArticleAction()
    {
        if($this->_request->isPost()){
            $redis = new Redis();
            $redis->connect('172.20.0.5','6379');
            $redis->select(0);
            $redis->set('post:postid:1','test123');
            $res = $redis->get('post:postid:1');
            var_dump($res);

        }
    }
}