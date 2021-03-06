<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport"
          content="maximum-scale=1.0,minimum-scale=1.0,user-scalable=0,width=device-width,initial-scale=1.0"/>
    <meta name="format-detection" content="telephone=no,email=no,date=no,address=no">
    <link href="/metronic/assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <script src="/metronic/assets/global/plugins/jquery.min.js" type="text/javascript"></script>
    <script src="/metronic/assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>

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
        show: function () {
            $(".login-container").show();
        },
        hide: function () {
            $(".login-container").hide();
        },
        onlogin: function (data) {
            this.hide();
        },
        login: function () {
            var thisobj = this;
            var mobile = $("#mobile").val();
            var smscode = $("#smscode").val();
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
            if (smscode.length != 4) {
                alert('请输入4位验证码！');
                return false;
            }
            $.post("/?r=member/login",
                {
                    mobile: mobile,
                    smsCode: smscode
                },
                function (data, status) {
                    if (data.code == 200) {
                        thisobj.onlogin(data.data);
                    } else {
                        alert(data.msg);
                        $("#smscode").val('');
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
    if ($needlogin == 'y') {
        echo "loginObj.show();";
    }

    ?>
</script>
<?= $content ?>
　　　　

</body>
</html>
