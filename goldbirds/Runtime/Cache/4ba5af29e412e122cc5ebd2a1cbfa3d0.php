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
	var nid = <?php echo $nid; ?>;
	var page = 0;
	var category = null;
	$(function(){
		$("#navbar li:nth-child(3)").addClass("active");
		var $window = $(window);
		$('.bs-docs-sidenav').affix({
			offset: {
				top: function () { return $window.width() <= 980 ? 290 : 210 },
			  	bottom: 270
			}
		});
		$("span[data-toggle=popover]")
			.popover()
			.click(function(e) {
				e.preventDefault()
		});
		loadnews(nid, page);
	});
	
	function isnew(str) {
		var t = str.split(/[- :]/);
		var d = new Date(t[0], t[1]-1, t[2], t[3], t[4], t[5]);
		var n = new Date();
		if(n.getTime() - d.getTime() > 1000*3600*24*3) return false;
		else return true;
	}
	
	function loadnews(p_page) {
		if(nid == 0) $('.pager').removeClass('hide');
		else $('.pager').addClass('hide');
		if(p_page < 0) p_page = 0;
		$.post('?z=news-ajaxload', {nid:nid, page:p_page, category:category})
		.done(function (data) {
			if(data.status == 0) {
				var str = '<div class="accordion" id="news-accordion">';
				for(i=0;i<data.data.length;i++) {
					str = str + '<div class="accordion-group"><div class="accordion-heading"><a class="accordion-toggle" data-toggle="collapse" data-parent="#news-accordion" href="#news' + data.data[i].nid + '">[' + data.data[i].category + ']&nbsp;' + data.data[i].title + (data.data[i].top==1?'&nbsp;<span class="label label-success">置顶</span>':'') + (isnew(data.data[i].createtime)?'&nbsp;<span class="label label-warning">New</span>':'') + '<span class="label pull-right">' + (typeof(data.data[i].author_detail) == "undefined" ? '': (data.data[i].author_detail.chsname + '&nbsp;@&nbsp;')) + data.data[i].createtime + '</span>' + (data.data[i].permission==0?'':'<span class="label label-warning pull-right" style="margin-right:5px">队内通知</span>') + '</a></div><div id="news' + data.data[i].nid + '" class="accordion-body collapse' + (data.data.length==1?' in':'') + '"><div class="accordion-inner">' + (data.data[i].content == null ? '(无内容)' : data.data[i].content) + '<hr class="soften" /><span class="label label-info">本文地址</span> <a href="http://<?php echo $_SERVER["HTTP_HOST"].$_SERVER["SCRIPT_NAME"]; ?>?z=news-index-nid-' + data.data[i].nid + '">http://<?php echo $_SERVER["HTTP_HOST"].$_SERVER["SCRIPT_NAME"]; ?>?z=news-index-nid-' + data.data[i].nid + '</a></div></div></div>';
				}
				str += '</div>';
				$('#news-content').html(str);
				page = p_page;
			}
			else {
				alert(data.info, "error");
			}
		})
		.fail(function () {
			alert('[错误]请检查网络连接。', "error");
		});
	}
	
	function sh_category(c,co) {
		if(c == '') $('#page-header').html('新闻中心');
		else $('#page-header').html('新闻中心 - <small>' + co + '</small>');
		category = c;
		page = 0;
		nid = 0;
		loadnews(page);
	}
	
	function go_newer() {
		if(page == 0) { alert("[错误]-_____-这已经是第一页了。", "error"); }
		else loadnews(page - 1);
	}
	
	function go_older() {
		loadnews(page + 1);
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
    <h1>新闻中心</h1>
    <p class="lead">News Center</p>
    <div id="carbonads-container"></div>
  </div>
</header>


  <div class="container">

    <!-- Docs nav
    ================================================== -->
    <div class="row">
      <div class="span3 bs-docs-sidebar">
        <ul class="nav nav-list bs-docs-sidenav">
          <li><a href="javascript:sh_category('')"><i class="icon-chevron-right"></i> 全部</a></li>
          <?php foreach($category as $c) { echo '<li><a href="javascript:sh_category(\''.base64_encode($c['category']).'\',\''.$c['category'].'\')"><i class="icon-chevron-right"></i> '.$c['category'].'</a></li>'; } ?>
        </ul>
      </div>
      <div class="span9">
      	<div class="page-header">
          <h1 id="page-header">新闻中心</h1>
        </div>
		<div class="row">
        	<div class="span9"><ul class="pager hide"><li class="previous"><a href="javascript:go_newer()">&larr; Newer</a></li><li class="next"><a href="javascript:go_older()">Older &rarr;</a></li></ul></div>
        	<div class="span9" id="news-content">
          	</div>
            <div class="span9"><ul class="pager hide"><li class="previous"><a href="javascript:go_newer()">&larr; Newer</a></li><li class="next"><a href="javascript:go_older()">Older &rarr;</a></li></ul></div>
        </div>
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