<?php
/**
 * Created by PhpStorm.
 * User: guoyexuan
 * Date: 2018/1/22
 * Time: 下午5:58
 */

namespace Blog\Model;

use Think\Model;

class CommentsModel extends Model
{
    protected $tableName = 'comments';

    /**
     * @param $data
     * @return mixed
     * 用户评论
     */
    public function comment_to_article($data)
    {

        $need_field_maps = array(
            'article_id'    =>true,
            'owner_user_id' =>true,
            'content'       =>true,
        );

        foreach ($need_field_maps as $field_name=>$must_field)
        {
            if(empty($data[$field_name]))
            {
                return false;
            }
        }

        $field_val = array(
            'article_id'    =>$data['article_id'],
            'owner_user_id' =>$data['owner_user_id'],
            'content'       =>$data['content'],
            'like_count'    =>0,
            'created_at'    =>getTime(),
        );

        return $this->add($field_val);
    }

    /**
     * @param $data
     * @return bool|mixed
     * 用户回复
     */
    public function reply_to_comment($data)
    {
        $need_field_maps = array(
            'comment_id'        => true,
            'conent'            => true,
            'reply_owner_uid'   => true,
            'reply_target_uid'  =>true,
        );

        foreach ($need_field_maps as $field_name=>$must_field)
        {
            if(empty($data[$field_name]))
            {
                return false;
            }
        }

        $field_val = array(
            'article_id'    =>$data['article_id'],
            'owner_user_id' =>$data['owner_user_id'],
            'content'       =>$data['content'],
            'like_count'    =>0,
            'created_at'    =>getTime(),
        );

        return M('reply')->add($field_val);
    }

    /**
     * @param $article_id
     * @return mixed
     * 通过文章ID获取评论和回复列表
     */
    public function getCommentsResByArticleId($article_id)
    {
        $comment_res = D('Comments')
            ->join('t_moe_accout ON t_moe_comments.owner_user_id = t_moe_accout.id')
            ->field('t_moe_comments.id as comment_id,t_moe_comments.owner_user_id,t_moe_comments.content,
            t_moe_comments.like_count,t_moe_comments.created_at,t_moe_accout.nickname')
            ->where('article_id=' . $article_id)
            ->order('t_moe_comments.created_at desc')
            ->select();

        foreach ($comment_res as $k => $v)
        {
            $reply_sql = 'SELECT 
                                A.id,A.content,A.comment_id,A.like_count as reply_like_count,A.reply_owner_uid,
                                A.reply_target_uid,B.nickname as reply_owner_name,B1.nickname as reply_target_name 
                                FROM t_moe_reply as A LEFT JOIN t_moe_accout B ON A.reply_owner_uid=B.id 
                                LEFT JOIN t_moe_accout B1 ON A.reply_target_uid = B1.id 
                                where A.comment_id = '.$v['comment_id'];

            $reply_res = M()->query($reply_sql);

            $comment_res[$k]['created_at'] = date('Y-m-d H:i:s',($v['created_at'] / 1000));

            if (!empty($reply_res)) $comment_res[$k]['reply'] = $reply_res;
        }

        return $comment_res;
    }


    /**
     * @return mixed
     * 获取首页最新评论
     */
    public function getNewestCommentsToHomePage()
    {
        $comment_res = D('Comments')
            ->join('t_moe_accout ON t_moe_comments.owner_user_id = t_moe_accout.id')
            ->field('t_moe_comments.id as comment_id,t_moe_comments.article_id,t_moe_comments.owner_user_id,t_moe_comments.content,
            t_moe_comments.like_count,t_moe_comments.created_at,t_moe_accout.nickname')
            ->order('t_moe_comments.created_at desc')
            ->select();

        foreach ($comment_res as $k => $v)
        {
            $reply_sql = 'SELECT 
                                A.id,A.content,A.comment_id,A.like_count as reply_like_count,A.reply_owner_uid,
                                A.reply_target_uid,B.nickname as reply_owner_name,B1.nickname as reply_target_name 
                                FROM t_moe_reply as A LEFT JOIN t_moe_accout B ON A.reply_owner_uid=B.id 
                                LEFT JOIN t_moe_accout B1 ON A.reply_target_uid = B1.id 
                                where A.comment_id = '.$v['comment_id'];

            $reply_res = M()->query($reply_sql);

            $comment_res[$k]['created_at'] = date('Y-m-d H:i:s',($v['created_at'] / 1000));

            if (!empty($reply_res)) $comment_res[$k]['reply'] = $reply_res;
        }

        return $comment_res;
    }
}