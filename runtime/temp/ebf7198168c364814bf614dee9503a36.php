<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:71:"D:\phpStudy\WWW\wechat\public/../application/index\view\change-tel.html";i:1520475212;}*/ ?>
<!DOCTYPE html>
<html lang="zh-CN">
	<head>
		<meta charset="utf-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width,height=device-height, initial-scale=1, maximum-scale=1, user-scalable=no"/>
		<title>更换手机号</title>
		<link rel="stylesheet" type="text/css" href="/static/css/bootstrap.min.css"/>
		<link rel="stylesheet" type="text/css" href="/static/css/layout.css"/>
	</head>
	<body>
		<div class="container" style="position:absolute;top:0;left:0;padding:0; width: 100%;height:100%;background:#EEEEEE">
			<header>
				<div class="left"><a href="<?php echo url('index/user/personal'); ?>"><span class="glyphicon glyphicon-chevron-left"></span></a></div>
				<center><div class="title">更换手机号</div></center>
			</header>
			<div class="content">
				<div class="forget1">
					<p>当前手机号：<span class="tel-number"><?php echo $tel; ?></span></p>
					<form action="#" method="post" class="form-inline" id="change">
						<div class="row">
							<div class="col-md-12 col-xs-12 col-sm-12">
								<div class="input-group">
									<div class="input-group-addon"><span>手机号码</span></div>
									<input type="number" name="tel" class="form-control tel"/>
									<span class="glyphicon glyphicon-remove remove"></span>
								</div>
								<div class="tel-error">*手机号格式错误</div>
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
							<div class="col-md-10 col-sm-10 col-xs-10 col-md-offset-1 col-sm-offset-1 col-xs-offset-1">
								<button type="button" class="btn btn-primary info-btn send-code-change" onclick="change_tel()">提交</button>
							</div>
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
            // 更换手机号
            function change_tel(){
                var tel = $(".tel").val();
                var code = $(".code").val();
                if(!check_tel() || !check_code()){
                    return false;
                }else{
                    $.ajax({
                        type:'post',
                        url:"<?php echo url('Login/doChangetel'); ?>",
                        async:true,
                        dataType:'json',
                        data:{"tel":tel,
                            "code":code
                        },
                        success:function(data){
                            if(data.rc == 0){
                                $(".wrap,.change-ok").show();
                                setTimeout(function(){
                                    $(".wrap,.change-ok").hide();
                                    window.location.href="<?php echo url('User/personal'); ?>";
                                },2000)
							}else if(data.rc == 1001){
                                $(".code-error").show().html("验证码填写错误!");
                                return false;
							}else{
                                $(".tel-error").show().html("该手机号已被注册!");
                                return false;
							}
                        }
                    });
                }
            }
		</script>
	</body>
</html>
