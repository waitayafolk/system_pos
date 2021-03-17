<div ng-controller="SaleController" ng-init="startPage()">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">ขายสินค้า</h6>
        </div>
        <div class="card-body py-3">
            <div class="box box-success" style="margin-top: 10px" ng-show="show != 'edit'">
                <div class="box-header">
                    <i class="fa fa-chart-pie"></i> ขายสินค้า
                </div>
                <div class="box-body">
                    <div class="row">
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
            <div class="text" >
                <label><h4>ยอดรวมสุทธิ </h4></label>
                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
                    <input class="text-right"  type="text" disabled placeholder="{{total_sum_sale | number:2  }}" >
                </div> 
            </div>
        </div>
        
        <div class="card-body">
                <div class="row"></div>
                <div class='table-responsive'>
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th class="text-center"> # </th>
                                <th class="text-center"> รหัสสินค้า </th>
                                <th> ชื่อสินค้า </th>
                                <th> ราคา </th>
                                <th> จำนวน </th>
                                <th> รวม </th>
                                <th style="text-align: center" width="120px">
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr ng-repeat="sale in sale_temp">
                            <td align="center">
                                    {{$index + 1 }}
                                </td>
                                <td align="center">
                                    {{ sale.product_code }}
                                </td>
                                <td>
                                    {{ sale.product_name }}
                                </td>
                                <td>
                                    {{ sale.product_price | number:2 }}
                                </td>
                                <td>
                                   <input type="text" ng-model= "sale.qty" ng-blur="update_qty(sale)"  class="form-control">
                                </td>
                                <td>
                                {{ sale.product_price * sale.qty | number:2  }}
                                </td>
                                <td>
                                    <button class="btn btn-danger text-center" ng-click="delete(sale)">
                                        <i class="fa fa-times"> ลบ </i>
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="text-center">
                    <button type="button" class="text-center btn btn-primary" data-toggle="modal" data-target="#modalEndsale">
                        <i class="fa fa-save"> &nbsp; จบการขาย</i>
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
                            </i> สินค้า
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

        <div class="modal" id="modalEndsale" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-aqua-active">
                        <h4 class="modal-title">
                            <i class="glyphicon glyphicon-book">
                            </i> จบการขาย
                        </h4>
                    </div>
                    <div class="modal-body">
                        <form ng-submit="end_sale()">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="box box-success">
                                        <div class="box-body">
                                            <div class="form-group">
                                                <label>
                                                        ยอดรวม
                                                </label>
                                                <input class="form-control" disabled  ng-model="total_sum_sale" placeholder="{{total_sum_sale | number:2  }}"  required/>
                                            </div>
                                            <div class="form-group">
                                                <label>
                                                        รับเงิน
                                                </label>
                                                <input class="form-control" name="get_money" ng-model="get_money"  placeholder="{{get_money | number:2  }}" required/>
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