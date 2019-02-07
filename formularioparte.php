<html>
    <link rel="stylesheet" type="text/css" href="estilos.css" />
    <link href="https://fonts.googleapis.com/css?family=Raleway|Abril+Fatface" rel="stylesheet">
    <meta charset="utf-8" />
	<meta name="description" content="INPRL" />
    <head>
    
    <title>INPRL</title>
  <style>
      body{
          background-color:#06827C;
      }
         form{
         margin: 0 auto;
         width:45%;
         margin-bottom: 20px;
         padding: 10px 20px;
         border-radius: 7px;
         background-color:D1EEEB;
         box-sizing:border-box;
         margin-top:10px;
         text-align: center;
              
        }
        input,textarea,select{
         width: 100%;
         margin-bottom: 20px;
         padding: 7px;
         box-sizing:border-box;
         font-size: 17px;
         border: none;
         margin-top: 20px;
       
        }

        form p{
         color:#06827C;
         font-size: 40px;
         margin-bottom: 20px;
         
         font-family: 'Raleway';
        }
      form h3{
         color:#06827C;
         font-size: 16px;
         margin-bottom:5px;
         
         font-family: 'Raleway';
          text-align:center;
      }
      form h1{
          color:#06827C;
         font-size: 19px;
         margin-bottom:10px;
       
         font-family: 'Raleway';
          text-align:left; 
      }
        textarea{
         max-height: 200px;
         min-height:100px;
         max-width: 100%;
        }
       

        @media (max-width:480px){

          form{
           width:100%;
              height:100%;
         } 

        }
      .menuContainer {
            
        }
        
        .menu {
            margin:center;
            width:100%;
            font-family:'Raleway';
           
            
        }
        ul{
            list-style:none;
        }
        .nav li a {
            background-color:#06827C;
            color:white;
            text-decoration:none;
            padding: 10px 15px;
            display:block;
           
            
        }
        .nav li a:hover{ 
            background-color:darkgrey;
            
        }
      
      
     label{
         color:#06827C;
         font-size: 16px;
         margin-bottom:5px;
         font-family: 'Raleway';
         text-align:left;
      }
       .formulario{
            width: 100%;
	        margin: auto;
	        padding: 0px 0 80px 0;
           	height: 100%; 	
            border: 0; 
            background-color:#06827C; 
            font-family:'Raleway'; 
            font-size:30px; 
            color:white;
       
       
        </style>
   
    </head>
    
    <?php
    session_start();
    $dniverif=$_SESSION['dniverificado'];
    if($dniverif==0){
        echo "<script>
         window.location= 'index.html'
        alert('Registrese con un usuario valido');
         </script>";
        
    }
    ?>
    
    <body>
        <div class="menuContainer">
            <div class="menu">
                <ul class="nav">
                    <li> <a href="index.html">Volver a El INPRL</a></li>
                </ul>
            </div>
        </div>
       <div class="formulario">
        <form id="accidentes" action="registro.php" method="POST" >
           <p>Formulario de partes de accidente</p>
                <label>DNI:</label>
                    <input type="text" name="DNI" size="15" maxlength="30" placeholder="DNI" required value="<?php echo $dniverif ?>" readonly="readonly">
                    <label>Fecha del accidente:</label>
                    <input type="date" name="Fecha_accidente" size="15" maxlength="30" placeholder="Fecha del accidente" required>
                    <label>Hora del accidente:</label>
                    <input type="time" name="Hora_accidente" size="15" maxlength="30" placeholder="Hora del accidente" required>
                    <input type="text" name="Causa_accidente" size="15" maxlength="30" placeholder="Causa del accidente" required>
                    <input type="text" name="Tipo_lesion" size="15" maxlength="30" placeholder="Tipo de lesión" required>
                    <input type="text" name="Partes_cuerpo_lesionado" size="15" maxlength="30" placeholder="Partes del cuerpo lesionadas" required>
            
           

                    <h1>Gravedad: </h1>
                    <h3>
                        Baja <input type="radio" name="Gravedad" value="Baja" checked> <br>
                        Normal<input type="radio" name="Gravedad" value="Normal"> <br>
                        Alta<input type="radio" name="Gravedad" value="Alta"> </h3>
                    <h1>Baja: </h1>
                    <h3>
                        Sí <input type="radio" name="Baja" value="Si"> <br>
                        No<input type="radio" name="Baja" value="No" checked> <br>
                    </h3>
                    <input type="submit" name="submit" value="Guardar parte" />
       
       </form>
        </div>
            <?php
                if(isset($_POST['submit'])){
                require ("registro.php");
                }
        
            ?>
      

</body>
    
</html>