app.controller('DashbordController', function($scope, $http) {
    $scope.groups = [];
    $scope.input = {};
    $scope.importdata = {};
    $scope.importdata.data = "";
    $scope.startPage = function() {
        // console.log(JSON.parse(localStorage.getItem("profile")))
        // if(JSON.parse(localStorage.getItem("profile")) == undefined){
        //     window.localStorage.removeItem('profile');
        //     window.location.replace('/system_pos');
        // }
        // $scope.loaduser();
    };

});