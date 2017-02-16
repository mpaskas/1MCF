<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title> Mcf </title>
      <link href="Css/stil.css" rel="stylesheet" type="text/css" />
      <script src="js/funkcije.js" type="text/javascript"></script>
</head>
<body>
  <?php include "conDB.php";?>
   <div class="header">
       
   </div>
   
   <div class="content">
      <div class="navi">
         <div class="rez">
             <?php 
             $rezervacije= "SELECT rezervacija.brrezervacije, tipovi.skraceno,rezervacija.kolicina FROM rezervacija INNER JOIN tipovi ON rezervacija.tip = tipovi.Id WHERE rezervacija.stanje=1";
             $g = mysqli_query($con,$rezervacije);
            
             while($r = mysqli_fetch_row ($g)){
                 echo "<div><a href='./?rez={$r[0]}&tip={$r[1]}&inc=FillJob.php'>{$r[0]} {$r[1]} {$r[2]}</a></div>";
             }
             
             ?>
         </div>
         <div class="rez">
            <?php
             $poslovi="SELECT DISTINCT posao.brposla, posao.hitan, tipovi.skraceno,posao.kolicina FROM posao INNER JOIN veza ON veza.brp = posao.id INNER JOIN rezervacija ON veza.brr = rezervacija.brrezervacije INNER JOIN tipovi ON rezervacija.tip = tipovi.Id WHERE rezervacija.stanje=2";
                 $g = mysqli_query($con,$poslovi);
            
             while($r = mysqli_fetch_row ($g)){
                 echo "<div> <a href='./?pos={$r[0]}&inc=mcf.php'>{$r[1]} {$r[2]} {$r[0]}</a></div>";
             }
             
                 
                 ?>
         </div>
          
      </div>
      <div class="obr">
         
         
         <?php 
          if (!isset ($_GET['inc'])){
              $strana="mcf.php";
          }else{
          $strana=$_GET['inc'];}
          include "{$strana}";
          ?>
          
      </div>
       
       
   </div>
   
   <div class="footer">
       
   </div>
   
    
</body>
</html>