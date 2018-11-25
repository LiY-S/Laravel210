<!DOCTYPE html >
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>登陆界面</title>
<link rel="stylesheet" type="text/css" href="/admins/login/css/style.css" />
<link rel="stylesheet" type="text/css" href="/admins/login/css/body.css"/> 
</head>
<body>

<!-- 内容开始 -->
<div class="container">
	
	<section id="content">
		<!-- 表单开始 -->
		<form action="" method="post">
			<h1>后台登录</h1>
			<div>
				<input type="text" placeholder="用户名" required="" id="username" name="username" />
			</div>
			<div class="">
				<span class="help-block u-errormessage" id="js-server-helpinfo">&nbsp;</span>
			</div>
			<div>
				<input type="password" placeholder="密码" required="" id="password" name="password" />
			</div>
			<div class="">
				<span class="help-block u-errormessage" id="js-server-helpinfo">&nbsp;</span>
			</div>
			<div>
				<input type="text" id="yanzheng" placeholder="验证码" style="width: 140px; margin-left:-200px;" />&nbsp;&nbsp;
				<img src="/admin/captcha" alt="" onclick='this.src = this.src+="?1"'style="margin-right:-200px;margin-bottom: -20px">
			</div>
			<div>
				
			</div>
			
			<div class="">
				<span class="help-block u-errormessage" id="js-server-helpinfo">&nbsp;</span>
			</div> 
			<div>
				<input type="submit" value="登录" class="btn btn-primary" id="js-btn-login"/>
			</div>
		</form>
		 <!-- 表单结束 -->
	</section>

</div>
<!-- 内容结束 -->

</body>
</html>