<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Moe | 数据可视化管理平台</title>

    <link href="/Public/css/bootstrap.min.css" rel="stylesheet">
    <link href="/Public/font-awesome/css/font-awesome.css" rel="stylesheet">
    <!--<link href="/Public/css/animate.css" rel="stylesheet">-->
    <link href="/Public/css/style.css" rel="stylesheet">
    <script src="/Public/js/jquery-2.1.1.js"></script>
</head>

<body>

<div id="wrapper">

<nav class="navbar-default navbar-static-side" role="navigation">
<div class="sidebar-collapse">
<ul class="nav metismenu" id="side-menu">
<li class="nav-header">
    <div class="dropdown profile-element"> <span>
                            <img alt="image" class="img-circle" src="/Public/img/a6.jpg" width="50" height="50" />
                             </span>
        <a data-toggle="dropdown" class="dropdown-toggle" href="form_file_upload.html#">
                            <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold"><?=$userInfo['fnickname'];?></strong>
                             </span> <span class="text-muted text-xs block"><?=$userInfo['faccount'];?><b class="caret"></b></span> </span> </a>
        <ul class="dropdown-menu animated fadeInRight m-t-xs">
            <li><a href="/user/profile">Profile</a></li>
            <li class="divider"></li>
            <li><a href="/user/logout">Logout</a></li>
        </ul>
    </div>
    <div class="logo-element">
        ：）
    </div>
</li>
    <?php foreach($menu as $k=>$v){ ?>
        <li <?php if($v['controller'] == $controllerName){ echo "class='active'";} ?>>
            <a href="javascript:void(0);"><i class="<?=$v['class'];?>"></i>
                <span class="nav-label"><?=$v['name'];?></span>
                <span class="fa arrow"></span>
            </a>
            <ul class="nav nav-second-level collapse">
                <?php foreach($v['two_level_menu'] as $tow_level_menu_key=>$tow_level_menu_val){ ?>
                    <li <?php if($tow_level_menu_val['action'] == $actionName) echo "class='active'";?> ><a href="/<?php echo ($tow_level_menu_val["controller"]); ?>/<?php echo ($tow_level_menu_val["action"]); ?>"><?=$tow_level_menu_val['name'];?></a></li>
                <?php }?>
            </ul>
        </li>
    <?php } ?>
</ul>

</div>
</nav>

<div id="page-wrapper" class="gray-bg">
    <div class="row border-bottom">
        <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="javascript:void(0)"><i class="fa fa-bars"></i> </a>
                <form role="search" class="navbar-form-custom" action="search_results.html">
                    <div class="form-group">
                        <input type="text" placeholder="Search for something..." class="form-control" name="top-search" id="top-search">
                    </div>
                </form>
            </div>
            <ul class="nav navbar-top-links navbar-right">
                <li>
                    <!--<span class="m-r-sm text-muted welcome-message">Welcome to PeopleSoft</span>-->
                </li>
                <li class="dropdown">
                    <!--<a class="dropdown-toggle count-info" data-toggle="dropdown" href="form_file_upload.html#">-->
                        <!--<i class="fa fa-envelope"></i>  <span class="label label-warning">16</span>-->
                    <!--</a>-->
                    <ul class="dropdown-menu dropdown-messages">
                        <li>
                            <div class="dropdown-messages-box">
                                <a href="profile.html" class="pull-left">
                                    <img alt="image" class="img-circle" src="/Public/img/a6.jpg">
                                </a>
                                <div class="media-body">
                                    <small class="pull-right">46h ago</small>
                                    <strong>Mike Loreipsum</strong> started following <strong>Monica Smith</strong>. <br>
                                    <small class="text-muted">3 days ago at 7:58 pm - 10.06.2014</small>
                                </div>
                            </div>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <div class="dropdown-messages-box">
                                <a href="profile.html" class="pull-left">
                                    <img alt="image" class="img-circle" src="/Public/img/a6.jpg">
                                </a>
                                <div class="media-body ">
                                    <small class="pull-right text-navy">5h ago</small>
                                    <strong>Chris Johnatan Overtunk</strong> started following <strong>Monica Smith</strong>. <br>
                                    <small class="text-muted">Yesterday 1:21 pm - 11.06.2014</small>
                                </div>
                            </div>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <div class="dropdown-messages-box">
                                <a href="profile.html" class="pull-left">
                                    <img alt="image" class="img-circle" src="/Public/img/a6.jpg">
                                </a>
                                <div class="media-body ">
                                    <small class="pull-right">23h ago</small>
                                    <strong>Monica Smith</strong> love <strong>Kim Smith</strong>. <br>
                                    <small class="text-muted">2 days ago at 2:30 am - 11.06.2014</small>
                                </div>
                            </div>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <div class="text-center link-block">
                                <a href="mailbox.html">
                                    <i class="fa fa-envelope"></i> <strong>Read All Messages</strong>
                                </a>
                            </div>
                        </li>
                    </ul>
                </li>
                <li class="dropdown">
                    <!--<a class="dropdown-toggle count-info" data-toggle="dropdown" href="javascript:void(0)">-->
                        <!--<i class="fa fa-bell"></i>  <span class="label label-primary">8</span>-->
                    <!--</a>-->
                    <ul class="dropdown-menu dropdown-alerts">
                        <li>
                            <a href="mailbox.html">
                                <div>
                                    <i class="fa fa-envelope fa-fw"></i> You have 16 messages
                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="profile.html">
                                <div>
                                    <i class="fa fa-twitter fa-fw"></i> 3 New Followers
                                    <span class="pull-right text-muted small">12 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="grid_options.html">
                                <div>
                                    <i class="fa fa-upload fa-fw"></i> Server Rebooted
                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <div class="text-center link-block">
                                <a href="notifications.html">
                                    <strong>See All Alerts</strong>
                                    <i class="fa fa-angle-right"></i>
                                </a>
                            </div>
                        </li>
                    </ul>
                </li>


                <li>
                    <a href="/user/logout">
                        <i class="fa fa-sign-out"></i> Log out
                    </a>
                </li>
            </ul>

        </nav>
    </div>
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Profile</h2>
        <ol class="breadcrumb">
            <li>
                <a href="index.html">西科码数据管理平台</a>
            </li>
            <li class="active">
                <strong>Profile</strong>
            </li>
        </ol>
    </div>
    <div class="col-lg-2">

    </div>
