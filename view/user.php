<div ng-controller="UserController" ng-init="startPage()">
    <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">จัดการสมาชิก</h6>
            </div>
                <div class="card-body">
                    <button class="btn btn-primary btn-icon-split" ng-click="modalAdd()">
                        <span class="icon text-white-50">
                            <i class="fas fa-plus"></i>
                        </span>
                        <span class="text">เพิ่มสมาชิกร้าน</span>
                    </button>
                </div>
            <div>
            <div class="card-body">
                <div class='table-responsive'>
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th align="center">#</th>
                                <th align="center">รหัสผู้ใช้ระบบ</th>
                                <th>ชื่อผู้ใช้ะบบ</th>
                                <th>Username</th>
                                <th>Level</th>
                                <th style="text-align: center" width="120px">
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr ng-repeat="user in users">
                            <td align="center">{{$index + 1 }}</td>
                                <td align="center">{{ user.user_code }}</td>
                                <td>{{ user.name }}</td>
                                <td>{{ user.username }}</td>
                                <td>{{ user.level }}</td>
                                <td>
                                    <button class="btn btn-primary" ng-click="modalEdit(user)">
                                        <i class="fa fa-pencil-alt"> 
                                        </i>
                                    </button>
                                    <button class="btn btn-danger" ng-click="delete(user)">
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
        <div class="modal fade" id="modalUser" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-xl" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-aqua-active">
                        <h4 class="modal-title">
                            <i class="glyphicon glyphicon-book">
                            </i> เพิ่มสมาชิก User 
                        </h4>
                    </div>
                    <div class="modal-body">
                        <form ng-submit="actionSave()">
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                    <div class="box box-success">
                                        <div class="box-body">
                                            <div class="form-group">
                                                <label>
                                                        รหัสผู้ใช้ *
                                                </label>
                                                <input class="form-control" ng-model="input.user_code" required/>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                    <div class="box box-success">
                                        <div class="box-body">
                                            <div class="form-group">
                                                <label>
                                                        ชื่อผู้ใช้ระบบ *
                                                </label>
                                                <input class="form-control" ng-model="input.name" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                    <div class="box box-success">
                                        <div class="box-body">
                                            <div class="form-group">
                                                <label>
                                                        Username *
                                                </label>
                                                <input class="form-control" ng-model="input.username" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                    <div class="box box-success">
                                        <div class="box-body">
                                            <div class="form-group">
                                                <label>
                                                        Password *
                                                </label>
                                                <input type='password' class="form-control" ng-model="input.password" />
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
                                                <select ng-model="input.level" class="form-control">
                                                    <option value="">-Choose-</option>
                                                    <option value="admin">Admin</option>
                                                    <option value="sale">Sale</option>
                                                    <option value="member">Member</option>
                                                </select>
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