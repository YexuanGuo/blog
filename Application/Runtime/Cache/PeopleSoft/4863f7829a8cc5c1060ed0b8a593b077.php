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
                            <img alt="image" class="img-circle" src="/Public/Upload/head_img/default.png" width="50" height="50" />
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
                    <span class="m-r-sm text-muted welcome-message">Welcome to PeopleSoft</span>
                </li>
                <li class="dropdown">
                    <!--<a class="dropdown-toggle count-info" data-toggle="dropdown" href="form_file_upload.html#">-->
                        <!--<i class="fa fa-envelope"></i>  <span class="label label-warning">16</span>-->
                    <!--</a>-->
                    <ul class="dropdown-menu dropdown-messages">
                        <li>
                            <div class="dropdown-messages-box">
                                <a href="profile.html" class="pull-left">
                                    <img alt="image" class="img-circle" src="/Public/img/a7.jpg">
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
                                    <img alt="image" class="img-circle" src="/Public/img/a4.jpg">
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
                                    <img alt="image" class="img-circle" src="/Public/img/profile.jpg">
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
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>菜单管理</h5>
                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                        <a class="dropdown-toggle" data-toggle="dropdown" href="table_data_tables.html#">
                            <i class="fa fa-wrench"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-user">
                            <li><a href="table_data_tables.html#">Config option 1</a>
                            </li>
                            <li><a href="table_data_tables.html#">Config option 2</a>
                            </li>
                        </ul>
                        <a class="close-link">
                            <i class="fa fa-times"></i>
                        </a>
                    </div>
                </div>
                <div class="ibox-content">
                    <div class="">
                        <a href="#" class="btn btn-primary"data-toggle="modal" data-target="#myModal5">添加新二级菜单</a>
                    </div>
                    <table class="table table-striped table-bordered table-hover " id="editable" >
                        <thead>
                        <tr>
                            <th style="text-align: center;">ID</th>
                            <th style="text-align: center;">Name</th>
                            <th style="text-align: center;">Class</th>
                            <th style="text-align: center;">Controller</th>
                            <th style="text-align: center;">Action</th>
                            <th style="text-align: center;">Status</th>
                            <th style="text-align: center;">操作</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach($menu_list as $k=>$v){ ?>
                        <tr class="gradeX">
                            <td style="text-align: center;"><?=$v['id'];?></td>
                            <td style="text-align: center;"><?=$v['name'];?></td>
                            <td style="text-align: center;"><?=$v['class'];?></td>
                            <td style="text-align: center;"><?=$v['controller'];?></td>
                            <td style="text-align: center;"><?=$v['action'];?></td>
                            <td style="text-align: center;">正常</td>
                            <td style="text-align: center;">
                                <!--<button type="button" class="btn btn-xs btn-primary">更新</button>-->
                                <button type="button" class="btn btn-xs btn-danger">删除</button>
                            </td>
                        </tr>
                        <?php } ?>
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal inmodal fade" id="myModal5" tabindex="-1" role="dialog"  aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title">添加二级菜单</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal">
                    <div class="form-group"><label class="col-lg-2 control-label">Name</label>
                        <div class="col-lg-10"><input id="menu_name" type="text" placeholder="Name" class="form-control"></div>
                    </div>
                    <div class="form-group"><label class="col-lg-2 control-label">controller</label>
                        <div class="col-lg-10"><input id="menu_controller" type="text" placeholder="controller" class="form-control"></div>
                    </div>
                    <div class="form-group"><label class="col-lg-2 control-label">Action</label>
                        <div class="col-lg-10"><input id="menu_action" type="text" placeholder="Action" class="form-control"></div>
                    </div>
                </form>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-white" data-dismiss="modal">取消</button>
                <button type="button" class="btn btn-primary save_second_menu">保存</button>
            </div>
        </div>
    </div>
</div>
<link href="/Public/css/plugins/sweetalert/sweetalert.css" rel="stylesheet">
<script src="/Public/js/plugins/sweetalert/sweetalert.min.js"></script>

<script type="application/javascript">
    $(".save_second_menu").click(function(){
        var pid = <?php echo ($_GET["add"]); ?>;
        var menu_name       = $("#menu_name").val();
        var menu_controller = $("#menu_controller").val();
        var menu_action     = $("#menu_action").val();

        if(menu_name != '' && menu_controller != '' && menu_action != '')
        {

            $.post('/configure/create_menu',{
                menu_name:menu_name,
                menu_controller:menu_controller,
                menu_action:menu_action,
                pid:pid,
            },function(res){
                var res = JSON.parse(res);
                if(res.code == 200)
                {
                    swal({
                        title: "操作成功",
                        text: "You clicked the button!",
                        type: "success"
                    },function(isConfirm){
                        window.location.reload();
                    });
                }
                else
                {
                    swal({
                        title: "操作失败,请稍后再试",
                        text: "You clicked the button!",
                        type: "error"
                    });
                }
            });

        }
        else
        {
            swal({
                title: "请认真填写~!",
                text: "You clicked the button!",
                type: "error"
            });
        }
    });
</script>
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