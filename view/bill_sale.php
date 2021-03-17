<div ng-controller="BillController" ng-init="startPage()">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">จัดการบิล</h6>
        </div>
        <div class="card-body py-3">
            <div class="box box-success" style="margin-top: 10px" ng-show="show != 'edit'">
                <div class="box-header">
                    <i class="fa fa-chart-pie"></i> จัดการบิล
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
                                <th class="text-center"> บิลที่ </th>
                                <th> วันที่ทำรายการ </th>
                                <th> ยอดบิล </th>
                                <th style="text-align: center" width="120px">
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr ng-repeat="bill in bill_sale">
                            <td align="center">
                                    {{$index + 1 }}
                                </td>
                                <td align="center">
                                    {{ bill.bill_id }}
                                </td>
                                <td>
                                    {{ bill.pay_date }}
                                </td>
                                <td>
                                    {{ bill.total_sale | number:2 }}
                                </td>
                                <td>
                                    <button class="btn btn-danger text-center" ng-click="detail(bill)">
                                        <i class="fa fa-times"> ลบ </i>
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
    </div>

        <div class="modal" id="modalProduct" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-xl" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-aqua-active">
                        <h4 class="modal-title">
                            <i class="glyphicon glyphicon-book">
                            </i> รายละเอียดบิล
                        </h4>
                    </div>
                        <div class="modal-body">
                            <div class="box box-success">
                                <div class="rows">
                                    <br>
                                    <table class="table">
                                        <thead>
                                            <th>รหัสสินค้า</th>
                                            <th>ชื่อสินค้า</th>
                                            <th>ราคาขาย</th>
                                            <th>จำนวน</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr ng-repeat="item in detail_bill">
                                            <td>{{ item.product_code }}</td>
                                            <td>{{ item.product_name }}</td>
                                            <td>{{ item.product_price }}</td>
                                            <td>{{ item.qty }}</td>
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