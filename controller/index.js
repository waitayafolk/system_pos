var app = angular.module("myApp", []);
app.controller('home', function($scope,$http) {
  $scope.startPage = function() {
   
};
  $scope.logout = function(){
    alertify.confirm('ยืนยันการออกจากระบบ ??','คุณต้องการออกจากระบบหรือไม่ !?', function() {
      window.location.replace('/system_pos/index.php');
    }, function() {
      alertify.error('ยกเลิก')
  });
  };

});