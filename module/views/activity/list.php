<div class="row">
    <div class="col-md-12">
        <!-- Begin: life time stats -->
        <div class="portlet ">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-shopping-cart"></i>活动列表
                </div>
                <div class="actions">
                    <a href="/?r=manage/product/create" class="btn btn-circle btn-info">
                        <i class="fa fa-plus"></i>
                        <span class="hidden-xs"> 新建活动 </span>
                    </a>
                </div>
            </div>
            <div class="portlet-body">
                <div class="table-container">
                    <table class="table table-striped table-bordered table-hover table-checkable"
                           id="datatable_products">
                        <thead>
                        <tr role="row" class="heading">
                            <th width="10%"> ID</th>
                            <th width="25%"> 活动名</th>
                            <th width="15%"> 开始时间</th>
                            <th width="15%"> 结束时间</th>
                            <th width="10%"> 创建日期</th>
                            <th width="10%"> 更新日期</th>
                            <th width="15%"> 操作</th>
                        </tr>
                        <tr role="row" class="filter">
                            <td>
                                <input type="text" class="form-control form-filter input-sm" name="id"></td>
                            </td>
                            <td>
                                <input type="text" class="form-control form-filter input-sm" name="name"></td>
                            <td>
                            </td>
                            <td>
                            </td>
                            <td>
                            </td>
                            <td>
                            </td>
                            <td>
                                <button class="btn btn-sm btn-success filter-submit margin-bottom">
                                    <i class="fa fa-search"></i> 搜索
                                </button>
                                <button class="btn btn-sm btn-default filter-cancel">
                                    <i class="fa fa-times"></i> 重置
                                </button>
                            </td>
                        </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- End: life time stats -->
    </div>
</div>
<script src="/js/manage_activity_list.js" type="text/javascript"></script>