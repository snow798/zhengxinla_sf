/**
 * Created by yqh798 on 14-11-17.
 */
'use strict';

angular.module('zhengxinlaSfApp')
    .controller('memberPasswordCtrl', function ($scope, $location, $http) {
        $scope.submintStatus = false;
        $scope.renewpassword_true = false;
        $scope.password = {
            old: null,
            new: null,
            renow: null
        };
        $scope.subminted = function () {
            $scope.submintStatus = true;
        };
        $scope.$watch('password.renow', function (newVal, oldVal) {
            if ($scope.password.new == newVal) {
                $scope.renewpassword_true = false;
            } else {
                $scope.renewpassword_true = true;
            }
        });
        $scope.submint = function () {
            if ($scope.rePassword.$valid === true) {
                var postData = {
                    password: $scope.password.old,
                    newpassword: $scope.password.new,
                    newpassword_confirm: $scope.password.renow
                }
                $http.post('/member/password', postData)
                    .success(function (data, status, headers, config) {
                        if (status === 200) {
                            if (data.ret === 0) {
                                window.alert(data.msg);
                            } else {
                                window.alert('你的密码修改成功！请使用新密码登录。');
                                $location.path('/member/index');
                            }
                        }
                    });
            }
        };
    });