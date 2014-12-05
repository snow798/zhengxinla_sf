<?php echo $this->partial('manage/header'); ?>

  <div class="row hao_tab2">
    <div class="panel panel-default"> 
      <!-- Default panel contents -->
      <div class="panel-heading">管理员登录</div>
      
      <div class="panel-body">
	      <!-- Table -->
	      <form class="form-horizontal">
	      	
	      	<div class="form-group">
	      		<label class="control-label col-xs-3 col-md-4 text_indext25">账号</label>
	      		<div class="col-xs-8 col-md-4">
	      			<input type="text" class="form-control" name="username" placeholder="请输入登录账号">
	      		</div>
	      	</div>
	      	<div class="form-group">
	      		<label class="control-label col-xs-3 col-md-4 text_indext25">密码</label>
	      		<div class="col-xs-8 col-md-4">
	      			<input type="password" class="form-control" name="password" placeholder="请输入登录密码">
	      		</div>
	      	</div>	      	
	      	<div class="form-group">
	      		<label class="control-label col-xs-3 col-md-4 text_indext25">验证码</label>
	      		<div class="col-xs-4 col-md-2">
      				<input type="text" class="form-control" name="captcha" placeholder="请输入验证码">      				
	      		</div>
	      		<div class="col-xs-2"><img src="" class="captcha">		</div>
	      	</div>
	      	<div class="form-group">
	      		<label class="ontrol-label col-xs-3 col-md-4"></label>
	      		<div class="col-xs-4">
	      			<button class="btn btn-primary" id="login-submit">&nbsp;&nbsp;登&nbsp;&nbsp;录&nbsp;&nbsp;</button>
	      		</div>
	      	</div>
	      </form>
	   </div>
    </div>
  </div>
  
<script type="text/javascript">

noTemplateJs = true;

$(function(){


	var username = $('[name=username]'),
		password = $('[name=password]'),
		captcha = $('[name=captcha]');

	$('#login-submit').click(function(){		

		if(!/^[^\s]+$/.test(username.val())){
			alert("请输入登录账号");
			return false;
		}else if(!/^[^\s]+$/.test(password.val())){
			alert('请输入登录密码');
			return false;
		}else if(!/^[^\s]+$/.test(captcha.val())){
			alert('请输入验证码');
			return false;
		}else if(!/^\w{4}$/.test(captcha.val())){
			alert('验证码错误');
			return false;
		}

		$.ajax({
			url : '/manage/login',
			type : 'post',
			dataType : 'json',
			data : {
				username : username.val(),
				password : password.val(),
				captcha : captcha.val()
			},
			success : function(res){
				if(res['ret'] > 0){
					location.href = "/manage/index";
				}else{
					resCaptcha(res['msg']);
					alert(res['msg']);
				}
			}
		})
		return false;
	});
    reloadCaptcha();
})	
</script>

<?php echo $this->partial('manage/footer'); ?>
