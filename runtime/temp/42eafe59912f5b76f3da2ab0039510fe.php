<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:65:"D:\phpStudy\WWW\wechat\public/../application/index\view\xgmm.html";i:1520413147;}*/ ?>
<!DOCTYPE html>
<html lang="zh-CN">
	<head>
		<meta charset="utf-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width,height=device-height, initial-scale=1, maximum-scale=1, user-scalable=no"/>
		<title>修改密码</title>
		<link rel="stylesheet" type="text/css" href="/static/css/bootstrap.min.css"/>
		<link rel="stylesheet" type="text/css" href="/static/css/layout.css"/>
	</head>
	<body>
		<div class="container" style="position:absolute;top:0;left:0;padding:0; width: 100%;height:100%;background:#EEEEEE">
			<header>
				<div class="left"><a href="<?php echo url('index/user/personal'); ?>"><span class="glyphicon glyphicon-chevron-left"></span></a></div>
				<center><div class="title">修改密码</div></center>
			</header>
			<div class="content">
				<div class="edit">
					<form action="#" method="post" class="form-inline" id="xgmm">
						<div class="row">
							<div class="col-md-12 col-xs-12 col-sm-12">
								<div class="input-group">
									<div class="input-group-addon"><span>旧密码</span></div>
									<input type="password" name="pwd" class="form-control pwd-old" placeholder="请输入旧密码"/>
									<span class="glyphicon glyphicon-remove remove"></span>
								</div>
								<p class="pld-error">*密码错误</p>
							</div>
							<div class="col-md-12 col-xs-12 col-sm-12">
								<div class="input-group">
									<div class="input-group-addon"><span>新密码</span></div>
									<input type="password" name="pwd" class="form-control pwd1" placeholder="请输入新密码"/>
									<span class="glyphicon glyphicon-remove remove"></span>
								</div>
								<p class="pwd1-error">*密码格式不正确</p>
							</div>
							<div class="col-md-12 col-xs-12 col-sm-12">
								<div class="input-group">
									<div class="input-group-addon"><span>确认密码</span></div>
									<input type="password" name="pwd" class="form-control pwd2" placeholder="请输入确认密码"/>
									<span class="glyphicon glyphicon-remove remove"></span>
								</div>
								<p class="pwd2-error">*两次输入的密码不一致</p>
							</div>
							<div class="col-md-10 col-sm-10 col-xs-10 col-md-offset-1 col-sm-offset-1 col-xs-offset-1">
								<button type="button" class="btn btn-primary info-btn btn-xgmm" onclick="change_pwd()">提交</button>
							</div>
						</form>
					</div>
				</div>
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
            // 修改密码
            function change_pwd(){
                var opwd = $(".pwd-old").val();
                var pwd = $(".pwd1").val();
                var pwd2 = $(".pwd2").val();
                if(!check_opwd() || !check_pwd() || !check_rpwd()){
                    return false;
                }else{
                    $.ajax({
                        url:"<?php echo url('Login/doChangepassword'); ?>",
                        type:'post',
                        dataType:'json',
                        data:{"opwd":opwd,
                            "pwd":pwd
                        },
                        success:function(data){
                            if(data.rc != 0){
                                $(".pld-error").show();
                                return false;
                            }else{
                                $(".wrap,.change-ok").show();
                                setTimeout(function(){
                                    $(".wrap,.change-ok").hide();
                                    window.location.href="<?php echo url('User/personal'); ?>";
                                },2000)
                            }
                        }
                    });
                }
            }
		</script>
	</body>
</html>
