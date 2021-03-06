<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:66:"D:\phpStudy\WWW\wechat\public/../application/index\view\index.html";i:1520404283;}*/ ?>
<!DOCTYPE html>
<html lang="zh-CN">
	<head>
		<meta charset="utf-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width,height=device-height, initial-scale=1, maximum-scale=1, user-scalable=no"/>
		<title>登录页</title>
		<link rel="stylesheet" type="text/css" href="/static/css/bootstrap.min.css"/>
		<link rel="stylesheet" type="text/css" href="/static/css/layout.css"/>
	</head>
	<body>
		<div class="container" style="position:absolute;top:0;left:0;width: 100%;height:100%;background-color:darkturquoise;">
			<center>
				<form action="<?php echo url('Login/doLogin'); ?>" method="post" class="form-inline form-login" id="login">
					<div class="row">
						<div class="col-md-10 col-sm-10 col-xs-10 col-md-offset-1 col-sm-offset-1 col-xs-offset-1">
							<div class="form-group">
								<label for="tel" class="sr-only">手机号</label>
								<div class="input-group">
									<div class="input-group-addon"><span class="glyphicon glyphicon-user"></span></div>
									<input type="text" name="tel" id="tel" placeholder="请输入手机号" class="form-control tel"/>
								</div>
							</div>
							<div class="tel-error">*手机号格式错误</div>
						</div>
						<div class="col-md-10 col-sm-10 col-xs-10 col-md-offset-1 col-sm-offset-1 col-xs-offset-1" style="margin-top:8px;margin-bottom:20px;">
							<div class="form-group">
								<label for="pwd" class="sr-only">密码</label>
								<div class="input-group">
									<div class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></div>
									<input type="password" name="pwd" id="pwd" placeholder="请输入密码" class="form-control pwd1" />
								</div>
							</div>
							<p class="pwd1-error" style="margin-left:0px;margin-top:0px">*密码错误</p>
						</div>
						<div class="col-md-10 col-sm-10 col-xs-10 col-md-offset-1 col-sm-offset-1 col-xs-offset-1">
							<button type="button" class="btn btn-primary send" onclick="check_login()">Login</button>
						</div>
					</div>
				</form>
				<p class="link">
					<a href="<?php echo url('Login/register'); ?>">注册</a>&nbsp;&nbsp; | &nbsp;&nbsp;<a href="<?php echo url('Login/forgetpassword'); ?>">忘记密码</a>
				</p>
			</center>
		</div>
		<div class="wrap"></div>
		<div class="change-ok">
			<center>
				<p>更换手机号成功！</p>
			</center>
		</div>
		<script type="text/javascript" src="/static/js/jquery-2.1.4.min.js" ></script>
		<script type="text/javascript" src="/static/js/bootstrap.min.js" ></script>
		<script type="text/javascript" src="/static/js/main.js"></script>
		<script>
            //	登录页面验证
            function check_login(){
                var tel = $(".tel").val();
                var pwd = $("#pwd").val();
                if(!check_tel() || !check_pwd()){
                    return false;
                }else{
                    $.ajax({
                        url:"<?php echo url('Login/doLogin'); ?>",
                        type:'post',
                        dataType:'json',
                        data:{
                            "tel":tel,
                            "pwd":pwd
                        },
                        success:function(data){
                            if(data.rc==0){
                                window.location.href="<?php echo url('User/personal'); ?>"
							}else{
                                error(data.rc_msg);
                                return false;
							}
                        }
                    });
                }
            }
		</script>
	</body>
</html>
