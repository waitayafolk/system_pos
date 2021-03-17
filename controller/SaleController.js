app.controller('SaleController', function($scope, $http) {
    $scope.product = [];
    $scope.productInstock = [];
    $scope.input = {};
    $scope.product_detail=[]
    $scope.importdata = {};
    $scope.importdata.data = "";
    $scope.sale_temp = [];
    $scope.total_sum_sale = 0;
    $scope.get_money = 0;
    $scope.bill_id = {};
    $scope.startPage = function() {
        $scope.load_data();
        $scope.input.name = "";
    };

    $scope.serach_product = function(input){
        $http.post('../api/search_product.php', input).then(function(res) {
            $scope.product = res.data.find_product;
        });
    }

    $scope.chooseProduct = function(item){
        $http.post('../api/save_sale_temp.php', item).then(function(res) {
            $('#modalProduct').modal('hide');
            $scope.load_data();
        });
        
    }

    $scope.load_data = function(){
        $http.post('../api/load_sale_temp.php').then(function(res) {
            $scope.sale_temp = res.data.sale_temp;
            $scope.sum_total();
        });
    }
    $scope.sum_total = function(){
        $scope.total_sum_sale = 0
        for(var i=0; i < $scope.sale_temp.length; i++){
            $scope.total_sum_sale += Number($scope.sale_temp[i].qty) * Number($scope.sale_temp[i].price)
        }  
    }
    $scope.update_qty = function(item){
       console.log(item)
       $http.post('../api/update_qty.php', item).then(res => {
        if (res.data.message == 'success') {
            alertify.success('บันทึกข้อมูลเรียบร้อย');
            $scope.load_data();
        }else{
            alertify.error('ไม่สามารถบันทึกได้');
        }
    });
    }
    
    
    $scope.delete = function(input){
        var name = "ลบสินค้า: " + input.product_name;
        alertify.confirm('ยืนยันการลบข้อมูล', name, function() {
            $http.post('../api/delete_sale_temp.php', input.id).then(function(res) {
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

    $scope.end_sale = function() {
        var psrams = {
            total : $scope.total_sum_sale,
            get_money : $scope.get_money,
            temp : $scope.sale_temp
        }
        if($scope.get_money < $scope.total_sum_sale  ){
            alertify.error('ไม่สามารถจบการขายได้');
        }else{
            $http.post('../api/end_sale.php', psrams).then(res => {
                
                if (res.data.message == 'success') {
                    alertify.success('บันทึกข้อมูลเรียบร้อย');
                    var url = "../api/bill_slip.php?id=" + res.data.id;
                    window.open(url,"_blank");
                    $scope.load_data();
            $('#modalEndsale').modal('show');
                }else{
                    alertify.error('ไม่สามารถบันทึกได้');
                }
            });
        }
    };
});