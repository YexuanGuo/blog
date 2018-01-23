<?php
namespace Blog\Controller;
use Blog\Library\BaseController;
class IndexController extends BaseController
{

    /**
     * 首页相关逻辑
     */
    public function index()
    {
        $this->assign(
            array(
                    'articleList'=>D('Article')->getArticleToHomePage(),
                )
        );
        $this->display('index');
    }

    /**
     * 文章详情
     */
    public function article()
    {
        $article_id  = filter_keyword(I('get.id'));

        $comment_res = D('Comments')->getCommentsResByArticleId($article_id);
        $data        = D('Article')->getArticleDetailById($article_id);

        $this->assign(
            array(
                'article'      =>$data,
                'comment_res'  =>$comment_res,
            )
        );

        $this->display('content');
    }

}