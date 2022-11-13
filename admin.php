<?php
   session_start();
class Action{
    private $db;

    function __construct()
    {
        include "db_con.php";
        $this->db = $conn;
    }
    function __destruct()
    {
        $this->db->close();
    }
    function login(){
		extract($_POST);
			$qry = $this->db->query("SELECT * FROM users where email = '".$email."' and password = '".$password."' ");
		if($qry->num_rows > 0){
            if ($res=$qry->fetch_assoc()) {
             
                $_SESSION['login_id']=$res['id'];

            }
			
           
				return 1;
		}else{
			return 3;
		}
	}
    function logout(){
        session_destroy();
        
            unset($_SESSION['login_id']);
        
        header("location:login.php");
    }
    function upload(){
      $file=$_FILES['pp']['tmp_name'];
	
	$ext=pathinfo($_FILES['pp']['name'],PATHINFO_EXTENSION);
	if($ext=='csv'){
		require('PHPExcel/PHPExcel.php');
		require('PHPExcel/PHPExcel/IOFactory.php');
		
		
		$obj=PHPExcel_IOFactory::load($file);
		foreach($obj->getWorksheetIterator() as $sheet){
			$getHighestRow=$sheet->getHighestRow();
			for($i=0;$i<=$getHighestRow;$i++){
				$name=$sheet->getCellByColumnAndRow(0,$i)->getValue();
				$email=$sheet->getCellByColumnAndRow(1,$i)->getValue();
				if($name!=''){
					mysqli_query($this->db,"insert into user(name,email) values('$name','$email')");

				}
			}
		}
	}else{
		echo  "1";
	}
        
    }
    function export(){


        


         
    header('Content-Type: text/csv; charset=utf-8');  
    header('Content-Disposition: attachment; filename=data.csv');  
    $output = fopen("php://output", "w");  
   
    fputcsv($output, array('ID', 'First Name','Email'));  
    $query = "SELECT * from user";  
    $result = mysqli_query($this->db, $query);  
    while($row = mysqli_fetch_assoc($result))  
    {  
         fputcsv($output, $row);  
    }  
    fclose($output);  
    

    }

 
function update(){
    extract($_POST);
    $qry = $this->db->query("UPDATE `user` SET `name`='$name',`email`='$email' WHERE id='$emp_id'");
echo 1;

}
 function truncate(){

    $qry = $this->db->query("TRUNCATE TABLE user");
    if ($qry) {
        return 1;
        # code...
    }

 }
 function insert(){

    extract($_POST);
    $qry = $this->db->query("INSERT INTO `user`(`name`, `email`) VALUES ('$name','$email')");
if ($qry) {

    echo 1;
    # code...
}
 }
    }

