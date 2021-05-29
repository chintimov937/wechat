
//	验证手机号
function check_tel(){
    var tel = $.trim($(".tel").val());
    var isMobile = /^1[34578]\d{9}$/;
    $(".tel").focus(function(){
        $(".tel-error").hide();
    });
    if(!tel || !isMobile.test(tel)){
        $(".tel-error").show();
        return false;
    }else{
        return true;
    }
}
//	验证旧密码
function check_opwd(){
    var opwd = $(".pwd-old").val();
    $(".pwd-old").focus(function(){
        $(".pld-error").hide();
    });
    if(!opwd || opwd.length < 6 || opwd.length > 18){
        $(".pld-error").show();
        return false;
    }else{
        return true;
    }
}
//	验证密码
function check_pwd(){
    var pwd = $(".pwd1").val();
    $(".pwd1").focus(function(){
        $(".pwd1-error").hide();
    });
    if(!pwd || pwd.length < 6 || pwd.length > 18){
        $(".pwd1-error").show();
        return false;
    }else{
        return true;
    }
}
//	验证确认密码
function check_rpwd(){
    var pwd1 = $(".pwd1").val();
    var pwd2 = $(".pwd2").val();
    $(".pwd2").focus(function(){
        $(".pwd2-error").hide();
    })
    if(!pwd2 || (pwd1 != pwd2)){
        $(".pwd2-error").show();
        return false;
    }else{
        return true;
    }

}
//	验证验证码
function check_code(){
    var code = $(".code").val();
    $(".code").focus(function(){
        $('.code-error').hide();
    });
    if(!code || code.length > 6){
        $(".code-error").show();
        return false;
    }else{
        return true;
    }
}

//	验证身份证
function check_card(){
    var card = $(".card").val();
    //	18位身份证
    var isIDCard2=/^[1-9]\d{5}[1-9]\d{3}((0\d)|(1[0-2]))(([0|1|2]\d)|3[0-1])\d{4}$/;

    $(".card").focus(function(){
        $(".card-error").hide();
    });

    if(!card || !isIDCard2.test(card)){
        $(".card-error").show();
        return false;
    }else{
        return true;
    }
}

//	验证姓名
function check_name(){
    var username = $(".username").val();
    var isName = /^[\u4E00-\u9FA5]{1,6}$/;
    $(".username").focus(function(){
        $(".name-error").hide();
    })
    if(!username || !isName.test(username)){
        $(".name-error").show();
        return false;
    }else{
        return true;
    }
}
function error(msg){
    $(".wrap,.change-ok").show().html(msg);
}



//	注册页面验证
function check_register(){
    var tel = $.trim($(".tel").val());
    var code = $(".code").val();
    var pwd = $(".pwd1").val();
    var pwd2 = $(".pwd2").val();
    var name = $(".name").val();
    var card = $(".card").val();
    if(!check_tel() || !check_code() || !check_pwd() || !check_rpwd() || !check_name() || !check_card() || !$(".checkbox").is(":checked")){
        return false;
    }
    $.ajax({
        type:'post',
        url:'/',
        dataType:'json',
        data:{"tel":tel,
            "code":code,
            "pwd":pwd,
            "name":name,
            "card":card
        },
        success:function(data){
            if(tel == data.tel){
                $(".tel-error").show().html("该手机号已被注册，请直接登录");
                return false;
            }else if(code != data.code){
                $(".code-error").show().html("验证码填写错误！");
                return false;
            }
        }
    });


}

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
        url:'/',
        dataType:'json',
        data:{"tel":tel,
            "code":code,
            "pwd":pwd
        },
        success:function(data){
            if(tel != data.tel){
                $(".tel-error").show().html("该手机号未注册，请先注册");
                return false;
            }else if(code != data.code){
                $(".code-error").show().html("验证码填写错误!");
                return false;
            }else{
                $(".wrap,.change-ok").show();
                setTimeout(function(){
                    $(".wrap,.change-ok").hide();
                    window.location.href="index.html";
                },2000);
            }
        }
    });

}

