<?php
      
        include 'connection.php';
       
        if(!isset($_POST["submit"])){
          
            $sql="SELECT * FROM productos WHERE ID='{$_GET['id']}'";
            $result=mysqli_query($con, $sql);
            $record=  mysqli_fetch_array($result);
        }else{
 $sql2="SELECT * FROM productos WHERE ID='{$_POST['id']}'"; 
           $result2=mysqli_query($con, $sql2);
           $rec=  mysqli_fetch_array($result2);


$name=$_FILES['image']['name'];

$id=$_POST['id'];
$data =addslashes(file_get_contents($_FILES['image']['tmp_name']));

$sql1="UPDATE productos SET imagen='{$data}' WHERE id='{$_POST['id']}'";
mysqli_query($con, $sql1) or die(mysqli_error($con));
header('Location:products.php');
          
        }
 ?>

<!DOCTYPE html>
<html lang="en">
<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="style.css">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>


<div class="container">
  <form name="frmImage" enctype="multipart/form-data" action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
  <h2>Imagenes</h2>
  <?php    
   echo '<img class="img-thumbnail" src="data:image/jpeg;base64,'.base64_encode( $record['5'] ).'" />';

?>



  <div class="col-md-6">
      </br>
        <div class="form-group">
     
        
        <div class="custom-file">
    <input type="file" class="custom-file-input" name="image" value=""id="customFile" required  >
    <label class="custom-file-label" for="customFile">Añadir imagen</label>


  </div>


        </div>

      </div>
      </br>
  
    <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>"/>
    <input type="submit" value="Guardar" class="btn btn-primary" name="submit" />
  


   

   
  </form>

  <script src="jquery/jquery-3.3.1.min.js"></script>
    <script src="popper/popper.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
</body>
</html>