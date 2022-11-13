<!doctype html>
<html lang="en">
<?php
session_start();
include "db_con.php";


if (!isset($_SESSION["login_id"])) {
  header("location:login.php");
}


if (isset($_GET['id'])) {
$id=$_GET['id'];



$sql="SELECT * FROM user where id=$id";
$result=mysqli_query($conn,$sql);
while($row = mysqli_fetch_assoc($result)){



?>
<head>
  <title>Update</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <script src="jquery.js"></script>
  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

</head>

<style>
.col-md-4.offset-md-4.cont {
    margin-top: 192px;
}
</style>
<body class="bg-primary">
  <header>
    <!-- place navbar here -->
  </header>
  <main>
<div class="container">
<div class="row">
    
    <div class="col-md-4 offset-md-4 cont">

     
      <h2 class="text-center text-light">UPDATE USERS DETAILS</h2>
      <div class="border border-primary p-3 align-middle">
      <div id="msg"></div>
        <form id="login-form">
            <div class="mb-3">
              
              <input type="text"
                class="form-control" name="emp_id" id="emp_id" aria-describedby="helpId" value="<?php echo $row['id'];  ?>" readonly>
            </div>
            <div class="mb-3">
              
              <input type="text"
                class="form-control" name="name" id="name" aria-describedby="helpId" value="<?php echo $row['name'];?>">
            </div>
                <div class="mb-3">
                <input type="email"
                class="form-control" name="email" id="email" aria-describedby="helpId" value="<?php echo $row['email'];?>">
              </div>
                <input type="submit" class="btn btn-outline-warning w-100" name="update" value="UPDATE">

              <?php 
            
            
            } 
            
        }
            ?>
        </form>
      </div>
    </div>
</div>
</div>


  </main>
  <footer>
    
  <script>

$('#login-form').submit(function(e){
        e.preventDefault();
        $.ajax({
            url:'ajax.php?action=update',
            method:'POST',
      type:'POST',
            data:$(this).serialize(),

            success:function(resp){
        if(resp == 1){

          $('#msg').html("<h4>Sucessfully updated.</h4>");
        location.replace("index.php")

                }else{
                    $('#msg').html("<h4>Not Updated</h4>");

        }
            }
    });

        });
  </script>
  </footer>
  <!-- Bootstrap JavaScript Libraries -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
    integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">

    </script>

</body>

</html>         