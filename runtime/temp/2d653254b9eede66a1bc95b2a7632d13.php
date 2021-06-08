<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:69:"D:\phpStudy\WWW\wechat\public/../application/index\view\register.html";i:1520329366;}*/ ?>
<!DOCTYPE html>
<html lang="zh-CN">
	<head>
		<meta charset="utf-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width,height=device-height, initial-scale=1, maximum-scale=1, user-scalable=no"/>
		<title>注册</title>
		<link rel="stylesheet" type="text/css" href="/static/css/bootstrap.min.css"/>
		<link rel="stylesheet" type="text/css" href="/static/css/layout.css"/>
	</head>
	<body>
		<div class="container" style="position:absolute;top:0;left:0;padding:0; width: 100%;height:100%;background:#EEEEEE">
			<header>
				<div class="left"><a href="<?php echo url('index/login/login'); ?>"><span class="glyphicon glyphicon-chevron-left"></span></a></div>
				<center><div class="title">注册</div></center>
			</header>
			<div class="content">
				<form  method="get" class="form-inline" action="#" id="register">
					<!--输入手机号-->
					<div class="row reg-tel tab-content" style="display: block;">
						<div class="col-md-12 col-xs-12 col-sm-12">
							<div class="input-group">
								<div class="input-group-addon"><span>手机号码</span></div>
								<input type="number" name="tel" id="tel" class="form-control tel" placeholder="请输入手机号" />
								<span class="glyphicon glyphicon-remove remove"></span>
							</div>
							<div class="tel-error" style="margin-left: -20px;">*手机号格式错误</div>
						</div>
					<!--设置密码-->
						<div class="col-md-12 col-xs-12 col-sm-12">
							<div class="input-group set-psd1" style="background:#fff;">
								<div class="input-group-addon"><span>验证码</span></div>
								<span style="display:block;width:68%;margin-top:-1px;">
									<input type="number" name="code" class="form-control code" placeholder="6位验证码" style="border-right-color:transparent;border-bottom-color: transparent;height:4.6rem;line-height:4.6rem;"/>
									<span class="glyphicon glyphicon-remove remove"></span>
								</span>
								<button class="reget btn" onclick="get_code()">获取验证码</button>
							</div>
							
								<div class="code-error">*验证码错误</div>
						</div>
						<div class="col-md-12 col-xs-12 col-sm-12">
							<div class="input-group">
								<div class="input-group-addon"><span>设置密码</span></div>
								<input type="password" name="pwd" class="form-control pwd1" placeholder="6-18位密码" />
								<span class="glyphicon glyphicon-remove remove"></span>
							</div>
							<div class="pwd1-error">*密码格式错误</div>
						</div>
						<div class="col-md-12 col-xs-12 col-sm-12">
							<div class="input-group">
								<div class="input-group-addon"><span>确认密码</span></div>
								<input type="password" name="pwd" class="form-control pwd2" placeholder="6-18位密码" />
								<span class="glyphicon glyphicon-remove remove"></span>
							</div>
							<div class="pwd2-error">*两次输入的密码不一致</div>
						</div>
						
					<!--实名认证-->
					
						<div class="col-md-12 col-xs-12 col-sm-12">
							<div class="input-group">
								<div class="input-group-addon"><span>姓名</span></div>
								<input type="text" name="name" class="form-control username" placeholder="请输入姓名"/>
								<span class="glyphicon glyphicon-remove remove "></span>
							</div>
						</div>
						<p class="name-error">*姓名格式错误</p>
						<div class="col-md-12 col-xs-12 col-sm-12">
							<div class="input-group">
								<div class="input-group-addon"><span>身份证号</span></div>
								<input type="number" name="card" class="form-control card" placeholder="请输入18位身份证号" />
								<span class="glyphicon glyphicon-remove remove"></span>
							</div>
						</div>
						<div class="card-error">*身份证号错误</div>
						
					</div>
					<div class="checkbox">
						<center>
							<label>
								<input type="checkbox" class="checkbox" checked/>我已阅读并同意<a href="#">《用电协议》</a>
							</label>
						</center>
					</div>
					<div class="col-md-10 col-sm-10 col-xs-10 col-md-offset-1 col-sm-offset-1 col-xs-offset-1">
						<button type="button" class="btn btn-primary info-btn complete" onclick="check_register()">完成</button>
					</div>
				</form>
			</div>
		</div>
		<div class="wrap"></div>
		<div class="change-ok">
			<center>
				<p>修改密码成功！</p>
			</center>
		</div>
		<script type="text/javascript" src="/static/js/jquery-2.1.4.min.js" ></script>
		<script type="text/javascript" src="/static/js/bootstrap.min.js" ></script>
		<script type="text/javascript" src="/static/js/main.js"></script>
		<script>
            //	注册页面验证
            function check_register(){
                var tel = $.trim($(".tel").val());
                var code = $(".code").val();
                var pwd = $(".pwd1").val();
                var pwd2 = $(".pwd2").val();
                var name = $(".username").val();
                var card = $(".card").val();
                if(!check_tel() || !check_code() || !check_pwd() || !check_rpwd() || !check_name() || !check_card() || !$(".checkbox").is(":checked")){
                    return false;
                }
                $.ajax({
                    type:'post',
                    url:"<?php echo url('Login/doRegister'); ?>",
                    dataType:'json',
                    data:{"tel":tel,
                        "code":code,
                        "pwd":pwd,
                        "name":name,
                        "card":card
                    },
                    success:function(data){
                        if(data.rc == 0){
                            window.location.href="<?php echo url('User/personal'); ?>"
						}else if(data.rc == 1001){
                            $(".code-error").show().html("验证码填写错误！");
                            return false;
						}else{
                            $(".tel-error").show().html("该手机号已被注册，请直接登录");
                            return false;
						}
                    }
                });


            }
		</script>
	</body>
</html>
