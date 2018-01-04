<?php
namespace Blog\Controller;
use Blog\Library\BaseController;
class IndexController extends BaseController
{

    public function index()
    {
//        print_R(D('Article')->getArticleCategoryToHomePage());die;
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