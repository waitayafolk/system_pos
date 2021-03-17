app.controller('ProductController', function($scope, $http) {
    $scope.groups = [];
    $scope.input = {};
    $scope.importdata = {};
    $scope.importdata.data = "";

    $scope.startPage = function() {
        $scope.loadproduct();
        $scope.loadGroupProduct();
        $scope.input.name = "";
    };

    $scope.uploadFiles = function() {
        var barcode = $scope.input2.barcode;
      
        sessionStorage.setItem("product", barcode);

        $scope.input = null;
        $scope.grop_pic = null;
        console.log($scope.grop_pic);
        $http.post('api/GropPromotionSavepicDefault.php?barcode=' + barcode).then(res => {
      
            if ($scope.grop_pic == null) {
                var request = {
                    method: 'POST',
                    url: 'api/GropPromotionSavepic.php?barcode=' + barcode,
                    data: formdata,
                    headers: {
                        'Content-Type': undefined
                    }
                };
                $http(request).then(function successCallback(response) {
                    if (response.data.size > 1000000) {
                        swal({
                            type: 'error',
                            title: 'รูปภาพของคุณขนาดใหญ่เกินไป',
                            text: 'ใช้รูปขนาดไม่เกิน 1mb'
                        });
      
                        response.data.product_pic = null;
                    }
                    
                    if (response.data.grop_pic != null) {
                        alertify.success('อัพโหลดรูปภาพเสร็จเรียบร้อย');
                        $scope.grop_pic = response.data.grop_pic;
                        console.log(response.data.grop_pic);
                    }$scope.pic = $scope.grop_pic;
                });
            }
        });
      
      };
      


    $scope.actionSave = function() {
        $http.post('../api/ProductSave.php', $scope.input).then(res => {
            if (res.data.message == 'success') {
                alertify.success('บันทึกข้อมูลเรียบร้อย');
                $scope.loadproduct();
                $('#modalUser').modal('hide');
            }
           
        });
    };

    $scope.loadGroupProduct = function() {
        $http.post('../api/GroupProduct.php').then(res => {
            $scope.groupProducts = res.data.group_product;
        });
    }


    $scope.loadproduct = function() {
        $http.post('../api/Product.php').then(res => {
            $scope.product = res.data.product;
        });
    };

    $scope.modalAdd = function() {
        $scope.input = {};
        $('#modalUser').modal('show');
    };

    $scope.modalEdit = function(input) {
        $scope.input = {};
        $scope.input = input;
        $('#modalUser').modal('show');
    };

    $scope.delete = function(input) {
        var name = "ประเภทสินค้า: " + input.group_product_name;
        alertify.confirm('ยืนยันการลบข้อมูล', name, function() {
            $http.post('../api/UserDelete.php', input).then(function(res) {
                if (res.data.message == 'success') {
                    alertify.success('ลบข้อมูลเรียบร้อย');
                    $scope.loaduser();
                } else if (res.data.message == 'Found') {
                    alertify.error('มีสินค้าในประเภทสินค้านี้อยู่ ไม่สามารถลบประเภทสินค้านี้ได้');
                }
            });
        }, function() {
            alertify.error('ยกเลิก')
        });
    };

    $scope.serach_product = function(input){
        $http.post('../api/search_product.php', input).then(function(res) {
            $scope.product = res.data.find_product;
        });
    }

    $scope.print_barcode = function(input){
        var id = input.id;
        var url = "../api/barcode.php?id=" + id;
        window.open(url,"_blank");

    }
});