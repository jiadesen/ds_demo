//功能点1：异步请求页头和页尾
$(function () {
    $('.header-bar').load('public/index_header.php');
    $('.footer').load('public/footer.php');
});

//功能点2：菜单栏弹出
$('.shop-class-show').mouseenter(function () {
    $('.shop-class-list').removeClass('hide');
});
//功能点3：轮播
var t = n = 0,
    count; //图片数量
$(document).ready(function () {
    count = $("#banner_list a").length;
    $("#banner_list a:not(:first-child)").hide();
    $("#banner .img-num a").click(function () {
        var i = $(this).text() - 1;
        n = i;
        if (i >= count) return;
        //遍历当前可见的图片使其淡出，
        $("#banner_list a").filter(":visible").fadeOut(500)
            //找到选中的a的图片使其淡入
            .parent().children().eq(i).fadeIn(1200);
        $(this).toggleClass("active");
        $(this).siblings().removeAttr("class");
    });
    t = setInterval("showAuto()", 3000);
    $("#banner").hover(function () { //鼠标进入图片时暂停轮播
        clearInterval(t)
    }, function () { //鼠标移出时开始轮播
        t = setInterval("showAuto()", 3000);
    })
});
function showAuto() {
    n = n >= (count - 1) ? 0 : ++n;
    //为被选中的a添加click事件
    $("#banner .img-num a").eq(n).trigger("click");
}

//功能点4：判断登录信息
if (localStorage['loginName']) {
    $('#wel').html(localStorage['loginName'] + ' ' + '<a id="exit" href="login.html">退出</a>');
} else if (sessionStorage['loginName']) {
    $('#wel').html(sessionStorage['loginName'] + ' ' + '<a id="exit" href="login.html">退出</a>');
} else {
    $('#wel').html('欢迎来到商城！<a href="login.html">[登录]</a><a href="sign_in.html">[免费注册]</a>');
}

//功能点5：退出登录
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




