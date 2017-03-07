<?php
include "conDB.php";
print_r($_POST);

$gh="insert into letersop (posaoid, lzapospri,  datum) values ({$_POST['brposla']},{$_POST['zapo4']},now())";
mysqli_query($con,$gh);

$t="update rezervacija set stanje=5 where brrezervacije in (SELECT brr
FROM veza where brp={$_POST['brposla']} )";
mysqli_query($con,$t);
header("location:./?grupa=ls");