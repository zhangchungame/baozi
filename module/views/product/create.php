<div class="row">
    <div class="col-md-12">
        <form class="form-horizontal form-row-seperated" id="form1" action="/?r=manage/product/createdo" method="post">
            <input type="hidden" name="product[id]" value="<?=$product['id']?>">
            <div class="portlet">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-shopping-cart"></i> </div>
                    <div class="actions btn-set">
                        <button type="button" name="back" class="btn btn-secondary-outline" id="cancel">
                            <i class="fa fa-angle-left"></i> 取消</button>
                        <button type="button" class="btn btn-success" id="save">
                            <i class="fa fa-check"></i> 保存</button>
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
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="tab_general">
                                <div class="form-body">
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">商品名:
                                            <span class="required"> * </span>
                                        </label>
                                        <div class="col-md-10">
                                            <input type="text" class="form-control" name="product[name]" id="name" placeholder="" value="<?=$product['name']?>"> </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">短描述:
                                        </label>
                                        <div class="col-md-10">
                                            <textarea class="form-control" name="product[short_description]" value="<?=$product['short_description']?>"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">单价:
                                            <span class="required"> * </span>
                                        </label>
                                        <div class="col-md-10">
                                            <input type="number" class="form-control" name="product[price]" id="price" placeholder="" value="<?=$product['price']?>"> </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">库存:
                                            <span class="required"> * </span>
                                        </label>
                                        <div class="col-md-10">
                                            <input type="number" class="form-control" name="product[store]" id="store" placeholder="" value="<?=$product['store']?>"> </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">状态:
                                            <span class="required"> * </span>
                                        </label>
                                        <div class="col-md-10">
                                            <select class="table-group-action-input form-control input-medium" name="product[status]">
                                                <option value="1" <?php if($product['status']==1)echo 'checked';?>>上架</option>
                                                <option value="2" <?php if($product['status']==2)echo 'checked';?>>下架</option>
                                            </select>
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
                                    <div id="tab_images_uploader_filelist" class="col-md-6 col-sm-12"> </div>
                                </div>
                                <table class="table table-bordered table-hover">
                                    <thead>
                                    <tr role="row" class="heading">
                                        <th width="8%"> 图片 </th>
                                        <th width="25%"> 标签 </th>
                                        <th width="8%"> 排序 </th>
                                        <th width="10%"> 是否主图 </th>
                                        <th width="10%">操作 </th>
                                    </tr>
                                    </thead>
                                    <tbody id="image_tbody">
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
<script src="/metronic/assets/pages/scripts/ecommerce-products-edit.js" type="text/javascript"></script>
<!-- END THEME LAYOUT SCRIPTS -->
<script>
    $("#save").click(function () {
        var error='';
        if($("#name").val()==''){
            error+='名称不能为空\r';
        }
        if($("#price").val()==''||isNaN($("#price").val())||$("#price").val()<=0){
            error+='价格必须大于0\r';
        }
        if($("#store").val()==''||$("#store").val()<=0){
            error+='库存必须大于0\r';
        }
        if($(".tr_image").length<=0){
            error+="请上传图片\r";
        }
        if(error!=''){
            alert(error);
            return 0;
        }
        $("#form1").submit();
    });
    $("#cancel").click(function () {
        window.location.href='/?r=manage/product/list';
    });

    /*
     *添加图片显示
     */
    var add_num=1;
    function imageShowAdd(image) {
        var html='<tr class="tr_image"><td><a href="/image/upload/'+image.filename+'" target="_blank" class="fancybox-button" data-rel="fancybox-button"><input type="hidden" name="product[images]['+add_num+'][filename]" value="'+image.filename+'" ><img class="img-responsive" src="/image/upload/'+image.filename+'" alt=""> </a></td><td><input type="text" class="form-control" name="product[images]['+add_num+'][label]" value="'+image.label+'"> </td><td><input type="text" class="form-control" name="product[images]['+add_num+'][sort_order]" value="'+image.sort_order+'"> </td><td><label><input type="radio" name="product[image_type]" value="'+add_num+'"';
        if(image.check){
            html+=' checked ';
        }
        html+='> </label> </td></td><td><a href="javascript:;" class="btn btn-default btn-sm image_remove"><i class="fa fa-times"></i> 删除 </a></td></tr>';
        $('#image_tbody').append(html);
        add_num++;
    }

    /**
     * 动态绑定删除按钮
     */
    $("#image_tbody").on("click",".image_remove", function () {
        $(this).parent().parent().remove();
    });
    var tmpObj={};
    <?php
    foreach($product['image'] as $tmp){
        echo 'tmpObj='.json_encode($tmp).';
        ';
        echo 'imageShowAdd(tmpObj);
        ';
    }
    ?>
</script>