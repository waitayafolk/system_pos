<div ng-controller="GroupProductController" ng-init="startPage()">
    <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">ประเภทสินค้า</h6>
            </div>
                <div class="card-body">
                    <button class="btn btn-primary btn-icon-split" ng-click="modalAdd()">
                        <span class="icon text-white-50">
                            <i class="fas fa-plus"></i>
                        </span>
                        <span class="text">เพิ่มกลุ่มสินค้า</span>
                    </button>
                </div>
        <div>
            <div class="card-body">
                <div class="row">
                </div>
                <div class='table-responsive'>
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th class="text-center">
                                    รหัสสินค้า
                                </th>
                                <th>
                                    ชื่อภาษาไทย
                                </th>
                                <th>
                                    ชื่อภาษาอังกฤษ
                                </th>
                                <th>
                                    รายละเอียด
                                </th>
                                <th style="text-align: center" width="120px">
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr ng-repeat="group in groups">
                                <td align="center">

                                    {{ group.group_code }}
                                </td>
                                <td>

                                    {{ group.group_product_name }}
                                </td>
                                <td>
                                    {{ group.group_product_name_eng }}
                                </td>
                                <td>
                                    {{ group.detail }}
                                </td>
                                <td>
                                    <button class="btn btn-primary" ng-click="modalEdit(group)">
                                        <i class="fa fa-pencil-alt">
                                        </i>
                                    </button>
                                    <button class="btn btn-danger" ng-click="delete(group)">
                                        <i class="fa fa-times">
                                        </i>
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div> 
        <div class="modal" id="modalGroupProduct" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-aqua-active">
                        <h4 class="modal-title">
                            <i class="glyphicon glyphicon-book">
                            </i> เพิ่มกลุ่มสินค้า
                        </h4>
                    </div>
                    <div class="modal-body">
                        <form ng-submit="actionSave()">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="box box-success">
                                        <div class="box-body">
                                            <div class="form-group">
                                                <label>
                                                        รหัสกลุ่มสินค้า *
                                                </label>
                                                <input class="form-control" ng-model="input.group_code" required/>
                                            </div>
                                            <div class="form-group">
                                                <label>
                                                        ชื่อภาษาไทย *
                                                </label>
                                                <input class="form-control" ng-model="input.group_product_name" required/>
                                            </div>
                                            <div class="form-group">
                                                <label>
                                                        ชื่อภาษาอังกฤษ *
                                                </label>
                                                <input class="form-control" ng-model="input.group_product_name_eng" />
                                            </div>
                                            <div class="form-group">
                                                <label>
                                                        รายละเอียด *
                                                </label>
                                                <input class="form-control" ng-model="input.detail" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-check">
                                    </i>
                                    บันทึก
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div> 
    </div>
</div>