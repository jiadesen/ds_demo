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
    this.nextElementSibling.innerHTML = '用户名长度在4到20位之间';
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
            if (xhr.responseText === 'cunzai') {
                m.innerHTML = '该用户名已存在';
                m.className = 'default error';
            } else if (xhr.responseText === 'bucunzai') {
                console.log(this);
                m.innerHTML = '用户名格式正确';
                m.className = 'default success';
                return result_username = true;
            } else {
                alert('未知的响应数据');
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
$('#bt-register').click(function () {
    //先判断表单是否都返回true，然后才能向服务器提交
    if (result_username && result_password && result_email) {
        //表单序列化，获得所有用户输入 ('username=xxx&password=xxx&email=xxx')
        var data = $('#register').serialize();
        console.log(data);
        //AJAX异步提交请求数据
        $.ajax({
            type: 'POST',
            url: 'data/user_register.php',
            data: data,
            success: function (result) {
                // console.log('开始处理服务器端返回的注册结果');
                // console.log(result);
                if (result.msg == "succ") {
                    alert('注册成功!');
                    location.href = 'login.html';
                } else {
                    alert('注册失败!请重新注册')
                }
            }
        });
    } else {
        alert('请按规则填写注册信息!');
    }
});
















