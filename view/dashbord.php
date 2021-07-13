<div ng-controller="DashbordController" ng-init="startPage()">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">DashBord</h6>
            </div>
            <div>
            <div class="card-body">
                <div class="row">
                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-left-primary shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                            ยอดขายรายปี</div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">$ {{sum_per_price | number:2}}</div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div>
                <div div class="col-12-xl-12 col-lg-12">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">ยอดขายรายเดือน</h6></h6>
                                    <div class="dropdown no-arrow">
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="chart-area"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
                                <canvas id="myAreaChart" width="761" height="320" class="chartjs-render-monitor" style="display: block; width: 761px; height: 320px;"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div> 
            </div> 
        </div>
    </div>