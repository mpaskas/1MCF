<?php
include "conDB.php";



$e="update posao set dobrih={$_POST['tdobrih']}, zin = {$_POST['tzin']}, zincip = {$_POST['tzincip']}, remake = {$_POST['tremake']}, neproiz = {$_POST['tneproiz']}, admin ={$_POST['zapo3']}, datumkraj= now() where brposla = '{$_POST['posla']}'";
// mysqli_query($con,$e);


//if (isset($_POST['tdobrih'], $_POST['tzin'], $_POST['tzincip'], $_POST['tremake'],  $_POST['tneproiz'], $_POST['zapo3']))

if(mysqli_query($con,$e)) {
	$t="update rezervacija set stanje=4 where brrezervacije in (SELECT brr
FROM veza where brp={$_POST['brposla']} )";
	mysqli_query($con,$t);
	header("location:./?grupa=tp2");
}else{
    echo "
    <script>
    window.history.back();
</script>";
}
