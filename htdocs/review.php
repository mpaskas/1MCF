<div class="review">
	
</div>

 
<script src="js/datepicker.js" type="text/javascript"></script>
<div class="rev">
<form action="" method="post">
<input type="text" name="od" id='datepicker1'>
<input type="text" name="do" id='datepicker2'>
<button type="submit" class="btn btne">Pohrani</button>
</form>
<table class="tablica">
<thead>
<th></th>
<th>Broj posla</th>
<th>Dobrih</th>
<th>Zin</th>
<th>Zin čip</th>
<th>Remake</th>
<th>Neproizvodljivih</th>
	<th>Završeno</th></thead>
<tbody>
<?php 
	
$bassve="SELECT Distinct posao.brposla, posao.hitan, tipovi.skraceno, posao.kolicina,  posao.dobrih,posao.zin, posao.zincip, posao.remake, posao.neproiz, posao.datumkraj,posao.datum
FROM posao left OUTER JOIN veza ON veza.brp = posao.id left outer JOIN rezervacija ON veza.brr = rezervacija.brrezervacije INNER JOIN tipovi ON rezervacija.tip = tipovi.Id ";
	if (isset($_POST['od'])){
		$bassve.="where posao.datum between STR_TO_DATE('{$_POST['od']}','%d.%m.%Y') and STR_TO_DATE ('{$_POST['do']}','%d.%m.%Y')";
	}else{
		$bassve.="where posao.datum between '2017-01-02' and '2017-02-27'";
	}
$rezultat=mysqli_query($con, $bassve);
$g=1;
	
while ($q=mysqli_fetch_row($rezultat)){
	echo "
	<tr><td>$g</td><td>{$q[1]}{$q[2]}".sprintf('%05d',$q[3])."_{$q[0]}</td><td>{$q[4]}</td><td>{$q[5]}</td><td>{$q[6]}</td><td>{$q[7]}</td><td>{$q[8]}</td><td>".datum($q[9])."</td></tr>";
//			<div class='rered'>
//				<div>$g</div>{$q[0]}{$q[1]}".sprintf('%05d',$q[2])."_{$q[3]}
//				<div title='dsd'> {$q[0]}{$q[1]}".sprintf('%05d',$q[2])."_{$q[3]}</div>
//			</div>
//		";
		$g++;
}?>
	</tbody>
</table>
</div>