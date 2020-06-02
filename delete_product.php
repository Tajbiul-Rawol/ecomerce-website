<?php include_once "Library_Functions/db.php"; ?>



<?php 



 if (isset($_GET['id'])) {
   echo $id_url = $_GET['id'];
 }

 $sql = "DELETE FROM products WHERE id = '$id_url' ";
 $connection -> query($sql);   

 header('location:Productslist.php');




 ?>