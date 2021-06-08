<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:69:"D:\phpStudy\WWW\wechat\public/../application/index\view\personal.html";i:1520414783;}*/ ?>
<!DOCTYPE html>
<html lang="zh-CN">
	<head>
		<meta charset="utf-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width,height=device-height, initial-scale=1, maximum-scale=1, user-scalable=no"/>
		<title>个人账户</title>
		<link rel="stylesheet" type="text/css" href="/static/css/bootstrap.min.css"/>
		<link rel="stylesheet" type="text/css" href="/static/css/layout.css"/>
	</head>
	<body>
		<div class="container" style="position:absolute;top:0;left:0;padding:0; width: 100%;height:100%;background:#EEEEEE">
			<header>
				<div class="left"><a href="<?php echo url('User/personal'); ?>"><span class="glyphicon glyphicon-chevron-left"></span></a></div>
				<center><div class="title">个人账户</div></center>
			</header>
			<div class="content">
				<div class="row">
					<div class="col-md-12 col-sm-12 col-xs-12 info" style="margin-top:42px;"><a onclick="per_name()"><img src="/static/img/smrz.png"/><span>实名认证</span></a></div>
					<div class="col-md-12 col-sm-12 col-xs-12 info"><a href="<?php echo url('Login/changetel'); ?>"><img src="/static/img/ghsjh.png"/><span>更换手机号</span></a></div>
					<div class="col-md-12 col-sm-12 col-xs-12 info"><a href="<?php echo url('Login/changepassword'); ?>"><img src="/static/img/xgmm.png"/><span>修改密码</span></a></div>
				</div>
				<div class="row">
					<div class="col-md-10 col-sm-10 col-xs-10 col-md-offset-1 col-sm-offset-1 col-xs-offset-1">
						<button type="button" class="btn btn-primary info-btn">退出登录</button>
					</div>
				</div>
			</div>
		</div>
		<div class="wrap"></div>
		<div class="qxyy login-out">
			<center><p>确定退出登录?</p></center>
			<button class="ok">确定</button>
			<button class="cancel">取消</button>
		</div>
		<script type="text/javascript" src="/static/js/jquery-2.1.4.min.js" ></script>
		<script type="text/javascript" src="/static/js/bootstrap.min.js" ></script>
		<script type="text/javascript" src="/static/js/main.js"></script>
		<script>
			$(function(){
				$(".info-btn").click(function(){
					$(".wrap,.qxyy").show();
				});
				
				$(".ok").click(function(){
					window.location.href="<?php echo url('Login/loginout'); ?>";
				});
				$(".cancel").click(function(){
					$(".wrap,.qxyy").hide();
				})
			});
			
		</script>
	</body>
</html>
