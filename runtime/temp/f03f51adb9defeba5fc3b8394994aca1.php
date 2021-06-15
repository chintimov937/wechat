<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:65:"D:\phpStudy\WWW\wechat\public/../application/index\view\yypd.html";i:1522377656;}*/ ?>
<!DOCTYPE html>
<html lang="zh-CN">

<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width,height=device-height, initial-scale=1, maximum-scale=1, user-scalable=no" />
	<title>预约排队</title>
	<link rel="stylesheet" type="text/css" href="/static/css/bootstrap.min.css" />
	<link rel="stylesheet" type="text/css" href="/static/css/layout.css" />
	<link rel="stylesheet" type="text/css" href="/static/css/mobiscroll-2.13.2.full.min.css" />
	<link rel="stylesheet" href="/static/css/mpicker.css">
	<script src="/static/js/jquery-2.1.4.min.js"></script>
	<script src="/static/js/mobiscroll-2.13.2.full.min.js"></script>
	<script type="text/javascript" src="/static/js/vue.min.js"></script>
	<script type="text/javascript" src="/static/js/main.js"></script>

</head>

<body>
<div class="container" style="position:absolute;top:0;left:0;padding:0; width: 100%;height:100%;background:#EEEEEE">
	<header>
		<div class="left">
			<a href="#"><span class="glyphicon glyphicon-chevron-left"></a></span></div>
		<center>
			<div class="title">预约排队</div>
		</center>
		<div class="save">
			<a href="personal.html"><span class="glyphicon glyphicon-user"></span></a>
		</div>
	</header>
	<div class="line-num">
		<center>
			<p>1. 先选择日期与地址</p>
			<p>2. 再依次选择营业厅和业务类型</p>
		</center>
	</div>
	<div class="content">
		<form action="#" method="get" id="yypd">
			<div class="row">
				<div class="col-md-12 col-sm-12 col-xs-12 info line-info" style="margin-top:14px;">
					<input type="text" name="picktime" id="picktime" readonly="readonly" />
					<img src="/static/img/date.png" />
					<span class="font">日期</span><span class="glyphicon glyphicon-chevron-right"></span>
				</div>
				<div class="col-md-12 col-sm-12 col-xs-12 info line-info">
					<input type="text" class="select-value addr" readonly="readonly" name="addr" />
					<img src="/static/img/adr.png" />
					<span class="font">地址</span><span class="glyphicon glyphicon-chevron-right"></span>
				</div>
				<!--营业厅-->
				<div class="col-md-12 col-sm-12 col-xs-12 info line-info" id="yyt_1" style="display: none;">
					<input type="text" class="select-value1 yyt" readonly="readonly" name="yyt">
					<img src="/static/img/yyt.png" />
					<span class="font">营业厅</span><span class="glyphicon glyphicon-chevron-right"></span>
				</div>
				<!--业务类型-->
				<div class="col-md-12 col-sm-12 col-xs-12 info line-info intro" id="yyt_2" style="display: none;">
					<input type="text" class="select-value2 yw" readonly="readonly" name="yw">
					<img src="/static/img/ywlx.png" />
					<span class="font">业务类型</span><span class="glyphicon glyphicon-chevron-right"></span>
				</div>
				<div class="col-md-10 col-sm-10 col-xs-10 col-md-offset-1 col-sm-offset-1 col-xs-offset-1">
					<button type="button" class="btn btn-primary info-btn" style="margin-top:1.2rem" onclick="order()">预约</button>
					<input type="hidden" id="dizhi" value="" />
					<input type="hidden" id="yingyeting" value="" />
					<input type="hidden" id="yewuleixing" value="" />
				</div>
			</div>
		</form>
	</div>
</div>
<div class="wrap"></div>
<div class="change-ok">
	<center>
		<p>预约成功！</p>
	</center>
</div>
<script>
</script>
<script src="/static/js/json.js"></script>

