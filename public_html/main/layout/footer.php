<!-- jQuery 2.2.3 -->
<script src="../assets/plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="../assets/bootstrap/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="../assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../assets/plugins/datatables/dataTables.bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script>
    $(function () {
        $("#example1").DataTable();
        $("#example3").DataTable();
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false
        });
    });
</script>
<!-- SlimScroll -->
<script src="../assets/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="../assets/plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../assets/dist/js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../assets/dist/js/demo.js"></script>
<!-- page script -->


<!-- CK Editor -->
<script src="https://cdn.ckeditor.com/4.5.7/standard/ckeditor.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="../assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
<script>
    $(function () {
        // Replace the <textarea id="editor1"> with a CKEditor
        // instance, using default configuration.
        CKEDITOR.replace('editor1');
        //bootstrap WYSIHTML5 - text editor
        $(".textarea").wysihtml5();
    });
    $('.select').select2({
        width: "100%",
        placeholder: "Select",
        maximumSelectionSize: 1,
        allowClear: true,
        tags: true,
    });
    
    $("#filter").select2({
    width: "130px",
    placeholder: "Subjects",
    allowClear: true
});




    $(document).ready(function () {
        $('#example2').DataTable( {
            search: {
                return: true,
            },
            dom: 'Bfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ],

        } );
    });
    


</script>
<script>

       var boxalert = document.getElementById('alert');
        
        var seconds = 3;
        var Timer = setInterval(function(){
          if(seconds <= 0){
            clearInterval(Timer);
            boxalert.style.display='none';
          }
          seconds -= 1;
        }, 1000);

 var cpassword = document.querySelectorAll(".cPass");
 var npassword = document.querySelectorAll(".nPass");
 var rpassword = document.querySelectorAll(".rPass");
 
 
        function cPass() {
            var i;
            for (i = 0; i < cpassword.length; i++){
            const type = cpassword[i].getAttribute('type') === 'password' ? 'text' : 'password';
            console.log(cpassword[i]);
            cpassword[i].setAttribute('type', type);
            }
        }
        function nPass() {
            const type = npassword.getAttribute('type') === 'password' ? 'text' : 'password';
            npassword.setAttribute('type', type);
            this.classList.toggle('bi-eye');
        }
        function rPass(){
            const type = rpassword.getAttribute('type') === 'password' ? 'text' : 'password';
            rpassword.setAttribute('type', type);
            this.classList.toggle('bi-eye');
        }
        
</script>


<script type="text/javascript">
    //    var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
    //    (function(){
    //        var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
    //        s1.async=true;
    //        s1.src='https://embed.tawk.to/5abe3b2c4b401e45400e3575/default';
    //        s1.charset='UTF-8';
    //        s1.setAttribute('crossorigin','*');
    //        s0.parentNode.insertBefore(s1,s0);
    //    })();
    
</script>
<!-- /.content-wrapper -->
<footer class="main-footer">
    <div class="pull-right hidden-xs">

    </div>
    <strong>
      <!--  Copyright  <a href=" "> <?=($title);?>  </a> © <?=date('Y');?>   All Rights Reserved </strong> -->
</footer>



</body>
</html>

