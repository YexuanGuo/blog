<?php
namespace Blog\Controller;
use Blog\Library\BaseController;
class IndexController extends BaseController
{

    private $_home_page_size = 10;
    private $_home_page_url  = '/home/list-[PAGE].html';


    /**
     * 首页相关逻辑
     */
    public function index()
    {

        $Page  = new \Think\Page(D('Article')->getArticleCount(),$this->_home_page_size);

        $Page->routerUrl = $this->_home_page_url;

        $page_html  = $Page->show();

        $pageNo = I('get.p');

        if(empty($pageNo) || !is_numeric($pageNo))
        {
            $pageNo = 1;
        }
        else
        {
            $pageNo = I('get.p');
        }

        $limit = ($pageNo - 1) * $this->_home_page_size;

        $this->assign(
            array(
                    'articleList'=>D('Article')->getArticleToHomePage($limit,$this->_home_page_size),
                    'page'       =>$page_html,
                )
        );
        $this->display('index');
    }


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

    public function articleListByCategory()
    {
        $category_id   = filter_keyword(I('get.id'));
        $article_list  = D('Article')->getArticleListByCategoryId($category_id);
        $category_name = D('Article')->getCategoryNameByCategoryId($category_id);

        $this->assign(
            array(
                'articleList'  =>$article_list,
                'categiryName' =>$category_name,
            )
        );
        $this->display('category_article_list');
    }
}