<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <title>管理员登录</title>
    <link rel="stylesheet" href="styles/public.css">
    <link rel="stylesheet" href="styles/login.css">
    <!--[if IE 6]>
    <script type="text/javascript" src="../js/DD_belatedPNG_0.0.8a-min.js"></script>
    <script type="text/javascript" src="../js/ie6Fixpng.js"></script>
    <![endif]-->
</head>
<body>
<!--页面头部-->
<div class="header-bar">
    <div class="logo-bar">
        <div class="com-width">
            <div class="logo fl">
                <a href="../index.html" target="_blank"><img src="images/logo.jpg" alt="商城"></a>
            </div>
            <h3 class="welcome-title">后台管理员登录</h3>
        </div>
    </div>
</div>
<!--页面主体-->
<div class="login-box">
    <div class="login-cont">
        <form action="doLogin.php" method="post">
            <ul class="login">
                <li class="l-tit">管理员账号</li>
                <li class="mb-10"><input type="text" name="username" class="login-input user-icon"
                                         placeholder="请输入管理员账号"></li>
                <li class="l-tit">密码</li>
                <li class="mb-10"><input type="password" name="password" class="login-input"></li>
                <li class="l-tit">验证码</li>
                <li class="mb-10"><input type="text" name="verify" class="login-input"></li>
                <img id="captcha_img" src="getVerify.php" alt=""/>
                <a href="javascript:void(0)"
                   onclick="document.getElementById('captcha_img').src='getVerify.php?r='+Math.random()">看不清，换一个</a>
                <li class="auto-login"><input type="checkbox" name="autoFlag" value="1" id="a1" class="checked"><label
                        for="a1">自动登陆(一周内自动登录)</label>
                </li>
                <li><input type="submit" value="" class="login-btn"></li>
            </ul>
        </form>
        <!--<div class="login-partners">-->
        <!--<p class="l-tit">使用合作方账号登陆网站</p>-->
        <!--<ul class="login-list clearfix">-->
        <!--<li><a href="#">QQ</a></li>-->
        <!--<li><span>|</span></li>-->
        <!--<li><a href="#">网易</a></li>-->
        <!--<li><span>|</span></li>-->
        <!--<li><a href="#">新浪微博</a></li>-->
        <!--<li><span>|</span></li>-->
        <!--<li><a href="#">腾讯微薄</a></li>-->
        <!--<li><span>|</span></li>-->
        <!--<li><a href="#">新浪微博</a></li>-->
        <!--<li><span>|</span></li>-->
        <!--<li><a href="#">腾讯微薄</a></li>-->
        <!--</ul>-->
        <!--</div>-->
    </div>
    <!--<a class="reg-link" href="#"></a>-->
</div>
</body>
</html>