<style>
    .top-box{
        width:100%;
        height: 200px;
    }
    .login-show-box{
        width:100%;
        height:40px;
    }
    .active-box{
        background-color: #9d9d9d;
        margin-top:10px;
    }
    .active-status{
        width:100%;
        height:30px;
    }
    .active-status img {
        float: left;
        width:80%;
        height: 100%;
    }
    .active-status article{
        float: left;
        height: 100%;
    }
    .active-detail{
        width:100%;
        height: 80px;
    }
    .active-float-box{
        float: left;
        margin-left:20px;
    }
    .active-float-box p{
        font-size:0.8rem;
        text-decoration: underline;
    }
    .active-float-box span{
        font-size: 1.2rem;
        font-weight: 200;
    }
    .active-btn-box{
        padding-bottom:20px;
    }
</style>
<div class="top-box">
    <img src="/image/timg.jpg" width="100%" height="100%">
</div>
<div class="login-show-box">
    <p>Hi,包子 欢迎您的到来。</p>
</div>
<div style="text-align: center;">
    热门活动推荐
</div>

<div class="active-box">
    <div class="active-status">
        <img src="/image/timg.jpg">
        <article>进行中</article>
    </div>
    <div class="active-detail">
        <div class="active-float-box">
            <p>活动</p>
            <p><span>华夏家博会</span></p>
        </div>
        <div class="active-float-box">
            <p>反现比例</p>
            <p><span>全额</span></p>
        </div>
        <div class="active-float-box">
            <p>开始时间</p>
            <p><span>2017年07月11日</span></p>
        </div>
    </div>
    <div class="active-btn-box">
        <button style="padding:3px 10px ;valign:middle" class="btn">领取券码</button>
    </div>
</div>

<div class="active-box">
    <div class="active-status">
        <img src="/image/timg.jpg">
        <article>进行中</article>
    </div>
    <div class="active-detail">
        <div class="active-float-box">
            <p>活动</p>
            <p><span>华夏家博会</span></p>
        </div>
        <div class="active-float-box">
            <p>反现比例</p>
            <p><span>全额</span></p>
        </div>
        <div class="active-float-box">
            <p>开始时间</p>
            <p><span>2017年07月11日</span></p>
        </div>
    </div>
    <div class="active-btn-box">
        <button style="padding:3px 10px ;valign:middle" class="btn">领取券码</button>
    </div>
</div>

<div class="active-box">
    <div class="active-status">
        <img src="/image/timg.jpg">
        <article>进行中</article>
    </div>
    <div class="active-detail">
        <div class="active-float-box">
            <p>活动</p>
            <p><span>华夏家博会</span></p>
        </div>
        <div class="active-float-box">
            <p>反现比例</p>
            <p><span>全额</span></p>
        </div>
        <div class="active-float-box">
            <p>开始时间</p>
            <p><span>2017年07月11日</span></p>
        </div>
    </div>
    <div class="active-btn-box">
        <button style="padding:3px 10px ;valign:middle" class="btn">领取券码</button>
    </div>
</div>
<script>
    $(".btn").click(function () {
        alert("aaa");
    })
    loginObj.onlogin=function (data) {
        this.hide();
    }
</script>