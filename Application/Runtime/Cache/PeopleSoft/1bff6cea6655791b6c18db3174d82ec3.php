<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>西科码Co.,Ltd | 西科码数据可视化管理平台</title>

    <link href="/Public/css/bootstrap.min.css" rel="stylesheet">
    <link href="/Public/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="/Public/css/animate.css" rel="stylesheet">
    <!--<link href="/Public/css/plugins/dropzone/basic.css" rel="stylesheet">-->
    <!--<link href="/Public/css/plugins/dropzone/dropzone.css" rel="stylesheet">-->
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
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>西科码种植体数据库</h2>
        <ol class="breadcrumb">
            <li>
                <a href="index.html">销售平台管理</a>
            </li>
            <li class="active">
                <strong>西科码种植体数据库</strong>
            </li>
        </ol>
    </div>
    <div class="col-lg-2">

    </div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>耗材列表</h5>
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

                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover product_dataTables" >
                            <thead>
                            <tr>
                                <th style="text-align: center;">ID</th>
                                <th style="text-align: center;">植体生产商</th>
                                <th style="text-align: center;">系统编号及名称</th>
                                <th style="text-align: center;">型号Code</th>
                                <th style="text-align: center;">螺丝扭力</th>
                                <th style="text-align: center;">Segma</th>
                                <th style="text-align: center;">3shape</th>
                                <th style="text-align: center;">LS(抗璇)</th>
                                <th style="text-align: center;">LL(抗璇)</th>
                                <th style="text-align: center;">LL(非抗璇)</th>
                                <th style="text-align: center;">ALS(抗璇)</th>
                                <th style="text-align: center;">ALS(非抗璇)</th>
                                <th style="text-align: center;">TZ1</th>
                                <th style="text-align: center;">TZ2</th>
                                <th style="text-align: center;">TZ1N</th>
                                <th style="text-align: center;">TZ2N</th>
                                <th style="text-align: center;">ZIR</th>
                                <th style="text-align: center;">Ti</th>
                                <th style="text-align: center;">TA-1</th>
                                <th style="text-align: center;">操作</th>
                            </tr>
                            </thead>
                            <tbody>
                                <tr class="gradeX">

                                </tr>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<link href="/Public/css/plugins/sweetalert/sweetalert.css" rel="stylesheet">
<script src="/Public/js/plugins/sweetalert/sweetalert.min.js"></script>

<link href="/Public/css/plugins/dataTables/datatables.min.css" rel="stylesheet">

<script src="/Public/js/plugins/dataTables/datatables.min.js"></script>

<script type="application/javascript">


    $('.product_dataTables').DataTable({
        "processing": true,
        "dom": '<"html5buttons"B>lTfgitp',
        "serviceSize":true,
        "ajax":{
            "type":'POST',
            "url":'/salecontrol/getproductlist',
        },
        "columns": [
            { "data": 'id' },
            { "data": 'producer' },
            { "data": 'system_num_name' },
            { "data": 'model_code' },
            { "data": 'screw_code' },
            { "data": 'soft_platform_segma'},
            { "data": 'soft_platform_3shape'},
            { "data": 'ls'},
            { "data": 'll_yes'},
            { "data": 'll_no'},
            { "data": 'als_yes'},
            { "data": 'als_no'},
            { "data": 'tz1'},
            { "data": 'tz2'},
            { "data": 'tz1n'},
            { "data": 'tz2n'},
            { "data": 'zir'},
            { "data": 'ti'},
            { "data": 'ta_1'},
            { "data": 'id',
                "render":function(data,type,full,callback){
                    return ("<a href=/salecontrol/product/update/"+data+"><button type='button' class='btn btn-xs btn-primary'>更新</button></a>");
                }
            }
        ],
        "buttons": [
            {"extend": 'copy'},
            {"extend": 'csv'},
            {"extend": 'excel', title: '耗材数据导出_Excel'},
            {"extend": 'pdf', title: '耗材数据导出_Pdf'},

            {"extend": 'print',
                customize: function (win){

                    $(win.document.body).addClass('white-bg');
                    $(win.document.body).css('font-size', '10px');

                    $(win.document.body).find('table')
                        .addClass('compact')
                        .css('font-size', 'inherit');
                }
            }
        ],
        "bAutoWidth": false,                    //不自动计算列宽度
        "bProcessing": true,                    //显示等待菊花
        "bLengthChange": true,                 //用户不可改变每页显示数量
        "sPaginationType": "full_numbers",      //翻页界面类型
        "iDisplayLength":10,
        "bSort": false,
        "oLanguage": {                          //汉化
            "sLengthMenu": "每页显示 _MENU_ 条记录。",
            "sZeroRecords": "没有检索到数据。",
            "sInfo": "当前数据为从第 _START_ 到第 _END_ 条数据；总共有 _TOTAL_ 种耗材。",
            "sInfoEmtpy": "没有数据。",
            "sProcessing": "正在加载数据...",
            "sLoadingRecords": "耗材数据载入中...",
            "sInfoFiltered": '(过滤总耗材数 _MAX_ 条)',
            "oPaginate": {
                "sFirst": "首页",
                "sPrevious": "前页",
                "sNext": "后页",
                "sLast": "尾页"
            }
        }

    });
</script>
<div class="footer">
    <div class="pull-right">
        西科码股份(北京)科技有限公司   ALL Rights Reserved
    </div>
    <div>
        <strong>Copyright</strong> Segma  &copy; 2014-2017
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
<script src="/Public/js/plugins/pace/pace.min.js"></script>

<script type="application/javascript">
     $('#side-menu').metisMenu();
</script>

</body>
</html>