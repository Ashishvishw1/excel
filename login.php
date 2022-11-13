<!doctype html>
<html lang="en">
<?php
session_start();
include "db_con.php";


?>
<head>
  <title>Login</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <script src="jquery.js"></script>
  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

</head>
<?php 

if (isset($_SESSION["login_id"])) {
  header("location:index.php");
}

?>
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

         
          <h2 class="text-center">Login</h2>
          <div class="border border-primary p-3 align-middle">
          <div id="msg"></div>
            <form action="function.php" id="login-form">
                <div class="mb-3">
                  
                  <input type="email"
                    class="form-control" name="email" id="email" aria-describedby="helpId" placeholder="Enter your Email" required>
                </div>
                    <div class="mb-3">
                    <input type="password"
                    class="form-control" name="password" id="password" aria-describedby="helpId" placeholder="Enter your Password" required>
                  </div>
                    <input type="submit" class="btn btn-outline-warning w-100" value="login">

                  
                
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
  			url:'ajax.php?action=login',
  			method:'POST',
        type:'POST',
  			data:$(this).serialize(),
  
  			success:function(resp){
          if(resp == 1){
  
            $('#msg').html("<h4>Sucess.</h4>");
  		location.replace("index.php")
  
  				}else{
  					$('#msg').html("<h4>Invalid credintials.</h4>");
  
          }
  			}
      });
  
  		});
    </script>
    <!-- place footer here -->
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