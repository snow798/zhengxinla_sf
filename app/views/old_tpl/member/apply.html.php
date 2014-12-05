<?php echo $this->partial('public/header-out'); ?>

  <div class="row hao_tab">
    <div class="panel panel-default"> 
      <!-- Default panel contents -->
      <div class="panel-heading">申请加入</div>
      
      <div class="panel-body">
	      <!-- Table -->
	      <form class="form-horizontal basic_form">
	      	
	      	<div class="form-group">
	      		<label class="control-label col-xs-4">公司名称</label>
	      		<div class="col-xs-8 col-md-4">
	      			<input type="text" class="form-control" name="companyname" placeholder="请输入公司名称">	   
	      		</div>
	      	</div>
            <div class="form-group">
                  <label class="control-label col-xs-4">公司地址</label>
                  <div class="col-xs-8 col-md-4">
                      <input type="text" class="form-control" name="address" placeholder="请输入公司地址">
                  </div>
            </div>
	      	<div class="form-group">
	      		<label class="control-label col-xs-4">联系人</label>
	      		<div class="col-xs-8 col-md-4">
	      			<input type="text" class="form-control" name="contact1" placeholder="请输入联系人">
	      		</div>
	      	</div>
	      	<div class="form-group">
	      		<label class="control-label col-xs-4">联系电话</label>
	      		<div class="col-xs-8 col-md-4">
	      			<input type="text" class="form-control" name="contact1_phone" placeholder="请输入联系电话">
	      		</div>
	      	</div>
	      	<div class="form-group">
	      		<label class="control-label col-xs-4">邮箱</label>
	      		<div class="col-xs-8 col-md-4">
	      			<input type="text" class="form-control" name="email" placeholder="请输入邮箱">
	      		</div>
	      	</div>	      	
	      	<div class="form-group">
	      		<label class="control-label col-xs-4">验证码</label>
	      		<div class="col-xs-8 col-md-4">
      				<input type="text" class="form-control" name="captcha" placeholder="请输入验证码">		
	      		</div>
	      		<div class="col-xs-2"><img src="" class="captcha"></div>
	      	</div>	      	
	      	<div class="form-group">
	      		<label class="control-label col-xs-4"></label>
	      		<div class="col-xs-4">
	      			<button class="btn btn-primary btn-lg" id="apply-submit">提交申请</button>
                    <span class="text-warning text-danger" id="tishi"></span>
	      		</div>
	      	</div>
	      </form>	      	      
	   </div>
    </div>
  </div>
  
<script type="text/javascript">
$(function(){
	var company = $('[name=companyname]'),
        address = $('[name=address]'),
		contact1 = $('[name=contact1]'),
		contact1_phone = $('[name=contact1_phone]'),
		email = $('[name=email]'),
		captcha = $('[name=captcha]');
	$('#apply-submit').click(function(){
		var data = {
			company : company.val(),
            address : address.val(),
			contact1 : contact1.val(),
			contact1_phone : contact1_phone.val(),
			email : email.val(),
			captcha : captcha.val()
		};
		console.log(data);
        // 错误提示
        var tishi= function(obj,text){
            var this_input= obj.children('input');
            obj.parents('.col-xs-8').addClass('has-error');
            $('#tishi').text(text);
        };
        $('.basic_form input').blur(function(){
            var faz= $(this).parents('.col-xs-8');
           // alert($(this).parents('.col-xs-8').hasClass('has-error'));
            if($(this).parents('.col-xs-8').hasClass('has-error')){
                faz.removeClass('has-error');
            }else{
               // alert('no');
            };
        });
        // 表单基本验证
        if(data.company == ''){
            tishi(company,'公司名称不能为空！');
            return false;
        }else if(data.address == ''){
            tishi(address,'公司地址不能为空！');
            return false;
        }else if(data.contact1 == ''){
            tishi(contact1,'联系人不能为空！');
            return false;
        }else if(!/^0?(13[0-9]|15[012356789]|18[0236789]|14[57])[0-9]{8}$/.test(data.contact1_phone)){
            tishi(contact1_phone,'请输入正确的联系人电话！');
            return false;
        }else if(!/^\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/.test(data.email)){
            tishi(email,'请输入正确的邮箱地址！');
            return false;
        }else if(data.captcha == ''){
            tishi(captcha,'请输入验证码！');
            return false;
        };
		$.ajax({
			url : '/member/apply',
			type : 'post',
			dataType : 'json',
			data : data,
			success : function(res){
				if(res['ret'] > 0){
					alert(res['msg']);
					location.reload();
				}else{
					//resCaptcha(res['msg']);
					alert(res['msg']);
				}
			}
		})
		
		return false;
	});

	reloadCaptcha();
})	
</script>

<?php echo $this->partial('public/footer'); ?>
