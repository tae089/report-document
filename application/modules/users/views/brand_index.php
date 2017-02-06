<?php 
$ENABLE_ADD     = has_permission('Users.Add');
$ENABLE_MANAGE  = has_permission('Users.Manage');
$ENABLE_DELETE  = has_permission('Users.Delete');
?>
<div class="box box-primary">
	<?= form_open($this->uri->uri_string(),array('id'=>'frm_brand','name'=>'frm_brand')) ?>
    <div class="box-header">
        <div class="form-group">
            <?php if ($ENABLE_ADD) : ?>
               <a href="<?= site_url('users/brand/create') ?>" class="btn btn-success" title="<?= lang('brand_btn_new') ?>"><?= lang('brand_btn_new') ?></a>
           <?php endif; ?>
           <div class="pull-right">
            <div class="input-group">
                <input type="text" name="table_search" value="<?php echo isset($search) ? $search : ''; ?>" class="form-control pull-right" placeholder="Search" autofocus />
                <div class="input-group-btn">
                    <button class="btn btn-default"><i class="fa fa-search"></i></button>
                </div>
            </div>
        </div>
    </div>
</div>
<?php if (isset($results) && is_array($results) && count($results)) : ?>
	<div class="box-body table-responsive no-padding">
        <table class="table table-hover table-striped">
            <thead>
                <tr>
                    <th class="column-check" style="width: 30px;"><input class="check-all" type="checkbox" /></th>
                    <th width="50">#</th>
                    <th><?= lang('brand_name') ?></th>
                    <th><?= lang('brand_status') ?></th>
                    <?php if($ENABLE_MANAGE) : ?>
                        <th width="80"></th>
                    <?php endif; ?>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($results as $record) : ?>
                    <tr>
                        <td class="column-check">
                            <?php if($record->id_user != 1) : ?>
                                <input type="checkbox" name="checked[]" value="<?= $record->id_brand ?>" />
                            <?php endif; ?>
                        </td>
                        <td><?= $numb; ?></td>
                        <td><?= $record->name_brand ?></td>
                        <td><?= ($record->status == 0) ? "<label class='label label-danger'>".lang('brand_td_aktif')."</label>" : "<label class='label label-success'>".lang('brand_aktif')."</label>" ?></td>
                        <?php if($ENABLE_MANAGE) : ?>
                            <td style="padding-right:20px">
                                <a class="text-black" href="<?= site_url('users/brand/edit/' . $record->id_brand); ?>" data-toggle="tooltip" data-placement="left" title="Edit Data"><i class="fa fa-pencil"></i></a>
                                <?php if($record->id_brand != 1) : ?>
                                    &nbsp;|&nbsp;
                                    <a class="text-black" href="<?= site_url('users/brand/permission/' . $record->id_brand); ?>" data-toggle="tooltip" data-placement="left" title="Edit Hak Akses"><i class="fa fa-shield"></i></a>
                                <?php endif; ?>
                            </td>
                        <?php endif; ?>
                    </tr>
                    <?php $numb++; endforeach; ?>
                </tbody>
            </table>
        </div><!-- /.box-body -->
        <div class="box-footer clearfix">
          <?php if($ENABLE_DELETE) : ?>
              <input type="submit" name="delete" class="btn btn-danger" id="delete-me" value="<?php echo lang('users_btn_delete') ?>" onclick="return confirm('<?= (lang('users_del_confirm')); ?>')">
          <?php endif;
          echo $this->pagination->create_links(); 
          ?>
      </div>
  <?php else: ?>
    <div class="callout callout-info">
        <p><i class="fa fa-warning"></i> &nbsp; <?= lang('users_no_records_found') ?></p>
    </div>
    <?php
    endif;
    echo form_close(); 
    ?>
</div><!-- /.box -->