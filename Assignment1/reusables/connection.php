<?php 
$connect = mysqli_connect(
          'localhost', 'root', '',//Your password here, either root or empty
          'toronto_traffic_volumes' // your database name, check your PHP myAdmin
        );
        if(!$connect){
          echo 'Error Code: ' . mysqli_connect_errno();
          echo 'Error Message: ' . mysqli_connect_error();
          exit;
        }
        ?>