app.controller("Clt_login",function ($scope, $http) {
    $scope.startPage = function() {
        
    };
    $scope.user = {};

    $scope.login = function(){
        // console.log($scope.user)
        if($scope.user.username == undefined || $scope.user.password == undefined ){
            alertify.alert("Login Error","กรุณากรอก User และ Password", function(){});
        }else{
            $http({
                url:"api/login.php",
                method: "POST",
                data: $scope.user,
              }).then(function (data) {
                if (data.data.message == "success") {
                  window.location.replace('/system_pos/view/index.php');
                  $scope.user = {};
                }else if(data.data.message == "invalid") {
                    alertify.alert("Login Error","User or Password invalid.", function(){
                    alertify.error('Error message');
                    });
                    $scope.user = {};
                }
              });
        }
    }


})