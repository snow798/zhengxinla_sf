<?php echo $this->partial('public/header'); ?>


<div class="row hao_tab" id="edit_main">
	<div class="panel panel-default">
	  <!-- Default panel contents -->
	  <div class="panel-heading"><?php echo $info['companyname']; ?>资料</div>
	  <!-- Table -->

        <div class="panel-body">
            <form class="form-horizontal basic_form">
                <input type="hidden" name="memberid" value="<?php echo $info['memberid']; ?>" />
                <div class="form-group">
                    <label class="control-label col-xs-4">公司地址</label>
                    <div class="col-xs-8 col-md-4">
                        <input type="text" class="form-control" name="address" value="<?php echo $info['address']; ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-xs-4">电子邮件</label>
                    <div class="col-xs-8 col-md-4">
                        <input type="text" class="form-control" name="email" value="<?php echo $info['email']; ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-xs-4">公司联系人</label>
                    <div class="col-xs-8 col-md-4">
                        <input type="text" class="form-control" name="contact1" value="<?php echo $info['contact1']; ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-xs-4">联系人电话</label>
                    <div class="col-xs-8 col-md-4">
                        <input type="text" class="form-control" name="contact1_phone" value="<?php echo $info['contact1_phone']; ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-xs-4">第二联系人</label>
                    <div class="col-xs-8 col-md-4">
                        <input type="text" class="form-control" name="contact2" value="<?php echo $info['contact2']; ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-xs-4">联系人电话</label>
                    <div class="col-xs-8 col-md-4">
                        <input type="text" class="form-control" name="contact2_phone" value="<?php echo $info['contact2_phone']; ?>">
                    </div>
                </div>
                <div class="form-group ">
                    <label class="control-label col-xs-4"></label>
                    <div class="col-xs-4 col-md-4">
                        <button class="btn btn-primary btn-lg" id="member-edit-submit">保存资料</button>
                    </div>
                </div>
            </form>
        </div>

	</div>
</div>

<script type="text/javascript">
	$(function(){
		var action = 'edit',
			memberid = $('[name=memberid]');

		if(memberid.val() =='')
			action = 'add';
		$('#member-edit-submit').click(function(){
            console.log('ajax start……');
            var address = $('[name=address]'),
                contact1 = $('[name=contact1]'),
                contact1_phone = $('[name=contact1_phone]'),
                contact2 = $('[name=contact2]'),
                contact2_phone = $('[name=contact2_phone]'),
                email = $('[name=email]');
            if(!/^\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/.test(email.val())){
                alert('请输入正确的电子邮件地址！');
                return false;
            }else if(!/^0?(13[0-9]|15[012356789]|18[0236789]|14[57])[0-9]{8}$/.test(contact1_phone.val())){
                alert("请输入正确的联系人号码！");
                return false;
            }else if(!/^0?(13[0-9]|15[012356789]|18[0236789]|14[57])[0-9]{8}$/.test(contact2_phone.val())){
                alert('请输入正确的第二联系人号码！');
                return false;
            };

			$.ajax({
				url : '/member/save',
				type : 'post',
				dataType : 'json',
				data : {
                    address : address.val(),
                    contact1 : contact1.val(),
                    contact1_phone : contact1_phone.val(),
                    contact2 : contact2.val(),
					contact2_phone : contact2_phone.val(),
                    email : email.val()
				},
				success : function(res){
					console.log(res);
					if(res['ret'] > 0){
                        window.location.href = "/member/index";
					}else{
						alert(res['msg']);
					}					
				}
			});
			
			return false;
		})				
	})
</script>


<?php echo $this->partial('public/footer'); ?>
