<!-- Plugin to drag and drop menu -->
<link href="<?php echo base_url('assets/js/menu/jquery-ui.css'); ?>" rel="stylesheet">
<link href="<?php echo base_url('assets/js/menu/sortable.css'); ?>" rel="stylesheet">
<script src="<?php echo base_url('assets/js/menu/jquery-ui.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/menu/jquery.mjs.nestedSortable.js'); ?>"></script>

<div class="box">
    <div class="row">
    	<div class="col-md-12">
    		<div class="row">
    			<div class="col-md-4">
    				<?php echo form_open('',array('id'=>'frm_menu_order')) ?>
	    				<div class="panel panel-default">
		    				<div class="panel-heading"><?= lang('menus_items_order') ?></div>
		    				<div class="panel-body" id="mn_item">
			    				<ol class="sortable">
								<?php
									if($menus) : 
									foreach ($menus as $key => $mn): ?>
									<li id="menu_<?= $mn->id ?>">
										<div class="menuDiv">
											<span title="Toggle Sub Menu" data-id="<?= $mn->id ?>" class="disclose ui-icon ui-icon-minusthick"></span>
											<?= $mn->title ?>
											<?php if(has_permission('Settings.Menus.Delete')) : ?>
											<span class="editMenu ui-icon ui-icon-close" onclick="delete_menu(<?= $mn->id ?>)"></span>
											<?php endif; ?>
											<?php if(has_permission('Settings.Menus.Manage')) : ?>
											<span class="editMenu ui-icon ui-icon-pencil" onclick="editmenu('<?= $mn->id ?>')"></span>
											<?php endif; ?>
									</div>
									<?php if(count($mn->child)) : 
										foreach ($mn->child as $key => $submenu) :
									?>
									<ol>
										<li id="menu_<?= $submenu->id ?>">
									   		<div class="menuDiv">
									   			<span title="Toggle Sub Menu" data-id="<?= $submenu->id ?>" class="disclose ui-icon ui-icon-minusthick"></span>
									   			<?= $submenu->title ?>
									   			<?php if(has_permission('Settings.Menus.Delete')) : ?>
									   			<span class="editMenu ui-icon ui-icon-close" onclick="delete_menu(<?= $submenu->id ?>)"></span>
									   			<?php endif; ?>
									   			<?php if(has_permission('Settings.Menus.Manage')) : ?>
									   			<span class="editMenu ui-icon ui-icon-pencil" title="Edit" onclick="editmenu('<?= $submenu->id ?>')"></span>
												<?php endif; ?>
											</div>
										</li>
									</ol>
									<?php endforeach; ?>
									<?php endif; ?>
								</li>
								<?php 
									endforeach; 
									endif;
								?>
								</ol>
								<div class="col-md-12">
									<?php if(has_permission('Settings.Menus.Manage')) : ?>
									<input type="button" id="save_order" name="save_order" class="btn btn-primary btn-flat" onclick="save_order_menu()" style="margin-top: 10px;" value="<?php echo lang('menus_save_order'); ?>" />
									<?php endif; ?>
									<div id='alert_save' class='alert-success text-center col-md-7 pull-right' style="padding: 5px;display: none;">Menu order saved</div>
								</div>
							</div>
					   </div>
				   </form>
    			</div>
    			<div class="col-md-8">
    				<?php if(has_permission('Settings.Menus.Manage') || has_permission('Settings.Menus.Add')) : ?>
    				<div class="panel panel-default">
	    				<div class="panel-heading" id="frm_menu_head"><?= lang('menus_add_form') ?></div>
	    				<div class="panel-body">
		    				<div id="form-area">
		    					<?= $this->load->view('menus/menus_form') ?>
		    				</div>
		    			</div>
		    		</div>
		    		<?php endif; ?>
    			</div>
    		</div>
    	</div>
    </div>
