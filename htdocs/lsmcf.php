<div>
      <div class="dva">
         
         <?php
          include "zaposleni.php";
          $x=$_GET['pos'];
 
          $poss="SELECT posao.hitan,tipovi.skraceno,posao.kolicina,posao.brposla,rezervacija.brrezervacije, posao.id, rezervacija.kolicina FROM posao INNER JOIN veza ON veza.brp = posao.id INNER JOIN rezervacija ON veza.brr = rezervacija.brrezervacije INNER JOIN tipovi ON rezervacija.tip = tipovi.Id WHERE posao.brposla = '{$x}'";
          
          $r= mysqli_query($con,$poss);
          $g= mysqli_fetch_row($r);
          
          echo "<h1 id='posaobr'>{$g[0]}{$g[1]}".sprintf('%05d',$g[2])."_{$g[3]}</h1>";
          $o=$g[5];
          $v=$g[3];
              echo "<div class='rezMcf'>
			  <p class='p'>Rezervacija</p>
			  <p class='pre' >".sprintf('%09d',$g[4])."</p>" ;
          while ($e=mysqli_fetch_row($r)){
              echo "<p class='pre'>".sprintf('%09d',$e[4])."</p>";
          }
              echo "</div>";
         
              ?>
              
      </div>
      <div class="dva donji">
           <div class="tabela">
               
           <?php
				   
		$tp2="SELECT posao.dobrih,posao.zin,posao.zincip,posao.remake,posao.neproiz FROM posao where id= {$o}";
		$tp2q= mysqli_query($con,$tp2);
		$t2= mysqli_fetch_row($tp2q);
				   
                   
        ?>
            <form id="forma" action="lsmcfupis.php" method="post">
               
               <input type="hidden" name="brposla" value="<?php echo $o; ?>">
<!--               <input type="hidden" name="posla" value="<?php echo $v; ?>">-->
               
		 <?php $ls="select lzapospri,lzaposzav from letersop   where posaoid= '{$o}' order by id desc";
		if($lsq=mysqli_query($con,$ls)){
		  $l2= mysqli_fetch_row($lsq);
		  $operater=$l2[0];
		  $admin=$l2[1];}
		  ?>
          </div>
                           
		  <div class="ukup lsdiv"><label for="tdobrih">Dobrih</label> <div name="tdobrih"><?php echo $t2[0];?></div></div>
		  <div class="ukup lsdiv"><label for="tzin">ZIN</label>	  <div name="tzin" ><?php echo $t2[1];?></div></div>
		  <div class="ukup lsdiv"><label for="tzin">ZIN čip</label>	<div name="tzincip"><?php echo $t2[2];?></div></div>
		  <div class="ukup lsdiv"><label for="tzin">Remake</label>	<div name="tremake"  ><?php echo $t2[3];?></div></div>
		  <div class="ukup"><label for="tzin">Neproizvodljivih</label><div name="tneproiz"><?php echo $t2[4];?></div></div>

			   
     <?php
     if(isset($operater)){zaposleni($con,$operater,4);}else{novi($con,4);}
     
   echo  "<button class='btn btne' type='submit' value='start'";
     if($operater>0){ echo "disabled";}
     ?>
     >Prihvati</button>
      </form>
      <hr style="border-width:2px; margin:1px; border-color:gray;">
      <hr style="border-width:1px; margin:1px; border-color:gray;">
       
        <form action="lsmcfrem.php" method="post" >
         <input type="hidden" name="brposla" value="<?php echo $o; ?>">
         <input type="text" name="rem" value=0>
           <?php if(isset($admin)){zaposleni($con,$admin,5);}else{novi($con,5);} ?>
    <button class="btn btne" type="submit" value="start" >Završi</button>
          </form>
      </div>
      
      
       
   </div>
