app.controller('UserController', function($scope, $http) {
    // $scope.groups = [];
    // $scope.input = {};
    // $scope.importdata = {};
    // $scope.importdata.data = "";
    $scope.startPage = function() {
        $scope.loaduser();
    }; 

    $scope.actionSave = function() {
        if($scope.input.username == undefined || $scope.input.password == undefined ){
            alertify.error('กรุณากรอกข้อมูล');
        }else{
            $http.post('../api/UserSave.php', $scope.input).then(res => {
                if (res.data.message == 'success') {
                    alertify.success('บันทึกข้อมูลเรียบร้อย');
                    $scope.loaduser();
                    $('#modalUser').modal('hide');
                }else{
                    alertify.error('บันทึกข้อมูลไม่ได้');
                }
            });
        }
    };

    $scope.modalAdd = function(){
        $scope.input = {};
        $('#modalUser').modal('show');
    }

    $scope.modalEdit = function(input) {
        $scope.input = {};
        $scope.input = input;
        $('#modalUser').modal('show');
    };

    $scope.loaduser = function() {
        $http.post('../api/User.php').then(res => {
            $scope.users = res.data.user;
            console.log(res.data.user)
        });
    };

    $scope.delete = function(input){
        var id = input.id
        alertify.confirm('ยืนยันการลบ ?? ' , 'คุณต้องการลบหรือไม่', function(){
            $http.post('../api/UserDelete.php', id).then(res => {
                $scope.users = res.data.user;
                $scope.loaduser();
                alertify.success('ลบข้อมูลสำเร็จ');
            });
        },function(){
            alertify.error('ยกเลิก')
        })
    }
})