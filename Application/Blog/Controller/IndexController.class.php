<?php
namespace Blog\Controller;
use Think\Controller;
class IndexController extends Controller
{

    public function index()
    {
        $this->assign(
            array(
                    'articleList'=>D('Article')->getArticleToHomePage(),
                )
        );
        $this->display('index');
    }

    public function article()
    {
        $article_id = filter_keyword(I('get.id'));
        $data = D('Article')->getArticleDetailById($article_id);
        $this->assign(
            array(
                'article'=>$data
            )
        );
        $this->display('content');
    }

}