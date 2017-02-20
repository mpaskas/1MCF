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
          include "zaposleni.php";
          $x=$_GET['pos'];
 
          $poss="SELECT posao.hitan,tipovi.skraceno,posao.kolicina,posao.brposla,rezervacija.brrezervacije, posao.id FROM posao INNER JOIN veza ON veza.brp = posao.id INNER JOIN rezervacija ON veza.brr = rezervacija.brrezervacije INNER JOIN tipovi ON rezervacija.tip = tipovi.Id WHERE posao.brposla = '{$x}'";
          
          $r= mysqli_query($con,$poss);
          $g= mysqli_fetch_row($r);
          
          echo "<h1>{$g[0]}{$g[1]}".sprintf('%05d',$g[2])."_{$g[3]}</h1>";
          $o=$g[5];
          $v=$g[3];
              echo "<div class='rezMcf'><p class='p'>Rezervacija</p><p>".sprintf('%09d',$g[4])."</p>" ;
          while ($e=mysqli_fetch_row($r)){
              echo "<p>".sprintf('%09d',$e[4])."</p>";
          }
              echo "</div>";
         
              ?>
              
      </div>
      <div class="dva">
           <div class="tabela">
               <div class="labele">
               <p></p>
                <p>masina</p>
               <p>dobrih</p>
               <p>losih</p>
               <p>remake</p>
               </div>
               <form id="forma" action="mcfupis.php" method="post">
           <?php
        $sve ="SELECT masina.brmasine, masina.dobrih, masina.losih,kontrol.remake, posao.operater,posao.kontrola,posao.admin  FROM kontrol RIGHT OUTER JOIN posao ON kontrol.brpos = posao.id RIGHT OUTER JOIN masina ON masina.idposla = posao.id  WHERE posao.brposla = '{$x}' and masina.krug = kontrol.krug";
            $s=mysqli_query($con,$sve);
                   $y=1;
        if($s){       
               
            while($a=mysqli_fetch_row($s)){
                echo "<div class='labele'>
                    <p>{$y}</p>
                    <p>".ako($a[0],'masina',$y) ."</p>
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
                $admin=$a[6];
                
                
                $y++;
            }
          
        }  
                  
            echo "<div class='labele'>
               <p><input type='text' name='masina".$y."'></p>
               <p><input type='text' name='dobrih".$y."'></p>
               <p><input type='text' name='losih".$y."'></p>
               <p><input type='text' name='remake".$y."'></p>
               </div>" ;
                   
//                    echo"<h1>".$a[4]."</h1>";
                   
        ?>
              
               
               <div class="labele">
               <p></p>
               <p></p>
               <p><?php if(isset($operater)){zaposleni($con,$operater);}else{novi($con,1);} ?></p>
               <p><?php if(isset($kontrola)){zaposleni($con,$kontrola);}else{novi($con,2);} ?></p>

               
               </div>
               <input type="hidden" name="brposla" value="<?php echo $o; ?>">
               <input type="hidden" name="posla" value="<?php echo $v; ?>">

               <input type="submit" value="start">
               
          </div>
   <h4>total</h4><input type="text" name="tdobrih">
   <input type="text" name="tzin">
   <input type="text" name="tzincip">
   <input type="text" name="tremake">
   <input type="text" name="tneproiz"><?php if(isset($admin)){zaposleni($con,$admin);}else{novi($con,3);} ?>
      </div>
      </form>
       
   </div>
    
</body>
</html>