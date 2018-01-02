<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>西科码Co.,Ltd | 销售管理平台</title>

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
                            <img alt="image" class="img-circle" src="/Public/img/profile_small.jpg" />
                             </span>
        <a data-toggle="dropdown" class="dropdown-toggle" href="form_file_upload.html#">
                            <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold"><?=$userInfo['fnickname'];?></strong>
                             </span> <span class="text-muted text-xs block"><?=$userInfo['faccount'];?><b class="caret"></b></span> </span> </a>
        <ul class="dropdown-menu animated fadeInRight m-t-xs">
            <li><a href="profile.html">Profile</a></li>
            <li><a href="contacts.html">Contacts</a></li>
            <li><a href="mailbox.html">Mailbox</a></li>
            <li class="divider"></li>
            <li><a href="/user/logout">Logout</a></li>
        </ul>
    </div>
    <div class="logo-element">
        ：）
    </div>
</li>
    <?php foreach($menu as $k=>$v){ ?>
        <li <?php if($v['controller'] == $actionName){ echo "class='active'";} ?>>
            <a href="javascript:void(0);"><i class="<?=$v['class'];?>"></i>
                <span class="nav-label"><?=$v['name'];?></span>
                <span class="fa arrow"></span>
            </a>
            <ul class="nav nav-second-level collapse">
                <?php foreach($v['two_level_menu'] as $tow_level_menu_key=>$tow_level_menu_val){ ?>
                    <li><a href="/<?php echo ($tow_level_menu_val["controller"]); ?>/<?php echo ($tow_level_menu_val["action"]); ?>"><?=$tow_level_menu_val['name'];?></a></li>
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
<script src="/Public/js/plugins/sweetalert/sweetalert-dev.js"></script>
<link href="/Public/css/plugins/sweetalert/sweetalert_dev.css" rel="stylesheet">
<link href="/Public/css/wechat/card_control.css" rel="stylesheet">
<!--<link href="/Public/css/wechat/card_base.css" rel="stylesheet">-->

<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-6" style="padding-right: 7px;padding-left: 0px;">
            <div class="ibox float-e-margins" >
                <div class="ibox-title">
                    <h5>创建微信卡券</h5>
                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                        <a class="dropdown-toggle" data-toggle="dropdown" href="form_basic.html#">
                            <i class="fa fa-wrench"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-user">
                            <li><a href="form_basic.html#">Config option 1</a>
                            </li>
                            <li><a href="form_basic.html#">Config option 2</a>
                            </li>
                        </ul>
                        <a class="close-link">
                            <i class="fa fa-times"></i>
                        </a>
                    </div>
                </div>

                <div class="ibox-content">
                   <form method="get" class="form-horizontal" id="conpons_form">
                        <div class="form-group">
                            <label class="col-sm-2 control-label">上传Logo</label>
                                <div class="col-sm-10">
                                    <div class="input-group">
                                        <input type="file" class="form-control" name="buffer">
                                            <span class="input-group-btn">
                                                <button type="button" class="btn btn-primary upload_logo_button">上传LOGO</button>
                                            </span>
                                    </div>
                                </div>
                        </div>
                       <div class="hr-line-dashed"></div>

                       <div class="form-group"><label class="col-sm-2 control-label">商户名称</label>
                            <div class="col-sm-10"><input type="text" class="form-control" id="brand_name" name="brand_name"></div>
                        </div>
                        <div class="hr-line-dashed"></div>

                       <!--<div class="form-group"><label class="col-sm-2 control-label">卡券类型</label>-->

                           <!--<div class="col-sm-10"><select class="form-control m-b" name="conpon_type">-->
                               <!--<option>折扣券</option>-->
                               <!--<option>代金券</option>-->
                               <!--<option>兑换券</option>-->
                               <!--<option>团购券</option>-->
                               <!--<option>优惠券</option>-->
                           <!--</select>-->
                           <!--</div>-->
                       <!--</div>-->
                       <div class="hr-line-dashed"></div>

                       <div class="form-group">
                            <label class="col-sm-2 control-label">优惠券标题</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="conpon_title_name" name="title">
                                <span class="help-block m-b-none" style="color: red;" id="limit_alert"></span>
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>

                       <!--<div class="form-group">-->
                           <!--<label class="col-sm-2 control-label">有效期</label>-->
                           <!--<div class="col-md-5"><input type="text" class="form-control" id="startTime" name="startTime"></div>-->
                           <!--<div class="col-md-5"><input type="text" class="form-control" id="endTime" name="endTime"></div>-->
                       <!--</div>-->
                       <div class="hr-line-dashed"></div>

                       <div class="form-group">
                           <label class="col-sm-2 control-label">卡券描述</label>
                           <div class="col-sm-10">
                               <textarea class="form-control" id="description" rows="3" name="description"></textarea>
                           </div>
                       </div>
                       <div class="hr-line-dashed"></div>
                       <div class="form-group">
                           <label class="col-sm-2 control-label">卡券详情</label>
                           <div class="col-sm-10">
                               <textarea class="form-control" id="deal_detail" rows="3" name="deal_detail"></textarea>
                           </div>
                       </div>
                       <div class="hr-line-dashed"></div>
                       <div class="form-group">
                            <div class="col-sm-4 col-sm-offset-2">
                                <button class="btn btn-primary create_conpons_button" type="button">创建优惠券</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-6" style="padding-right: 7px;padding-left: 0px;">
            <div class="ibox float-e-margins" >
                <div class="ibox-title">
                    <h5>微信卡券预览</h5>
                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                        <a class="dropdown-toggle" data-toggle="dropdown" href="form_basic.html#">
                            <i class="fa fa-wrench"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-user">
                            <li><a href="form_basic.html#">Config option 1</a>
                            </li>
                            <li><a href="form_basic.html#">Config option 2</a>
                            </li>
                        </ul>
                        <a class="close-link">
                            <i class="fa fa-times"></i>
                        </a>
                    </div>
                </div>

                <div class="ibox-content">
                    <form method="get" class="form-horizontal" id="conpons_card_form">
                        <div class="form-group"><label class="col-sm-2 control-label">卡券预览</label>
                            <div class="col-sm-10">
                                <div class="input-group">
                                    <div class="card_preview_area js_color_bg_preview affix-top" data-spy="affix" data-offset-top="220" data-offset-bottom="490">
                                        <div class="card_body" id="js_preview_area"><p class="msg_title">折扣券</p>
                                        <div class="js_preview msg_card_section shop disabled">
                                            <div class="shop_panel">
                                                <div class="logo_area">
                                                    <span class="logo">
                                                        <img id="js_logo_url_preview" src="/Public/img/default_logo.png">
                                                    </span>
                                                    <p id="js_brand_name_preview">西科码口腔</p>
                                                </div>
                                                <div class="msg_area">
                                                    <div class="tick_msg">
                                                        <p id="js_title_preview" class="card_name">

                                                        </p>
                                                        <span class="btn btn_use_card js_use_card_button" id="js_color_preview">使用</span>
                                                    </div>

                                                    <div class="js_card_pay_money_tips" style="display:none;">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card_usage">
                                                <ul>
                                                    <li><span class="usage_label" id="js_use_condition_preview_p" style="display: none;">使用条件：</span><span id="js_use_condition_preview"></span></li>


                                                    <li><span class="usage_label">可用时间：</span><span id="js_use_time_preview"></span><span id="js_time_limit_preview">周一至周日</span></li>
                                                </ul>
                                            </div>

                                            <div class="msg_card_cell quick_pay" id="js_shop_wepay" style="display:none">
                                                <a href="javascript:;" class="js_title_color_preview">快速买单</a>
                                            </div>
                                        </div>
                                        <div class="msg_card_cell dispose">
                                            <p>销券设置</p>
                                        </div>
                                        <div class="msg_card_cell msg_img_text js_cover_preview_container" style="display:none;">
                                            <ul class="list">
                                                <li class="msg_card_section">
                                                    <div class="li_panel">
                                                        <div class="li_content">
                                                            <div class="section_card_intro">
                                                                <div class="cover_wrap" id="js_cover_preview">

                                                                </div>
                                                                <div class="cover_summary">
                                                                    <span class="ic ic_go"></span>
                                                                    <span id="js_abstract_preview"></span>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="msg_card_cell shop_detail last_cell">
                                            <ul class="list" style="list-style:none;">
                                                <li class="msg_card_section js_preview">
                                                    <div class="li_panel" href="">
                                                        <div class="li_content">
                                                            <p>适用门店</p>
                                                        </div>
                                                        <span class="ic ic_go"></span>
                                                    </div>
                                                </li>
                                                <li class="msg_card_section js_preview last_li">
                                                    <div class="li_panel" href="">
                                                        <div class="li_content">
                                                            <p>公众号</p>
                                                        </div>
                                                        <span class="ic ic_go"></span>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="msg_card_cell custom_detail">
                                            <ul class="list" id="js_custom_url_preview" style="list-style:none;">
                                                <li class="msg_card_section last_li">
                                                    <div class="li_panel">
                                                        <div class="li_content">
                                                            <p>
                                                                <span class="supply_area">
                                                                    <span class="js_custom_url_tips_pre">

                                                                    </span>
                                                                    <span class="ic ic_go">

                                                                    </span>
                                                                </span>
                                                                <span class="js_custom_url_name_pre">自定义入口</span>
                                                            </p>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="/Public/js/laydate/laydate.js"></script>

<script type="application/javascript">
    window.onbeforeunload = function() {
       return "确定要离开次页面吗？!";
    };
    /*
    var end = {
        elem: '#endTime',
        format: 'YYYY-MM-DD',
        max: '2099-06-16 23:59:59',
        istime: true,
        istoday: true,
        festival: true,
        choose: function(datas){
            start.max = datas; //结束日选好后，重置开始日的最大日期
        }
    };
    var start = {
        elem: '#startTime',
        format: 'YYYY-MM-DD',
        max: '2099-06-16 23:59:59',
        istime: true,
        istoday: true,
        festival: true,
        choose: function(datas){
            start.max = datas; //结束日选好后，重置开始日的最大日期
        }
    };
    laydate(start);
    laydate(end);
    */

    $(".upload_logo_button").click(function()
    {
        var formData = new FormData($("#conpons_form")[0]);
        $.ajax({
            url: '/wxservice/upload_conpons_logo',
            type: 'POST',
            data: formData,
            async: false,
            cache: false,
            contentType: false,
            processData: false,
            success: function(res) {
              if(res.code == 200){
                  console.log(res.local_logo_url);
                  $("#js_logo_url_preview").attr('src',res.local_logo_url);
                  swal("LOGO上传成功!", "Yes!", "success");
              }else{
                  swal(res.msg, "请再试一次", "error");
              }
            }
        });
    });

    //创建优惠券
    $(".create_conpons_button").click(function(){

        if($("#brand_name").val() == ''){
            swal("商户名称不能为空", "请再试一次", "error");
            return false;
        }else if($("#conpon_title_name").val() == '' || $("#conpon_title_name").val().length >9){
            swal("创建失败", "优惠券名称不能为空并且不能大于9个字符", "error");
            return false;
        }else if($("#startTime").val() == '' || $("#endTime").val() == ''){
            swal("创建失败", "请填写优惠券有效期", "error");
            return false;
        }
        else if($("#description").val() == ''){
            swal("创建失败", "请填写卡券描述", "error");
            return false;
        }
        else if($("#deal_detail").val() == ''){
            swal("创建失败", "请填写卡券详情", "error");
            return false;
        }

            var formData = new FormData($("#conpons_form")[0]);
            $.ajax({
                url: '/wxservice/createconpons',
                type: 'POST',
                data: formData,
                async: false,
                cache: false,
                contentType: false,
                processData: false,
                success: function(res) {
                    if(res.code == 200){
                        swal("卡券创建成功,并且已生成货架~",":)",'success');

                    }else{
                        swal(res.msg, "卡券创建失败,请再试一次", "error");
                    }
                }
            });
    });

    //商户名称
    $("#brand_name").on('keyup',function(){
        var brand_name = $("#brand_name").val();
        if(brand_name == ''){
            $("#js_brand_name_preview").html('西科玛口腔');
        }else{
            $("#js_brand_name_preview").html(brand_name);
        }
    });
    //优惠券标题
    $("#conpon_title_name").on('keyup',function(){
        var brand_name = $("#conpon_title_name").val();
        if(brand_name == ''){
            $("#js_title_preview").html('西科玛口腔优惠券');
        }else{
            if(brand_name.length > 9){
                $("#limit_alert").html('标题最多9个字符');
                return ;
            }else{
                $("#limit_alert").html('');
                $("#js_title_preview").html(brand_name);
            }
        }
    });

</script>
<div class="footer">
    <div class="pull-right">
        10GB of <strong>250GB</strong> Free.
    </div>
    <div>
        <strong>Copyright</strong> Example Company &copy; 2014-2015
    </div>
</div>

</div>
</div>
<!-- Mainly scripts -->
<script src="/Public/js/bootstrap.min.js"></script>
<script src="/Public/js/plugins/metisMenu/jquery.metisMenu.js"></script>
<script src="/Public/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

<!-- Custom and plugin javascript -->
<script src="/Public/js/inspinia.js"></script>
<script src="/Public/js/plugins/pace/pace.min.js"></script>

</body>
</html>