<?php
/**
 * @param $co
 * @param $v
 * @param $s
 */
function zaposleni($co, $v, $s){

  echo "<select name='zapo{$s}' >";
    $tren = "select * from zaposleni where id= {$v}";
    $ui=mysqli_query($co,$tren);
   
    $w=mysqli_fetch_row($ui);
echo "<option value='{$v}'> {$w[1]} {$w[2]} </option>";
	
	 $zap="select * from zaposleni order by prezime";
                   $k=mysqli_query($co,$zap);
                   while($b=mysqli_fetch_row($k)){
                       echo "<option value='{$b[0]}'>{$b[1]} {$b[2]} </option>";
                   }
               echo    "</select>";}


function novi($co,$t){
        echo "<select name='zapo{$t}' >";
        echo "<option value=''>  --  </option>";
        
                   $zap="select * from zaposleni order by prezime";
                   $k=mysqli_query($co,$zap);
                   while($b=mysqli_fetch_row($k)){
                       echo "<option value='{$b[0]}'>{$b[1]} {$b[2]}                   </option>";
                   }
         echo    "</select>";
           }

function ako($e,$s,$r){
    If(!$e){
return   "<input type='text'  name='{$s}{$r}'>";    

    }else {
        if($s=="tdobrih" || $s=="tzin" || $s=="tzincip" || $s=="tremake" || $s=="tneproiz"){
            $g="<input type='text'  name='{$s}{$r}' value='{$e}'required>";
        }else {
            $g = "<input type='text'  name='{$s}{$r}' value='{$e}'>";
        }
       return $g;

    }
}
function sve($co,$tabela){

    $d="select * from {$tabela}";
    $dq=mysqli_query($co,$d);
    echo"
</select>
        <select id='{$tabela}'> <option value=''>--</option>";
           while($rm=mysqli_fetch_row($dq)){
    echo "<option value='$rm[0]'>$rm[1]</option>";
}

echo "</select>";
//    return $dq;

}



?>
               