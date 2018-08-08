<?php

 $connect = mysqli_connect("localhost", "root", "", "s5714421001"); 


    

  $sql = "UPDATE orders SET status ='".$_GET["select"]."' WHERE id = '".$_GET["txtCustomerID"]."'";
      if(mysqli_query($connect, $sql))  
      {  
          echo("<script> alert('อัปเดทสถานะเรียบร้อย'); window.location='admin_order.php';</script>");
        
      }  

      ?>


