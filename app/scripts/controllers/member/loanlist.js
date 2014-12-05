'use strict';

angular.module('zhengxinlaSfApp')
    .controller('memberLoanlistCtrl', function ($scope, $location, $http, tools) {
        $scope.pageConfig= {
            p:1,
            limit:5
        };
        $scope.list= {};
        $scope.page= {};
        $scope.seach= '';
        $scope.seach_post= function(){
            console.log('/loan/list',$scope.seach);
            if($scope.seach !== ''){
                $scope.pageConfig.key= $scope.seach;
            }else{
                delete $scope.pageConfig.key
            }
            $scope.getData()
        };
        $scope.getData= function(){
            $http.post('/loan/list',$scope.pageConfig)
                .success(function(data, status, headers, config){
                    if(status === 200){
                        var loan= data.data.loan;
                        $scope.list= loan.list;
                        $scope.page= loan.page;
                    }
                });
        };
        $scope.$on("loanLtemid",
             function (event, msg) {
                     $scope.$broadcast("loanLtemid_down", msg);
                });
    });