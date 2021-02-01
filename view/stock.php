<div ng-controller="ImportstockController" ng-init="startPage()">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">รับเข้าสต๊อก</h6>
        </div>
        <div class="card-body py-3">
            <div class="box box-success" style="margin-top: 10px" ng-show="show != 'edit'">
                <div class="box-header">
                    <i class="fa fa-chart-pie"></i> รับเข้าสต๊อก
                </div>
                <div class="box-body">
                    <div class="row">
                        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-6">
                            บิลรับเข้า
                            <input class="form-control" ng-model="bill.code"placeholder="" id="billcode" required />
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                            คนรับเข้า
                            <input type="text"  ng-model="bill.user" placeholder=""  class="form-control">
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                            ค้นหาสินค้า
                            <div class="input-group">
                                <input class="form-control" ng-model="product.product_code" ng-blur="search_product()" disabled />
                                <button type="button" class="btn-primary" data-toggle="modal" data-target="#modalProduct">
                                    <i class="fa fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body">
                <div class="row"></div>
                <div class='table-responsive'>
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th> # </th>
                                <th> รหัสสินค้า </th>
                                <th> ชื่อสินค้า </th>
                                <th> ราคา </th>
                                <th> จำนวน </th>
                                <th style="text-align: center" width="120px">
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr ng-repeat="stock in stock_temp">
                            <td align="center">
                                    {{$index + 1 }}
                                </td>
                                <td align="center">
                                    {{ stock.product_code }}
                                </td>
                                <td>
                                    {{ stock.product_name }}
                                </td>
                                <td>
                                    {{ stock.product_price | number:2 }}
                                </td>
                                <td>
                                   <input type="text" ng-model= "stock.qty"  class="form-control">
                                </td>
                                <td>
                                    <button class="btn btn-danger text-center" ng-click="delete(stock)">
                                        <i class="fa fa-times"> ลบ </i>
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="text-center">
                    <button type="button" class="text-center btn btn-primary" ng-click="save_to_stock(stock)">
                        <i class="fa fa-save"> &nbsp; บันทึก</i>
                    </button>
                </div>
            </div>
    </div>

        <div class="modal" id="modalProduct" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-xl" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-aqua-active">
                        <h4 class="modal-title">
                            <i class="glyphicon glyphicon-book">
                            </i> เพิ่มกลุ่มสินค้า
                        </h4>
                    </div>
                        <div class="modal-body">
                            <div class="box box-success">
                                <div class="rows">
                                    <div class="col-lg-4 col-md-4 col-sm-5 col-xs-12">
                                        <label>ค้นหา</label>
                                        <div class="input-group">
                                            <input type='text' class="form-control" ng-model="input.name"  placeholder="รหัสสินค้า...."/>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-5 col-xs-12">
                                       <button type="button" class="btn btn-primary" ng-click="serach_product(input)">
                                            <i class="fa fa-search"> &nbsp; ค้นหา</i>
                                        </button>
                                    </div>
                                    <br>
                                    <table class="table">
                                        <thead>
                                            <th></th>
                                            <th>ชื่อสินค้า</th>
                                            <th>Barcode</th>
                                            <th>ราคา</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr ng-repeat="item in product">
                                            <td class="text-center">
                                                <a class="btn btn-primary text-light" data-dismiss="modal"
                                                    ng-click="chooseProduct(item)">
                                                            <i class="fa fa-check"></i> เลือก
                                                </a>
                                            </td>
                                            <td>{{ item.product_name }}</td>
                                            <td>{{ item.product_code }}</td>
                                            <td>{{ item.product_price }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>   
</div>