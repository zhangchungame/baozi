<div class="container">
    <div class="row">
        <div class="col-xs-2">
            <div style="float: left" id="back">
                <p>返回</p>
            </div>
        </div>
        <div class="col-xs-8">
            <p style="text-align: center">活动详情</p>
        </div>
        <div class="col-xs-2">
        </div>
    </div>
    <div class="row" style="margin-top: 20px;background-color: #9d9d9d">
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
        <div class="row">
            <div class="center-block" style="width:100px;">
                <button class="btn btn-primary" id="enroll">活动报名</button>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12" style="margin-top: 10px;background-color: #9d9d9d">
            <?= $activity['description'] ?>
        </div>
    </div>

    <div class="row">
        <img src="/image/upload/<?= $activity['map_image'] ?>" style="width: 100%;">
    </div>
</div>
</div>

<script>
    loginObj.onlogin=function () {
        this.hide();
    }
    $("#back").click(function () {
        window.location.href="/";
    });
    $("#enroll").click(function () {
        $.post(
            "/?r=activity/enroll",
            {
                activity_id:<?=$activity['id']?>
            },
            function (data) {
                if(data.code==200){
                    alert("报名成功");
                }else if(data.code==520){
                    loginObj.show();
                }else {
                    alert("报名失败");
                }
            }
        );
    });
</script>