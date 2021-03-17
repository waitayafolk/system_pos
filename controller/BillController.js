app.controller('BillController', function($scope, $http) {
    $scope.startPage = function() {
        $scope.loadbill();
    }; 

    $scope.detail = function(input){
        $('#modalProduct').modal('show');
         $http.post('../api/bill_sale_detail.php', input.bill_id).then(res => {
            $scope.detail_bill = res.data.detail_bill;
            console.log($scope.detail_bill)
        });
    }

    $scope.loadbill = function() {
        $http.post('../api/bill_sale.php').then(res => {
            $scope.bill_sale = res.data.bill;
        });
    };

   
})