<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport"
          content="maximum-scale=1.0,minimum-scale=1.0,user-scalable=0,width=device-width,initial-scale=1.0"/>
    <meta name="format-detection" content="telephone=no,email=no,date=no,address=no">
    <script src="/metronic/assets/global/plugins/jquery.min.js" type="text/javascript"></script>
    <style>
        .footnav {
            position: fixed;
            background-color: #9d9d9d;
            width: 100%;
            height: 80px;
            bottom: 0;
            left: 0;
            z-index: 99;
        }

        .footnav ul {
            width: 100%;
            height: 100%;
        }

        .footnav ul li {
            display: block;
            float: left;
            width: 33%;
            align: center;
        }

        .footnav ul img {
            display: block;
            width: 30%;
            margin: auto 0;
        }
    </style>
</head>

<body>
<style>
    .login-container {
        position: fixed;
        top: 0;
        right: 0;
        bottom: 0;
        left: 0;
        overflow: hidden;
        outline: 0;
        -webkit-overflow-scrolling: touch;
        background-color: rgb(0, 0, 0);
        filter: alpha(opacity=60);
        background-color: rgba(0, 0, 0, 0.6);
        z-index: 9999;
    }

    .login-box {
        position: fixed;
        top: 130px;
        left: 50px;
        width: 230px;
        background-color: red;
    }

    .login-input {
        outline: 0 !important;
        box-shadow: none !important;
        height: 20px;
        padding: 5px 10px;
        font-size: 12px;
        line-height: 1.5;
        border-radius: 3px;
    }
</style>
<div class="login-container">
    <div class="login-box">
        <form method="post" action="">
            <label>手机号</label><input class="login-input" style="width: 100px;" id="mobile"><br>
            <label>验证码</label><input class="login-input" style="width: 50px;" id="smscode">
            <button type="button" class="" id="sms_btn">获取验证码</button>
            <br>
            <button type="button" id="login_btn">登录</button>
        </form>
    </div>
</div>
<script>
    var loginObj = {
        show:function () {
            $(".login-container").show();
        },
        hide:function () {
            $(".login-container").hide();
        },
        onlogin : function (data) {

        },
        login : function () {
            var thisobj=this;
            var mobile = $("#mobile").val();
            var smscode=$("#smscode").val();
            if (mobile.length == 0) {
                alert('请输入手机号码！');
                return false;
            }
            if (mobile.length != 11) {
                alert('请输入有效的手机号码！');
                return false;
            }

            var myreg = /^(((13[0-9]{1})|(15[0-9]{1})|(18[0-9]{1}))+\d{8})$/;
            if (!myreg.test(mobile)) {
                alert('请输入有效的手机号码！');
                return false;
            }
            if (mobile.length == 0) {
                alert('请输入验证码！');
                return false;
            }
            $.post("/?r=member/login",
                {
                    mobile: mobile,
                    smsCode:smscode
                },
                function (data, status) {
                    if (data.code == 200) {
                        thisobj.onlogin(data.data);
                    }else{
                        alert(data.msg);
                    }
                });
        }
    }
    $("#login_btn").click(function () {
        loginObj.login();
    });
    $("#sms_btn").click(function () {
        var mobile = $("#mobile").val();
        if (mobile.length == 0) {
            alert('请输入手机号码！');
            return false;
        }
        if (mobile.length != 11) {
            alert('请输入有效的手机号码！');
            return false;
        }

        var myreg = /^(((13[0-9]{1})|(15[0-9]{1})|(18[0-9]{1}))+\d{8})$/;
        if (!myreg.test(mobile)) {
            alert('请输入有效的手机号码！');
            return false;
        }
        $.post("/?r=sms/send",
            {
                mobile: mobile,
            },
            function (data, status) {
                if (data.code == 200) {
                    alert("发送成功");
                }
            });
        waitSMSSend(10);
    });
    function waitSMSSend(times) {
        if (times > 0) {
            $("#sms_btn").attr("disabled", true);
            $("#sms_btn").html("等待" + times + "秒");
            times--;
            setTimeout('waitSMSSend(' + times + ')', 1000);
        } else {
            $("#sms_btn").removeAttr("disabled");
            $("#sms_btn").html("获取验证码");
        }
    }
    loginObj.hide();
    <?php
    if($needlogin=='y'){
        echo "loginObj.show();";
    }

    ?>
</script>
<div style="margin-bottom: 80px;">
    <?= $content ?>
</div>
<nav class="footnav">
    <ul>
        <li>
            <a>
                <img src="/image/timg.jpg">
                <div>首页</div>
            </a>
        </li>
        <li>
            <a>
                <img src="/image/timg.jpg">
                <div>活动</div>
            </a>
        </li>
        <li>
            <a>
                <img src="/image/timg.jpg">
                <div>账户</div>
            </a>
        </li>
    </ul>
</nav>
　　　　

</body>
</html>
