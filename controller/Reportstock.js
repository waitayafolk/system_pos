app.controller('Reportstock', function($scope, $http) {
    $scope.stock_product = [];
    $scope.startPage = function() {
        
    };
    $scope.report_stock = function() {
        $http.post('../api/report_stock.php').then(res => {
            $scope.stock_product = res.data.stock_product;
            console.log($scope.stock_product)
        });
    };
});