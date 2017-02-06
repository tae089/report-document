<?= form_open('', array("class"=>"form-horizontal", "id"=>"frm_menu")); ?>
<div class="form-group <?= form_error('title') ? ' error' : ''; ?>">
    <label for="title" class="control-label col-sm-2"><?= lang('menus_title'); ?></label>
    <div class="col-sm-4">
        <input type="hidden" id="menuid" name="menuid" value="<?php echo set_value('menuid', isset($data->id) ? $data->id : ''); ?>">
        <input type="hidden" id="type" name="type" value="<?= isset($type) ? $type : 'add' ?>">
        <input id="title" type="text" name="title" class="form-control" maxlength="100" value="<?php echo set_value('title', isset($data->title) ? $data->title : ''); ?>" />
    </div>
    <div class="col-sm-10 col-sm-offset-2">
        <span class="help-inline"><?php echo form_error('title'); ?></span>
    </div>
</div>
<div class="form-group <?= form_error('link') ? ' error' : ''; ?>">
    <label for="link" class="control-label col-sm-2"><?= lang('menus_link'); ?></label>
    <div class="col-sm-4">
        <input id="link" type="text" name="link" class="form-control" maxlength="255" value="<?php echo set_value('link', isset($data->link) ? $data->link : ''); ?>" />
    </div>
    <div class="col-sm-10 col-sm-offset-2">
        <span class="help-inline"><?php echo form_error('link'); ?></span>
    </div>
</div>
<div class="form-group <?= form_error('icon') ? ' error' : ''; ?>">
    <label for="icon" class="control-label col-sm-2"><?= lang('menus_icon'); ?></label>
    <div class="col-sm-4">
        <input id="icon" type="text" name="icon" class="form-control" maxlength="255" value="<?php echo set_value('icon', isset($data->icon) ? $data->icon : ''); ?>" />
        <span>e.g. "fa fa-angle-right"</span>
    </div>
    <div class="col-sm-10 col-sm-offset-2">
        <span class="help-inline"><?php echo form_error('icon'); ?></span>
    </div>
</div>
<div class="form-group <?= form_error('target') ? ' error' : ''; ?>">
    <label for="target" class="control-label col-sm-2"><?= lang('menus_target'); ?></label>
    <div class="col-sm-3">
        <select id="target" name="target" class="form-control">
            <option value="sametab" <?php echo set_select('target', 'sametab', isset($data->target) && $data->target=="sametab"); ?>>Same Tab</option>
            <option value="_blank" <?php echo set_select('target', '_blank', isset($data->target) && $data->target=="_blank"); ?>>New Tab</option>
        </select>
    </div>
    <div class="col-sm-10 col-sm-offset-2">
        <span class="help-inline"><?php echo form_error('target'); ?></span>
    </div>
</div>
<div class="form-group <?= form_error('group_menu') ? ' error' : ''; ?>">
    <label for="group_menu" class="control-label col-sm-2"><?= lang('menus_group'); ?></label>
    <div class="col-sm-3">
        <select id="group_menu" name="group_menu"  class="form-control">
            <?php foreach ($group_menus as $key => $gr) : ?>
            <option value="<?= $gr->id; ?>" <?= set_select('group_menu', $gr->id, isset($data->group_menu) && $data->group_menu == $gr->id) ?>><?= $gr->group_name ?></option> 
            <?php endforeach; ?>
        </select>
    </div>
    <div class="col-sm-10 col-sm-offset-2">
        <span class="help-inline"><?php echo form_error('group_menu'); ?></span>
    </div>
</div>
<div class="form-group <?= form_error('parent_id') ? ' error' : ''; ?>">
    <label for="parent_id" class="control-label col-sm-2"><?= lang('menus_parent'); ?></label>
    <div class="col-sm-4">
        <select id="parent_id" name="parent_id" class="form-control">
            <option value="0">This is parent menu</option>
            <?php foreach ($parents as $key => $parent) : ?>
            <option value="<?= $parent->id; ?>" <?= set_select('parent_id', $parent->id, isset($data->parent_id) && $data->parent_id == $parent->id) ?>><?= $parent->title ?></option> 
            <?php endforeach; ?>
        </select>
    </div>
    <div class="col-sm-10 col-sm-offset-2">
        <span class="help-inline"><?php echo form_error('parent_id'); ?></span>
    </div>
</div>
<div class="form-group <?= form_error('permission_id') ? ' error' : ''; ?>">
    <label for="permission_id" class="control-label col-sm-2"><?= lang('menus_permissions'); ?></label>
    <div class="col-sm-4">
        <select id="permission_id" name="permission_id" class="form-control">
            <?php foreach ($permissions as $key => $permission) : ?>
            <option value="<?= $permission->id_permission; ?>" <?= set_select('permission_id', $permission->id_permission, isset($data->permission_id) && $data->permission_id == $permission->id_permission) ?>><?= $permission->nm_permission ?></option> 
            <?php endforeach; ?>
        </select>
    </div>
    <div class="col-sm-10 col-sm-offset-2">
        <span class="help-inline"><?php echo form_error('permission_id'); ?></span>
    </div>
</div>
<div class="form-group ">
    <label for="status" class="control-label col-sm-2"><?php echo lang('menus_status'); ?></label>
    <div class="col-sm-2">
        <select name="status" id="status" class="form-control">
            <option value="1" <?php echo set_select('status', '1', isset($data->status) && $data->status == 1); ?>><?php echo lang('menus_active'); ?></option>
            <option value="0" <?php echo set_select('status', '0', isset($data->status) && $data->status == 0); ?>><?php echo lang('menus_inactive'); ?></option>
        </select>
    </div>
</div>
<div class="form-group" style="margin-bottom: 5px;">
    <div class="col-sm-offset-2 col-sm-6">
        <input type="button" name="save" onclick="save_menu()" class="btn btn-primary btn-flat" value="<?php echo lang('menus_save'); ?>" />
        <?php
        echo lang('menus_or').' ' . "<input type='button' name='btn_cancel' class='btn btn-danger btn-flat' onclick='cancel()' value='".lang('menus_cancel')."' />";
        ?>
        <div id='alert_edit' class='alert-success text-center col-md-5 pull-right' style="padding: 5px;display: none;">Menu saved</div>
    </div>
</div>
<?= form_close();?>
<script type="text/javascript">
    $().ready(function(){
        var ns = $('ol.sortable').nestedSortable({
            forcePlaceholderSize: true,
            handle: 'div',
            helper: 'clone',
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