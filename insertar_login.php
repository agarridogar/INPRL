<?php
session_start();

$usuario=$_POST['usuario'];
$contr=$_POST['contraseña'];
//conexion a bd y consulta a la bd
$conexion=mysqli_connect("localhost", "root", "", "parteaccidente");
/*$conexion = mysqli_connect('sql203.260mb.net', 'n260m_21275877', 'Punkpunk', 'n260m_21275877_proyecto2_db') or die ("problemas al conectar");*/
$consulta="SELECT * FROM usuarios WHERE usuario='$usuario' and contrasinal='$contr'";
$resultado=mysqli_query($conexion, $consulta);
$holacons="SELECT nombre FROM trabajador where DNI='$usuario'";
$hola=mysqli_query($conexion, $holacons);

    $filas=mysqli_num_rows($resultado);

if($filas>0){
    $_SESSION['dniverificado']=$usuario;
      echo "<script>
                window.location= 'index.html'
                alert('Conectado!');
                 </script>";
    //header("location:index.html");
}else{
    $_SESSION['dniverificado']=0;
    echo "<script>
                window.location= 'form_login.php'
                alert('Error el usuario no existe o la contraseña es incorrecta');
                 </script>";
}
mysqli_free_result($resultado);
mysqli_close($conexion);
?>