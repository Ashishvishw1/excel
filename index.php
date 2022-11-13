<!doctype html>
<html lang="en">
<?php

include "db_con.php";
$sql="Select * from user";
$result=mysqli_query($conn,$sql);



?>
<head>
  <title>Title</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

</head>

<body style="background-color:green ;">
  <header>
  <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-3 mx-3">
  <a name="" id="" class="btn btn-dark btn-sm" href="ajax.php?action=logout" role="button">Logout</a></div>
</div>
  
  </header>
  <main>
<div class="container">
    <div class="row">
        <div class="col-md-4 offset-md-4 mt-4">
            <div class="border border-primary p-3">
              <div id="msg" class="text-danger"></div>
            <form id="file-upload">
                <div class="mb-3">
                  <label for="" class="form-label">Upload your CSV/XLXS file:</label>
                  <input type="file"
                    class="form-control" name="pp" id="files" aria-describedby="helpId" placeholder="Upload" required>
                    <div class="mt-3">
                    
                    <input name="submit" id="submit" class="btn btn-primary w-100" type="submit" value="Import" >
                  
                      
                 
                </div>

            </form>
            <div class="mt-3">
            <a name="" id="download" class="btn btn-dark w-100" href="ajax.php?action=export" role="button">Download</a></div> 
           
        </div>
        <div class="mt-3">
           <button id="clear" class="btn btn-dark">Clear-Data</button><span> <a name="" id="" class="btn btn-dark w-50" href="insert.php" role="button">Insert</a></div> </span>
           
        </div>
    </div>
    
</div>
</div>
<section class="mt-5">
    <!-- this is table -->
    <div class="row">

    <?php
    

    if (mysqli_num_rows($result) > 0) {


         
           echo "<div class='table-responsive'><table id='myTable' class='table table-striped table-bordered table-warning'>
                   <thead><tr><th>EMP ID</th>
                                <th>First Name</th>
                                <th>Email</th>
                                <th>Delete</th>
                                <th>Update</th>
                                
                              </tr></thead><tbody>";
           while($row = mysqli_fetch_assoc($result)) {
               echo '<tr>
               <td>' . $row['id'].'</td>
                         <td>' . $row['name'].'</td>
                         <td>' . $row['email'].'</td>
                         
                         <td><a class="btn btn-primary btn-sm" href="delete.php?id='.$row['id'].'" role="button">Delete</a></td>
                         <td><a  class="btn btn-success btn-sm" href="update.php?id='.$row['id'].'" role="button">Update</a></td>

                        </tr>';        
           }
          
           echo "</tbody></table></div>";
           
      } else {
           echo "No Records Found..";
      }
       ?>
       
     
    </div>
</section>
  </main>
  <footer>
    <script src="jquery.js"></script>
   <script>




$('#file-upload').submit(function(e){
  e.preventDefault();
$.ajax({
			url:"ajax.php?action=upload",
			data: new FormData($(this)[0]),
		    cache: false,
		    contentType: false,
		    processData: false,
		    method: 'POST',
		    type: 'POST',
			success:function(resp){
      
if (resp==1) {

  $('#msg').html("Invalid file");
}
else{

  $('#msg').html("File Imported sucessfully");
  location.replace("index.php")

}
}



			
		})

	});


  $('#clear').click(function(e){

    
    $.ajax({
			url:"ajax.php?action=truncate",
			
		    cache: false,
		    contentType: false,
		    processData: false,
		    method: 'POST',
		    type: 'POST',
			success:function(resp){
        if (resp==1) {
          
          $('#msg').html("Table cleared Sucessfull");
            
        }
        else{

          location.replace("index.php")
        }

      }

    })
  })







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