//	个人账户，实名认证
function per_name(){
    window.location.href="register.html";
    $(".tab-content").hide();
    $(".rel-name").show();
}

// 更换手机号
function change_tel(){
    var tel = $(".tel").val();
    var code = $(".code").val();
    if(!check_tel() || !check_code()){
        return false;
    }else{
        $.ajax({
            type:'post',
            url:'/',
            async:true,
            dataType:'json',
            data:{"tel":tel,
                "code":code
            },
            success:function(data){
                if(tel == data.tel){
                    $(".tel-error").show().html("该手机号与当前绑定的手机号相同");
                    return false;
                }else if(data.code != code){
                    $(".code-error").show().html("验证码填写错误!");
                    return false;
                }else{
                    $(".wrap,.change-ok").show();
                    setTimeout(function(){
                        $(".wrap,.change-ok").hide();
                        window.location.href="personal.html";
                    },2000)
                }
            }
        });
    }
}

// 填写验证码
//function inp_code(){
//	var code = $(".code").val();
//	if(!check_code()){
//		return false;
//	}else{
//		$.ajax({
//			type:"post",
//			url:"/",
//			async:true,
//			dataType:"json",
//			data:{"code":code},
//			success:function(data){
//				if(code != data.code){
//					$(".code-error").show().html("验证码填写错误！");
//					return false;
//				}else{
//					$(".wrap,.change-ok").show();
//					setTimeout(function(){
//						$(".wrap,.change-ok").hide();
//						window.location.href="personal.html";
//					},2000)
//				}
//			}
//		});
//	}
//}

// 修改密码
function change_pwd(){
    var opwd = $(".pwd-old").val();
    var pwd = $(".pwd1").val();
    var pwd2 = $(".pwd2").val();
    if(!check_opwd() || !check_pwd() || !check_rpwd()){
        return false;
    }else{
        $.ajax({
            url:'/',
            type:'post',
            dataType:'json',
            data:{"opwd":opwd,
                "pwd":pwd
            },
            success:function(data){
                if(opwd != data.opwd){
                    $(".pld-error").show();
                    return false;
                }else{
                    $(".wrap,.change-ok").show();
                    setTimeout(function(){
                        $(".wrap,.change-ok").hide();
                        window.location.href="personal.html";
                    },2000)
                }
            }
        });
    }
}


//	获取验证码
function get_code(){
    var InterValObj; //定时器变量
    var count = 60; //间隔函数，1秒执行
    var curCount;//当前剩余秒数
    var tel = $(".tel").val();
    curCount = count;
    $(".reget").html(curCount+"s重新获取").css({"padding-left":"2px","background":"#ccc"});
    $(".reget").attr("disabled","true");
    InterValObj = setInterval(function(){
        if(curCount == 0){
            clearInterval(InterValObj);	//	停止计时器
            $(".reget").html("重新获取").css({"padding-left":"9px","background":"darkturquoise"});
            $(".reget").removeAttr("disabled");
        }else{
            curCount--;
            $(".reget").html(curCount+"s重新获取").css({"padding-left":"2px","background":"#ccc"});
            $(".reget").attr("disabled","true");
        }
    }, 1000); //启动计时器，1秒执行一次
    $.ajax({
        type:"post",
        dataType:"json",
        url:"/",
        data:{"tel":tel},
        success:function(data,msg){
            data = parseInt(data, 10);
            if(data == 1){
                error(msg);
            }else if(data == 0){
                error(msg);
                return false;
            }
        }

    })

}

//显示删除按钮
function show_remove(){
    var val = $("input").val();
    if(val){
        $(".remove").show();
    }
}


$(function(){
    //	注册页面tab切换
    $(".navtop li").click(function(){
        $(this).addClass("active").siblings("li").removeClass("active");
        var index = $(this).index();
        $(".tab-content").eq(index).show().siblings(".tab-content").hide();
    });

    $(".wrap").click(function(e){
        e.stopPropagation();
        $(".wrap,.change-ok").hide();
    });
})

 