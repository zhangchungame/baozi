<style>
    .top-box {
        width: 100%;
        height: 200px;
    }

    .login-show-box {
        width: 100%;
        height: 40px;
    }

    .active-box {
        background-color: #9d9d9d;
        margin-top: 10px;
    }

    .active-status {
        width: 100%;
        height: 30px;
    }

    .active-status img {
        float: left;
        width: 80%;
        height: 100%;
    }

    .active-status article {
        float: left;
        height: 100%;
    }

    .active-detail {
        width: 100%;
        height: 80px;
    }

    .active-float-box {
        float: left;
        margin-left: 20px;
    }

    .active-float-box p {
        font-size: 0.8rem;
        text-decoration: underline;
    }

    .active-float-box span {
        font-size: 1.2rem;
        font-weight: 200;
    }

    .active-btn-box {
        padding-bottom: 20px;
    }
</style>
<div class="top-box">
    <img src="/image/timg.jpg" width="100%" height="100%">
</div>
<div class="login-show-box" id="login_box">
    <?php
    if ($member['member_id']) {
        echo '<p>Hi,' . $member['login_name'] . ' 欢迎您的到来。</p>';
    } else {
        echo '请<a id="login">登录</a>';
    }
    ?>
</div>
<div style="text-align: center;">
    热门活动推荐
</div>
<div class="container">
    <?php
    foreach ($activitys as $activity) {
        ?>

        <div class="row activity-box" style="margin-top: 20px;background-color: #9d9d9d" activity_id="<?=$activity['id']?>">
            <div class="row">
                <img src="/image/upload/<?= $activity['title_image'] ?>" style="height: 50px;width: 100%;">
            </div>
            <div class="row">
                <div style="width: 80%;margin: 3px 10%;border-bottom:2px dashed black;"></div>
            </div>
            <div class="row">
                <div class="col-xs-4">
                    <p>活动</p>
                    <p><?= $activity['name'] ?></p>
                </div>
                <div class="col-xs-3">
                    <p>返现比例</p>
                    <p><?= $activity['withdraw'] ?>%</p>
                </div>
                <div class="col-xs-5">
                    <p>开始时间</p>
                    <p><?= $activity['begin_date'] ?></p>
                </div>
            </div>
        </div>
        <?php
    }

    ?>
</div>


<script>
    $(".btn").click(function () {
        alert("aaa");
    });
    loginObj.onlogin = function (data) {
        this.hide();
        $("#login_box").html('<p>Hi,' + data.login_name + ' 欢迎您的到来。</p>');
    }
    $("#login").click(function () {
        loginObj.show();
    });
    $(".activity-box").click(function () {
       window.location.href='/?r=activity/detail&id='+$(this).attr("activity_id");
    });
</script>