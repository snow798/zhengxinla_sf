'use strict';

angular.module('zhengxinlaSfApp')
    .controller('searchInfoCtrl', function ($scope, $location, $http, tools) {
        $scope.vm={};
        $scope.vm.searchtype= '1';
        $scope.infoStatus= false;
        $scope.submint= function(){
            $scope.infoStatus= true;
            if($scope.search.$valid === true && $scope.search.$dirty === true ){
                $http.post('/search/query',$scope.vm).success(function(data,status,header,confing){
                    $location.path('/search/detail').search({key: data.data.key});
                })
            }
        };
    });