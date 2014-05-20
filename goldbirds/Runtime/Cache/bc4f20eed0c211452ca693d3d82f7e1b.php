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
    <script src="js/ajaxfileupload.js"></script>
    <script src="js/setting_common.js"></script>
	<script type="text/javascript">
	$(function(){ $("#navbar li:nth-child(8)").addClass("active"); $("#setting-bar li:nth-child(1)").addClass("active"); });
	$(function(){
		var $window = $(window);
			$('.bs-docs-sidenav').affix({
		        offset: {
		            top: function () { return $window.width() <= 980 ? 290 : 210 }
		          , bottom: 270
		          }
		        });
			$("span[data-toggle=popover]")
      			.popover()
      			.click(function(e) {
        			e.preventDefault()
      		});
	})
  	function onSubmit() {
		var addr="<?php echo U('Setting/ajax_modify_profile'); ?>";
		var params=$('#profile-form').serialize();
		$.ajax({
			url:addr,
			type:'post',
			cache:false,
			data:params,
			success:function(msg){
				if(msg.status == 0) alert("[完成]修改个人信息成功！");
				else alert(msg.info, "error");
			},
			error:function(msg){
				alert("[错误]请检查网络连接。");
			}
		});
	}
	function onSubmitFace() {
		$.ajaxFileUpload({
			url:"<?php echo U('Setting/ajax_upload_face'); ?>",
			secureuri:false,
			fileElementId:'photo',
			dataType:"json",
			success:function(data)
			{
				 if(data.status == 0) { $("#photo-view").attr("src", data.data); alert(data.info); }
				 else alert(data.info, "error");
			},
			error:function(data)
			{
				alert("[错误]请检查网络联接。", "error");
			}
		});
		return false;
	}
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
      	  <div class="span3 bs-docs-sidebar">
        <ul class="nav nav-list bs-docs-sidenav" id="setting-bar">
          <li><a href="?z=setting-profile"><i class="icon-chevron-right"></i> 个人资料</a></li>
		  <li><a href="?z=setting-contacts"><i class="icon-chevron-right"></i> 通讯录</a></li>
          <?php if(session('goldbirds_group') > 0) { ?><li><a href="?z=setting-setting"><i class="icon-chevron-right"></i> 全局参数设置</a></li>
          <li><a href="?z=setting-person"><i class="icon-chevron-right"></i> 用户管理</a></li>
          <li><a href="?z=setting-contest"><i class="icon-chevron-right"></i> 获奖记录管理</a></li>
          <li><a href="?z=setting-image"><i class="icon-chevron-right"></i> 照片管理</a></li>
          <li><a href="?z=setting-ojhistory"><i class="icon-chevron-right"></i> OnlineJudge历史管理</a></li>
		  <li><a href="?z=setting-news"><i class="icon-chevron-right"></i> 新闻管理</a></li><?php } ?>
		  <li class="disabled"><a><i class="icon-chevron-right"></i> 系统版本：OurAcm v0.3.5 beta1</a></li>
        </ul>
      </div>
      <div class="span9">
		<div class="page-header">
            <h1>个人资料修改</h1>
        </div>
        <form class="form-horizontal" id="profile-form" method="post" action="" enctype="multipart/form-data">
        	<div class="control-group">
				<label class="control-label" for="chsname">中文姓名</label>
				<div class="controls">
					<input type="text" id="chsname" value="<?php echo $data['chsname']; ?>" readonly>
				</div>
			</div>
            <div class="control-group">
				<label class="control-label" for="email">Email</label>
				<div class="controls">
					<input type="text" name="email" id="email" <?php if($data['email']) echo 'value="'.$data['email'].'"'; ?> placeholder="发送通知等，仅本系统用户可见">
				</div>
			</div>
            <div class="control-group">
				<label class="control-label" for="phone">Phone</label>
				<div class="controls">
					<input type="text" name="phone" id="phone" <?php if($data['phone']) echo 'value="'.$data['phone'].'"'; ?> placeholder="手机号码，仅本系统用户可见">
				</div>
			</div>
            <div class="control-group">
				<label class="control-label" for="address">现所在地</label>
				<div class="controls">
					<input type="text" name="address" id="address" class="input-xlarge" <?php if($data['address']) echo 'value="'.$data['address'].'"'; ?>  placeholder="Hello, World.">
				</div>
			</div>
            <?php if(!$config_lock_person_introduce) { ?>
            <div class="control-group">
				<label class="control-label" for="introduce">简要介绍</label>
				<div class="controls">
					<input type="text" name="introduce" id="introduce" class="input-xxlarge" <?php if($data['introduce']) echo 'value="'.$data['introduce'].'"'; ?>>
				</div>
			</div>
            <?php } ?>
            <div class="control-group">
				<label class="control-label" for="detail">详细自白</label>
				<div class="controls">
					<textarea rows="8" class="input-xxlarge" name="detail" id="detail"><?php if($data['detail']) echo $data['detail']; ?></textarea>
				</div>
			</div>
            <div class="control-group">
				<label class="control-label" for="luckycode">邀请码</label>
				<div class="controls">
					<input type="text" id="luckycode" class="input-xlarge" <?php if($data['luckycode']) echo 'value="'.$data['luckycode'].'"'; ?> readonly>
				</div>
			</div>
            <div class="control-group">
				<label class="control-label" for="ojaccount">关联的OJ账号</label>
				<div class="controls">
					<input type="text" id="ojaccount" class="input-xlarge" <?php if($data['ojaccount']) echo 'value="'.$data['ojaccount'].'"'; ?> readonly>
				</div>
			</div>
            <div class="control-group">
				<label class="control-label"> </label>
				<div class="controls">
					<input type="button" value="点我更新个人资料" class="btn btn-primary" onClick="return onSubmit();">
				</div>
			</div>
        </form>
        
        <div class="page-header">
            <h1>头像修改</h1>
        </div>
        <form class="form-horizontal" id="face-form" method="post" action="" enctype="multipart/form-data">
        	<div class="control-group">
				<label class="control-label">原个人照片</label>
				<div class="controls">
                    <img id="photo-view" src="<?php if($data['photo']) echo $data['photo']; else echo 'img/nopic.jpg'; ?>" class="span3 img-polaroid" />
				</div>
			</div>
            <div class="control-group">
				<label class="control-label" for="photo">更新个人照片</label>
				<div class="controls">
					<input type="file" name="photo" id="photo" class="input-xxlarge">
				</div>
			</div>
            <div class="control-group">
				<label class="control-label"> </label>
				<div class="controls">
					<input type="button" value="点我上传头像" class="btn btn-primary" onClick="return onSubmitFace();">
				</div>
			</div>
        </form>
      </div>
    </div>
  </div>

  <div id="alert"></div>
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