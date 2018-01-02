<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>西科码Co.,Ltd | 西科码数据可视化管理平台</title>

    <link href="/Public/css/bootstrap.min.css" rel="stylesheet">
    <link href="/Public/font-awesome/css/font-awesome.css" rel="stylesheet">

    <link href="/Public/css/animate.css" rel="stylesheet">
    <link href="/Public/css/style.css" rel="stylesheet">
    <link href="/Public/css/plugins/sweetalert/sweetalert.css" rel="stylesheet">

</head>

<body class="gray-bg">

<div class="loginColumns animated fadeInDown">
    <div class="row">

        <div class="col-md-6">
            <h2 class="font-bold">Moe | Moe_Data_Center</h2>

            <p>
                <br />
                欢迎使用Moe数据可视化管理平台 (Beta Version 1.0) .
            </p>

            <p>
                请严格阅读首页Tips,每条操作都会有记录,请谨慎操作!
            </p>

            <p>
                1、敏捷开发管理 | APD (AgileProduct Development)<br />
                2、行政管理平台 | ECP (Admin management Platform)<br />
                3、财务管理平台 | FCP (Finance Control Platform)<br />
                4、更多功能请查看Readme...这里字多了就不太好排版了。<br />
            </p>

        </div>
        <div class="col-md-6">
            <div class="ibox-content">
                <form class="m-t" role="form" action="/index/login" method="post">
                    <div class="form-group">
                        <input type="text" class="form-control username" placeholder="Username" required="" name="username">
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control password" placeholder="Password" required="" name="password">
                    </div>
                    <button type="button" class="btn btn-primary block full-width m-b login_button">Login</button>

                    <a href="javascript:void(0)" class="not_account_alert">
                        <small>还没有账号? / 账号忘记了?</small>
                    </a>

                    <p class="text-muted text-center">
                        <!--<small>Do not have an account?</small>-->
                    </p>
                    <!--<a class="btn btn-sm btn-white btn-block" href="register.html">Create an account</a>-->
                </form>
                <p class="m-t">
                    <!--<small>Inspinia we app framework base on Bootstrap 3 &copy; 2017</small>-->
                </p>
            </div>
        </div>
    </div>
    <hr/>
    <div class="row">
        <div class="col-md-6">
            Codedance Inc.
        </div>
        <div class="col-md-6 text-right">
            <small>© 2014-2017</small>
        </div>
    </div>
</div>

</body>

</html>
<!-- Mainly scripts -->
<script src="/Public/js/jquery-2.1.1.js"></script>
<script src="/Public/js/bootstrap.min.js"></script>
<script src="/Public/js/plugins/sweetalert/sweetalert-dev.js"></script>

<script type="application/javascript">
    $(function(){
        $('.not_account_alert').click(function(){
            swal({
                title: "Moe_Data_Center!",
                text: "为了保证数据的安全性与真实性，我们目前不提供对外注册服务。如需开通账号，请发邮件到信息技术部.我们会帮您尽快开通。"
            });
        });

        $(".login_button").click(function(){
            var username = $(".username").val();
            var password = $(".password").val();
            $.post('/user/login',{
                username:username,
                password:password
            },function(res){
                switch(res)
                {
                    case 1:
                        window.location.href = '/index';
                        break;
                    case 0:
                        sweet_alert_dialog('账号/密码错误','您的账号或密码输入有误。');
                        break;
                    case -1:
                        sweet_alert_dialog('账号/密码错误','您的账号或密码输入有误。');
                }

            });
        });

        function sweet_alert_dialog(title,content)
        {
            swal({
                title: title,
                text: content
            });
        }
    });
</script>