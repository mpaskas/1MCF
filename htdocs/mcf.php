<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="Css/stil.css" rel="stylesheet" type="text/css" />
    <title>Main MCF</title>
</head>
<body>
   <div>
      <div class="dva">
         
         <?php
          $x=$_GET['pos'];
 
          $poss="SELECT posao.hitan,tipovi.skraceno,posao.kolicina,posao.brposla,rezervacija.brrezervacije FROM posao INNER JOIN veza ON veza.brp = posao.id INNER JOIN rezervacija ON veza.brr = rezervacija.brrezervacije INNER JOIN tipovi ON rezervacija.tip = tipovi.Id WHERE posao.brposla = '{$x}'";
          
          $r= mysqli_query($con,$poss);
          $g= mysqli_fetch_row($r);
          
          echo "<h1>{$g[0]}{$g[1]}".sprintf('%05d',$g[2])."_{$g[3]}</h1>";
          
              echo "<div class='rezMcf'><p class='p'>Rezervacija</p><p>".sprintf('%09d',$g[4])."</p> </div>";
              
              ?>
              
      </div>
      <div class="dva">
            <p >milan</p>
      </div>
       
   </div>
    
</body>
</html>