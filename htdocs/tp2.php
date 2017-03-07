 <div class="tp2">

   </div>
   
   <div class="content">
      <div class="navi">
         <div class="rez">
            <div class="nas">Rezervacije:</div>
             <?php 
             $rezervacije= "SELECT rezervacija.brrezervacije, tipovi.skraceno,rezervacija.kolicina FROM rezervacija INNER JOIN tipovi ON rezervacija.tip = tipovi.Id WHERE rezervacija.stanje=1 order by tipovi.skraceno,rezervacija.brrezervacije";
             $g = mysqli_query($con,$rezervacije);
            
             while($r = mysqli_fetch_row ($g)){
                 echo "<div class='gornji'><a id='s' ref='./?grupa=tp2&rez={$r[0]}&tip={$r[1]}&inc=FillJob&size={$r[2]}'>{$r[0]} {$r[1]} {$r[2]}</a></div>";
             }
             
             ?>
         </div>
         <div class="rez">
           <div class="nas">Poslovi:</div>
           
            <?php
             $poslovi="SELECT DISTINCT posao.brposla, posao.hitan, tipovi.skraceno,posao.kolicina ,rezervacija.stanje
			 FROM posao INNER JOIN veza ON veza.brp = posao.id INNER JOIN rezervacija ON veza.brr = rezervacija.brrezervacije INNER JOIN tipovi ON rezervacija.tip = tipovi.Id 
			 WHERE rezervacija.stanje in (2,3,6) order by tipovi.skraceno";
                 $g = mysqli_query($con,$poslovi);
            
             while($r = mysqli_fetch_row ($g)){
                 echo "<div> <a";
                 if($r[4]=6){echo " style='color:red;'";}
                 echo  " id='s' ref='./?grupa=tp2&pos={$r[0]}&inc=mcf' >{$r[1]}{$r[2]}".sprintf('%05d',$r[3])."_{$r[0]}</a></div>";
             }
             //\"javascript:delay('./?grupa=tp2&pos={$r[0]}&inc=mcf')\"
                 
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
   