<?php  
session_start();

$_SESSION['dniverificado']=0;




echo "<script>
        window.location= 'index.html'
        alert('Desconectado!');
      </script>";
?>

