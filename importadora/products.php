<?php
include 'connection.php';
$sql = "SELECT * FROM productos"; 
$result = mysqli_query($con, $sql)or die(mysqli_error($con));
if(count($_FILES) > 0) {
  if(is_uploaded_file($_FILES['image']['tmp_name'])) {
  $name=$_FILES['image']['name'];
  $mime=$_FILES['image']['type'];
  //$imageProperties = getimageSize($_FILES['image']['tmp_name']);
  $image_name=$_POST["image_name"];
  $categoria=$_POST["categoria"];
  $descripcion=$_POST["descripcion"];
  $cantidad= $_POST["cantidad"];
  $data =addslashes(file_get_contents($_FILES['image']['tmp_name']));
  $sql = "INSERT INTO productos(nombreProducto,categoria,descripcion,cantidad,imagen)
  VALUES( '$image_name','$categoria','$descripcion','$cantidad','{$data}')";
  $current_id = mysqli_query($con, $sql) or die("<b>Error:</b> Problem on Image Insert<br/>" . mysqli_error($con));
  if(isset($current_id)) {
  header("Location: products.php");
  }
  }}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Productos</title>
    <style>
    .container{
        display: none;
    }
    
    </style>
</head>
<body>
<button   type="button" class="btn btn-success" id="btn1"   onclick="myFunction()">Añadir</button>
<div class="container" id="container" >
  <form name="frmImage" enctype="multipart/form-data" action="" method="post">
    <h2>Gestión de productos</h2>
    <div class="row">
      <div class="col-md-6">
        <div class="form-group">
          <label for="first">Nombre del producto:</label>
          <input type="text" class="form-control" placeholder="Nombre del medicamento" id="first" name="image_name" required>
        </div>
      </div>
      <!--  col-md-6   -->

      <div class="col-md-6">
        <div class="form-group">
          <label for="last">Categoría</label>
          <select id="last"  name="categoria" class="form-control">
        <option selected>Choose...</option>
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

          <input type="text" class="form-control" placeholder="Introduza la descripción" id="first" name="descripcion" required>
        </div>

      </div>
      <!--  col-md-6   -->
      <div class="col-md-6">
      <label for="first">Cantidad:</label>
          <input type="text" class="form-control" placeholder="Introduzca la cantidad" id="first" name="cantidad" required>

      </div>
      <!--  col-md-6   -->
    </div>
    <!--  row   -->
    <div class="row">
    
      <div class="col-md-6">
      </br>
        <div class="form-group">
           
        <div class="custom-file">
    <input type="file" class="custom-file-input" id="customFile"name="image"required  >
    <label class="custom-file-label" for="customFile">Subir imagén</label>
  </div>
        </div>
      </div>
      <!--  col-md-6   -->
    
    </div>
    <!--  row   -->
    <input type="submit" value="Guardar" class="btn btn-primary" />
  </form>
</div>
</br>
<div class="table-responsive">
  <table class="table">
  <thead>
<tr>
                <th>ID</th>
                <th>NOMBRE</th>
                <th>CATEGORÍA</th>
                <th>DESCRIPCIÓN</th>
                <th>CANTIDAD</th>
                <th>IMAGEN</th>
      
    <th colspan=3 >ACCIONES</th>
</tr>
</thead>
<tbody>  

<?php
 while($row = mysqli_fetch_array($result))
       {
           echo "<tr>";
           echo "<td>".$row['0']."</td>";
           echo "<td>".$row['1']."</td>";
           echo "<td>".$row['2']."</td>";
           echo "<td>".$row['3']."</td>";
           echo "<td>".$row['4']."</td>";
           echo "<td>".'<img width="100px" height="100px"  src="data:image/jpg;base64,'.base64_encode($row['5'] ).'"/>'."</td>";
           echo "<td><a href='editImage.php?id=".$row['id']."'>Cambiar imagen</a></td>";
           echo "<td><a href='editProduct.php?id=".$row['id']."'>Editar datos</a></td>";
           echo "<td><a href='deleteProduct.php?id=".$row['id']."'>Eliminar</a></td>";
           echo "</tr>";
       }
   ?>


</tbody>
  </table>
</div>

    <script src="jquery/jquery-3.3.1.min.js"></script>
    <script src="popper/popper.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript"> 
       function myFunction() {
    var x = document.getElementById("container");
    var btn1= document.getElementById("btn1");
    if (x.style.display === "block") {
        x.style.display = "none";
        btn1.innerText="Añadir";
   btn1.className += "btn btn-success";
    } else {
        x.style.display = "block";
   btn1.className += "btn btn-danger";
   btn1.innerText="X";
    }
}
    </script> 
</body>
</html>

