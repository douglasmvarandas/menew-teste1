<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="sweetalert2.all.min.js"></script>
<script src="sweetalert2.min.js"></script>
<link rel="stylesheet" href="sweetalert2.min.css">
<?php
function alerta($type, $title){
      echo 
      "<script type='text/javascript'>
      Swal.fire({
        icon: '$type',
        title: '$title',
        showConfirmButton: false,
        timer: 1500
      });
      </script>";
    }
  ?>