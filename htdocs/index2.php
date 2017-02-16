<!DOCTYPE html>
<html>
    
    <head>
        <meta charset="utf-8_general_ci">
       <!-- <meta charset="iso-8859-2">-->
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <link href="Css/stil.css" rel="stylesheet" type="text/css" />
        <link href="Css/jquery-ui.css" rel="stylesheet" type="text/css" />
        <link href="CSS/jquery-ui.theme.css" rel="stylesheet" type="text/css" />
        
        <script src="js/jquery-2.2.2.min.js" type="text/javascript"></script>
        <script src="js/funkcije.js" type="text/javascript"></script>
        <script src="js/jquery-ui.js" type="text/javascript"></script>
        
      <!--<script>  $(document).ready(function () {
			
              $("#tablica").hide();}) </script>-->
        
        <title>Evidencija dolazaka</title>
        
        <link rel="stylesheet" href="main.css">
    </head>
    <body>
        
        <div id="sadrzaj">
            <div id="search">
              
                <form action="#" method="post" id="fo">
				    <input type="date" id="datepicker" name="dat" class="pocetak" value="<?php  if(isset($_POST['dat'])){
                                                                        $pocetak=$_POST["dat"];}                
                                                                        else{
                                                                        $pocetak=date('Y-m-d', strtotime('-1 week'));
                                                                        } 
                                                                                         echo $pocetak; ?>"><br>
                    <input type="date" id="datepicker" name="dat1" class="kraj" value="<?php  if(isset($_POST['dat1'])){
                                                        $kraj=$_POST["dat1"];
                                                            }
                                                        else{
                                                        $kraj=date('Y-m-d');} 
                                                                                       echo $kraj; ?>">
					<input type="submit" name="submit_button" class="btn" value="S">
				</form>
         
            
                        </div>
             <div id="tabela"></div>
            <div >
        <?php 
        $server="11.9.16.144:3306";
            $user= "milan"; 
            $pass="1234"; 
        $DB="evidencija";
       
        $conn=mysqli_connect($server,$user,$pass,$DB);
            if (!$conn) { 
            die("Connection failed:". mysqli_connect_error());
            }
             $nasa="set names 'utf8'" ;
        mysqli_query($conn,$nasa);
       
       $sql="select  Ime, Datum, Ulaz, Izlaz from PK where Datum > '$pocetak' and Datum < '$kraj' ";
        $i=1;       
        $rezultat=mysqli_query($conn,$sql);
        if (mysqli_num_rows($rezultat)>0){
            $imena="bla";
           echo "<table id='tablica'>"; //<tr><th>Ime </th><th>Datum </th><th>Ulaz </th><th>Izlaz </th></tr>";
            while ($row=mysqli_fetch_assoc($rezultat)){
                if($row['Ime'] != $imena){
                   $imena=$row['Ime'];
                    echo "<tr><td>$i</td><td id='ta1'>" . $row["Ime"]. " </td>"; 
                $i++;
                }
                else{
                //$row['Datum']
                echo "<tr><td></td><td>  </td>" ;  
                }
                if( date('w',strtotime($row['Datum']))== 6 )
                {
            echo "<td class='subota'>"; }
                else{echo "<td>"; }
                echo date('d.m.Y',strtotime($row['Datum'])). " </td><td>" . $row["Ulaz"]. " </td><td>" . $row["Izlaz"]. " </td></tr>";
            }
        }
        echo "</table>";
             ?>
            </div>
        </div>
<!--
         <script src="js/tabela.js" type="text/javascript"></script> 
-->
    </body>
</html>