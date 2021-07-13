<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Account</title>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
    
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css2?family=Prompt:wght@300&display=swap" rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css"/>
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/semantic.min.css"/>
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css"/>
</head>
<style>
    *{
        font-family: 'Prompt', sans-serif;
    }
</style>
<body class="bg-gradient-dark" ng-app="myApp" ng-controller="AccountController" ng-init="startPage()">
<div class="contrainer">
    <div  style="padding:50px">
        <div style="color:white" class="text text-center">
            <h3>สมัครสมาชิก </h3>
        </div>
        <div  style="padding:50px">
            <div style="color:white" class="text text-center">
                <div class="text-left" style="font-size:25px">
                <lable> กรอกชื่อ </lable>
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">กรอกชื่อ</span>
                    <input ng-model="account.name" type="text" class="form-control" placeholder="Name" >
                </div>
            </div>
            <div style="color:white" class="text text-center">
                <div class="text-left" style="font-size:25px">
                <lable> Username </lable>
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">Username</span>
                    <input ng-model="account.username" type="text" class="form-control" placeholder="Username" >
                </div>
            </div>
            <div style="color:white" class="text text-center">
                <div class="text-left" style="font-size:25px">
                <lable> Password </lable>
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">Password</span>
                    <input ng-model="account.password" type="password" class="form-control" placeholder="Password" >
                </div>
            </div>
            <div style="color:white" class="text text-center">
                <div class="text-left" style="font-size:25px">
                <lable>Confirm Password </lable>
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">Confirm Password</span>
                    <input ng-model="account.confirm_password" type="password" class="form-control" placeholder="Confirm Password" >
                </div>
            </div>
        </div>
        <div class="text-center">
            <button type="submit" ng-click="confirm()" class="btn btn-primary text-center" >ยืนยันการสมัคร</button>
        </div>
    </div>
</div>

    
</body>

    <script type="text/javascript" src="controller/index.js"></script>
    <script type="text/javascript" src="controller/account.js"></script>
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>