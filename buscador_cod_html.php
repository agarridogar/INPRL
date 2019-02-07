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
         width:20%;
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
         margin-top: 20px;
         padding: 7px;
         box-sizing:border-box;
         font-size: 17px;
         border: none;
        }

        form p{
         color:#06827C;
         font-size: 40px;
         margin-bottom: 20px;
         /*display:inline-block;*/
         font-family: 'Raleway';
        }
      form h3{
         color:#06827C;
         font-size: 16px;
         margin-bottom:5px;
         /*display:inline-block;*/
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
            margin-top:0px;
           
            
        }
        .nav li a:hover{ 
            background-color:darkgray;
            
        }
      
            .formulario{
            width: 100%;
	        margin: auto;
	        padding: 180px 0 80px 0;
           	height: 100%; 	
            border: 0; 
            background-color:#06827C; 
            font-family:'Raleway'; 
            font-size:30px; 
            color:white;
            
            
        }
       label{
         color:#06827C;
         font-size: 16px;
         margin-bottom:5px;
         font-family: 'Raleway';
         text-align:left;
      }
       
       
       
       
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
            <form id="buscador" action="form_mod_borr.php" method="post">
                <label>Código identificador del accidente:</label>
                <input type="text" name="codparte" id="busqueda"/>
                <input type="submit" name="submit" value="Buscar"/>
            </form>
        </div>
     
        
       
        
            
        
</body>
    
</html>