<script src="/static/js/mPicker.js"></script>
<script src="/static/js/jsonExchange.js"></script>
<script>
    $(function() {

        //选择日期
        var now = new Date();
        max = new Date(now.getMonth(), now.getDate());
        $("#picktime").mobiscroll().date({
            lang: 'zh',
            display: 'bottom',
            max: max
        });

        /**
         * 联动的picker
         * 三级
         */
        $('.select-value').mPicker({
            level: 3,
            dataJson: city3,
            Linkage: true,
            rows: 5,
            idDefault: true,
            splitStr: '-',
            header: '<div class="mPicker-header">三级联动选择插件</div>',
            confirm: function(json) {
                //              console.info('当前选中json：',json);
                //              console.info('【json里有不带value时】');
                //              console.info('选中的id序号为：', json.ids);
                //              console.info('选中的value为：', json.values);
                $("#dizhi").val(json.values);
                $.ajax({
                    url: "<?php echo url('index/appointment/getBusinessHall'); ?>",
                    type: 'post',
                    data: {
                        post_data:json.values
                    },
                    dataType: 'json',
                    success: function(BusinessHall) {
                        //console.log(BusinessHall.body);
                        if(BusinessHall.rc == 0){
                            $('.select-value1').mPicker({
                                level: 1,
                                dataJson: BusinessHall.body,
                                Linkage: true,
                                rows: 5,
                                idDefault: true,
                                splitStr: '-',
                                header: '<div class="mPicker-header">yi级联动选择插件</div>',
                                confirm: function(json) {
                                    $('#yingyeting').val(json.values);
                                    $.ajax({
                                        url: "<?php echo url('index/appointment/getBussiness'); ?>",
                                        type: 'post',
                                        data: {
                                            post_data: json.name,
											id:json.values
                                        },
                                        dataType: 'json',
                                        success: function(Bussiness) {
                                            if(Bussiness.rc == 0){
                                                $('.select-value2').mPicker({
                                                    level: 1,
                                                    dataJson: Bussiness.body,
                                                    Linkage: true,
                                                    rows: 5,
                                                    idDefault: true,
                                                    splitStr: '-',
                                                    header: '<div class="mPicker-header">yi级联动选择插件</div>',
                                                    confirm: function(json) {
                                                        $('#yewuleixing').val(json.values);
                                                    },
                                                    cancel: function(json) {}
                                                })
                                                $('#yyt_2').show();
											}else{
                                                alert('该营业厅没有业务');
											}
                                        }
                                    })
                                },
                                cancel: function(json) {}
                            })
                            $('#yyt_2').hide();
                            $('#yyt_1').show();
						}else{
							alert('该区域没有营业厅');
						}

                    }
                })

            },
            cancel: function(json) {
                //              console.info('当前选中json：',json);
            }
        })
        //获取mpicker实例
        var method = $('.select-value').data('mPicker');
        //      console.info('第一个mpicker的实例为：',method);
        //mpicker方法
        // method.showPicker();
        // method.hidePicker(function(){
        //     console.info(this)
        // });

    })

    function close() {
        var clock;
        $(".wrap,.change-ok").show();
        clearTimeout(clock);
        clock = setTimeout(function() {
            $(".wrap,.change-ok").hide();
        }, 2000);
    }

    function order() {
        var timedata = $("#picktime").val();
        var addrdata = $("#dizhi").val();
        var yytdata = $('#yingyeting').val();
        var ywdata = $('#yewuleixing').val();
        var clock;
        if(!timedata && !addrdata && !yytdata && !ywdata) {
            $(".change-ok p").html("日期或地址不能为空！");
            close();
            return false;
        } else {
            $(".change-ok p").html("预约成功！");
            clearTimeout(clock);
            clock = setTimeout(function() {
                $(".wrap,.change-ok").hide();
                $("#yypd").attr("action", "yyzs.html");
            }, 2000);
        }

    }
</script>
</body>

</html>