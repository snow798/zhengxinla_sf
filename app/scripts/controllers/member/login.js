'use strict';

angular.module('zhengxinlaSfApp')
    .controller('memberLoginCtrl', function ($scope, $location, $http, tools) {
        var tool = tools
        $scope.submintStatus= false;
        $scope.user = {
            username: null,
            password: null,
            captcha: null
        };
        tool.reloadCaptcha();
        $scope.upCaptcha= function(){
            tool.reloadCaptcha();
        };
        $scope.subminted= function(){
            $scope.submintStatus= true;
        };
        $scope.submint= function (from) {
            console.log('ok');
            console.log(from);
            if(from.$valid === true){
                console.log('true');
                 $http.post('/member/login',$scope.user)
                 .success(function(data, status, headers, config){
                 console.log(data, status, headers, config);
                    if(status === 200){
                        console.log('ok');
                        console.log($location.path());
                        $location.path('/member/index');
                    }
                 });
            }
        };
    });
