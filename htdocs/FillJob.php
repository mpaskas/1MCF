<form action="upis.php" method="post">
       <input name="rez" value="<?php echo $_GET['rez']?>" ><br>
       <?php echo $_GET['tip']?><br>
        <input type="text" name="posao"  style=" text-align: center;" value="<?php echo ltrim(date('Ymd').'_',20);  ?>" autocomplete="off" ><br>
        <input type="text" name="kolicina"><br>
        <input type="checkbox" name="hitan" value="1_"><br>
         <input type="submit" >
</form>




