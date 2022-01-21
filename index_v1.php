<?php
//引用conn.php文件
//裤连接
$mysql_server="localhost";
$mysql_username="";
$mysql_password="";
$mysql_database="";
$con = mysql_connect($mysql_server,$mysql_username,$mysql_password) or die("数据库链接错误");
mysql_select_db($mysql_database,$con);
mysql_query("set names utf8");//连接MySQL数据库
$cname = $_GET['id'];
$sq = "select * from classes where cname='$cname'";
$rs = mysql_query($sq);
if($rs){
	$ro = mysql_fetch_array($rs);
}else{
	echo '';
}
$title = $ro['ctitle'];
$cyc = $ro['cyc'];
$chache = "select * from chache where cname='$cname' limit 30";
$sql = "select * from $cname where state='0' order by rand()";
$answer = "select * from $cname where stuid not in(select t.stuid from (select stuid from chache where cname='$cname' order by id DESC limit 45)as t) and state='0' order by rand() limit 1";
$result = mysql_query($answer);
if($result){
	$row = mysql_fetch_array($result);
}else{
	echo '';
}
$stuid = $row['stuid'];
$stuname = $row['stuname'];
$sql2 = "select * from history order by time + 0 DESC limit 50";
$result = mysql_query($sql2);
$sql3 = "select * from $cname order by stuid DESC limit 1000";
$sql4 = "select * from $cname order by stuid + 0 ASC limit 1000";
$res = mysql_query($sql3);
$ress = mysql_query($sql4);
if($res){
	$roww = mysql_fetch_array($res);
}else{
	echo '';
}
$cid = $roww['stuid'];
$cid -= 1;
?>
<!DOCTYPE html>
<html style="overflow:auto;">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width">
  <title>
<?php
if($cyc){
     echo "$cyc";
}else{
	echo '无法获取参数';
}
?>
</title>
<link rel="stylesheet" href="https://oss-img.4mg.top/css/mdui.css"/>
<link rel="stylesheet" href="https://oss-img.4mg.top/css/font-awesome.min.css">
<link rel="stylesheet" href="https://oss-img.4mg.top/css/font-awesome.css">
<meta name="viewport" content="width=device-width">
		<style type="text/css">
		@font-face{
			  font-family: 'ITV Reem';
			  src: url(assets/itvreem.woff) format('woff');
		}
		.js-odoo{
				width: 400px;
				margin: 50px auto;
				font-family: 'ITV Reem';
			  font-size: 60px;
			  text-shadow: 1px 1px 5px rgba(0,0,0,0.5);
			  fill:#000000;
		}
		.divTyping{
			font-size:100rem;
		}
		</style>
</head>
<body class="mdui-theme-white mdui-color-theme-accent mdui-card">
	<div class="mdui-appbar">
		<div class="mdui-toolbar mdui-color-white">
			<span class="mdui-btn mdui-btn-icon" mdui-drawer="{target: '#main-drawer', swipe: false}"><i class="mdui-icon material-icons">menu</i></span>
				<div class="mdui-drawer mdui-drawer-close" id="main-drawer">
					<div class="mdui-list">
						<font color="#000000">
						<font color="black"><a href="http://c.4mg.top/?id=szcx1" class="mdui-list-item mdui-ripple">示例班级</a>
						<font color="black"><a href="http://c.4mg.top/?id=gh0210" class="mdui-list-item mdui-ripple">高二十班</a>
						</font>
						<font size="3px" color="#000000"><center>*排名不分前后</center></font>
					</div>
				</div>
				<a href="javascript:;" class="mdui-typo-headline"><font color = "#000000">
<?php
if($title){
     echo "$title";
}else{
	echo '参数未添加';
}
?>
				</a>
				</font>
				<a href="javascript:;" class="mdui-typo-title"><font color = "#000000">
<?php
if($cyc){
     echo "$cyc";
}else{
	echo '程序名未添加';
}
?>
				</a>
				</font>
				<div class="mdui-toolbar-spacer"></div>
			</div>
		</div>
		<div class="mdui-container-fluid mdui-text-color-theme">
			<p>
				<div class="mdui-text-color-theme"><center><h1><font color="#000000">被抽中的人是:</font>
			<p><p><p><p><h1><font color="#e91e63"></font><p><h1><font color = pink size = 98><div class="js-odoo"></div>
		<script src="https://oss-img.4mg.top/js/odoo.js"></script>
<script>odoo.default({ el:'.js-odoo',value:'<?php if($stuid){
      echo "$stuid";
}else{
echo '404';} ?>号' })</script></font></center><center>
<p><div id='divTyping'></div>
<script>
   var str = '<?php if($stuname){
      echo "$stuname";
}else{
echo '-Error-';} ?>';
   var i = 0;
   function typing(){
    var divTyping = document.getElementById('divTyping');
    if (i <= str.length) {
     divTyping.innerHTML = str.slice(0, i++) + '|';
     setTimeout('typing()', 800);//递归调用
    }
    else{
     divTyping.innerHTML = str;//结束打字,移除 _ 光标
    }
   }
   typing();
  </script>
