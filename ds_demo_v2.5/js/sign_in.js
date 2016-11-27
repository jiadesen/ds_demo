// 功能点1：页面加载完成后异步请求页头和页尾
$(function () {
    $('div.header-bar').load('public/sign_in_header.php');
    $('div.footer').load('public/footer.php');
});

//功能点2：对用户输入进行简单验证
//1.对用户名进行验证
var result_username = false;
var result_password = false;
var result_email = false;
var m = document.getElementById('username').nextElementSibling;
// console.log(m);
$('#username').focus(function () {
    this.nextElementSibling.innerHTML = '支持字母、数字的组合，4-20个字符';
    this.nextElementSibling.className = 'default';
});
$('#username').blur(function () {
    if (this.validity.valueMissing) {
        this.nextElementSibling.innerHTML = '用户名不能为空';
        this.nextElementSibling.className = 'default error';
    } else if (this.validity.tooShort) {
        this.nextElementSibling.innerHTML = '用户名不能少于4位';
        this.nextElementSibling.className = 'default error';
    } else {
        //发起异步get请求，验证是否重名
        var text = this.value;
        // console.log(n);
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
        xhr.open('GET', 'data/check_name.php?username=' + text, true);
        xhr.send(null);
        function doResponse(xhr) {
            // console.log('开始处理响应数据');
            if (xhr.responseText === 'noreg') {
                m.innerHTML = '支持字母、数字的组合，4-20个字符';
                m.className = 'default error';
            } else if (xhr.responseText === 'cunzai') {
                m.innerHTML = '该用户名已存在';
                m.className = 'default error';
            } else if (xhr.responseText === 'bucunzai') {
                // console.log(this);
                m.innerHTML = '用户名格式正确';
                m.className = 'default success';
                return result_username = true;
            } else {
                console.log('未知的响应数据');
                // alert('未知的响应数据');
            }
        }
    }
});
//2.对密码进行验证
$('#password').focus(function () {
    this.nextElementSibling.innerHTML = '密码长度在6到18位之间';
    this.nextElementSibling.className = 'default';
});
$('#password').blur(function () {
    if (this.validity.valueMissing) {
        this.nextElementSibling.innerHTML = '密码不能为空';
        this.nextElementSibling.className = 'default error';
    } else if (this.validity.tooShort) {
        this.nextElementSibling.innerHTML = '密码长度不能少于6位';
        this.nextElementSibling.className = 'default error';
    } else {
        this.nextElementSibling.innerHTML = '密码格式正确';
        this.nextElementSibling.className = 'default success';
        return result_password = true;
    }
});
//3.对邮箱进行验证(此处使用原生JS的方法)
email.onfocus = function () {
    this.nextElementSibling.innerHTML = '请输入合法的邮箱格式';
    this.nextElementSibling.className = 'default';
};
email.onblur = function () {
    // console.log(this.validity.typeMismatch);
    if (this.validity.valueMissing) {
        this.nextElementSibling.innerHTML = '电子邮件不能为空';
        this.nextElementSibling.className = 'default error';
    } else if (this.validity.typeMismatch) {
        this.nextElementSibling.innerHTML = '邮箱格式不正确';
        this.nextElementSibling.className = 'default error';
    } else {
        this.nextElementSibling.innerHTML = '邮箱格式正确';
        this.nextElementSibling.className = 'default success';
        return result_email = true;
    }
};

//功能点3：jquery实现异步的提交注册信息
// $('#bt-register').click(function () {
//     //先判断表单是否都返回true，然后才能向服务器提交
//     if (result_username && result_password && result_email) {
//         //表单序列化，获得所有用户输入 ('username=xxx&password=xxx&email=xxx')
//         var data = $('#register').serialize();
//         // console.log(data);
//         //AJAX异步提交请求数据
//         $.ajax({
//             type: 'POST',
//             url: 'data/user_register_jq_ajax.php',
//             data: data,
//             success: function (result) { //参数result为json格式字符串
//                 // console.log('开始处理服务器端返回的注册结果');
//                 console.log(result);
//                 if (result.msg == 'succ') {
//                     alert('注册成功!');
//                     location.href = 'login.html';
//                 } else {
//                     alert('注册失败!请重新注册')
//                 }
//             }
//         });
//     } else {
//         alert('请按规则填写注册信息!');
//     }
// });

//功能点3：原生AJAX实现异步的提交注册信息
document.getElementById('bt-register').onclick = function () {
    //添加一层判断逻辑，只有当表单验证都返回true时才能向服务器提交数据
    if (result_username && result_password && result_email) {
        var n = username.value;
        var p = password.value;
        var e = email.value;
        // var t = null;
        // var time = null; //接收服务器时间
        // var sign_in_time = null; //定义注册时间
        var xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4) {
                // time = xhr.getResponseHeader('Date');
                // sign_in_time = new Date(time);
                // console.log(time);
                // console.log(sign_in_time);
                // t = sign_in_time.getFullYear() + "-" + (sign_in_time.getMonth() + 1) + "-" + sign_in_time.getDate() + "/" + sign_in_time.getHours() + ":" + sign_in_time.getMinutes() + ":" + sign_in_time.getSeconds();
                // console.log(t);
                if (xhr.status === 200) {
                    // console.log('响应完成且成功');
                    doResponse(xhr);
                } else {
                    console.log('响应完成但有问题');
                }
            }
        };
        xhr.open('POST', 'data/user_register_ys_ajax.php', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.send(`username=${n}&password=${p}&email=${e}`);
        function doResponse(xhr) { //参数xhr接收
            // console.log('开始处理响应数据');
            if (xhr.responseText === 'succ') {
                alert('注册成功!');
                location.href = 'login.html';
            } else {
                alert('注册失败!请重新注册');
            }
        }
    } else {
        alert('请按规则填写注册信息!');
    }
};