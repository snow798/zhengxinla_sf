angular.module('zhengxinlaSfApp')
    .service('tools', [ '$rootScope', function ($rootScope) {
        var tools = {
            reloadCaptcha: function () {
                $('.captcha').attr('src', "/public/captcha?w=80&h=32&v=" + Math.random());
            },
            cmp: function (x, y) {     // cmp(A, B) 判断对象是否偶相等
                if (x === y) {
                    return true;
                }
                if (!( x instanceof Object ) || !( y instanceof Object )) {
                    return false;
                }
                if (x.constructor !== y.constructor) {
                    return false;
                }
                for (var p in x) {
                    if (x.hasOwnProperty(p)) {
                        if (!y.hasOwnProperty(p)) {
                            return false;
                        }
                        if (x[ p ] === y[ p ]) {
                            continue;
                        }
                        if (typeof( x[ p ] ) !== "object") {
                            return false;
                        }
                        if (!Object.equals(x[ p ], y[ p ])) {
                            return false;
                        }
                    }
                }
                for (p in y) {
                    if (y.hasOwnProperty(p) && !x.hasOwnProperty(p)) {
                        return false;
                    }
                }
                return true;
            },
            datetimepicker: function(){
                $('.form_date').datetimepicker({                 //日期输入控件
                    format: 'yyyy-mm-dd',
                    language: 'zh-CN',
                    weekStart: 1,
                    todayBtn: 1,
                    autoclose: 1,
                    pickerPosition: "bottom-left",
                    todayHighlight: 1,
                    startView: 2,
                    minView: 2,
                    forceParse: 0
                });
            }
        };
        return tools;
    }]);