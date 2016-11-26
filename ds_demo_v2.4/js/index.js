$(function () {
    $('.header-bar').load('public/index_header.php');
    $('.footer').load('public/footer.php');
});
//菜单栏弹出
$('.shop-class-show').mouseenter(function () {
    $('.shop-class-list').removeClass('hide');
});


