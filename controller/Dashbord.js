app.controller("DashbordController",function ($scope, $http) {
    $scope.account = {};
    $scope.startPage = function() {
    $scope.loaddata();
    };

    $scope.loaddata = function() {
        $http.post('../api/sale_sum_per_mount.php').then(res => {
            $scope.permount = res.data.sum_total;
            console.log($scope.permount)
            $scope.sum_per_price = 0;
            for(let i = 0 ; i <$scope.permount.length ; i++){
                $scope.sum_per_price += Number($scope.permount[i].sum_total)
                
            }
            
                var ctx = document.getElementById("myAreaChart");
                var myLineChart = new Chart(ctx, {
                  type: 'line',
                  data: {
                    labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
                    datasets: [{
                      label: "Earnings",
                      lineTension: 0.3,
                      backgroundColor: "rgba(78, 115, 223, 0.05)",
                      borderColor: "rgba(78, 115, 223, 1)",
                      pointRadius: 3,
                      pointBackgroundColor: "rgba(78, 115, 223, 1)",
                      pointBorderColor: "rgba(78, 115, 223, 1)",
                      pointHoverRadius: 3,
                      pointHoverBackgroundColor: "rgba(78, 115, 223, 1)",
                      pointHoverBorderColor: "rgba(78, 115, 223, 1)",
                      pointHitRadius: 10,
                      pointBorderWidth: 2,
                      data: [$scope.permount[0].sum_total ,
                      $scope.permount[1].sum_total ,
                      $scope.permount[2].sum_total ,
                      $scope.permount[3].sum_total ,
                      $scope.permount[4].sum_total ,
                      $scope.permount[5].sum_total ,
                      $scope.permount[6].sum_total ,
                      $scope.permount[7].sum_total ,
                      $scope.permount[8].sum_total ,
                      $scope.permount[9].sum_total ,
                      $scope.permount[10].sum_total ,
                      $scope.permount[11].sum_total ,],
                    }],
                  },
                  options: {
                    maintainAspectRatio: false,
                    layout: {
                      padding: {
                        left: 10,
                        right: 25,
                        top: 25,
                        bottom: 0
                      }
                    },
                    scales: {
                      xAxes: [{
                        time: {
                          unit: 'date'
                        },
                        gridLines: {
                          display: false,
                          drawBorder: false
                        },
                        ticks: {
                          maxTicksLimit: 7
                        }
                      }],
                      yAxes: [{
                        ticks: {
                          maxTicksLimit: 5,
                          padding: 10,
                          callback: function(value, index, values) {
                            return '$' + number_format(value);
                          }
                        },
                        gridLines: {
                          color: "rgb(234, 236, 244)",
                          zeroLineColor: "rgb(234, 236, 244)",
                          drawBorder: false,
                          borderDash: [2],
                          zeroLineBorderDash: [2]
                        }
                      }],
                    },
                    legend: {
                      display: false
                    },
                    tooltips: {
                      backgroundColor: "rgb(255,255,255)",
                      bodyFontColor: "#858796",
                      titleMarginBottom: 10,
                      titleFontColor: '#6e707e',
                      titleFontSize: 14,
                      borderColor: '#dddfeb',
                      borderWidth: 1,
                      xPadding: 15,
                      yPadding: 15,
                      displayColors: false,
                      intersect: false,
                      mode: 'index',
                      caretPadding: 10,
                      callbacks: {
                        label: function(tooltipItem, chart) {
                          var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
                          return datasetLabel + ': $' + number_format(tooltipItem.yLabel);
                        }
                      }
                    }
                  }
                });
        });
    };


    
  
})