
   <div>
      <div class="dva">
         
         <?php
		  include "redovi.php";
          include "zaposleni.php";
          $x=$_GET['pos'];
 
          $poss="SELECT posao.hitan,tipovi.skraceno,posao.kolicina,posao.brposla,rezervacija.brrezervacije, posao.id, rezervacija.kolicina FROM posao INNER JOIN veza ON veza.brp = posao.id INNER JOIN rezervacija ON veza.brr = rezervacija.brrezervacije INNER JOIN tipovi ON rezervacija.tip = tipovi.Id WHERE posao.brposla = '{$x}'";
          
          $r= mysqli_query($con,$poss);
          $g= mysqli_fetch_row($r);
          
          echo "<h1 id='posaobr'>{$g[0]}{$g[1]}".sprintf('%05d',$g[2])."_{$g[3]}</h1>";
          $o=$g[5];
          $v=$g[3];
          $tipp=$g[1];
              echo "<div class='rezMcf'>
			  <p class='p'>Rezervacija</p>
			  <p class='pre' ><a href=' ./?grupa=tp2&rez={$g[4]}&tip={$g[1]}&inc=FillJob&size={$g[6]}'>".sprintf('%09d',$g[4])."</a></p>" ;
          while ($e=mysqli_fetch_row($r)){
              echo "<p class='pre'><a href=' ./?grupa=tp2&rez={$e[4]}&tip={$e[1]}&inc=FillJob&size={$e[6]}'>".sprintf('%09d',$e[4])."</a></p>";
          }
              echo "</div>";
         
              ?>

      </div>
      <div class="dva donji">
           <div class="tabela">
               <div class="labele nov">
               
                <p>Mašina</p>
               <p>Dobrih</p>
               <p>Loših</p>
               <p>Remake</p>
               </div>
               
               <form id="forma1" action="mcf1upis.php" method="post" autocomplete="off">
           <?php
        $sve ="SELECT masina.brmasine, masina.dobrih, masina.losih,kontrol.remake, posao.operater,posao.kontrola,posao.admin  FROM kontrol RIGHT OUTER JOIN posao ON kontrol.brpos = posao.id RIGHT OUTER JOIN masina ON masina.idposla = posao.id  WHERE posao.brposla = '{$x}' and masina.krug = kontrol.krug";
            $s=mysqli_query($con,$sve);
                   $y=1;
        if($s){       
               
            while($a=mysqli_fetch_row($s)){
                echo "<div class='labele'><p>{$y}</p> <p>";
//				if(isset ($a[0])){
					$es="select * from nmasine where id={$a[0]} ";
					$bs=mysqli_query($con,$es);
                $ba=mysqli_fetch_row($bs);
//					echo "<div name='masina".$y."'>{$ba[1]}</div>";
					echo "<select class='uiselect' name='masina".$y."' style='margin-left:0px; width: 50px; margin-bottom: 4px;' > 
					<option value='{$ba[0]}'>{$ba[1]}</option>";
                $es="select * from nmasine ";
                $bs=mysqli_query($con,$es);

					while ($ba=mysqli_fetch_row($bs)){
					echo "<option value={$ba[0]}>{$ba[1]}</option>" ;}
//				}
					
				
						
					echo	"</select>
						</p>
                 <p>".ako($a[1],'dobrih',$y) ."</p>
                    <p>".ako($a[2],'losih',$y) ."</p>
                    <p>".ako($a[3],'remake',$y) ."</p> 
                                         </div>";
//                <p><input type='text' name='masina".$y."' value='{$a[0]}'></p>
//                    <p><input type='text' name='dobrih".$y."' value='{$a[1]}'></p>
//                    <p><input type='text' name='losih".$y."' value='{$a[2]}'></p>
//                    <p><input type='text' name='remake".$y."' value='{$a[3]}'></p>
                
                  $operater=$a[4];
                $kontrola=$a[5];
//                $admin=$a[6];
                
                
                $y++;
            }
          
				   }
                  
            echo "<div class='labele'>
          <p> 
          <select name='masina".$y."' style='margin-left:0px; width: 50px; margin-bottom: 4px;'>
                <option value=''></option>";
					$es="select * from nmasine ";
					$bs=mysqli_query($con,$es);
					while ($ba=mysqli_fetch_row($bs)){
						echo "<option value={$ba[0]}>{$ba[1]}</option>" ;
								} 
			echo "</select></p>
			   <p><input type='text' name='dobrih".$y."'></p>
               <p><input type='text'  name='losih".$y."'></p>
               <p><input type='text'  name='remake".$y."'></p>
               </div>" ;
                   
