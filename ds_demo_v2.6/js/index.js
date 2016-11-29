//功能点1：异步请求页头和页尾
$(function () {
    $('.header-bar').load('public/index_header.php');
    $('.footer').load('public/footer.php');
});
//功能点2：菜单栏弹出
$('.shop-class-show').mouseenter(function () {
    $('.shop-class-list').removeClass('hide');
});
//功能点3：判断登录信息
if (localStorage['loginName']) {
    $('#wel').html(localStorage['loginName'] + ' ' + '<a id="exit" href="login.html">退出</a>');
} else if (sessionStorage['loginName']) {
    $('#wel').html(sessionStorage['loginName'] + ' ' + '<a id="exit" href="login.html">退出</a>');
} else {
    $('#wel').html('欢迎来到商城！<a href="login.html">[登录]</a><a href="sign_in.html">[免费注册]</a>');
}
//功能点4：退出登录
$('#exit').click(function () {
    if (localStorage['loginName']) {
        localStorage.removeItem('loginName');
    }
    if (sessionStorage['loginName']) {
        sessionStorage.removeItem('loginName');
    }
});
// console.log('local:'+localStorage['loginName']);
// console.log('session:'+sessionStorage['loginName']);




