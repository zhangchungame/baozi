<!-- BEGIN PAGE LEVEL PLUGINS -->
<link href="/metronic/assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.css" rel="stylesheet" type="text/css" />
<link href="/metronic/assets/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css" rel="stylesheet" type="text/css" />
<link href="/metronic/assets/global/plugins/bootstrap-timepicker/css/bootstrap-timepicker.min.css" rel="stylesheet" type="text/css" />
<link href="/metronic/assets/global/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css" rel="stylesheet" type="text/css" />
<link href="/metronic/assets/global/plugins/clockface/css/clockface.css" rel="stylesheet" type="text/css" />
<!-- END PAGE LEVEL PLUGINS -->
<div class="row">
    <div class="col-md-12">
        <form class="form-horizontal form-row-seperated" id="form1" action="/?r=manage/activity/save" method="post">
            <input type="hidden" name="id" value="<?= $activity['id'] ?>">
            <div class="portlet">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-shopping-cart"></i></div>
                    <div class="actions btn-set">
                        <button type="button" name="back" class="btn btn-secondary-outline" id="cancel">
                            <i class="fa fa-angle-left"></i> 取消
                        </button>
                        <button type="button" class="btn btn-success" id="save">
                            <i class="fa fa-check"></i> 保存
                        </button>
                    </div>
                </div>
                <div class="portlet-body">
                    <div class="tabbable-bordered">
                        <ul class="nav nav-tabs">
                            <li class="active">
                                <a href="#tab_general" data-toggle="tab"> 基本信息 </a>
                            </li>

                            <li>
                                <a href="#tab_upload" data-toggle="tab"> 上传图片 </a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="tab_general">
                                <div class="form-body">
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">活动名:
                                            <span class="required"> * </span>
                                        </label>
                                        <div class="col-md-10">
                                            <input type="text" class="form-control" name="name" id="name"
                                                   placeholder="" value="<?= $activity['name'] ?>"></div>
                                    </div>
                                    <br>
                                    <br>
                                    <br>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">活动时间</label>
                                        <div class="col-md-10">
                                            <div class="input-group input-large date-picker input-daterange"
                                                 data-date="2012-11-10" data-date-format="yyyy-mm-dd">
                                                <input type="text" class="form-control" name="begin_date"
                                                       id="begin_date" value="<?= $activity['begin_date'] ?>">
                                                <span class="input-group-addon"> to </span>
                                                <input type="text" class="form-control" name="end_date"
                                                       id="end_date" value="<?= $activity['end_date'] ?>"></div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">活动地点:
                                            <span class="required"> * </span>
                                        </label>
                                        <div class="col-md-10">
                                            <input type="text" class="form-control" name="place" id="place"
                                                   placeholder="" value="<?= $activity['place'] ?>"></div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-2 control-label">反现比例:
                                            <span class="required"> * </span>
                                        </label>
                                        <div class="col-md-10">
                                            <input type="number" class="form-control" name="withdraw" id="withdraw"
                                                   placeholder="" value="<?= $activity['withdraw'] ?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">活动介绍:
                                            <span class="required"> * </span>
                                        </label>
                                        <div class="col-md-10">
                                            <textarea name="description" cols="60" rows="10"><?= $activity['description'] ?></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="tab_upload">
                                <table class="table table-bordered table-hover">
                                    <thead>
                                    <tbody id="image_tbody">
                                    <tr>
                                        <td id="uploadimage" style="width: 200px;">
                                            <?php
                                            if($activity['title_image']){
                                                echo '<img class="img-responsive" src="/image/upload/'.$activity['title_image'].'" alt="">';
                                            }
                                            ?>
                                        </td>
                                        <td>
                                            <h3>活动标题图片</h3><input type="file" name="file" id="upload_file">
                                            <input type="hidden" name="title_image" id="title_image" value="<?= $activity['title_image'] ?>">
                                        </td>
                                    </tr>

                                    <tr>
                                        <td id="uploadimage2" style="width: 200px;">

                                            <?php
                                            if($activity['map_image']){
                                                echo '<img class="img-responsive" src="/image/upload/'.$activity['map_image'].'" alt="">';
                                            }
                                            ?>
                                        </td>
                                        <td>
                                            <h3>地图图片</h3><input type="file" name="file" id="upload_file2">
                                            <input type="hidden" name="map_image" id="map_image" value="<?= $activity['map_image'] ?>">
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script src="/metronic/assets/global/plugins/moment.min.js" type="text/javascript"></script>
<script src="/metronic/assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.js" type="text/javascript"></script>
<script src="/metronic/assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js" type="text/javascript"></script>
<script src="/metronic/assets/global/plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js" type="text/javascript"></script>
<script src="/metronic/assets/global/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js" type="text/javascript"></script>
<script src="/metronic/assets/global/plugins/clockface/js/clockface.js" type="text/javascript"></script>
<script src="/js/plugs/jquery.ui.widget.js" type="text/javascript"></script>
<script src="/js/plugs/jquery.iframe-transport.js" type="text/javascript"></script>
<script src="/js/plugs/jquery.fileupload.js" type="text/javascript"></script>
<script src="/js/plugs/jquery.fileupload-process.js" type="text/javascript"></script>
<script src="/js/plugs/jquery.fileupload-validate.js" type="text/javascript"></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="/metronic/assets/pages/scripts/components-date-time-pickers.min.js" type="text/javascript"></script>
<!-- END PAGE LEVEL SCRIPTS -->
<script>

    $(document).ready(function () {
        $('#upload_file').fileupload({
                url: '/?r=manage/base/imageupload',
                acceptFileTypes: /(\.|\/)(gif|jpe?g|png)$/i,
                maxFileSize: 99 * 1024 * 1024,
                minFileSize: 5,
                messages: {
                    maxFileSize: 'File exceeds maximum allowed size of 99MB',
                    acceptFileTypes: 'File type not allowed'
                },
                processfail: function (e, data) {
                    var currentFile = data.files[data.index];
                    if (data.files.error && currentFile.error) {
                        // there was an error, do something about it
                        alert(currentFile.error);
                    }
                },
                done: function (e, data) {
                    if (data.result.result == 'OK') {
                        var html = '<img class="img-responsive" src="/image/upload/' + data.result.filename + '" alt="">';
                        $("#title_image").val(data.result.filename);
                        $("#uploadimage").html(html);
                    }
                }
            }
        );
        $('#upload_file2').fileupload({
                url: '/?r=manage/base/imageupload',
                acceptFileTypes: /(\.|\/)(gif|jpe?g|png)$/i,
                maxFileSize: 99 * 1024 * 1024,
                minFileSize: 5,
                messages: {
                    maxFileSize: 'File exceeds maximum allowed size of 99MB',
                    acceptFileTypes: 'File type not allowed'
                },
                processfail: function (e, data) {
                    var currentFile = data.files[data.index];
                    if (data.files.error && currentFile.error) {
                        // there was an error, do something about it
                        alert(currentFile.error);
                    }
                },
                done: function (e, data) {
                    if (data.result.result == 'OK') {
                        var html = '<img class="img-responsive" src="/image/upload/' + data.result.filename + '" alt="">';
                        $("#map_image").val(data.result.filename);
                        $("#uploadimage2").html(html);
                    }
                }
            }
        );
    });
    $("#save").click(function () {
        var error = '';
        if ($("#name").val() == '') {
            error += '名称不能为空\r';
        }
        if ($("#begin_date").val() == '' || $("#end_date").val() == '') {
            error += '活动时间为空\r';
        }
        if ($("#withdrap").val() == '') {
            error += '反现不能为空\r';
        }
        if ($("#place").val() == '') {
            error += '活动地点不能为空\r';
        }
        if ($("#description").val() == '') {
            error += '活动介绍不能为空\r';
        }
        if ($("#title_image").val() == '') {
            error += '标题图片不能为空\r';
        }
        if ($("#map_image").val() == '') {
            error += '地图图片不能为空\r';
        }
        if (error != '') {
            alert(error);
            return 0;
        }
        $("#form1").submit();
    });
    $("#cancel").click(function () {
        window.location.href = '/?r=manage/activity/list';
    });



</script>