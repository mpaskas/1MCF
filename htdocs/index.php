<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title> Mcf </title>
<!--     <meta name="viewport" content="width=device-width, initial-scale=1">-->

     
   
      <link href="bootcss/bootstrap.css" rel="stylesheet" type="text/css" />
      <link href="Css/stil.css" rel="stylesheet" type="text/css" />
     <script src="js/vreme.js" type="text/javascript"></script>
      <script src="js/jquery-3.1.1.js" type="text/javascript"></script>
      <script src="js/bootstrap.min.js" type="text/javascript"></script>
       <script src="js/jquery-ui.js" type="text/javascript"></script>
         <link rel="stylesheet" href="jquery-ui-1.12.1.custom/jquery-ui.theme.css">
         <link rel="stylesheet" href="jquery-ui-1.12.1.custom/jquery-ui.structure.css">
          
      
      
</head>
<body onload="startTime()">
  <?php include "conDB.php";?>
  
  
  <?php 
          if (!isset ($_GET['grupa'])){
              $strana="review";
          }else{
          $strana=$_GET['grupa'];}
          include "{$strana}.php";
          ?>
   
   <div class="footer">
	   <?php echo date('d.m.Y')."  ";?><span id="vreme"></span>
   </div>
   <script src="js/funkcije.js" type="text/javascript"></script>
    
</body>
</html>