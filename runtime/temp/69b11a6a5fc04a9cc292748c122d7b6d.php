<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:65:"D:\phpStudy\WWW\wechat\public/../application/index\view\wjmm.html";i:1520392822;}*/ ?>
<!DOCTYPE html>
<html lang="zh-CN">
	<head>
		<meta charset="utf-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width,height=device-height, initial-scale=1, maximum-scale=1, user-scalable=no"/>
		<title>忘记密码</title>
		<link rel="stylesheet" type="text/css" href="/static/css/bootstrap.min.css"/>
		<link rel="stylesheet" type="text/css" href="/static/css/layout.css"/>
	</head>
	<body>
		<div class="container" style="position:absolute;top:0;left:0;padding:0; width: 100%;height:100%;background:#EEEEEE">
			<header>
				<div class="left"><a href="<?php echo url('index/login/login'); ?>"><span class="glyphicon glyphicon-chevron-left"></span></a></div>
				<center><div class="title">忘记密码</div></center>
			</header>
			<div class="content">
				<form method="get" class="form-inline" action="#" id="wjmm">
					<div class="forget1" style="display: block;">
							<div class="row">
								<div class="col-md-12 col-xs-12 col-sm-12">
									<div class="input-group">
										<div class="input-group-addon"><span>手机号码</span></div>
										<input type="number" name="tel" class="form-control tel" placeholder="请输入手机号"/>
										<span class="glyphicon glyphicon-remove remove"></span>
									</div>
									<div class="tel-error" style="margin-left:-20px;">*手机号格式错误</div>
								</div>
								<div class="col-md-12 col-xs-12 col-sm-12">
									<div class="input-group" style="background: #fff;">
										<div class="input-group-addon"><span>验证码</span></div>
										<span style="display:block;width:68%;margin-top:-1px;">
											<input type="number" name="code" class="form-control code" placeholder="6位验证码" style="border-right-color:transparent;border-bottom-color: transparent;height:4.6rem;line-height:4.6rem;"/>
											<span class="glyphicon glyphicon-remove remove"></span>
										</span>
										<button class="reget btn" onclick="get_code()">获取验证码</button>
									</div>
									<p class="code-error">*验证码错误</p>
								</div>
								<div class="col-md-12 col-xs-12 col-sm-12">
									<div class="input-group">
										<div class="input-group-addon"><span>设置密码</span></div>
										<input type="password" name="pwd" class="form-control pwd1" placeholder="请输入新密码"/>
										<span class="glyphicon glyphicon-remove remove"></span>
									</div>
									<p class="pwd1-error">*密码格式不正确</p>
								</div>
								<div class="col-md-10 col-sm-10 col-xs-10 col-md-offset-1 col-sm-offset-1 col-xs-offset-1">
									<button type="button" class="btn btn-primary info-btn" onclick="check_forgetPwd()">提交</button>
								</div>
							</div>
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
            //	忘记密码页面验证
            function check_forgetPwd(){
                var tel = $.trim($(".tel").val());
                var code = $(".code").val();
                var pwd = $(".pwd1").val();
                if(!check_tel() || !check_code() || !check_pwd()){
                    return false;
                }
                $.ajax({
                    type:'post',
                    url:"<?php echo url('Login/doForgetpassword'); ?>",
                    dataType:'json',
                    data:{"tel":tel,
                        "code":code,
                        "pwd":pwd
                    },
                    success:function(data){
                        if(data.rc == 1001){
                            $(".code-error").show().html("验证码填写错误!");
                            return false;
                        }else if(data.rc == 1 ){
                            $(".tel-error").show().html("该手机号未注册，请先注册");
                            return false;
                        }else{
                            $(".wrap,.change-ok").show();
                            setTimeout(function(){
                                $(".wrap,.change-ok").hide();
                                window.location.href="<?php echo url('User/personal'); ?>";
                            },2000);
                        }
                    }
                });

            }
		</script>
		
	</body>
</html>
