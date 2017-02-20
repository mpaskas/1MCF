<?php 
function zaposleni($co, $v){

 
    $tren = "select * from zaposleni where id= {$v}";
    $ui=mysqli_query($co,$tren);
   
    $w=mysqli_fetch_row($ui);

    echo "<div>{$w[1]} {$w[2]}</div>";
   
}
function novi($co,$t){
        echo "<select name='zapo{$t}'>";
        echo "<option value=''>  --  </option>";
        
                   $zap="select * from zaposleni order by prezime";
                   $k=mysqli_query($co,$zap);
                   while($b=mysqli_fetch_row($k)){
                       echo "<option value='{$b[0]}'>{$b[1]} {$b[2]} </option>";
                   }
                
           echo    "</select>";
               }   ?>
               