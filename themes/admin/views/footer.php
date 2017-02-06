</section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="pull-right hidden-xs">
      <?= isset($idt->nm_perusahaan) ? $idt->nm_perusahaan : 'not-set' ?> - Page rendered in <strong>{elapsed_time}</strong> seconds
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2016 <a href="<?= site_url() ?>"><?= isset($idt->nm_perusahaan) ? $idt->nm_perusahaan : 'not-set' ?></a>.</strong> All rights reserved.
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED JS SCRIPTS -->
<!-- Bootstrap 3.3.6 -->
<script src="<?= base_url('assets/adminlte/bootstrap/js/bootstrap.min.js') ?>"></script>
<!-- Select2 -->
<script src="<?= base_url('assets/plugins/select2/select2.full.min.js') ?>"></script>
<!-- AdminLTE App -->
<script src="<?= base_url('assets/adminlte/dist/js/app.min.js') ?>"></script>
<script src="<?= base_url('assets/js/scripts.js') ?>" type="text/javascript"></script>
<!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. Slimscroll is required when using the
     fixed layout. -->
</body>
</html>