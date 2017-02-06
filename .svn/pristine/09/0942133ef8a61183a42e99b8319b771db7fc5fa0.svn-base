<div class="box box-primary">
	<?= form_open($this->uri->uri_string(),array('id'=>'frm_laporan','name'=>'frm_laporan','class' => 'form-inline')) ?>
        <div class="box-header hidden-print">
            <div class="pull-left">
                <button type="button" id="cetak" class="btn btn-default" onclick="cetak_halaman()"><i class="fa fa-print"></i> <?= lang('transaksi_cetak') ?></button>
            </div>
            <div class="pull-right">
                <div class="form-group">
                    <div class="input-daterange input-group">
                        <input type="text" class="form-control" name="tgl_awal" id="tgl_awal" value="<?= isset($period1) ? $period1 : '' ?>" placeholder="<?= lang('transaksi_tgl_awal') ?>" required />
                        <span class="input-group-addon">to</span>
                        <input type="text" class="form-control" name="tgl_akhir" id="tgl_akhir" value="<?= isset($period2) ? $period2 : '' ?>" placeholder="<?= lang('transaksi_tgl_akhir') ?>" required />
                    </div>
                </div>
                <div class="form-group">
                    <select id="jenis_produk" name="jenis_produk" class="form-control">
                        <option value="" <?= set_select('jenis_produk', "", isset($jenis_produk) && $jenis_produk == "") ?>><?= lang('transaksi_jns_produk_placeholder') ?></option>
                        <option value="0" <?= set_select('jenis_produk', 0, isset($jenis_produk) && $jenis_produk === 0) ?>><?= lang('transaksi_barang') ?></option>
                        <option value="1" <?= set_select('jenis_produk', 1, isset($jenis_produk) && $jenis_produk == 1) ?>><?= lang('transaksi_jasa') ?></option>
                    </select>
                </div>
                <div class="form-group">
                    <div class="input-group">
                        <input type="text" name="table_search" value="<?php echo isset($search) ? $search : ''; ?>" class="form-control pull-right" placeholder="Nama Barang/Jasa" autofocus />
                        <div class="input-group-btn">
                            <button class="btn btn-default"><i class="fa fa-search"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?= form_close() ?>
    <?php if($idt) : ?>
    <div class="row header-laporan">
        <div class="col-md-12">
            <div class="col-md-1 laporan-logo">
                <img src="<?= base_url('assets/images/'.$idt->logo) ?>" alt="logo">
            </div>
            <div class="col-md-6 laporan-identitas">
                <address>
                    <h4><?= $idt->nm_perusahaan ?></h4>
                    <?= $idt->alamat ?>, <?= $idt->kota ?><br>
                    Telp : <?= $idt->no_telp ?>, Fax : <?= $idt->fax ?><br>
                    Email : <?= $idt->email ?>, Website : <?= prep_url($idt->website) ?>
                </address>
            </div>
            <div class="col-md-5 text-right">
                <h3><?= lang('transaksi_laporan_per_barang') ?></h3>
                <h5>Periode <?= $period1." - ".$period2 ?></h5>
            </div>
            <div class="clearfix"></div>
            <div class="laporan-garis"></div>
        </div>
    </div>
    <?php endif ?>
	<?php if (isset($results) && is_array($results) && count($results)) : ?>
    	<div class="box-body">
            <div class="table-responsive no-padding">
                <table class="table table-condensed table-bordered table-detail">
                    <thead>
                        <tr class="bg-success">
                            <th width="50">#</th>
                            <th><?= lang('transaksi_nm_barang') ?></th>
                            <th><?= lang('transaksi_barang_tipe') ?></th>
                            <th><?= lang('transaksi_total_barang') ?></th>
                            <th><?= lang('transaksi_total_jasa') ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            $total_barang = 0;
                            $total_jasa = 0;
                            foreach ($results as $key => $record) : 
                        ?>
                        <tr>
                            <td><?= $key+1 ?></td>
                            <td><?= ucwords($record->nm_barang) ?></td>
                            <td><?= ($record->tipe == 1) ? lang('transaksi_jasa') : lang('transaksi_barang') ?></td>
                            <?php if($record->tipe == 1) : ?>
                            <td align="right"><strong>-</strong></td>
                            <td align="right"><strong><?= number_format($record->total) ?></strong></td>
                            <?php $total_jasa += $record->total; else : ?>
                            <td align="right"><strong><?= number_format($record->total) ?></strong></td>
                            <td align="right"><strong>-</strong></td>    
                            <?php $total_barang += $record->total; endif ?>
                        </tr>
                        <?php endforeach;?>
                        <tr class='bg-success'>
                            <td colspan="3" align="right"><strong><?= lang('transaksi_gtotal') ?></strong></td>
                            <td align="right"><strong>Rp. <?= number_format($total_barang) ?></strong></td>
                            <td align="right"><strong>Rp. <?= number_format($total_jasa) ?></strong></td>
                        </tr>
                    </tbody>
                    <tfoot>
                        <tr class="bg-success">
                            <td colspan="3" align="right"><strong><?= lang('transaksi_total_js_barang') ?></strong></td>
                            <td colspan="2" align="right"><strong>Rp. <?= number_format($total_barang+$total_jasa) ?></strong></td>
                        </tr>
                    </tfoot>
    	       </table>
           </div>
    	</div><!-- /.box-body -->
	<?php else: ?>
    <div class="callout callout-info">
        <p><i class="fa fa-warning"></i> &nbsp; <?= lang('transaksi_no_records_found') ?></p>
    </div>
    <?php
	endif;
	?>
</div><!-- /.box -->