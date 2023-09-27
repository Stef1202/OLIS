<div id="mySidenav" class="sidenav">
  <a href="sysdashboard.php"><i class="fa-solid fa-grip"></i> Dashboard</a>
  <a href="#"><i class="fa-solid fa-users"></i> Account Management</a>
  
  <a href="acatalogue.php" style="display: inline-block"><i class="fa-solid fa-book"></i> Catalogue</a>
  <button class="dropdown-btn" style="display: inline-block"><i class="fa-solid fa-caret-down"></i></button>
  
  <div class="dropdown-container" >
    <a href="#">Edit Books</a>
    <a href="#">Archived Books</a>
  </div>
  <a href="#"><i class="fa-solid fa-folder-open"></i> Borrow and Return</a>
  <a href="#"><i class="fa-solid fa-print"></i> Report Generation</a>
</div>

<script>
var dropdown = document.getElementsByClassName("dropdown-btn");
var i;

for (i = 0; i < dropdown.length; i++) {
  dropdown[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var dropdownContent = this.nextElementSibling;
    if (dropdownContent.style.display === "block") {
      dropdownContent.style.display = "none";
    } else {
      dropdownContent.style.display = "block";
    }
  });
}
</script>


<script>
        function sideNav() {
        document.getElementById("mySidenav").style.width = "250px";
        document.getElementById("con").style.marginLeft = "250px";
        }
        function toggleNav() {
            var element = document.getElementById("mySidenav");
            var main =document.getElementById("con");
            if (element.style.width == "250px") {
                element.style.width = "0px";
                main.style.marginLeft = "0px";
            } else {
                element.style.width = "250px";
                main.style.marginLeft = "250px";
            }
        }
        </script>

