
<?php
  include 'db_con.php';
  if (!isset($_SESSION["login_id"])) {
    header("location:login.php");

 if(isset($_GET['id'])) {
    $id=$_GET['id'];

  
    $sql="DELETE FROM user WHERE id=$id";
    $res=mysqli_query($conn,$sql);
    header("location:index.php");
  }
}


?>