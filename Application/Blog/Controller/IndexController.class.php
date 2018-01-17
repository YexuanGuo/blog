<?php
namespace Blog\Controller;
use Blog\Library\BaseController;
class IndexController extends BaseController
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

    /**
     * 文章详情
     */
    public function article()
    {

        $article_id = filter_keyword(I('get.id'));
        /*
        $res = D('comments')->join(array('LEFT JOIN t_moe_reply ON t_moe_comments.id = t_moe_reply.comment_id'))
            ->field('t_moe_comments.id,t_moe_comments.article_id,t_moe_comments.like_count,t_moe_comments.content as comment_content,
            t_moe_comments.owner_user_id as commtent_owner_user_id,t_moe_comments.owner_user_id as comment_uid,t_moe_reply.content as reply_content,
            t_moe_reply.reply_owner_uid,t_moe_reply.reply_target_uid')
            ->where('article_id='.$article_id)->select();*/

        $comment_res = D('Comments')->where('article_id=' . $article_id)->select();


        foreach ($comment_res as $k => $v) {
            $reply_res = D('Reply')->where('comment_id=' . $v['id'])->select();
            if (!empty($reply_res)) $comment_res[$k]['reply'] = $reply_res;
        }


//
//        print_R($comment_res);
//
//        die;

        $data = D('Article')->getArticleDetailById($article_id);
        $this->assign(
            array(
                'article'      =>$data,
                'comment_res'  =>$comment_res,
            )
        );
        $this->display('content');
    }

    /**
     * @param $data array  数据
     * @param $parent  string 父级元素的名称 如 parent_id
     * @param $son     string 子级元素的名称 如 comm_id
     * @param $pid     int    父级元素的id 实际上传递元素的主键
     * @return array
     */
    public function getSubTree($data , $parent , $son , $pid = 0) {
        $tmp = array();
        foreach ($data as $key => $value) {
            if($value[$parent] == $pid) {
                $value['child'] =  $this->getSubTree($data , $parent , $son , $value[$son]);
                $tmp[] = $value;
            }
        }
        return $tmp;
    }

    public function postcomment()
    {
        return true;
    }
}