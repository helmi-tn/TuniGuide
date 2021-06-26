<html>
<head>

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script></head>

<body>
<?php
 
  
    echo'
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <script>
    swal({
      title: "Are you sure?",
      text: "Once deleted, you will loose your account Tuniguide",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    })
    .then((willDelete) => {
      if (willDelete) {

        swal("Poof! Your account has been deleted! see you again", {
          icon: "success",
        }).then(function() {
          window.location = "cofirmdelete.php";
        });
      } else {
        swal("Thanks for return").then(function() {
                        window.location = "edit.php";
                      });
      }
    });</script>
      ';

?>
</body>
</html>