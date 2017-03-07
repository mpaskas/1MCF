<div class="ls">

   </div>
   
   <div class="content">
      <div class="navi">
         
         <div class="rez">
           <div class="nas">Poslovi:</div>
            <?php
             $poslovi="SELECT DISTINCT posao.brposla, posao.hitan, tipovi.skraceno,posao.kolicina FROM posao INNER JOIN veza ON veza.brp = posao.id INNER JOIN rezervacija ON veza.brr = rezervacija.brrezervacije INNER JOIN tipovi ON rezervacija.tip = tipovi.Id WHERE rezervacija.stanje in (4,5)  and tipovi.skraceno in('ID','EL') order by tipovi.skraceno";
                 $g = mysqli_query($con,$poslovi);
            
             while($r = mysqli_fetch_row ($g)){
                 echo "<div> <a href='./?grupa=ls&pos={$r[0]}&inc=lsmcf'>{$r[1]}{$r[2]}".sprintf('%05d',$r[3])."_{$r[0]}</a></div>";
             }
             
                 
                 ?>
         </div>
          
      </div>
      <div class="obr">
         
         
         <?php 
          if (!isset ($_GET['inc'])){
              $strana="prva";
          }else{
          $strana=$_GET['inc'];}
          include "{$strana}.php";
          ?>
          
      </div>
       
       
   </div>
   