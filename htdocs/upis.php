<?php
include "conDB.php";

$rs = "insert into  posao (id,brposla,kolicina,datum, hitan) values (DEFAULT,'{$_POST['posao']}','{$_POST['kolicina']}',now(),'{$_POST['hitan']}')";
mysqli_query($con,$rs);
$rs = "insert into  veza values ({$_POST['rez']},(select id from posao where brposla = '{$_POST['posao']}'))";
mysqli_query($con,$rs);
$rs = "update rezervacija set stanje=2 where brrezervacije='{$_POST['rez']}'";
mysqli_query($con,$rs);
header("location:index.php");
