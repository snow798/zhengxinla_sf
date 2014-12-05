'use strict';

angular.module('zhengxinlaSfApp')
    .directive('pageList',function($http,tools){     //该指令不可重用
        return {
            restrict: 'AE',
            replace: true,
            scope: false,     // 直接使用控制器 cscope
            templateUrl: '../app/views/member/loanlist_tpl.html',
            link: function(scope,elem,attr){
                var tool= tools;
                scope.page_control_click= function(e){
                    if(typeof e == 'undefined'){
                        scope.pageConfig.p= this.ltem;
                    }else{
                        scope.pageConfig.p= e;
                    }
                    console.log(this);
                    scope.getData();
                    event.preventDefault();
                };
                scope.getData();

                scope.editInfo= function(elem){
                    console.log('dddddd',this,elem);
                    var id= this.ltem.id;
                    this.default_hide= true;
                    this.edit_show= true;
                    tool.datetimepicker();
                    event.preventDefault();
                };
                scope.edit_save= function(elem){
                    var obj_tr= $(elem.target).parents('tr');
                    var n_data= {};
                    var o_data= {
                        id: this.ltem.id,
                        addtime: this.ltem.addtime,
                        amount: this.ltem.amount,
                        deadline: this.ltem.deadline,
                        deadline_type: this.ltem.deadline_type,
                        status: this.ltem.status
                    };
                        n_data= {
                            id: this.ltem.id,
                            addtime: obj_tr.find('#dtp_input2').val(),
                            amount: obj_tr.find('#n_amount').val(),
                            deadline: obj_tr.find('#n_deadline').val(),
                            deadline_type: obj_tr.find('#n_deadline_type').val(),
                            status: obj_tr.find('#n_status').val()
                        };
                    var isUpdata= tool.cmp(o_data,n_data);   // 获取数据是否相同
                    if(!isUpdata){
                        $http.post('/loan/save',n_data).success(function(data, status, headers, config){
                            if(data.ret == '1'){
                                window.alert(data.msg);
                                scope.getData();
                            }else{
                                window.alert('操作失败！');
                            }
                        })
                    }else{
                        this.default_hide= false;
                        this.edit_show= false;
                    }
                };
                scope.yuqi_control= function(){
                    console.log(this);
                    var msg={
                        ltemId: this.ltem.id
                    };
                    scope.$emit('loanLtemid',msg);

                    event.preventDefault();

                };
            }
        }
    })

    .directive('modalLoan',function($http, tools){
        return{
            restrict: 'AE',
            replace: true,
            scope: true,
            templateUrl: '../app/views/member/modal_loan_tpl.html',
            link: function(scope,elem,attr){
                var tool= tools;
                scope.datetimepicker= tool.datetimepicker;
                scope.vm= {};
                scope.ltemId= '';
                scope.getYuqilist= function(){
                    $http.post('/loanoverdue/record',{lid: scope.ltemId})
                        .success(function(data,status,headers,config){
                            console.log(data);
                            if(data.ret == 1){
                                scope.vm= data.data;
                            }
                        })
                };
                scope.$on("loanLtemid_down",
                    function (event, msg) {
                        scope.ltemId= msg.ltemId;
                        $('#myModal').modal();
                        scope.getYuqilist();
                    });

                /*scope.$watch('vm',function(newValue, oldValue){
                       // console.log('66666666',newValue, oldValue);
                });*/
                scope.overdue_save= function(elem){
                    var obj_tr= $(elem.target).closest('tr');
                    var addYuqi={
                        lid: scope.ltemId,
                        money: obj_tr.find('.get_amount').val(),
                        begin_time: obj_tr.find('.get_star_time').val(),
                        end_time: obj_tr.find('.get_end_time').val()
                    };
                    var emptyYuqi_val= function(){
                        obj_tr.find('.get_amount, .get_star_time, .get_end_time').val('');
                    };
                    if( addYuqi.money !== '' && addYuqi.begin_time !== ''){
                        $http.post('/loanoverdue/add',addYuqi)
                            .success(function(data,status,headers,config){
                                if(status == 200 && data.ret == 1){
                                    window.alert(data.msg);
                                    scope.getYuqilist();
                                    emptyYuqi_val();
                                }
                            });
                    }
                    event.preventDefault();
                };
                scope.overdue_process= function(ltemId){
                    $http.post('/loanoverdue/process',{id: ltemId})
                        .success(function(data,status,headers,config){
                            if(status == 200 && data.ret == 1){
                                scope.getYuqilist();
                            }
                        });
                    event.preventDefault();
                };
                console.log('990',this,scope,elem,attr)

            }
        }
    })










