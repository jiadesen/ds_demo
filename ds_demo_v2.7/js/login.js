//功能点1：异步请求页头和页尾
$(function () {
    $('div.header-bar').load('public/login_header.php');
    $('div.footer').load('public/footer.php');
});
//功能点2：点击登录按钮，异步验证客户端登录信息(jquery版)
// $('#login_btn').click(function () {
//     //表单序列化
//     var inputData = $('#login-form').serialize();
//     // console.log(inputData);
//     // console.log($('[name="autoLogin"]').val());
//     //异步提交验证
//     $.ajax({
//         type: 'POST',
//         url: 'data/user_login_jq_ajax.php',
//         data: inputData,
//         success: function (txt, msg, xhr) {
//             if (txt == 'no_reg') {
//                 alert('账户名不存在！请重新输入');
//             } else if (txt == 'ok') {
//                 //加上一层判断逻辑，当用户勾选了自动登录时将username存如localStorage
//                 //$('[name="autoLogin"]').is(':checked') 返回结果：选中=true，未选中=false
//                 if ($('[name="autoLogin"]').is(':checked')) {
//                     localStorage['loginName'] = $('[name="username"]').val();
//                     // console.log('local:'+localStorage['loginName']);
//                 } else {
//                     sessionStorage['loginName'] = $('[name="username"]').val();
//                     // console.log('session:'+sessionStorage['loginName']);
//                 }
//                 alert('登录成功!');
//                 location.href = 'index.html';
//                 // $('#wel').html(loginName + ' ' + '<a href="login.html">退出</a>');
//             } else {
//                 alert('登录失败！请检查用户名或密码');
//             }
//         }
//     });
// });
//功能点2：点击登录按钮，异步验证客户端登录信息(原生AJAX版)
document.getElementById('login_btn').onclick = function () {
    var n = username.value;
    // console.log(n);
    var p = password.value;
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4) {
            if (xhr.status === 200) {
                // console.log('响应完成且成功');
                doResponse(xhr);
            } else {
                console.log('响应完成但有问题');
            }
        }
    };
    xhr.open('POST', 'data/user_login_ys_ajax.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.send(`username=${n}&password=${p}`);
    function doResponse(xhr) {
        // console.log('开始处理响应数据');
        // console.log(xhr);
        var data = xhr.responseText;
        // console.log(data);
        //将json格式字符串转换为json对象
        // data = eval("(" + data + ")");
        data = JSON.parse(data);
        // console.log(data);
        if (data.msg == 'no_reg') {
            alert('账户名不存在！请重新输入');
        } else if (data.msg == 'ok') {
            if (document.getElementById('autoLogin').checked) {//判断是否勾选了自动登录
                localStorage['loginName'] = n;
            } else {
                sessionStorage['loginName'] = n;
                //即使用户没有勾选自动登录，也在cookie中保存一条登录信息，有效时间12小时，主动点退出时删除
                // document.cookie = "username=" + n + ";expires=" + (new Date().getTime() + 12 * 3600 * 1000);
            }
            alert('登陆成功!');
            location.href = 'index.html';
        } else {
            alert('登录失败！请检查用户名或密码');
        }
    }
};