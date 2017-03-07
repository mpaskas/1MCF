<?php
include "conDB.php";

//print_r($_POST);


$f=1;
while(isset ($_POST['masina'.$f])){
//  print_r($_POST);
  


$z="insert into masina values('{$_POST['masina'.$f]}', {$_POST['brposla']},'{$_POST['dobrih'.$f]}','{$_POST['losih'.$f]}',now(),{$f}) on duplicate key update dobrih =  '{$_POST['dobrih'.$f]}',losih = '{$_POST['losih'.$f]}', brmasine={$_POST['masina'.$f]}";
    mysqli_query($con,$z);




$q="insert into kontrol  values({$_POST['brposla']},'{$_POST['remake'.$f]}',{$f}) on DUPLICATE KEY UPDATE remake='{$_POST['remake'.$f]}'";
    mysqli_query($con,$q);
      $f++;
} 

//
$t="update rezervacija set stanje=3 where brrezervacije in (SELECT veza.brr
FROM  veza  where brp={$_POST['brposla']} )";
	mysqli_query($con,$t);
$e="update posao set operater = {$_POST['zapo1']} , kontrola = {$_POST['zapo2']} where brposla = '{$_POST['posla']}'";
 mysqli_query($con,$e);

header("location:{$_POST['adr']}");
?>