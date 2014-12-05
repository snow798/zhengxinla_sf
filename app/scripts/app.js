'use strict';
require('../../bower_components/jquery/dist/jquery-1.9.1.js');
require('../../bower_components/angular/angular.js');
require('../../bower_components/angular-animate/angular-animate.min.js');
//require('../../bower_components/bootstrap/dist/js/bootstrap.js');
require('../../bower_components/json3/lib/json3.js');
require('../../bower_components/angular-resource/angular-resource.js');
require('../../bower_components/angular-cookies/angular-cookies.js');
require('../../bower_components/angular-sanitize/angular-sanitize.js');
require('../../bower_components/angular-animate/angular-animate.js');
require('../../bower_components/angular-touch/angular-touch.js');
require('../../bower_components/angular-route/angular-route.js');

/**
 * @ngdoc overview
 * @name zhengxinlaSfApp
 * @description
 * # zhengxinlaSfApp
 *
 * Main module of the application.
 */

angular.module('zhengxinlaSfApp', [
    'ngAnimate',
    'ngCookies',
    'ngResource',
    'ngRoute',
    'ngSanitize',
    'ngTouch',
    'ngAnimate'
],function ($httpProvider) {
    // Use x-www-form-urlencoded Content-Type
    $httpProvider.defaults.headers.post['Content-Type'] = 'application/x-www-form-urlencoded;charset=utf-8';
    $httpProvider.defaults.headers.post['Accept'] = 'application/json, text/javascript, */*; q=0.01';
    $httpProvider.defaults.headers.post['X-Requested-With'] = 'XMLHttpRequest';

    /**
     * 重写param 方法
     * @param {Object} obj
     * @return {String}
     */
    var param = function (obj) {
        var query = '', name, value, fullSubName, subName, subValue, innerObj, i;

        for (name in obj) {
            value = obj[name];

            if (value instanceof Array) {
                for (i = 0; i < value.length; ++i) {
                    subValue = value[i];
                    fullSubName = name + '[' + i + ']';
                    innerObj = {};
                    innerObj[fullSubName] = subValue;
                    query += param(innerObj) + '&';
                }
            }
            else if (value instanceof Object) {
                for (subName in value) {
                    subValue = value[subName];
                    fullSubName = name + '[' + subName + ']';
                    innerObj = {};
                    innerObj[fullSubName] = subValue;
                    query += param(innerObj) + '&';
                }
            }
            else if (value !== undefined && value !== null)
                query += encodeURIComponent(name) + '=' + encodeURIComponent(value) + '&';
        }

        return query.length ? query.substr(0, query.length - 1) : query;
    };

    // Override $http service's default transformRequest
    $httpProvider.defaults.transformRequest = [function (data) {
        return angular.isObject(data) && String(data) !== '[object File]' ? param(data) : data;
    }];

    /*
    * 包装显示异步加载状态
    */
    var _send = XMLHttpRequest.prototype.send;
    XMLHttpRequest.prototype.send = function () {
        $('#loadingIco').show();
        _send.apply(this, arguments)
    };
    var _getAllResponseHeaders = XMLHttpRequest.prototype.getAllResponseHeaders;
    XMLHttpRequest.prototype.getAllResponseHeaders = function(){
        if(this.readyState >3){
            $('#loadingIco').hide();
        }
        _getAllResponseHeaders.apply(this, arguments)
    }

}).config(function ($routeProvider) {
        $routeProvider
            .when('/', {
                templateUrl: 'views/main.html',
                controller: 'MainCtrl'
            })
            .when('/about', {
                templateUrl: 'views/about.html',
                controller: 'AboutCtrl'
            })
            .when('/member/login', {
                templateUrl: 'views/member/login.html',
                controller: 'memberLoginCtrl'
            })
            .when('/member/index', {
                templateUrl: 'views/member/index.html',
                controller: 'memberLindexCtrl'
            })
            .when('/member/edit', {
                templateUrl: 'views/member/edit.html',
                controller: 'memberEditCtrl'
            })
            .when('/member/password', {
                templateUrl: 'views/member/password.html',
                controller: 'memberPasswordCtrl'
            })
            .when('/member/loanlist', {
                templateUrl: 'views/member/loanlist.html',
                controller: 'memberLoanlistCtrl'
            })
            .when('/member/addloan', {
                templateUrl: 'views/member/addloan.html',
                controller: 'memberAddloanCtrl'
            })
            .when('/search/index', {
                templateUrl: 'views/search/index.html',
                controller: 'searchInfoCtrl'
            })
            .when('/search/detail', {
                templateUrl: 'views/search/detail.html',
                controller: 'detailCtrl'
            })
            .otherwise({
                redirectTo: '/'
            });

    });
