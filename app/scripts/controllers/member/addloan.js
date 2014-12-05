'use strict';

angular.module('zhengxinlaSfApp')
    .controller('memberAddloanCtrl', function ($scope, $location, $http, tools) {
        var tool= tools;
        $scope.vm={};
        $scope.isopen= false;
        $scope.submintStatus= false;
        $scope.n_deadline_type= 'm';
        tools.datetimepicker();

        $scope.guarantee_i= 0;
        $scope.guaranteeCount= [0];
        $scope.addGuarantee= function(){
            $scope.guarantee_i= $scope.guarantee_i+1;
            $scope.guaranteeCount.push($scope.guarantee_i);
        };
        $scope.deleatLtem= function(ltem){
            $scope.guaranteeCount.splice(ltem,1);
        };
        $scope.submint= function(){
            console.log('sdewrwr',$scope);
            $scope.submintStatus= true;
            if($scope.addloanFrom.$valid === true){
                $http.post('/loan/add',$scope.vm)
                    .success(function(data, status, header, confing){
                        if (data['ret'] > 0) {
                            alert(data['msg']);
                            // location.reload();
                        } else {
                            alert(data['msg']);
                        }
                    });
            }
        };
    });
