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

$image_name=$_POST["image_name"]; 

$name=$_FILES['image']['name'];

$id=$_POST['id'];
$data =addslashes(file_get_contents($_FILES['image']['tmp_name']));

$categoria=$_POST["categoria"];
  $descripcion=$_POST["descripcion"];
  $cantidad= $_POST["cantidad"];
$sql1="UPDATE productos SET nombreProducto='{$image_name}',categoria='{$categoria}',descripcion='{$descripcion}',cantidad='{$cantidad}' WHERE id='{$_POST['id']}'";
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
  <h2>Gestión de productos</h2>
    <div class="row">
      <div class="col-md-6">
        <div class="form-group">
          <label for="first">Nombre del producto:</label>
          <input type="text" class="form-control" placeholder="Nombre del medicamento" id="first"  value="<?php echo $record['1'] ;?>"  name="image_name" required>
        </div>
      </div>
      <!--  col-md-6   -->

      <div class="col-md-6">
        <div class="form-group">
          <label for="last">Categoría</label>
          <select id="last"  name="categoria"   class="form-control">
      
        <option>Ropa</option>
        <option>Manillas</option>
        <option>Varios</option>
      </select>
        </div>
      </div>
      <!--  col-md-6   -->
    </div>
    <div class="row">
      <div class="col-md-6">
        <div class="form-group">
          <label for="company">Descripción:</label>

          <input type="text" class="form-control"  value="<?php echo $record['3'] ;?>" placeholder="Introduza la descripción" id="first" name="descripcion" required>
        </div>

      </div>
      <!--  col-md-6   -->
      <div class="col-md-6">
      <label for="first">Cantidad:</label>
          <input type="text" class="form-control" placeholder="Introduzca la cantidad"  value="<?php echo $record['4'] ;?>" id="first" name="cantidad" required>

      </div>
      <!--  col-md-6   -->
    </div>
    <!--  row   -->
    <div class="row">
    
      <div class="col-md-6">
      </br>
  
    <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>"/>
    <input type="submit" value="Guardar" class="btn btn-primary" name="submit" />
  


   

   
  </form>
  <footer class="page-footer font-small blue fixed-bottom">


<div class="footer-copyright text-center py-3">© 2020 Copyright:
  <a target="_blank" href="https://www.facebook.com/CodigoFacilModerno"> Código Fácil</a>
</div>


</footer>
  <script src="jquery/jquery-3.3.1.min.js"></script>
    <script src="popper/popper.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
</body>
</html>