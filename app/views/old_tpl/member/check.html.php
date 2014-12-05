<?php echo $this->partial('public/header'); ?>


<div class="row hao_tab">
  <div class="panel panel-default"> 
      <!-- Default panel contents -->
      <div class="panel-heading">公司资料</div>
      
      <div class="panel-body basic_form">
	      <!-- Table -->
	     <!-- <form class="form-horizontal basic_form">
	      	
	      	<div class="form-group">
	      		<label class="control-label col-xs-4">公司名称</label>
	      		<div class="col-xs-8 col-md-4">
                    <label class="control-label text-info">武汉市一起好信息服务股份有限公司</label>
	      		</div>
	      	</div>
	      	<div class="form-group">
	      		<label class="control-label col-xs-4">联系人</label>
	      		<div class="col-xs-8 col-md-4">
                    <label class="control-label text-info">李某某</label>
	      		</div>
	      	</div>
	      	<div class="form-group">
	      		<label class="control-label col-xs-4">联系电话</label>
	      		<div class="col-xs-8 col-md-4">
                    <label class="control-label text-info">027-12345678</label>
	      		</div>
	      	</div>
	      	<div class="form-group">
	      		<label class="control-label col-xs-4">邮箱</label>
	      		<div class="col-xs-8 col-md-4">
                    <label class="control-label text-info">430000</label>
	      		</div>
	      	</div>
	      	<div class="form-group">
	      		<label class="control-label col-xs-4"></label>
	      		<div class="col-xs-4">
	      			<button class="btn btn-primary btn-sm">返回</button>
	      		</div>
	      	</div>
	      </form>	      	      
	   -->
          <div class="col-md-2"></div>
          <div class=" col-md-8 col-xs-12 " id="check_table">
              <table class="table table-hover">
                  <thead>
                  <tr>
                      <th colspan="2">武汉市一起好信息服务股份有限公司</th>
                  </tr>
                  </thead>
                  <tbody>
                  <tr>
                      <td>公司名称</td>
                      <td>武汉市一起好信息服务股份有限公司</td>
                  </tr>
                  <tr>
                      <td>联系人</td>
                      <td>李某某</td>
                  </tr>
                  <tr>
                      <td>联系电话</td>
                      <td>027-12345678</td>
                  </tr>
                  <tr>
                      <td>地址</td>
                      <td>武汉市硚口区武胜路</td>
                  </tr>
                  </tbody>
              </table>
          </div>
      </div>
    </div>
  </div>
  
<script type="text/javascript">
$(function(){
	var companyname = $('[name=companyname]'),
		contact1 = $('[name=contact1]'),
		contact1_phone = $('[name=contact1_phone]'),
		email = $('[name=email]'),
		captcha = $('[name=captcha]');
	$('#apply-submit').click(function(){
		var data = {
			companyname : companyname.val(),
			contact1 : contact1.val(),
			contact1_phone : contact1_phone.val(),
			email : email.val(),
			captcha : captcha.val()
		};
		
		$.ajax({
			url : '/index/apply',
			type : 'post',
			dataType : 'json',
			data : data,
			success : function(res){
				if(res['return'] > 0){
					alert(res['msg']);
					location.reload();
				}else{
					resCaptcha(res['errmsg']);
					alert(res['errmsg']);
				}
			}
		})
		
		return false;
	});

	reloadCaptcha();
})	
</script>

<?php echo $this->partial('public/footer'); ?>

