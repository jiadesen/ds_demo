$(function () {
    $('.header-bar').load('public/index_header.php');
    $('.footer').load('public/footer.php');
});
//菜单栏弹出
$('.shop-class-show').mouseenter(function () {
    $('.shop-class-list').removeClass('hide');
});
//判断登录信息
if (localStorage['loginName']) {
    $('#wel').html(localStorage['loginName'] + ' ' + '<a id="exit" href="login.html">退出</a>');
} else if (sessionStorage['loginName']) {
    $('#wel').html(sessionStorage['loginName'] + ' ' + '<a id="exit" href="login.html">退出</a>');
} else {
    $('#wel').html('欢迎来到商城！<a href="login.html">[登录]</a><a href="sign_in.html">[免费注册]</a>');
}
$('#exit').click(function () {
    sessionStorage.removeItem('loginName');
    localStorage.removeItem('loginName');
});
// console.log('local:'+localStorage['loginName']);
// console.log('session:'+sessionStorage['loginName']);



