<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:68:"D:\phpStudy\WWW\wechat\public/../application/index\view\address.html";i:1519967208;}*/ ?>
<!DOCTYPE html>
<html lang="zh-CN">
	<head>
		<meta charset="utf-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width,height=device-height, initial-scale=1, maximum-scale=1, user-scalable=no"/>
		<title>选取地址</title>
		<link rel="stylesheet" type="text/css" href="/static/css/bootstrap.min.css"/>
		<link rel="stylesheet" type="text/css" href="/static/css/layout.css"/>
	</head>
	<body>
		<div class="container" style="position:absolute;top:0;left:0;padding:0; width: 100%;height:100%;background:#EEEEEE">
			<header>
				<div class="left"><a href="<?php echo url('index/appointment/line'); ?>"><span class="glyphicon glyphicon glyphicon-remove remove"></span></a></div>
				<center><div class="title">选取地址</div></center>
				<div class="save">保存</div>
			</header>
			<div class="content">
				<div class="row">
					<div class="col-md-12 col-sm-12 col-xs-12" style="color:#5E5E5E;z-index: 3;height:60px;line-height:68px;border-bottom:1px solid #CCCCCC">
						<center><img src="/static/img/add.png"/><span>&nbsp;&nbsp;雨花区大数据基地8号楼</span>
						<a href="javascript:;" class="rim">周边</a></center>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12 col-sm-12 col-xs-12"></div>
				</div>
				<div class="row">
					<div class="col-md-12 col-sm-12 col-xs-12 bottom">
						<p>1.南京大数据基地南京大数据基地南京大数据基地南京大数据基地</p>
						<p>2.天龙寺地铁站</p>
						<p>1.凤翔新城二期</p>
					</div>
				</div>
			</div>
		</div>
		<div class="enter-add">
			<header>
				<input type="text" name="add" class="add" />
				<span class="glyphicon glyphicon-remove remove" style="display: block;"></span>
			</header>
			<div class="cur-location">
				<center><img src="__IMG_/add.png"/>当前定位:<span class="cur-con">&nbsp;&nbsp;雨花区大数据基地8号楼</span>
			</div>
			<div class="nearby">
				<div class="nearby-add"><img src="/static/img/add.png"/>附近地址</div>
				<div class="nearby-add-con">
					<p>生物科技园</p>
					<p>诚迈科技有限公司诚迈科技有限公司诚迈科技有限公司诚迈科技有限公司</p>
					<p>亚信</p>
					<p>华为</p>
					<p>天隆寺地铁站</p>
					<p>华为</p>
				</div>
			</div>
		</div>
		<script type="text/javascript" src="/static/js/jquery-2.1.4.min.js" ></script>
		<script type="text/javascript" src="/static/js/bootstrap.min.js" ></script>
		<script type="text/javascript" src="/static/js/main.js"></script>
	</body>
</html>
