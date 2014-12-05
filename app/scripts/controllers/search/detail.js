/**
 * Created by yqh798 on 14-12-4.
 */
'use strict';

angular.module('zhengxinlaSfApp')
    .controller('detailCtrl', function ($scope, $location, $http, tools) {
        $scope.vm= {};
        $scope.companyInfo= {};
        $scope.overdueInfo= {};
        $scope.key= $location.$$search.key;
        $http.post('/search/query',{key: $scope.key})
            .success(function(data,status,header,confing){
            console.log(data,status,header,confing);
                if(data['ret'] > 0){
                    $scope.vm= data.data;
                }
        });

        $scope.showCompanyInfo= function(id){
            $http.get('/company/info?id='+id).success(function(data, status, headers, confing){
                if(data['ret'] > 0){
                    $scope.companyInfo= data.data;
                }
            });
            $('#myModal').modal('toggle');
        };

        $scope.showOverdueInfo= function(id){
            $http.post('/loanoverdue/record',{lid: id})
                .success(function(data, status, headers, confing){
                    if(data['ret'] > 0){
                        $scope.overdueInfo= data.data.list;
                    }
            });
            $('#myModal_yuqi').modal('toggle');
        };
    });