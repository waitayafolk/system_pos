app.controller('ImportstockController', function($scope, $http) {
    $scope.product = [];
    $scope.productInstock = [];
    $scope.input = {};
    $scope.product_detail=[]
    $scope.importdata = {};
    $scope.importdata.data = "";
    $scope.stock_temp = [];
    $scope.bill = {};
    $scope.startPage = function() {
        $scope.load_data();
        $scope.input.name = "";
    };

    $scope.serach_product = function(input){
        $http.post('../api/search_product.php', input).then(function(res) {
            $scope.product = res.data.find_product;
            // console.log($scope.product)
        });
    }

    $scope.chooseProduct = function(item){
        // console.log(item)
        $http.post('../api/save_stock_temp.php', item).then(function(res) {
            $('#modalProduct').modal('hide');
            $scope.load_data();
        });
        
    }

    $scope.load_data = function(){
        $http.post('../api/load_stovk_temp.php').then(function(res) {
            $scope.stock_temp = res.data.stock_temp;
            // console.log($scope.stock_temp)
        });
    }
    
    $scope.delete = function(input){
        var name = "ประเภทสินค้า: " + input.name;
        alertify.confirm('ยืนยันการลบข้อมูล', name, function() {
            $http.post('../api/delete_stock_temp.php', input.id).then(function(res) {
                if (res.data.message == 'success') {
                    alertify.success('ลบข้อมูลเรียบร้อย');
                    $scope.load_data();
                } else if (res.data.message == 'Found') {
                    alertify.error('ไม่สามารถลบได้');
                }
            });
        }, function() {
            alertify.error('ยกเลิก')
        });
    }

    $scope.save_to_stock = function() {
        psrams = {
            bill : $scope.bill,
            temp : $scope.stock_temp
        }
        console.log(psrams)
        $http.post('../api/Save_stock.php', psrams).then(res => {
            if (res.data.message == 'success') {
                alertify.success('บันทึกข้อมูลเรียบร้อย');
                $scope.load_data();
                $scope.bill = [];
            }else{
                alertify.error('ไม่สามารถบันทึกได้');
            }
        });
    };
});