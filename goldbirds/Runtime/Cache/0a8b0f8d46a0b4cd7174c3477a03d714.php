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

    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="assets/js/html5shiv.js"></script>
    <![endif]-->
    
     <!-- Le javascript -->
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.js"></script>
    <script type="text/javascript">$(function(){ $("#navbar li:nth-child(1)").addClass("active"); });</script>
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


<div class="jumbotron masthead">
  <div class="container">
    <h1><?php echo $home_chs_header; ?></h1>
    <p><?php echo $home_eng_header; ?></p>
    <p><?php echo $home_additional_title; ?></p>
    <p>
		<a href="?z=news" class="btn btn-primary btn-large">新闻中心</a> <a href="?z=regional" class="btn btn-primary btn-large">区域赛</a> <a href="?z=province" class="btn btn-primary btn-large">省赛</a> <a href="?z=coach" class="btn btn-primary btn-large">教练团队</a>
<!--
		<a href="?z=news" class="btn btn-primary btn-large">新闻中心</a> <a href="?z=wf" class="btn btn-primary btn-large">全球总决赛</a> <a href="?z=regional" class="btn btn-primary btn-large">区域赛</a> <a href="?z=coach" class="btn btn-primary btn-large">教练团队</a> <a href="?z=oj" class="btn btn-primary btn-large">OnlineJudge历史</a>
-->
    </p>
  </div>
</div>

<div class="bs-docs-social">
  <div class="container">
    <?php if(count($recent)>0) { echo '<h5>'; $first = true; foreach($recent as $r) { if($r['type'] != 0 && $r['medal'] > 2) continue; if($r['medal'] == 0) $medal = '<span class="badge badge-warning">金牌</span>'; else if($r['medal'] == 1) $medal = '<span class="badge">银牌</span>'; else if($r['medal'] == 2) $medal = '<span class="badge badge-important">铜牌</span>'; if($first) { $first = false; } else echo '<br />'; if($r['type'] == 0) { echo '@'.$r['holdtime'].' 恭喜<span class="badge badge-success">'.$r['team'].'</span>挺进<span class="badge badge-info">World Final</span>'; if($r['medal'] < 3) echo '，并获得'.$medal.'！'; else echo '！'; } else { echo '@'.$r['holdtime'].' 恭喜<span class="badge badge-success">'.$r['team'].'</span>获得区域赛'.$medal.'！'; } } echo '</h5><hr class="soften">'; } ?>

		<h4>至目前为止， Regional: 金 <span class="badge badge-warning"><big><?php echo $number['regional'][0]; ?></big></span> 银 <span class="badge"><big><?php echo $number['regional'][1]; ?></big></span> 铜 <span class="badge badge-important"><big><?php echo $number['regional'][2]; ?></big></span>省赛:金 <span class="badge badge-warning"><big><?php echo $number['province'][0]; ?></big></span> 银 <span class="badge"><big><?php echo $number['province'][1]; ?></big></span> 铜 <span class="badge badge-important"><big><?php echo $number['province'][2]; ?></big></span></h4>

<!--
    <h4>至目前为止，World Final: <span class="badge badge-info"><big><?php echo $number['wf']; ?></big></span>， Regional: 金 <span class="badge badge-warning"><big><?php echo $number['regional'][0]; ?></big></span> 银 <span class="badge"><big><?php echo $number['regional'][1]; ?></big></span> 铜 <span class="badge badge-important"><big><?php echo $number['regional'][2]; ?></big></span></h4>
-->
  </div>
</div>

<div class="container">
<?php echo $home_mainarea; ?>
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