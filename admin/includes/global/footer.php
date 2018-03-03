

   <footer class="main-footer">

        <div class="pull-right hidden-xs">

         

        </div>

        <strong><?= $_SESSION[$_SESSION_ID]['configuration']->copyrightMessage ?></strong>

      </footer>

  </div>

   



    <!--END FOOTER -->















     <!-- GLOBAL SCRIPTS -->

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/1.3.1/js/toastr.js"></script>

 

      <script>

      $(document).ready(function(){

        console.log("asadasdadasd");

             $("#example1").DataTable();

                $("#example2").DataTable({
          "paging": true,
          "lengthChange": false,
          "searching": false,
          "ordering": true,
          "info": true,
          "autoWidth": false
        });
              $('.datepicker').datepicker({

                    format: "yyyy-mm-dd"

                });  

              $(".timepicker").timepicker(); 

      });



     </script>

     <!--  <script src="<?= $_PATH['assets'] ?>/js/ckeditor/ckeditor.js"></script>  -->


    <script src="https://cdn.ckeditor.com/4.5.1/standard/ckeditor.js"></script>
    
    <script src="<?= $_PATH['root'] ?>/assets/custom-js/ajax.js"></script>

    <script src="<?= $_PATH['root'] ?>/assets/custom-js/effects.js"></script>

    <script src="<?= $_PATH['root'] ?>/assets/custom-js/export.js"></script>

    <script src="<?= $_PATH['root'] ?>/assets/custom-js/validation.js"></script>

    <!-- jQuery UI 1.11.4 -->

    <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>

    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->

    <script>

      $.widget.bridge('uibutton', $.ui.button);

    </script>

    <!-- Bootstrap 3.3.5 -->
     <script src="assets/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>

    <!-- Morris.js charts -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>

    <script src="assets/plugins/morris/morris.min.js"></script>

    <!-- Sparkline -->

    <script src="assets/plugins/sparkline/jquery.sparkline.min.js"></script>

    <!-- jvectormap -->

    <script src="assets/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>

    <script src="assets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>

    <!-- jQuery Knob Chart -->

    <script src="assets/plugins/knob/jquery.knob.js"></script>

    <!-- daterangepicker -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>

    <script src="assets/plugins/daterangepicker/daterangepicker.js"></script>

    <!-- datepicker -->

    <script src="assets/plugins/datepicker/bootstrap-datepicker.js"></script>

    <!-- Bootstrap WYSIHTML5 -->

    <script src="assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>

    <!-- Slimscroll -->

    <script src="assets/plugins/slimScroll/jquery.slimscroll.min.js"></script>

    <!-- FastClick -->

    <script src="assets/plugins/fastclick/fastclick.min.js"></script>

    <!-- AdminLTE App -->

    <script src="assets/dist/js/app.min.js"></script>

    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->

    <script src="assets/dist/js/pages/dashboard.js"></script>

    <!-- AdminLTE for demo purposes -->

    <script src="assets/dist/js/demo.js"></script>

   

    <script src="assets/plugins/timepicker/bootstrap-timepicker.min.js"></script>









   <script type="text/javascript">

    <?php if(isset($_GET['flag']) && $_GET['flag'] <= 0){?>

    toastr.error('<?=$_GET["msg"]?>');

    <?php } ?>

   <?php if(isset($_GET['flag']) && $_GET['flag'] > 0){?>

      toastr.success('<?=$_GET["msg"]?>');



    <?php } ?>

  </script>

 








      <!-- END PAGE LEVEL SCRIPTS -->



</body>



    <!-- END BODY -->

</html>