'use strict';

angular.module('zhengxinlaSfApp')
    // 中文姓名验证
    .directive('chinesename',function(){
        return {
            require : 'ngModel',
            link : function(scope, elm, attrs, ngModel) {
                var regex= /^[\u4E00-\u9FA5]+$/;
                ngModel.$parsers.unshift(function(viewValue) {
                    if (regex.test(viewValue)) {
                        ngModel.$setValidity('chinesename', true);
                        return viewValue;
                    } else {
                        ngModel.$setValidity('chinesename', false);
                        return undefined;
                    }
                });
            }
        };
    })
    //省份证
    .directive('chinaid',function(){
        return {
            require : 'ngModel',
            link : function(scope, elm, attrs, ngModel) {
                var regex= /^[1-9]\d{5}[1-9]\d{3}(((0[13578]|1[02])(0[1-9]|[12]\d|3[0-1]))|((0[469]|11)(0[1-9]|[12]\d|30))|(02(0[1-9]|[12]\d)))(\d{4}|\d{3}[xX])$/;
                ngModel.$parsers.unshift(function(viewValue) {
                    if (regex.test(viewValue)) {
                        ngModel.$setValidity('chinaid', true);
                        return viewValue;
                    } else {
                        ngModel.$setValidity('chinaid', false);
                        return undefined;
                    }
                });
            }
        };
    })
    //value相等
    .directive('equality',function(){
        return {
            require : 'ngModel',
            link : function(scope, elm, attrs, ngModel) {
                ngModel.$parsers.unshift(function(viewValue) {
                    if(viewValue !== ''){
                        var v= $(attrs.equality).val();
                        if(v !== ''){
                            if(viewValue == v){
                                ngModel.$setValidity('equality', true);
                                return viewValue;
                            }else{
                                ngModel.$setValidity('equality', false);
                                return undefined;
                            }
                        }
                    }
                });
            }
        };
    })


























