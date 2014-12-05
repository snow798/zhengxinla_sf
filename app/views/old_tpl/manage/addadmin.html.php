<?php echo $this->partial('manage/header'); ?>

<div class="panel panel-default hao_tab">
	  <!-- Default panel contents -->
	  <div class="panel-heading">添加管理员</div>
	  <!-- Table -->
	  <div class="panel-body">	  
		  <form class="form-horizontal">
		  		<div class="form-group">
		  			<label class="control-label col-sm-3">登录账号</label>
		  			<div class="col-xs-4">
		  				<input class="form-control" name="username" type="text" placeholder="请输入登录账号">
		  			</div>
		  		</div>
		  		<div class="form-group">
		  			<label class="control-label col-sm-3">登录密码</label>
		  			<div class="col-xs-4">
		  				<input class="form-control" name="password" type="password" placeholder="请输入登录密码">
		  			</div>
		  		</div>
		  		<div class="form-group">
		  			<label class="control-label col-sm-3">确认密码</label>
		  			<div class="col-xs-4">
		  				<input class="form-control" name="repassword" type="password" placeholder="请输入确认密码">
		  			</div>
		  		</div>
		  		<div class="form-group">
		  			<label class="control-label col-sm-3"></label>
		  			<div class="col-xs-4">
		  				<button class="btn btn-primary" id="admin-add-submit">&nbsp;&nbsp;提&nbsp;&nbsp;交&nbsp;&nbsp;</button>
		  			</div>
		  		</div>
		  </form>
	  </div>
</div>

<script type="text/javascript">
$(function(){
	var username = $('[name=username]'),
		password = $('[name=password]'),
		repassword = $('[name=repassword]');
	$('#admin-add-submit').click(function(){		
		$.ajax({
			url : '/manage/addadmin',
			type : 'post',
			dataType : 'json',
			data : {
				username : username.val(),
				password : password.val(),
				repassword : repassword.val()
			},
			success : function(res){
				if(res['ret'] > 0){
					alert(res['msg']);
					//location.href = "/manage";
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