//                    echo"<h1>".$a[4]."</h1>";
                   
        ?>
              
               
               <div class="labele nov">
            
               <?php 
				   if(isset($operater)){
				   echo zaposleni($con,$operater,1);
				   }else{
					   novi($con,1);
				   } 
				   ?>
				   
               <?php
				   if(isset($kontrola)){echo zaposleni($con,$kontrola,2);}else{novi($con,2);}
				   ?>

               
               </div>
               <input type="hidden" name="brposla" value="<?php echo $o; ?>">
              <input type="hidden" name="posla" value="<?php echo $v; ?>">
              <input type="hidden" name="adr" id="adr" >
              <input type="hidden" name="brojac" value="<?php echo $y; ?>">
              
<!--	<div class="labele"> <button id="submit1" class="btn btne" type="submit" value="start">Snimi</button></div>-->
				   
			   </form>

          </div>
          <hr style="border-width:2px; margin:1px; border-color:gray;">
          <hr style="border-width:1px; margin:1px; border-color:gray;">
          
<form id="forma" action="mcfupis.php" method="post" autocomplete="off" >
    <div class="rezultat">
    <?php
    $krajnji="SELECT posao.dobrih, posao.zin, posao.zincip, posao.remake, posao.neproiz FROM
posao where posao.brposla = '{$x}'";
    $nestos=mysqli_query($con,$krajnji);

    $amf=mysqli_fetch_row($nestos);

echo "<div class='ukup'><label for='tdobrih'>Dobrih</label> ". ako($amf[0],'tdobrih','')."</div>
<div class='ukup'><label for='tzin'>ZIN</label>	  ". ako($amf[1],'tzin','')."</div>
<div class='ukup'><label for='tzincip'>ZIN čip</label>	". ako($amf[2],'tzincip','')."</div>
<div class='ukup'><label for='tremake'>Remake</label>	". ako($amf[3],'tremake','')."</div>
<div class='ukup'><label for='tneproiz'>Neproizvodljivih</label>". ako($amf[4],'tneproiz','')."</div>"
?>
    <select name='zapo3' required >
      <option value=''>  --  </option>
        <?php
        $zap="select * from zaposleni order by prezime";
        $k=mysqli_query($con,$zap);
        while($b=mysqli_fetch_row($k)){
        echo "<option value='{$b[0]}'>{$b[1]} {$b[2]} </option>";
        }?>
        </select>

<!--      if(isset($admin)){zaposleni($con,$admin,3);}else{novi($con,3);} -->
      <input type="hidden" name="posla" value="<?php echo $v; ?>">
    <input type="hidden" name="brposla" value="<?php echo $o; ?>">
     <button class="btn btne" type="submit" value="start">Snimi</button>
			   </div>
      </div>

      </form>
 <script>
	 $('a').on('click', function () { 
//		 alert ($(this).attr("ref")); 
		$("#adr").val($(this).attr("ref"));
		 $('#forma1').submit();
	 });

	
</script>
   </div>
   <?php include "skart.php"; ?>




<!--   <div class='ukup'><label for='tdobrih'>Dobrih</label> <input type="text"  maxlength="3" name="tdobrih" required></div>-->
<!--   <div class='ukup'><label for='tzin'>ZIN</label>	   <input type="text"  maxlength="3" name="tzin" required ></div>-->
<!--   <div class='ukup'><label for='tzin'>ZIN čip</label>	<input type="text"  maxlength="3" name="tzincip" required></div>-->
<!--   <div class='ukup'><label for='tzin'>Remake</label>	<input type="text"  maxlength="3"name="tremake" required ></div>-->
<!--   <div class='ukup'><label for='tzin'>Neproizvodljivih</label><input type="text"  maxlength="3" name="tneproiz" required >-->