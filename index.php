<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Login</title>

    <!-- Custom fonts for this template-->
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
    
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <!-- alerttify -->
    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css"/>
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/semantic.min.css"/>
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css"/>
</head>
<!-- class="bg-gradient-primary" -->
<body class="bg-gradient-primary" ng-app="myApp" ng-controller="Clt_login" ng-init="startPage()">
<div class="bg-blue active text-white" style="padding: 10px; font-size:20px">
                <i class="fa fa-clock"></i> ระบบร้านค้าปลีก-ส่ง 1.0.0.1
            </div>
    <div class="container">
        <div class="row justify-content-center align-items-center" style="height:80vh">
            <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="card-body"><h4 style="text-align: center;">ระบบร้านค้าปลีก-ส่ง</h4>
                        <form autocomplete="off" ng-submit = "login()">
                            <form>
                                <div class="form-group">
                                    <input type="text" class="form-control" ng-model="user.username" placeholder="User">
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control" ng-model="user.password" placeholder="Password">
                                </div>
                                <button type="submit" class="btn btn-primary" >login</button>
                            </form>    
                        </form>
                        <p class="message" style="text-align: center;">version 1.0.0.1</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</body>

    <!-- Bootstrap core JavaScript-->
    <script type="text/javascript" src="controller/index.js"></script>
    <script type="text/javascript" src="controller/login.js"></script>
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>