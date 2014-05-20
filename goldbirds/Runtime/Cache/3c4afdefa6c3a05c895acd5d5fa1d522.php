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
    <link href="css/jquery.fancybox.css" rel="stylesheet">
    <link href="css/docs.css" rel="stylesheet">
    
    <!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
    <![endif]-->
    
    <!-- Le javascript -->
    <script src="js/jquery.js"></script>
    <script src="js/jquery.fancybox.pack.js"></script>
    <script src="js/jquery.easing.pack.js"></script>
    <script src="js/bootstrap.js"></script>
	<script type="text/javascript">
	$(function(){
		$(function(){ $("#navbar li:nth-child(5)").addClass("active"); });
		$(".fancybox").fancybox({openEffect:'elastic', closeEffect:'elastic', padding:10});
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
    <h1>ACM-ICPC 省赛</h1>
    <p class="lead">ACM-ICPC Province</p>
    <div id="carbonads-container"></div>
  </div>
</header>


  <div class="container">

    <!-- Docs nav
    ================================================== -->
    <div class="row">
      <div class="span3 bs-docs-sidebar">
        <ul class="nav nav-list bs-docs-sidenav">
       	  <li class="selected"><a href="?z=province-cool"><i class="icon-chevron-right"></i> 酷炫版</a></li>
          <?php foreach($y as $vo) { if($vo['y'] == $year) echo '<li class="active"><a><i class="icon-chevron-right"></i> -- '.$vo['y'].'年</a></li>'; else echo '<li><a href="?z=province-cool-y-'.$vo['y'].'#top"><i class="icon-chevron-right"></i> -- '.$vo['y'].'年</a></li>'; } ?>
          <li><a href="?z=province-data"><i class="icon-chevron-right"></i> 表单版</a></li>
        </ul>
      </div>
      <div class="span9">
      	<section id="top">
      	<?php foreach($data as $d) { ?>
          <div class="page-header">
            <h1><?php if($year) { echo 'Year '.$year; $year = 0; } else echo ' '; ?></h1>
          </div>
          <div class="row">
            <div class="span4">
              <p class="text-success"><font size="+3"><img style="width:20%" src="<?php switch($d['medal']) { case 0: echo 'img/golden.png'; break; case 1: echo 'img/silver.png'; break; case 2: echo 'img/bronze.png'; break; default: echo 'img/honorable.png'; } ?>" /> <strong><?php echo $d['team']; ?></strong></font></p>
            </div>
            <div class="span5 text-right">
              <p><span class="alert alert-info"><i class="icon-map-marker"></i> <?php echo $d['university'].', '.$d['site'].' @ '.$d['y'].'.'.$d['m']; ?></span></p>
              <Br />
              <p><?php $temp = ''; if($d['medal'] == 0) $temp = '金牌'; else if($d['medal'] == 1) $temp = '银牌'; else if($d['medal'] == 2) $temp = '铜牌'; if($d['title']) { if($temp) $temp = $temp.', '.$d['title']; else $temp = $d['title']; } if($temp) echo '<span class="alert alert-warning"><strong>'.$temp.'</strong></span>'; if($d['ranking']) echo ' <span class="alert alert-success"><strong>第'.$d['ranking'].'名</strong></span>'; ?></p>
            </div>
          </div>
          <hr class="soften" />
          <div class="row">
          	<div class="span3">
          	  <p><span class="label label-warning">Leader</span> <?php if($d['leader_detail']['sex'] != 1) echo '<span class="label">♂</span>'; else echo '<span class="label label-important">♀</span>'; ?> <a href="#" data-toggle="personmodal" data-uid="<?php echo $d['leader']; ?>"><?php if($d['leader_detail']['introduce']) echo '<span data-trigger="hover" data-content="'.$d['leader_detail']['introduce'].'" data-placement="top" data-toggle="popover" data-original-title="'.$d['leader_detail']['chsname'].' '.$d['leader_detail']['engname'].'">'; echo $d['leader_detail']['chsname'].' '.$d['leader_detail']['engname']; if($d['leader_detail']['introduce']) echo '</span>'; ?></a></p>
          	</div>
          	<div class="span3">
          	  <p><span class="label label-info">Teamer</span> <?php if($d['teamer1_detail']['sex'] != 1) echo '<span class="label">♂</span>'; else echo '<span class="label label-important">♀</span>'; ?> <a href="#" data-toggle="personmodal" data-uid="<?php echo $d['teamer1']; ?>"><?php if($d['teamer1_detail']['introduce']) echo '<span data-trigger="hover" data-content="'.$d['teamer1_detail']['introduce'].'" data-placement="top" data-toggle="popover" data-original-title="'.$d['teamer1_detail']['chsname'].' '.$d['teamer1_detail']['engname'].'">'; echo $d['teamer1_detail']['chsname'].' '.$d['teamer1_detail']['engname']; if($d['teamer1_detail']['introduce']) echo '</span>'; ?></a></p>
          	</div>
          	<div class="span3">
          	  <p><span class="label label-info">Teamer</span> <?php if($d['teamer2_detail']['sex'] != 1) echo '<span class="label">♂</span>'; else echo '<span class="label label-important">♀</span>'; ?> <a href="#" data-toggle="personmodal" data-uid="<?php echo $d['teamer2']; ?>"><?php if($d['teamer2_detail']['introduce']) echo '<span data-trigger="hover" data-content="'.$d['teamer2_detail']['introduce'].'" data-placement="top" data-toggle="popover" data-original-title="'.$d['teamer2_detail']['chsname'].' '.$d['teamer2_detail']['engname'].'">'; echo $d['teamer2_detail']['chsname'].' '.$d['teamer2_detail']['engname']; if($d['teamer2_detail']['introduce']) echo '</span>'; ?></a></p>
          	</div>
          </div>
          <hr class="soften" />
          <div class="row">
          	<div class="<?php if(!$d['pic2']) echo 'span6'; else echo 'span4'; ?>"><a class="fancybox" href="<?php if($d['pic1']) echo $d['pic1']; else echo 'img/nopic.jpg'; ?>"><img src="<?php if($d['pic1']) echo 'upload/thumb/'.substr($d['pic1'], 7); else echo 'img/nopic.jpg'; ?>" class="img-polaroid" /></a></div>
          	<?php if($d['pic2']) echo '<div class="span4"><a class="fancybox" href="'.$d['pic2'].'"><img src="upload/thumb/'.substr($d['pic2'], 7).'" class="img-polaroid" /></a></div>'; ?>
          </div>
       <?php } ?>
       </section>
      </div>
    </div>

  </div>
<!-- Person Modal -->
<script type="text/javascript">
	$(function(){
		$('.container').on('click', 'a[data-toggle=personmodal]', function (e) {
	    	e.preventDefault();
			var uid = $(this).data('uid');
			$.getJSON("?z=setting-ajax_get_person_modal-uid-" + uid, null)
			.done( function(data) {
				if(data.status == 0) {
					if(data.data.photo) $('#p_face').attr('src', data.data.photo);
					else $('#p_face').attr('src', 'img/nopic.jpg');
					$('#personmodaltitle').html(data.data.chsname);
					$('#p_name').html(data.data.chsname + ' <span class="muted"><small>' + data.data.engname + '</small></span>');
					$('#p_introduce').html(data.data.introduce);
					gradestr = '';
					if(data.data.grade) gradestr = gradestr + '<i class="icon-home"></i> ' + data.data.grade + '级';
					if(data.data.grade && data.data.address) gradestr += '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
					if(data.data.address) gradestr = gradestr + '<i class="icon-map-marker"></i> ' + data.data.address;
					$('#p_grade').html(gradestr);
					$('#p_email').html('<i class="icon-envelope"></i> ' + data.data.email);
					$('#p_phone').html('<i class="icon-user"></i> ' + data.data.phone);
					conteststr = '';
					if(data.data.contest) {
						for(i = 0; i < data.data.contest.length; i++) {
							conteststr = conteststr + '<div class="row-fluid"><div class="span12" style="margin-bottom:5px;"><a href="';
							if(data.data.contest[i].type == 0) conteststr = conteststr + '?z=wf#year' + data.data.contest[i].y;
							else conteststr = conteststr + '?z=regional-cool-y-' + data.data.contest[i].y;
							conteststr += '" class="btn span12"><img style="height:20px;" src="';
							if(data.data.contest[i].type == 0) conteststr += 'img/final.png';
							else {
								if(data.data.contest[i].medal == 0) conteststr += 'img/golden.png';
								else if(data.data.contest[i].medal == 1) conteststr += 'img/silver.png';
								else if(data.data.contest[i].medal == 2) conteststr += 'img/bronze.png';
								else conteststr += 'img/honorable.png';
							}
							conteststr = conteststr + '"> ' + data.data.contest[i].y + '.' + data.data.contest[i].m + (data.data.contest[i].type == 0 ? ' WorldFianl' : ' Regional') + ' @ ' + data.data.contest[i].site + ' <span class="label">' + data.data.contest[i].team + '</span></a></div></div>';
						}
					}
					conteststr = conteststr + '<div class="row-fluid"><div class="hero-unit">' + data.data.detail + '</div></div>';
					$('#p_contest').html(conteststr);
					$('#person-modal').modal();
				}
				else alert(data.info, "error");
			})
			.fail(function () {
				alert('[错误]请检查网络连接。', "error");
			});
		});
	});
</script>
<div id="person-modal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="width:800px;margin:0 0 0 -400px;">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="personmodaltitle"></h3>
  </div>
  <div class="modal-body" style="min-height:200px;">
    <div class="row-fluid">
    	<div class="span4">
        	<div class="row-fluid">
            	<div class="thumbnail">
                  <img id="p_face" src="img/nopic.jpg" alt="">
                  <div class="caption">
                    <h3 id="p_name"></h3>                   
                    <p id="p_introduce" style="margin-bottom:20px"></p>
                    <p id="p_grade"></p>
                    <p id="p_email"></p>
                    <p id="p_phone"></p>
                  </div>
                </div>
            </div>
        </div>
        <div class="span8" id="p_contest"></div>
    </div>
  </div>
  <div class="modal-footer">
    <button class="btn" data-dismiss="modal" aria-hidden="true">关闭</button>
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