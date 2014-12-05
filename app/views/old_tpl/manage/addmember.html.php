<?php echo $this->partial('manage/header'); ?>

<div class="panel panel-default hao_tab">
	  <!-- Default panel contents -->
	  <div class="panel-heading">添加会员</div>
	  <!-- Table -->
	  <div class="panel-body">	  
		  <form class="form-horizontal">
		  		<div class="form-group">
		  			<label class="control-label col-xs-4 col-md-4 text_indext25">登录账号</label>
		  			<div class="col-xs-6 col-md-4">
		  				<input class="form-control" name="username" type="text" placeholder="请输入登录账号">
		  			</div>
		  		</div>
		  		<div class="form-group">
		  			<label class="control-label col-xs-4 col-md-4 text_indext25">登录密码</label>
		  			<div class="col-xs-6 col-md-4">
		  				<input class="form-control" name="password" type="password" placeholder="请输入登录密码">
		  			</div>
		  		</div>
		  		<div class="form-group">
		  			<label class="control-label col-xs-4 col-md-4 text_indext25">确认密码</label>
		  			<div class="col-xs-6 col-md-4">
		  				<input class="form-control" name="repassword" type="password" placeholder="请输入确认密码">
		  			</div>
		  		</div>
		  		<div class="form-group">
		  			<label class="control-label col-xs-4 col-md-4 text_indext25">公司名称</label>
		  			<div class="col-xs-6 col-md-4">
		  				<input class="form-control" name="companyname" type="text" placeholder="请输入公司名称">
		  			</div>
		  		</div>
		  		<div class="form-group">
		  			<label class="control-label col-xs-4 col-md-4 text_indext25"></label>
		  			<div class="col-xs-6 col-md-4">
		  				<button class="btn btn-primary" id="member-add-submit">&nbsp;&nbsp;提&nbsp;&nbsp;交&nbsp;&nbsp;</button>
		  			</div>
		  		</div>
		  </form>
	  </div>
</div>

<script type="text/javascript">
$(function(){
	var username = $('[name=username]'),
		password = $('[name=password]'),
		repassword = $('[name=repassword]'),
		company = $('[name=companyname]');
	$('#member-add-submit').click(function(){

        if(!/^[^\s]+$/.test(username.val())){
            alert("请输入登录账号！");
            return false;
        }else if(!/^[^\s]+$/.test(password.val())){
            alert('请输入登录密码');
            return false;
        }else if(!/^[^\s]+$/.test(repassword.val())){
            alert('两次输入的密码不一样，请重新输入！');
            return false;
        }else if(company.val() == ''){
            alert('请输入公司名称！');
            return false;
        };

		$.ajax({
			url : '/manage/addmember',
			type : 'post',
			dataType : 'json',
			data : {
				username : username.val(),
				password : password.val(),
				repassword : repassword.val(),
				company : company.val()
			},
			success : function(res){
				if(res['ret'] > 0){
					alert(res['msg']);
					location.href = "/manage";
				}else{
					alert(res['msg']);
				}
			}
		})
		return false;
	})
})
</script>

<?php echo $this->partial('manage/footer'); ?>