</div>
<div class="wrapper wrapper-content">
    <div class="row">
        <div class="col-lg-4">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>个人信息</h5>
                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                        <a class="close-link">
                            <i class="fa fa-times"></i>
                        </a>
                    </div>
                </div>
                <div class="ibox-content ibox-heading">
                    <h3><i class="fa fa-user"></i> 个人信息</h3>
                </div>
                <div class="ibox-content">
                    <div class="text-left">
                        <table class="table">
                            <tbody><tr class="no-borders-tr">
                                <td colspan="2">
                                    <img src="/Public/img/a6.jpg" class="img-circle" width="64" height="64">
                                </td>
                            </tr>
                            <tr class="no-borders-tr">
                                <td class="text-navy">用户名</td>
                                <td><?php echo ($userProfile["accout"]); ?></td>
                            </tr>
                            <tr>
                                <td class="text-navy">名称</td>
                                <td><?php echo ($userProfile["nickname"]); ?></td>
                            </tr>
                            <tr>
                                <td class="text-navy">登录次数</td>
                                <td><?php echo ($userInfo["flogincount"]); ?></td>
                            </tr>
                            <tr>
                                <td class="text-navy">激活</td>
                                <td>Yes</td>
                            </tr>
                            <tr>
                                <td class="text-navy">创建日期</td>
                                <td><?=date('Y-m-d H:i:s',$userInfo['fcreatetime'])?></td>
                            </tr>
                            <tr>
                                <td class="text-navy">最后登录</td>
                                <td><?=date('Y-m-d H:i:s',$userInfo['flastlogintime'])?></td>
                            </tr>
                            <tr>
                                <td class="text-navy">最后登录IP</td>
                                <td><?=$userInfo['flastloginip'];?></td>
                            </tr>
                            <tr>
                                <td class="text-navy">用户组</td>
                                <td>
                                    <table>

                                        <tbody><tr>
                                            <td>
                                                <?php echo ($userProfile["group_name"]); ?>
                                            </td>
                                        </tr>

                                        </tbody></table>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-navy">备注:</td>
                                <td><b><?php echo ($userProfile["remarks"]); ?></b></td>
                            </tr>
                            </tbody></table>
                    </div>
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <i class="fa fa-info-circle"></i> 快速修改
                        </div>
                        <div class="panel-body">
                            <table class="table">
                                <tbody>
                                    <tr class="no-borders-tr">
                                        <td>重置密码:</td>
                                        <td>
                                                <span class="pull-right">
                                                    <a type="button" class="btn btn-primary btn-xs" style="width: 54px" href="/user/profile/password/update">重置</a>
                                                </span>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>登录日志</h5>
                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                        <a class="close-link">
                            <i class="fa fa-times"></i>
                        </a>
                    </div>
                </div>
                <div class="ibox-content ibox-heading">
                    <h3><i class="fa fa-send"></i> 最近十次登录记录</h3>
                </div>
                <div class="ibox-content">
                    <div class="feed-activity-list">
                        <?php foreach($loginLogList as $k=>$v){ $content = json_decode($v['content'],true); ?>
                            <div class="feed-element">
                                <div>
                                    <small class="pull-right text-navy">
                                        <?php
 $agoTime = time() - $v['create_at']; switch($agoTime){ case $agoTime < 60: echo $agoTime.'秒前登录'; break; case $agoTime < 3600: echo floor($agoTime / 60).'分钟前登录'; break; case $agoTime <86400: echo floor($agoTime / 3600).'小时前登录'; break; case $agoTime <259200: echo floor($agoTime / 3600).'天前登录'; break; } ?>
                                    </small>
                                    <strong><?=$v['account'];?></strong>
                                    <br /><br />
                                    <div>
                                        设备信息:<?php echo ($content["userAgent"]); ?>
                                        <br /><br />
                                        登录设备IP:<?php echo ($content["userIP"]); ?>
                                    </div>
                                    <small class="text-muted"><?=date('Y年m月d日 H:i:s',$v['create_at']);?></small>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>操作日志</h5>
                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                        <a class="close-link">
                            <i class="fa fa-times"></i>
                        </a>
                    </div>
                </div>
                <div class="ibox-content ibox-heading">
                    <h3><i class="fa fa-paper-plane-o"></i> 最近十次操作记录</h3>
                </div>
                <div class="ibox-content">
                    <div class="feed-activity-list">
                        <?php foreach($operationLog as $k=>$v){ $content = json_decode($v['content'],true); ?>
                        <div class="feed-element">
                            <div>
                                <small class="pull-right text-navy">
                                    <?php
 $agoTime = time() - $v['create_at']; switch($agoTime){ case $agoTime < 60: echo $agoTime.'秒前'; break; case $agoTime < 3600: echo floor($agoTime / 60).'分钟前'; break; case $agoTime <86400: echo floor($agoTime / 3600).'小时前'; break; case $agoTime <259200: echo floor($agoTime / 3600).'天前'; break; } ?>
                                </small>
                                <strong><?=$v['account'];?></strong>
                                <br /><br />
                                <div>
                                    <b>操作URL:</b><?php echo ($content["url"]); ?>
                                    <br />
                                    <b>请求参数:</b>
                                    <pre>
                                        <?php echo ($content["params"]); ?>
                                    </pre>
                                    <br />
                                    <b>请求Method:</b><?php echo ($content["method"]); ?>
                                    <br />
                                    <b>请求IP:</b><?php echo ($content["userIp"]); ?>
                                </div>
                                <small class="text-muted"><?=date('Y年m月d日 H:i:s',$v['create_at']);?></small>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="footer">
    <div class="pull-right">
        Moe_data_Center   ALL Rights Reserved
    </div>
    <div>
        <strong>Copyright</strong> MoeTeam  &copy; 2014-2017
    </div>
</div>

</div>
</div>
<!-- Mainly scripts -->
<script src="/Public/js/bootstrap.min.js"></script>
<script src="/Public/js/plugins/metisMenu/metisMenu.min.js"></script>
<!--<script src="//cdnjs.cloudflare.com/ajax/libs/metisMenu/2.7.0/metisMenu.min.js"></script>-->
<!--<script src="//cdn.jsdelivr.net/npm/metismenu@2.7.0/dist/metisMenu.min.js"></script>-->

<!--<script src="https://cdn.bootcss.com/metisMenu/2.6.1/metisMenu.min.js"></script>-->


<script src="/Public/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>
<!-- Custom and plugin javascript -->
<script src="/Public/js/inspinia.js"></script>
<!--<script src="/Public/js/plugins/pace/pace.min.js"></script>-->

<script type="application/javascript">
     $('#side-menu').metisMenu();
</script>

</body>
</html>