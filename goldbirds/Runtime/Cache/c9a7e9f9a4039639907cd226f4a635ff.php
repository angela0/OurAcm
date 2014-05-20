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
    <link href="css/theme.bootstrap.css" rel="stylesheet">
    <link href="css/setting.css" rel="stylesheet">
    
    <!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
    <![endif]-->
    
    <!-- Le javascript -->
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/jquery.tablesorter.min.js"></script>
    <script src="js/jquery.tablesorter.widgets.min.js"></script>
    <script src="js/jquery.tablesorter.pager.js"></script>
    <script src="js/ajaxfileupload.js"></script>
    <script src="js/setting_common.js"></script>
    <script src="js/setting_person.js"></script>
	<script type="text/javascript">
	$(function(){ $("#navbar li:nth-child(8)").addClass("active"); $("#setting-bar li:nth-child(4)").addClass("active"); });
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
      <div class="span9 content">
		<div class="page-header">
            <h1>用户列表</h1>
        </div>
        <div class="row">
			<div class="span9 pull-left">
				<div class="btn-group">
					<a data-func="1" title="添加" data-target="#person-modal" data-toggle="modal" role="button" class="btn btn-add btn-large btn-tool"><i class="icon-plus"></i></a>
					<a data-func="3" title="编辑" data-target="#person-modal" data-toggle="modal" role="button" class="btn btn-large btn-edit btn-tool" data-uid=""><i class="icon-edit"></i></a>
					<a onClick="del_checked();" title="删除" class="btn btn-large btn-delete btn-tool"><i class="icon-trash"></i></a>
				</div>
				<div class="btn-group">
                	<a style="margin-left: -1px;" title="发送邀请函" rel="tooltip" data-placement="bottom" class="btn btn-large" onClick="sendinv_checked();"><i class="icon-envelope"></i></a>
		    		<a style="margin-left: -1px;" title="刷新" rel="tooltip" data-placement="bottom" class="btn btn-large" onClick="reFresh();"><i class="icon-refresh"></i></a>
				</div>
                <div id="lucky-code-show" class="label label-warning" style="margin-left:50px"></div>
			</div>
            <div class="span9" style="min-height:10px"> </div>
            <div id="table-content-index" class="span9 table-content">
  				<table id="data-table" class="data-table table table-bordered table-striped table-condensed table-hover">
  					<thead>
    					<tr class="align-center">
      						<th><label class="checkbox"><input type="checkbox" class="select-all"></label></th>
                            <th>UID</th>
      						<th>中文姓名</th>
                            <th>性别</th>
                            <th>Email</th>
                            <th>电话</th>
                            <th>年级</th>
                            <th>OJ账号</th>
                            <th>组别</th>
							<th class="sorter-false">操作</th>
    					</tr>
  					</thead>
  					<tbody></tbody>
				</table>
            </div>
            <!-- pager -->
            <div id="pager" class="span9 pagination text-center" style="margin-top:0px">
              	<ul>
                    <li class="first"><a href="javascript:void(0)"><i class="icon-step-backward"></i></a></li>
                    <li class="prev"><a href="javascript:void(0)"><i class="icon-backward"></i></a></li>
                    <li><span class="pagedisplay"></span></li>
                    <li class="next"><a href="javascript:void(0)"><i class="icon-forward"></i></a></li>
                    <li class="last"><a href="javascript:void(0)"><i class="icon-step-forward"></i></a></li>
                    <select class="pagesize input-mini inline">
                        <option selected="selected" value="10">10</option>
                        <option value="20">20</option>
                        <option value="50">50</option>
                        <option value="100">100</option>
                	</select>
                </ul>
            </div>
        </div>
      </div>
    </div>
  </div>

  <div id="alert"></div>
  <div class="modal hide fade" id="person-modal" data-cache='false' data-backdrop="true" data-keyboard="true" tabindex="-1" role="dialog" aria-labelledby="modal-title" aria-hidden="true">
  	<div class="modal-header">
    	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    	<h3 id="person-modal-title">队员管理</h3>
  	</div>
    <form class="form-inline" id="person-form" method="post" action="" enctype="multipart/form-data">
  	<div class="modal-body">
		<label for="chsname">中文姓名*</label><input type="text" id="chsname" name="chsname">
        <label for="engname">英文姓名</label><input type="text" id="engname" name="engname" placeholder="强烈建议填写">
        <label for="group">组别*</label><select class="input-medium" id="group" name="group"><option value="0">0-队员</option><option value="1">1-队长（管理权）</option><option value="2">2-教练（管理权）</option><option value="9">9-管理员（不展示）</option></select>
        <label for="sex">性别*</label><select class="input-small" id="sex" name="sex"><option value="0">0-男</option><option value="1">1-女</option></select>
        <label for="grade">本科年级</label><input class="input-mini" type="text" id="grade" name="grade" placeholder="如2013">
		<label for="email">Email</label><input type="text" name="email" id="email">
		<label for="phone">Phone</label><input type="text" name="phone" id="phone">
		<label for="address">现所在地</label><input class="input-xxlarge" type="text" name="address" id="address">
		<label for="introduce">简要介绍</label><input type="text" name="introduce" id="introduce" class="input-xxlarge">
		<label for="detail">详细自白</label>
		<textarea rows="5" class="input-xxlarge" name="detail" id="detail"><?php if($data['detail']) echo $data['detail']; ?></textarea>
		<label for="luckycode">邀请码*</label><input type="text" id="luckycode" name="luckycode" placeholder="系统自动生成，无需填写" readonly>
		<label for="ojaccount">关联OJ账号</label><input type="text" id="ojaccount" name="ojaccount" placeholder="不填写则由队员自行关联">
        <div class="row" style="margin-left:20px"><img class="img-polaroid span2" src="img/nopic.jpg" id="face_show"><label>个人照片</label><div class="input-append"><input type="file" class="input-small" name="face" id="face"><button class="btn" type="button" id="face_upload" data-func="upload">上传</button><button class="btn" type="button" id="face_del" data-func="del">删除</button></div></div>
        <input type="hidden" name="nowuid" id="nowuid">
        <input type="hidden" name="face_fn" id="face_fn">
  	</div>
    </form>
  	<div class="modal-footer">
    	<button class="btn btn-large" data-dismiss="modal" aria-hidden="true">关闭</button>
    	<button id="btn-submit" type="submit" class="btn btn-primary btn-large">保存</button>
  	</div>
  </div>
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