<div class="footer">
<table>
    <tr width="100%">
        <td class="flogo" align="right"><img src="img/cct-icon.png" ><img src="img/scs-final.png"></td>
            <td >
                <ul class="fa-ul">
                
                    <li><a class="txt2" style="color:black; cursor: pointer;" href="https://www.facebook.com/citycollegeoftagaytay"><i class="fa-brands fa-facebook" aria-hidden="true"></i> &nbsp; City College of Tagaytay</a></li> 
                    <li><a class="txt2" style="color:black; "><i class="fa fa-envelope" aria-hidden="true"></i> &nbsp; info@citycollegeoftagaytay.edu.ph</a></li>
                    <li><a class="txt2" style="color:black;"> <i class="fa-solid fa-phone"></i>&nbsp; (046) 483-047</a></li>
                    <li><a class="txt2" style="color:black; cursor: pointer;" href="https://www.citycollegeoftagaytay.edu.ph/?fbclid=IwAR0fP32Zs55V0O3dt_xSgF6pWaDi6UPqtXxbKYwMvuNZ0Vorr2voKsevTsc"><i class="fa-solid fa-link"></i> &nbsp; citycollegeoftagaytay.edu.ph</a></li>
                  </ul>
            </td>
    </tr>        
</table>
</div>

<!--Bottom Bar-->
<footer class="footer" >
    <center><p style="color:white">Copyright &copy;<script>document.write(new Date().getFullYear());</script> City College of Tagaytay All Rights Reserved.</p></center>
</footer>

<!--===============================================================================================-->
<script src="front/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
<script src="front/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
<script src="front/vendor/bootstrap/js/popper.js"></script>
<script src="front/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
<script src="front/js/main.js"></script>

 <!-- CopyToClipboard -->
 <script>
$('.copy').tooltip({
  trigger: 'click',
  placement: 'bottom'
});

function setTooltip(btn, message) {
  btn.tooltip('hide')
    .attr('data-original-title', message)
    .tooltip('show');
}

function hideTooltip(btn) {
  setTimeout(function() {
    btn.tooltip('hide');
  }, 1000);
}

var clipboard = new ClipboardJS('.copy');

clipboard.on('success', function(e) {
    var btn = $(e.trigger);
  setTooltip(btn, 'Copied to clipboard');
  hideTooltip(btn);
});
    


</script>
