<?php
$con=mysqli_connect('localhost', 'root', '', 'importadora') or die("Failed to connect: ". mysqli_error($con));
?>
<?php 
class conexion{
    public function conectarPDO()
    {
    $ruta='mysql:host=localhost;dbname=importadora';
    $user='root';
    $pwd='';
    
    try{
    
    $pdo=new PDO($ruta,$user,$pwd);
    return $pdo;
    }
    catch (PDOException $e) {
        print "¡Error!: " . $e->getMessage() . "<br/>";
        die();
    }
    }
    
    }
