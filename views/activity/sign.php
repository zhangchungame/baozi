<div class="container">
    <div class="row">
        <div class="center-block" style="width:300px;text-align: center">
            <h1 id="sign_res">
                <?php
                if($member_id){
                    echo '签到成功';
                }else{
                    echo '签到失败，请先登录';
                }
                ?></h1>
        </div>
    </div>
</div>
<script>
<?php
if(!$member_id){
    echo 'loginObj.show();';
}
?>
    loginObj.onlogin=function (data) {
        this.hide();
        $("#sign_res").html('签到成功');
    }
</script>