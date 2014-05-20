<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title><?php echo $config_title; ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
	<meta name="keywords" content="OurACM ACM ICPC OJ WorldFinal Regional Ranking coach opensource github">
    <meta name="author" content="Ekszz">

    <!-- Le styles -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/bootstrap-responsive.css" rel="stylesheet">
    <link href="css/docs.css" rel="stylesheet">
    <link href="css/setting.css" rel="stylesheet">
    
    <!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
    <![endif]-->
    
    <!-- Le javascript -->
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/setting_common.js"></script>
    <script type="text/javascript">
    	$(function(){ 
			$("#navbar li:nth-child(8)").addClass("active");
			$('#luckycode').focus();
			$('#submit-btn').on('click', null, function() {
				$('#luckycode').attr('readonly', true);
				$('#submit-btn').attr('disabled', true);
				$.post("?z=setting-ajax_verify_luckycode", {code:$('#luckycode').val()})
				.done(function (data) {
					if(data.status == 0) {
						alert('[成功]有效的邀请码！请核对邀请码下方的信息无误后，点击“绑定”按钮绑定！注意：一个邀请码只能绑定一个OnlineJudge账号哦！');
						$('#result').html('邀请码对应的用户信息： '+data.data.code+'<br />当前待绑定OnlineJudge账号：'+data.data.oj+'<br />请核对或补充下方信息：<br /><br />');
						$('#submit-btn').addClass('hide');
						$('#bind-btn').removeClass('hide');
						$('#email').val(data.data.email);
						$('#phone').val(data.data.phone);
						$('#detail').removeClass('hide');
					}
					else {
						alert(data.info, "error");
						$('#luckycode').removeAttr('readonly');
						$('#submit-btn').removeAttr('disabled');
					}
				})
				.fail(function () {
					alert('[错误]请检查网络连接。', "error");
				});
			});
			$('#bind-btn').on('click', null, function() {
				var reg = /^([a-zA-Z0-9]+[_|\_|\.]?)*[a-zA-Z0-9]+@([a-zA-Z0-9]+[_|\_|\.]?)*[a-zA-Z0-9]+\.[a-zA-Z]{2,5}$/;
				var email = $('#email').val();
				var phone = $('#phone').val();
				if(!reg.test(email)) alert('[错误]E-mail格式不正确！请重试。', 'error');
				else if(phone.length < 8 || phone.length > 11) alert('[错误]联系电话格式不正确！请重试。', 'error');
				else {
					$('#bind-btn').attr('disabled', true);
					$.post("?z=setting-ajax_bind_luckycode", {code:$('#luckycode').val(), email:email, phone:phone})
					.done(function (data) {
						if(data.status == 0) {
							$('#bind-btn').html('已绑定');
							$('#email').prop('readonly', true);
							$('#phone').prop('readonly', true);
							alert('[成功]绑定成功！刷新本页面可进入个人信息设置。');
						}
						else {
							alert(data.info, "error");
							$('#bind-btn').removeAttr('disabled');
						}
					})
					.fail(function () {
						alert('[错误]请检查网络连接。', "error");
					});
				}
			});
		});
    </script>
  </head>

  <body data-spy="scroll" data-target=".bs-docs-sidebar">
    <!-- Navbar
    ================================================== -->
    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
		  <a class="brand" href="<?php echo OJLoginInterface::getOJURL(); ?>">OnlineJudge</a>
          <div class="nav-collapse collapse">
            <ul class="nav" id="navbar">
              <li class="">
                <a href="./">首页</a>
              </li>
			  <li class="">
                <a href="?z=we">我们</a>
              </li>
			  <li class="">
                <a href="?z=news">新闻中心</a>
              </li>
<!--              <li class="">
                <a href="?z=wf">全球总决赛</a>
              </li>
-->
              <li class="">
                <a href="?z=regional">区域赛</a>
              </li>
	      
	      <li class="">
                <a href="?z=province">省赛</a>
              </li>

              <li class="">
                <a href="?z=coach">教练团队</a>
              </li>
<!--              <li class="">
                <a href="?z=oj">OnlineJudge历史</a>
              </li>
-->
              <li class="">
                <a href="?z=setting">个人中心</a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>


