<?php
include "conDB.php";



$f=1;
while(isset ($_POST['masina'.$f])){
  print_r($_POST);
  


$z="insert into masina values('{$_POST['masina'.$f]}', {$_POST['brposla']},{$_POST['dobrih'.$f]},{$_POST['losih'.$f]},now(),{$f}) on duplicate key update dobrih =  {$_POST['dobrih'.$f]},losih = {$_POST['losih'.$f]}";
    mysqli_query($con,$z);






$q="insert into kontrol  values({$_POST['brposla']},{$_POST['remake'.$f]},{$f}) on duplicate key update remake =  {$_POST['remake'.$f]}";
    mysqli_query($con,$q);
      $f++;
}
$e="update posao set operater = {$_POST['zapo1']} , kontrola = {$_POST['zapo2']},dobrih={$_POST['tdobrih']}, zin = {$_POST['tzin']}, zincip = {$_POST['tzincip']}, remake = {$_POST['tremake']}, neproiz = {$_POST['tneproiz']}, admin ={$_POST['zapo3']} where brposla = '{$_POST['posla']}'";
 mysqli_query($con,$e);
