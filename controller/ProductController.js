app.controller('ProductController', function($scope, $http) {
    var formdata;
    $scope.groups = [];
    $scope.input = {};
    $scope.importdata = {};
    $scope.importdata.data = "";

    $scope.startPage = function() {
        $scope.loadproduct();
        $scope.loadGroupProduct();
        $scope.input.name = "";
    };

    $scope.getTheFilesproduct = function($files) {
        // console.log($files)
        formdata = new FormData();
        angular.forEach($files, function(value, key) {
            formdata.append(key, value);
        });
    };
    
    $scope.uploadFiles = function(input) {
        var barcode =  input.product_code;
    
        console.log(formdata)

      sessionStorage.setItem("product", barcode);
      $http.post('../api/GropPromotionSavepicDefault.php?barcode=' , input.product_code).then(res => {
          if ($scope.member_pic == null) {
              var request = {
                  method: 'POST',
                  url: '../api/savepictur.php?barcode=' + barcode,
                  data: formdata,
                  headers: {
                      'Content-Type': undefined
                  }
              };
              $http(request).then(function successCallback(response) {
                //   console.log(response.data);
                  if (response.data.size > 1000000) {
                      swal({
                          type: 'error',
                          title: 'รูปภาพของคุณขนาดใหญ่เกินไป',
                          text: 'ใช้รูปขนาดไม่เกิน 1mb'
                      });
                      response.data.member_pic = null;
                  }
                  if (response.data.member_pic != null) {
                      alertify.success('อัพโหลดรูปภาพเสร็จเรียบร้อย');
                      $scope.member_pic = response.data.member_pic;  
                  } 
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