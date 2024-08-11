<!-- Bootstrap core JavaScript-->


<script src="<?php echo site_url('assets/sbadmin2/'); ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="<?php echo site_url('assets/sbadmin2/'); ?>vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="<?php echo site_url('assets/sbadmin2/'); ?>js/sb-admin-2.min.js"></script>

<!-- Page level plugins -->

<!-- Datatable -->
<script src="<?php echo site_url('assets/sbadmin2/'); ?>vendor/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo site_url('assets/sbadmin2/vendor/datatables/dataTables.fixedHeader.js'); ?>"></script>
<script src="<?php echo site_url('assets/sbadmin2/vendor/datatables/dataTables.bootstrap4.js'); ?>"></script>
<!-- <script src="<?php echo site_url('assets/sbadmin2/'); ?>vendor/datatables/dataTables.bootstrap4.min.js"></script> -->
<script src="<?php echo site_url('assets/sbadmin2/vendor/datatables/dataTables.responsive.min.js'); ?>"></script>
<script src="<?php echo site_url('assets/sbadmin2/vendor/datatables/dataTables.keyTable.min.js'); ?>"></script>
<script src="<?php echo site_url('assets/sbadmin2/vendor/datatables/dataTables.select.min.js'); ?>"></script>
<script src="<?php echo site_url('assets/sbadmin2/vendor/datatables/dataTables.buttons.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/sbadmin2/vendor/button/buttons.bootstrap4.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/sbadmin2/vendor/button/buttons.html5.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/sbadmin2/vendor/button/buttons.flash.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/sbadmin2/vendor/button/buttons.print.min.js'); ?>"></script>

<script src="<?php echo site_url('assets/sbadmin2/'); ?>js/demo/datatables-demo.js"></script>

<!-- export -->
<script src="<?php echo base_url('assets/sbadmin2/vendor/button/jszip.min.js'); ?>"></script>
<!-- <script src="<?php echo base_url('assets/sbadmin2/vendor/button/pdfmake.min.js'); ?>"></script> -->
<script src="<?php echo base_url('assets/sbadmin2/vendor/button/vfs_fonts.js'); ?>"></script>

<!-- Page level custom scripts -->
<!-- <script src="<?php echo site_url('assets/sbadmin2/'); ?>vendor/chart.js/Chart.min.js"></script>
<script src="<?php echo site_url('assets/sbadmin2/'); ?>js/demo/chart-area-demo.js"></script>
<script src="<?php echo site_url('assets/sbadmin2/'); ?>js/demo/chart-pie-demo.js"></script> -->
<script>
$(document).ready(function() {
    $('.toast').toast({
        delay: 5000
    });
    $('.toast').toast('show');
    // select2
    $('.select2').select2({
        width: 'resolve'
    });
    $('#select2').select2({
        width: 'resolve',
    });

    $('.money').simpleMoneyFormat();
});
</script>
<script>
$(function() {
    $('[data-toggle="tooltip"]').tooltip()
})
</script>

<!-- select2 -->
<script src="<?php echo site_url('assets/select2_4013/'); ?>js/select2.min.js"></script>
<script src="<?php echo site_url('assets/sbadmin2/'); ?>js/simple.money.format.js"></script>
<script type="text/javascript"
    src="<?php echo site_url('assets/bs_iconpicker/'); ?>dist/js/bootstrap-iconpicker.bundle.min.js"></script>
</body>

</html>