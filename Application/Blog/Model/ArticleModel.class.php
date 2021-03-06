<?php
/**
 * Created by PhpStorm.
 * User: guoyexuan
 * Date: 2018/1/2
 * Time: 下午10:04
 */
namespace Blog\Model;

use Think\Model;

class ArticleModel extends Model
{
    protected $tableName = 'article';

    /**
     * @return mixed
     * 获取文章总数,分页用
     */
    public function getArticleCount()
    {
        return $this->where('status=1')->count();
    }


    /**
     * @return false|mixed|\PDOStatement|string|\think\Collection
     * 获取首页文章List
     * 待优化
     */
    public function getArticleToHomePage($pageNo,$pageSize)
    {
        //待优化,先写上
        $data = $this->join('t_moe_category ON t_moe_article.category_id = t_moe_category.id')->join('t_moe_operation_account ON t_moe_article.create_by = t_moe_operation_account.Fid')
            ->field('t_moe_article.id as article_id,t_moe_article.title,t_moe_article.sort as article_sort,t_moe_article.create_at,
            t_moe_article.content,t_moe_category.name as article_category_name,t_moe_operation_account.Fnickname as create_by')
            ->limit($pageNo,$pageSize)->where('t_moe_article.status=1')->order('t_moe_article.create_at desc')->select();
        return $data;
    }

    /**
     * @param $id
     * @return array|false|mixed|\PDOStatement|string|Model
     * 获取文章详情
     */
    public function getArticleDetailById($id)
    {
        $map['t_moe_article.id'] = $id;

        $data = $this->join('t_moe_category ON t_moe_article.category_id = t_moe_category.id')->join('t_moe_operation_account ON t_moe_article.create_by = t_moe_operation_account.Fid')
            ->field('t_moe_article.id as article_id,t_moe_article.title,t_moe_article.sort as article_sort,t_moe_article.create_at,
            t_moe_article.content,t_moe_category.name as article_category_name,t_moe_operation_account.Fnickname as create_by')
            ->limit(1,6)->where($map)->order('create_at desc')->find();
        return $data;
    }

    /**
     * @return array|mixed
     * 获取首页文章分类
     */
    public function getArticleCategoryToHomePage()
    {
        return D('category')->where('status=1')->getTreeData('level','id');
    }

    /**
     * @return mixed
     * 获取首页热门文章
     */
    public function getHotArticleToHomePage()
    {
        $data = D('article')->field('id,title')->where('status=1')->limit(1,6)->order('create_at desc')->select();
        return $data;
    }

    /**
     * @param $category_id
     * @return mixed
     * 通过分类ID获取文章列表
     */
    public function getArticleListByCategoryId($category_id)
    {
        //待优化,先写上->limit($pageNo,$pageSize)
        $data = $this->join('t_moe_category ON t_moe_article.category_id = t_moe_category.id')->join('t_moe_operation_account ON t_moe_article.create_by = t_moe_operation_account.Fid')
            ->field('t_moe_article.id as article_id,t_moe_article.title,t_moe_article.sort as article_sort,t_moe_article.create_at,
            t_moe_article.content,t_moe_category.name as article_category_name,t_moe_operation_account.Fnickname as create_by')
            ->where('t_moe_article.category_id='.$category_id)->order('t_moe_article.create_at desc')->select();
        return $data;
    }

    /**
     * @param $category_id
     * @return mixed
     * 通过分类ID获取分类名称
     */
    public function getCategoryNameByCategoryId($category_id)
    {
        $data = D('category')->field('name')->where('id='.$category_id)->find();
        return $data;
    }
}