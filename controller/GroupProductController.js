app.controller('GroupProductController', function($scope, $http) {
    $scope.groups = [];
    $scope.input = {};
    $scope.importdata = {};
    $scope.importdata.data = "";
    $scope.startPage = function() {
        // console.log("folk")
        $scope.loadGroupProduct();
    };


    $scope.actionSave = function() {
        // console.log($scope.input)
        $http.post('../api/GroupProductSave.php', $scope.input).then(res => {
            if (res.data.message == 'success') {
                alertify.success('บันทึกข้อมูลเรียบร้อย');
                $scope.loadGroupProduct();
                $('#modalGroupProduct').modal('hide');
            }
            
        });
    };


    $scope.loadGroupProduct = function() {
        $http.post('../api/GroupProduct.php').then(res => {
            $scope.groups = res.data.group_product;
            // console.log(res.data.group_product)
        });
    };

    $scope.modalAdd = function() {
        $scope.input = {};
        $('#modalGroupProduct').modal('show');
    };

    $scope.modalEdit = function(input) {
        $scope.input = {};
        $scope.input = input;
        $('#modalGroupProduct').modal('show');
    };

    $scope.delete = function(input) {
        var name = "ประเภทสินค้า: " + input.group_product_name;
        alertify.confirm('ยืนยันการลบข้อมูล', name, function() {
            $http.post('../api/GroupProductDelete.php', input).then(function(res) {
                if (res.data.message == 'success') {
                    alertify.success('ลบข้อมูลเรียบร้อย');
                    $scope.loadGroupProduct();
                } else if (res.data.message == 'Found') {
                    alertify.error('มีสินค้าในประเภทสินค้านี้อยู่ ไม่สามารถลบประเภทสินค้านี้ได้');
                }
            });
        }, function() {
            alertify.error('ยกเลิก')
        });
    };
});