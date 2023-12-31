<!-- Vendor JS Files -->
<script src="vendor/apexcharts/apexcharts.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="vendor/chart.js/chart.min.js"></script>
<script src="vendor/echarts/echarts.min.js"></script>
<script src="vendor/quill/quill.min.js"></script>
<script src="vendor/simple-datatables/simple-datatables.js"></script>
<script src="vendor/tinymce/tinymce.min.js"></script>
<script src="vendor/php-email-form/validate.js"></script>
<script src="assets/js/main.js"></script>
<script src="vendor/jquery/dist/jquery.min.js" type="text/javascript"></script>
<script src="vendor/jQuery-Mask-Plugin/dist/jquery.mask.min.js"></script>
<script src="vendor/sweetalert/sweetalert.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/driver.js@1.0.1/dist/driver.js.iife.js"></script>

<!-- Format Form Menjadi Uang -->
<script type="text/javascript">
    $(document).ready(function(){
        // Format mata uang.
        $( '#kembalian' ).mask('000.000.000.000', {reverse: true});
        $( '#pembayaran' ).mask('000.000.000.000', {reverse: true});
        $( '#jumlah_transaksi' ).mask('000.000.000.000', {reverse: true});
        $( '#jumlah_transaksi_edit' ).mask('000.000.000.000', {reverse: true});
        $( '#pembayaran_edit' ).mask('000.000.000.000', {reverse: true});
        $( '#kembalian_edit' ).mask('000.000.000.000', {reverse: true});
        $( '.format_uang' ).mask('000.000.000.000', {reverse: true});
    })
</script>