</div>
<script type="text/javascript">
	$().ready(function(){
		var ns = $('ol.sortable').nestedSortable({
			forcePlaceholderSize: true,
			handle: 'div',
			helper:	'clone',
			items: 'li',
			opacity: .6,
			placeholder: 'placeholder',
			revert: 250,
			tabSize: 20,
			tolerance: 'pointer',
			toleranceElement: '> div',
			maxLevels: 2,
			isTree: true,
			startCollapsed: false
		});
		
		$('.disclose').on('click', function() {
			$(this).closest('li').toggleClass('mjs-nestedSortable-collapsed').toggleClass('mjs-nestedSortable-expanded');
			$(this).toggleClass('ui-icon-plusthick').toggleClass('ui-icon-minusthick');
		});
		

		$("#title").focus();

	});	

	//Edit Menu
	function editmenu(idmenu){
		if(idmenu!=""){
			var url = 'menus/edit/'+idmenu;

			$("#frm_menu_head").html("Edit Menu");

			$("#form-area").load(siteurl+url);

		    $("#title").focus();
		}
	}

	function save_order_menu(){
		var formdata = $('ol.sortable').nestedSortable('serialize');
			token_hash = $("#frm_menu_order [name='ci_csrf_token']").val();
			formdata = formdata+'&ci_csrf_token='+token_hash;

		$.ajax({
			url : siteurl+"menus/save_order",
			data : formdata,
			dataType : "json",
			type : "post",
			success: function(msg){
				if(msg['save']==1){

					$("#frm_menu_order [name='ci_csrf_token']").val(msg['token']);

					$("#alert_save").html("Menu order saved");
					$("#alert_save").removeClass("alert-danger");
					$("#alert_save").removeClass("alert-success");
					$("#alert_save").addClass("alert-success");
					$("#alert_save").show();

					setTimeout(function(){
						$("#alert_save").hide();
						window.location.reload();
					},2000);
				}else{

					$("#frm_menu_order [name='ci_csrf_token']").val(msg['token']);

					$("#alert_save").html("Menu saving failed");
					$("#alert_save").removeClass("alert-danger");
					$("#alert_save").removeClass("alert-success");
					$("#alert_save").addClass("alert-danger");
					
					$("#alert_save").show();

					setTimeout(function(){
						$("#alert_save").hide();
					},2000);
				}
			}
		});
	}

	//Cancel Edit or Add
	function cancel(){

	    $("#menuid").val("");
	    $("#type").val("add");
	    $("#title").val("");
	    $("#link").val("");
	    $("#icon").val("");
	    $("#taget").val("sametab");
	    $("#group_menu").val($("#group_menu option:first").val());
	    $("#parent_id").val(0);
	    $("#parent_id").prop("disabled",false);
	    $("#permission_id").val($("#permission_id option:first").val());
	    $("#taget").val(1);

	    $("#frm_menu_head").html("Add New Menu");
	}	

	//Save Menu
	function save_menu(){

		var title = $("#title").val().trim();

		var formdata = $("#frm_menu").serialize();

		if(title!=""){
	    	$.ajax({
				url : siteurl+"menus/save_menus_ajax",
				data : formdata,
				dataType : "json",
				type : "post",
				success: function(msg){
					if(msg['save']==1){

						$("#frm_menu [name='ci_csrf_token']").val(msg['token']);

						$("#alert_edit").html("Menu saved");
						$("#alert_edit").removeClass("alert-danger");
						$("#alert_edit").removeClass("alert-success");
						$("#alert_edit").addClass("alert-success");
						$("#alert_edit").show();


						setTimeout(function(){
							$("#alert_edit").hide();
							window.location.reload();

							//reset form
							cancel();

						},2000);
					}else{

						$("#frm_menu [name='ci_csrf_token']").val(msg['token']);

						$("#alert_edit").html("Menu saving failed");
						$("#alert_edit").removeClass("alert-danger");
						$("#alert_edit").removeClass("alert-success");
						$("#alert_edit").addClass("alert-danger");
						$("#alert_edit").show();

						setTimeout(function(){
							$("#alert_edit").hide();
						},2000);
					}
				}
			});
		}else{

			$("#alert_edit").html("Title must be filled");
			$("#alert_edit").removeClass("alert-danger");
			$("#alert_edit").removeClass("alert-success");
			$("#alert_edit").addClass("alert-danger");
			$("#alert_edit").show();

			setTimeout(function(){
				$("#alert_edit").hide();
			},2000);
		}
	}

	//Delete Menu
	function delete_menu(id){
		var idmenu = id;
		var token_hash = $("#frm_menu_order [name='ci_csrf_token']").val();

		var conf = confirm("Are you sure you want to delete this menu ?");

		if(idmenu!=="")
		{
			if(conf){
				$.ajax({
	    			url : siteurl+"menus/delete",
	    			data : ({id: idmenu, ci_csrf_token: token_hash}),
	    			type : "post",
	    			dataType : "json",
	    			success : function(msg){
	    				if(msg['delete']==1)
	    				{
	    					$("#frm_menu_order [name='ci_csrf_token']").val(msg['token']);

							$("#alert_save").html("Menu deleted");
							$("#alert_save").removeClass("alert-danger");
							$("#alert_save").removeClass("alert-success");
							$("#alert_save").addClass("alert-success");
							$("#alert_save").show();


							setTimeout(function(){
								$("#alert_save").hide();
								window.location.reload();
							},2000);
	    				}else if(msg['delete']==2){
	    					$("#frm_menu_order [name='ci_csrf_token']").val(msg['token']);

							$("#alert_save").html("Delete child first");
							$("#alert_save").removeClass("alert-danger");
							$("#alert_save").removeClass("alert-success");
							$("#alert_save").addClass("alert-danger");
							$("#alert_save").show();

							setTimeout(function(){
								$("#alert_save").hide();
							},2000);
	    				}else{
	    					$("#frm_menu_order [name='ci_csrf_token']").val(msg['token']);

							$("#alert_save").html("Deletion failed");
							$("#alert_save").removeClass("alert-danger");
							$("#alert_save").removeClass("alert-success");
							$("#alert_save").addClass("alert-danger");
							$("#alert_save").show();

							setTimeout(function(){
								$("#alert_save").hide();
							},2000);
	    				}
	    			}
	    		});
			}
		}
	}
</script>