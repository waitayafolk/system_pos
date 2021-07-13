app.controller("AccountController",function ($scope, $http) {
    $scope.account = {};
    $scope.startPage = function() {
        
    };

    
    
    $scope.confirm = function(){
        $scope.account.user_code = $scope.getRandomInt(999999);
        if($scope.account.password != $scope.account.confirm_password ){
            alertify.error('password ไม่ตรงกัน');
        }if($scope.account.password == $scope.account.confirm_password){
            $http.post('api/AccountSave.php', $scope.account).then(res => {
                if (res.data.message == 'success') {
                    $scope.account = {};
                    window.location.replace('/system_pos/index.php');
                    alertify.success('บันทึกข้อมูลเรียบร้อย');
                }else{
                    alertify.error('บันทึกข้อมูลไม่ได้');
                }
            });
        }
    }

    $scope.getRandomInt = (max) => {
        return Math.floor(Math.random() * Math.floor(max));
      }
})