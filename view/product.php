<div ng-controller="ProductController" ng-init="startPage()">
    <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">จัดการสินค้า</h6>
            </div>
                <div class="card-body">
                    <button class="btn btn-primary btn-icon-split" ng-click="modalAdd()">
                        <span class0="icon text-white-50">
                            <i cgbvlass="fas fa-plus"></i>
                        </span>
                        <span class="text">เพิ่มสินค้า</span>
                    </button>
                    <div class="row">
                        <div class="col-lg-4 col-md-4 col-sm-5 col-xs-12">
                                <label>ค้นหา</label>
                            <div class="input-group">
                                <input type='text' class="form-control" ng-model="input.name" ng-blur="serach_product(input)" placeholder="รหัสสินค้า...."/>
                            </div>
                        </div>
                    </div>
                </div>
            <div>
            <div class="card-body">
                <div class="row"></div>
                <div class='table-responsive'>
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>
                                    #
                                </th>
                                <th>
                                    รหัสสินค้า
                                </th>
                                <th>
                                    ชื่อสินค้า
                                </th>
                                <th>
                                    ราคา
                                </th>
                                <th>
                                    รายละเอียด
                                </th>
                                <th style="text-align: center" width="250px">
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr ng-repeat="products in product">
                            <td align="center">
                                    {{$index + 1 }}
                                </td>
                                <td align="center">
                                    {{ products.product_code }}
                                </td>
                                <td>
                                    {{ products.product_name }}
                                </td>
                                <td>
                                    {{ products.product_price | number:2 }}
                                </td>
                                <td>
                                    {{ products.product_detail }}
                                </td>
                                <td style="text-align : center">
                                    <button class="btn btn-warning" ng-click="print_barcode(products)">
                                        <i class="fa fa-print">
                                        </i>
                                    </button>&nbsp;
                                    <button class="btn btn-primary" ng-click="modalEdit(products)">
                                        <i class="fa fa-pencil-alt">
                                        </i>
                                    </button>&nbsp;
                                    <button class="btn btn-danger" ng-click="delete(products)">
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
        <div class="modal" id="modalUser" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-xl" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-aqua-active">
                        <h4 class="modal-title">
                            <i class="glyphicon glyphicon-book">
                            </i> เพิ่มกลุ่มสินค้า
                        </h4>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                    <div class="box box-success">
                                        <div class="box-body">
                                            <div class="form-group">
                                                <label>
                                                        รหัสสินค้า
                                                </label>
                                                <input type='text' class="form-control" ng-model="input.product_code" required/>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                    <div class="box box-success">
                                        <div class="box-body">
                                            <div class="form-group">
                                                <label>
                                                        ชื่อสินค้า
                                                </label>
                                                <input type='text' class="form-control" ng-model="input.product_name" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                    <div class="box box-success">
                                        <div class="box-body">
                                            <div class="form-group">
                                                <label>
                                                        ราคา
                                                </label>
                                                <input type='number' class="form-control" ng-model="input.product_price" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                    <div class="box box-success">
                                        <div class="box-body">
                                            <div class="form-group">
                                                <label>
                                                        รายละเอียด
                                                </label>
                                                <input type='text' class="form-control" ng-model="input.product_detail" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                    <div class="box box-success">
                                        <div class="box-body">
                                            <div class="form-group">
                                                <label>
                                                        เลือกปนะเภทสินค้า
                                                </label>
                                                <select ng-model="input.group_product_id" class="form-control">
                                                    <option ng-repeat="g in groupProducts"
                                                        ng-value="g.id">
                                                        {{ g.group_product_name}} : {{ g.group_product_name_eng}}
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="text-center">
                                <button type="button" class="btn btn-primary" ng-click="actionSave()">
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