<div class="row">
    <div class="col-md-12">
        <form class="form-horizontal form-row-seperated" id="form1" action="/?r=manage/activity/save" method="post">
            <input type="hidden" name="activity[id]" value="<?= $activity['id'] ?>">
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
                                <a href="#tab_images" data-toggle="tab"> 图片 </a>
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
                                            <input type="text" class="form-control" name="activity[name]" id="name"
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
                                                <input type="text" class="form-control" name="activity[begin_date]"
                                                       id="begin_date" value="<?= $activity['begin_date'] ?>">
                                                <span class="input-group-addon"> to </span>
                                                <input type="text" class="form-control" name="activity[end_date]"
                                                       id="end_date" value="<?= $activity['end_date'] ?>"></div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">活动地点:
                                            <span class="required"> * </span>
                                        </label>
                                        <div class="col-md-10">
                                            <input type="text" class="form-control" name="activity[name]" id="name"
                                                   placeholder="" value="<?= $activity['name'] ?>"></div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-2 control-label">反现比例:
                                            <span class="required"> * </span>
                                        </label>
                                        <div class="col-md-10">
                                            <input type="number" class="form-control" name="activity[name]" id="name"
                                                   placeholder="" value="<?= $activity['name'] ?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">活动介绍:
                                            <span class="required"> * </span>
                                        </label>
                                        <div class="col-md-10">
                                            <textarea name="description" cols="60" rows="10"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="tab_images">
                                <div id="tab_images_uploader_container" class="text-align-reverse margin-bottom-10">
                                    <a id="tab_images_uploader_pickfiles" href="javascript:;" class="btn btn-success">
                                        <i class="fa fa-plus"></i> 选择文件 </a>
                                    <a id="tab_images_uploader_uploadfiles" href="javascript:;" class="btn btn-primary">
                                        <i class="fa fa-share"></i> 上传文件 </a>
                                </div>
                                <div class="row">
                                    <div id="tab_images_uploader_filelist" class="col-md-6 col-sm-12"></div>
                                </div>
                                <table class="table table-bordered table-hover">
                                    <thead>
                                    <tr role="row" class="heading">
                                        <th width="8%"> 图片</th>
                                        <th width="25%"> 标签</th>
                                        <th width="8%"> 排序</th>
                                        <th width="10%"> 是否主图</th>
                                        <th width="10%">操作</th>
                                    </tr>
                                    </thead>
                                    <tbody id="image_tbody">
                                    </tbody>
                                </table>
                            </div>
                            <div class="tab-pane" id="tab_upload">
                                <table class="table table-bordered table-hover">
                                    <thead>
                                    <tbody id="image_tbody">
                                    <tr>
                                        <td id="uploadimage" style="width: 200px;">
                                        </td>
                                        <td>
                                            <h3>活动标题图片</h3><input type="file" name="file" id="upload_file">
                                            <input type="hidden" name="title_image" id="title_image">
                                        </td>
                                    </tr>

                                    <tr>
                                        <td id="uploadimage2" style="width: 200px;">
                                        </td>
                                        <td>
                                            <h3>地图图片</h3><input type="file" name="file" id="upload_file2">
                                            <input type="hidden" name="map_image" id="map_image">
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
<script src="/js/plugs/jquery.ui.widget.js" type="text/javascript"></script>
<script src="/js/plugs/jquery.iframe-transport.js" type="text/javascript"></script>
<script src="/js/plugs/jquery.fileupload.js" type="text/javascript"></script>
<script src="/js/plugs/jquery.fileupload-process.js" type="text/javascript"></script>
<script src="/js/plugs/jquery.fileupload-validate.js" type="text/javascript"></script>
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
        if ($(".tr_image").length <= 0) {
            error += "请上传图片\r";
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

    /*
     *添加图片显示
     */
    var add_num = 1;
    function imageShowAdd(image) {
        var html = '<tr class="tr_image"><td><a href="/image/upload/' + image.filename + '" target="_blank" class="fancybox-button" data-rel="fancybox-button"><input type="hidden" name="activity[images][' + add_num + '][filename]" value="' + image.filename + '" ><img class="img-responsive" src="/image/upload/' + image.filename + '" alt=""> </a></td><td><input type="text" class="form-control" name="activity[images][' + add_num + '][label]" value="' + image.label + '"> </td><td><input type="text" class="form-control" name="activity[images][' + add_num + '][sort_order]" value="' + image.sort_order + '"> </td><td><label><input type="radio" name="activity[image_type]" value="' + add_num + '"';
        if (image.check) {
            html += ' checked ';
        }
        html += '> </label> </td></td><td><a href="javascript:;" class="btn btn-default btn-sm image_remove"><i class="fa fa-times"></i> 删除 </a></td></tr>';
        $('#image_tbody').append(html);
        add_num++;
    }

    /**
     * 动态绑定删除按钮
     */
    $("#image_tbody").on("click", ".image_remove", function () {
        $(this).parent().parent().remove();
    });
    var tmpObj = {};
    <?php
    foreach ($activity['image'] as $tmp) {
        echo 'tmpObj=' . json_encode($tmp) . ';
        ';
        echo 'imageShowAdd(tmpObj);
        ';
    }
    ?>
</script>