</font></font>
<p><a href="javascript:location.reload();"><button class="mdui-btn mdui-btn-raised mdui-ripple mdui-color-red">再抽一个</button></a>
<button class="mdui-btn mdui-btn-raised mdui-color-lime-a400 mdui-ripple" mdui-dialog="{target: '#record'}">查询记录</button>
<button class="mdui-btn mdui-btn-raised mdui-color-orange-900 mdui-ripple" mdui-dialog="{target: '#students'}">本班名单</button>
<button class="mdui-btn mdui-btn-raised mdui-color-pink mdui-ripple" mdui-dialog="{target: '#advice'}">系统公告</button>
<a href="###https://oss-img.4mg.top/example/class_reg.xlsx"><button class="mdui-btn mdui-btn-raised mdui-color-indigo-900 mdui-ripple" disabled><font color="white"><i class="fa fa-download"></i>班级注册</font></button></a>
<!-- a href="##mailto:admin@fangk.top?subject=随机抽取系统故障" --><button class="mdui-btn mdui-btn-raised mdui-color-deep-purple-700 mdui-ripple" disabled><font color="white"><i class="fa fa-envelope"></i>邮箱反馈</font></button>
<a href="https://bbs.fangk.top/connect.php?mod=login&op=init&referer=index.php&statfrom=login_simple"><button class="mdui-btn mdui-btn-raised mdui-color-indigo-a700 mdui-ripple"><font color="white"><i class="fa fa-qq"></i>QQ登录</font></button></a>
<p></font><font size="5px">Copyright &copy; 2018~2019 Twilight Soul All Rights Reserved.</font>
<p><font size="5px">APP v.1.2.0  &nbsp; &nbsp; &nbsp;  Res v.1.2.7 &nbsp; R2.Oi</font>
  <div class="mdui-dialog" id="advice">
    <div class="mdui-dialog-title">系统公告</div>
    <div class="mdui-dialog-content">我们已更新到优化版本，优化内容：<p>1.移除部分功能<p> Build201910191557320548478794 Res v.1.2.7 R2.Oi</div>
    <div class="mdui-dialog-actions">
      <button class="mdui-btn mdui-ripple mdui-color-pink" mdui-dialog-close>我已阅读</button>
</div>
</div>
<div class="mdui-dialog" id="email">
    <div class="mdui-dialog-title">Error</div>
    <div class="mdui-dialog-content">功能开发中，敬请期待~</div>
    <div class="mdui-dialog-actions">
      <button class="mdui-btn mdui-ripple mdui-color-pink" mdui-dialog-close>确定</button>
</div>
</div>
<div class="mdui-dialog" id="students">
    <div class="mdui-dialog-title">本班名单</div>
    <div class="mdui-dialog-content">
<div id="tab1" class="mdui-p-a-2"> <!-- 名单 -->
	<div class="mdui-table-fluid"><!-- 表格 -->
		<table class="mdui-table mdui-table-hoverable">
			<thead>
				<tr>
					<th>学号</th>
					<th>姓名</th>
				</tr>
			</thead>
			<tbody>
<?php
while($x<=$cid) {
++$x;
if($ress){
$rowww = mysql_fetch_array($ress);
}else{
echo '';}
$stuname3 = $rowww['stuname'];
$stuid3 = $rowww['stuid'];
$status = $rowww['status'];
$date=date("Y/m/d H:i:s",$time);
echo "<tr><td>$stuid3</td><td>$stuname3</td></tr>";
} 
?>
			</tbody>
		</table>
	</div>
</div>
</div>
    <div class="mdui-dialog-actions">
      <button class="mdui-btn mdui-ripple mdui-color-green-900" mdui-dialog-close>关闭</button>
    </div>
  </div>


<div class="mdui-dialog" id="record">
    <div class="mdui-dialog-title">查询记录</div>
    <div class="mdui-dialog-content">
<div id="tab1" class="mdui-p-a-2"> <!-- 排行 -->
	<div class="mdui-table-fluid"><!-- 表格 -->
		<table class="mdui-table mdui-table-hoverable">
			<thead>
				<tr>
					<th>倒序</th>
					<th>学号</th>
					<th>姓名</th>
					<th>班级名称</th>
         <th>时间</th>
				</tr>
			</thead>
			<tbody>
<?php
while($y<=49) {
++$y;
$row2 = mysql_fetch_assoc($result);
$stuname2 = $row2['stuname'];
$stuid2 = $row2['stuid']; 
$classes2 =$row2['classes'];
$time = $row2['time'];
$date=date("Y/m/d H:i:s",$time);
echo "<tr><td>$y</td><td>$stuid2</td><td>$stuname2</td><td>$classes2</td><td>$date</td></tr>";
} 
?>
			</tbody>
		</table>
	</div>
</div>



</div>

    <div class="mdui-dialog-actions">
      <button class="mdui-btn mdui-ripple mdui-color-green-900" mdui-dialog-close>关闭</button>
    </div>
  </div>
  </div>
<script src="https://oss-img.4mg.top/js/mdui.min.js"></script></div>
</body>
</html>
<?php
if($stuname){
$sqli = "insert into history set stuname='$stuname',stuid='$stuid',classes='$title',time=UNIX_TIMESTAMP()";
} else {
echo "";
}
if(!mysql_query($sqli,$con)){
echo "";
} else {
echo "";
}
if($stuname){
$sqlchache = "insert into chache set stuid='$stuid',cname='$cname',time=UNIX_TIMESTAMP()";
} else {
echo "";
}
if(!mysql_query($sqlchache,$con)){
echo "";
} else {
echo "";
}
?>