<!-- Subhead
================================================== -->
<header class="jumbotron subhead" id="overview">
  <div class="container">
    <h1>设置</h1>
    <p class="lead">Setting</p>
    <div id="carbonads-container"></div>
  </div>
</header>


  <div class="container">
    <!-- Docs nav
    ================================================== -->
    <div class="row">
      <div class="span12 text-center"><h1><br /><font color="red">若非管理员，请不要使用该功能</font><br/>你暂时不允许访问该页面！<br /></h1><h2>请确保该OJ账户有关联获奖记录~~~<br />如果你已获得奖项，请向管理员索要邀请码~~</h2><br /><br /><h2>已有邀请码？请在下方输入：</h2><Br /></div>
    </div>
    <div class="row">
      <div class="span12 text-center">
          <div class="input-append">
    		<input class="span3" id="luckycode" type="text" placeholder="在此输入邀请码">
            <button class="btn btn-warning hide" type="submit" id="bind-btn">绑定</button>
            <button class="btn btn-primary" type="submit" id="submit-btn">Go! Go! Go!</button>
    	  </div>
      </div>
      <div class="span12 text-center text-info" id="result"></div>
      <div class="span12 text-center hide" id="detail">
            E-mail: <input class="span2" id="email" type="text" placeholder="E-mail here.">
            联系电话: <input class="span2" id="phone" type="text" placeholder="请输入联系电话">
      </div>
    </div>
  </div>
  <div id="alert" class="row-fluid"></div> 
<!-- Footer
    ================================================== -->
    <footer class="footer">
      <div class="container">
      	<div class="row">
          <div class="span5 text-right"><a href="http://ekszz.com"><img src="img/logo.png" /></a></div>
          <div class="span6 text-left">
            <p>Powered by <a href="http://github.com/ekszz/ouracm/">OURACM</a> version 0.3.5 beta1</p>
            <p>Designed and built with all the love in the world by <a href="http://ekszz.com" target="_blank">@Ekszz</a>.</p>
            <p>Code licensed under <a href="http://www.gnu.org/licenses/gpl.html" target="_blank">GNU GPL v3</a>, source code hosting at <a href="http://github.com/ekszz/ouracm/" target="_blank">GitHub</a>.</p>
            <ul class="footer-links">
              <li><a href="http://ekszz.com">Blog</a></li>
              <li class="muted">&middot;</li>
              <li><a href="http://weibo.com/ekszz">Weibo</a></li>
              <li class="muted">&middot;</li>
              <li><a href="http://github.com/ekszz/ouracm/">Project</a></li>
              <li class="muted">&middot;</li>
              <li><a href="https://github.com/ekszz/ouracm/issues?state=open">Issues</a></li>
              <li class="muted">&middot;</li>
              <li><a href="https://github.com/ekszz/ouracm/releases">Changelog</a></li>
            </ul>
          </div>
        </div>
      </div>
    </footer>
    <div class="loading hide" id="loading">
        <div class="loading-bg"></div>
        <div class="loading-icon">
            <div id="frotateG_01" class="f_circleG"> </div>
            <div id="frotateG_02" class="f_circleG"> </div>
            <div id="frotateG_03" class="f_circleG"> </div>
            <div id="frotateG_04" class="f_circleG"> </div>
            <div id="frotateG_05" class="f_circleG"> </div>
            <div id="frotateG_06" class="f_circleG"> </div>
            <div id="frotateG_07" class="f_circleG"> </div>
            <div id="frotateG_08" class="f_circleG"> </div>
		</div>
	</div>
	<script type="text/javascript">
	var strcookie=document.cookie;
	var arrcookie=strcookie.split("; ");
	var iealert;
	for(var i=0;i<arrcookie.length;i++){
		var arr=arrcookie[i].split("=");
		if("iealert"==arr[0]){
			iealert=arr[1];
			break;
		}
	}
	if(iealert!="killie" && (!-[1,])) { alert("[提示]你可能正在使用IE浏览器，访问效果很差，赶紧换掉吧~,~"); var date=new Date(); var expireDays=1; date.setTime(date.getTime()+expireDays*24*3600*1000); document.cookie="iealert=killie;expires="+date.toGMTString(); }
	</script>
  </body><?php echo $footer_additional_code == null ? "" : $footer_additional_code; ?>
</html>