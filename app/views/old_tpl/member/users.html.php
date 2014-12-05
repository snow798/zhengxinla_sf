<?php echo $this->partial('public/header'); ?>
<?php echo $this->partial('module/page-nav'); ?>
<div class="row">

  	<ul class="nav nav-tabs">
		<li class="active"><a href="#userlist" data-toggle="tab">借款人管理 <span class="badge"></span></a></li>
	</ul>


	<div class="tab-content">
		<div class="tab-pane active fade in" id="userlist">
            <?php echo $this->partial('module/grid'); ?>
		</div>
        <?php echo $this->partial('userlist_js'); ?>
        <?php echo $this->partial('public/page_js'); ?>
		  
	</div>
</div>

<script type="text/javascript" src="__static/js/jquery.template.min.js"></script>
<script type="text/javascript">
	$(function(){
		var data = {};

		function loadList(opts){
			if(typeof opts == 'object')
				$.extend(data, opts);
			$.ajax({
				url : '/member/users',
				type : 'post',
				dataType : 'json',
				data : data,
				success : function(res){
					if(res['return'] > 0){
						var html = $.template('userlist_js',res['data']),
							page = $.template('pagelist_js',res['data']);
						var obj = $('#userlist');
						obj.find('.datalist').html(html);
						obj.find('.pagination').html(page);
					}else{
						alert(res['errmsg']);
					}
				}
			});
		}	

		var p = page();		
		p.click(function(n){
			loadList({
				p : n
			})
		});

		loadList();

		//
		$('.datalist').delegate('.delete', 'click', function(){
			var uid = $(this).attr('uid');
			if(!confirm("确定要删除该用户下的借款数据吗？")){
				return false;
			}
			$.ajax({
				url : '/member/deluser',
				type : 'post',
				dataType : 'json',
				data : {
					uid : uid
				},
				success : function(res){
					if(res['return'] > 0){
						location.reload();
					}else{
						alert(res['errmsg']);
					}
				}
			})
			return false;
		});

		function toggle(obj, type){
			if(type == undefined)
				type = 'show';
			if(type == 'hide'){
				obj.find('input[type=text], .save').addClass('hidden');
				obj.find('.input-text, .edit, .delete').removeClass('hidden');
			}else if(type == 'show'){
				obj.find('.input-text, .edit, .delete').addClass('hidden');
				obj.find('input[type=text], .save').removeClass('hidden');
			}
		}

		$('.datalist').delegate('.edit', 'click', function(){
			var parent = $(this).closest('tr');
			toggle(parent);
			return false;
		});

		$('.datalist').delegate('.save', 'click', function(){
			var parent = $(this).closest('tr'),
				uid = $(this).attr('uid'),
				idcard = parent.find('[name=idcard]').val(),
				realname = parent.find('[name=realname]').val(),
				defaultIdcard = parent.find('[name=idcard]').attr('default'),
				defaultRealname = parent.find('[name=realname]').attr('default');

			if(idcard == defaultIdcard && realname == defaultRealname){
				toggle(parent, 'hide');
				return false;
			}

			$.ajax({
				url : '/User/save',
				type : 'post',
				dataType : 'json',
				data : {
					uid : uid,
					idcard : idcard,
					realname : realname
				},
				success : function(res){
					//console.log(res);
					var idcardbox = parent.find('#idcard');
					var realnamebox = parent.find('#realname');
					if(res['return'] > 0){
						alert(res['msg']);						
						idcardbox.find('.input-text').text(idcard);
						idcardbox.find('[name=idcard]').attr('default', idcard)
						idcardbox.find('[name=idcard]').val(idcard);
						
						realnamebox.find('.input-text').text(realname);
						realnamebox.find('[name=realname]').attr('default',realname);
						realnamebox.find('[name=realname]').val(realname);
					}else{						
						alert(res['errmsg']);	
						idcardbox.find('[name=idcard]').val(defaultIdcard);				
						idcardbox.find('[name=realname]').val(defaultRealname);						
					}
					toggle(parent, 'hide');
				}
			})
		});
	})
</script>

<?php echo $this->partial('public/footer'); ?>
