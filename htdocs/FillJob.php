<div><div class="dva donji">
      <form action="upis.php" method="post" autocomplete="off" style="height:300px;" >
		  <div style="margin:0;text-align:center;font-size:36px; font-weight:800;">Rezervacija</div>
      
       <h1 class="prva" >
       <input type="hidden" name="rez" value="<?php echo $_GET['rez']?>">
       <div   class="reza" ><?php echo $_GET['rez']?></div>
       <div class="reza reza2"><?php echo $_GET['tip']?></div>
       <div class="reza reza2"><?php echo $_GET['size']?></div></h1><br>
        <div class="un">
          <label for="hitan">Hitan</label>
        <input type="checkbox" name="hitan" value="1_" style=""></div>
       <div class="un">
       <label for="posao">Broj posla</label>
        <input class="un1" type="text" name="posao"  style=" text-align: center;" value="<?php echo ltrim(date('Ymd').'_',20);  ?>" pattern="[0-9]{6}_[0-2]{1}[0-9]{5}" title="Nepravilno unet broj posla!"></div>
         <div class="un">
        <label for="kolicina">Količina</label>
        <input class="un1" type="text" name="kolicina" pattern="\d{1,3}" title="Uneti količinu kartica u poslu!" required></div>
         <div class="un" >
			 <input type="submit" class="btn btne"  ></div>
			 
	</form>
	</div>
	
	<script>
		$('a').on('click', function () { 
		if($(this).attr("ref")){
			 window.location.href = ($(this).attr("ref"));
		}
		});
	</script>
	</div>




