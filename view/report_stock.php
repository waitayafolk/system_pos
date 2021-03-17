<div ng-controller="Reportstock" ng-init="startPage()">
    <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">รายงานสต๊อก</h6>
            </div>
                <div class="card-body">
                    <button class="btn btn-primary btn-icon-split" ng-click="report_stock()">
                        <span class="icon text-white-50">
                            <i class="fas fa-search"></i>
                        </span>
                        <span class="text"> แสดงข้อมูล </span>
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
                                    ชื่อสิค้า
                                </th>
                                <th>
                                    รับเข้าสินค้า
                                </th>
                                <th>
                                    ขายสินค้า
                                </th>
                                <th>
                                    สินค้าคงเหลือ
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr ng-repeat="stock_products in stock_product">
                                <td align="center">

                                    {{ stock_products.product_code }}
                                </td>
                                <td>

                                    {{ stock_products.product_name }}
                                </td>
                                <td>
                                    {{ stock_products.stock_in }}
                                </td>
                                <td>
                                    {{ stock_products.stock_out }}
                                </td>
                                <td>
                                    {{ stock_products.stock_in - stock_products.stock_out | number:2 }}
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>  
    </div>
</div>