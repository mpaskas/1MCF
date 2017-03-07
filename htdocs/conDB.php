
<?php
    $server="localhost";
    $uname="root";
    $pass="";
    $db="mcf2";
    $nasa="set names 'utf8'" ;
        
    $con=mysqli_connect($server,$uname,$pass,$db);
    mysqli_query($con,$nasa);

function datum ($s){
	if($s != null){
    $m=date_format(date_create($s),'d.m.Y');
  return $m;
	}
}

?>