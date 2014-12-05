<?php echo $this->partial('public/header'); ?>

<div class="h-50 hidden-print"></div>
<?php echo $this->partial('module/table'); ?>
<?php echo $this->partial('public/globalscript'); ?>

<div class="row hidden-print hidden-xs hidden-sm">
    <a class="btn btn-primary pull-right" onclick="javascript:window.print();"><i class="fa fa-print"></i>立即打印</a>
</div>
<div class="h-50 hidden-print"></div>

<script type="text/javascript">
// 填充Table 信息
var json = {
        user : {
            no : "2014052500001690765734",
            name : "董放平",
            idType : "身份证",
            idNo : "420000000000000000",
            user : "中国建设银行",
            res : "借贷查询"
        },
        sum : {
            legalAgencyNum : "2",
            agencyNum : "3",
            amount : "3",
            total : "520,000",
            balance : "450,000",
            ave : "7,400"
        },
        details : [
            {
                info:{
                    beginDate : "2014年06月18日",
                    user : "HH",
                    no : "X",
                    money : "100,000",
                    typeText : "信用/免担保",
                    endDate : "2014年06月28日"
                },
                principalBalance : "0",
                remainingRepaymentInstallments : "1",
                monthShouldRepayment : "2",
                repaymentDate : "2014-06-18",
                realRepayment : "3",
                lastRepaymentDate : "2014-06-18",
                currentInstallmentsOverdue : "4",
                currentAmountOverdue : "5",
                overdue31_60 : "6",
                overdue61_90 : "7",
                overdue91_180 : "8",
                overdueMoreThan180 : "9"
            },{
                info:{
                    beginDate : "2014年06月18日",
                    user : "HH",
                    no : "X",
                    money : "100,000",
                    typeText : "信用/免担保",
                    endDate : "2014年06月28日"
                },
                principalBalance : "0",
                remainingRepaymentInstallments : "1",
                monthShouldRepayment : "2",
                repaymentDate : "2014-06-18",
                realRepayment : "3",
                lastRepaymentDate : "2014-06-18",
                currentInstallmentsOverdue : "4",
                currentAmountOverdue : "5",
                overdue31_60 : "6",
                overdue61_90 : "7",
                overdue91_180 : "8",
                overdueMoreThan180 : "9"
            },{
                info:{
                    beginDate : "2014年06月18日",
                    user : "HH",
                    no : "X",
                    money : "100,000",
                    typeText : "信用/免担保",
                    endDate : "2014年06月28日"
                },
                principalBalance : "0",
                remainingRepaymentInstallments : "1",
                monthShouldRepayment : "2",
                repaymentDate : "2014-06-18",
                realRepayment : "3",
                lastRepaymentDate : "2014-06-18",
                currentInstallmentsOverdue : "4",
                currentAmountOverdue : "5",
                overdue31_60 : "6",
                overdue61_90 : "7",
                overdue91_180 : "8",
                overdueMoreThan180 : "9"
            }
        ],
        enquiryDetails : [{
            no : "1",
            enquiryDate : "2014-06-18",
            user : "HH",
            res : "贷款审批"
        },{
            no : "2",
            enquiryDate : "2014-06-18",
            user : "HH",
            res : "贷款审批"
        },{
            no : "3",
            enquiryDate : "2014-06-18",
            user : "HH",
            res : "贷款审批"
        },{
            no : "4",
            enquiryDate : "2014-06-18",
            user : "HH",
            res : "贷款审批"
        },{
            no : "5",
            enquiryDate : "2014-06-18",
            user : "HH",
            res : "贷款审批"
        }]
    },
    thispage = "info-detail",
    dom = $("#info-detail");


    var vm = avalon.define(thispage, function(vm) {
        vm.user = json.user;
        vm.sum = json.sum;
        vm.details = json.details;
        vm.enquiryDetails = json.enquiryDetails;
    });

</script>
<?php echo $this->partial('public/footer'); ?>