<?php
include "conDB.php";

$lsre="update letersop set lzaposzav={$_POST['zapo5']}, remake={$_POST['rem']}";
mysqli_query($con, $lsre);
if ($_POST['rem']!=0){
	$sta="update rezervacija set stanje=6 where brrezervacije= (select brr from veza where brp={$_POST['brposla']})";
		mysqli_query($con, $sta);
}else {
	$sta="update rezervacija set stanje=7 where brrezervacije= (select brr from veza where brp={$_POST['brposla']})";
		mysqli_query($con, $sta);
}
header("location:./?grupa=ls");