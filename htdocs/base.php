<link rel="stylesheet" href="/css/bootstrap.min.css" type="text/css">
<!--<link rel="stylesheet" href="/css/jquery.dataTables.min.css" type="text/css">-->
    <link rel="stylesheet" href="/css/jquery-ui.css" type="text/css">
     
<script src="js/jquery-3.1.1.js" type="text/javascript"></script>
<script src="js/bootstrap.js" type="text/javascript"></script>
<script src="js/bootbox.min.js" type="text/javascript"></script>
<!--<script src="js/jquery.dataTables.min.js" type="text/javascript"></script>-->
   <script src="js/jquery-ui.js" type="text/javascript"></script>
    
<?php
    $server="localhost";
    $uname="root";
    $pass="";
    $db="mcf";
    $nasa="set names 'utf8'" ;
        
    $con=mysqli_connect($server,$uname,$pass,$db);
    mysqli_query($con,$nasa);

function datum ($s){
    $m=date_format(date_create($s),'d.m.Y');
    return $m;
}
?>
<script>
    
   
    
    
    
    
    function auto_load(){
        $('#posa').load('magacin.php #posa');
        
        
    }
$(document).ready(function(){
//$('#posa').click(auto_load());
//setInterval(auto_load,2000);
    
//$('#naslov').DataTable({
//        order:[[$('th.sort').index(),'desc']]
//    });
    
//    setInterval(function(){
//        table.ajax.reload();
//    },2000);
    
//    $("div#posa").removeClass("poslovi");
//    $("div#uni").addClass("hidden");
    
//    $("td.redni").click(function(){
//        $("label#ml").text($(this).text());
//        $("div#uni").removeClass("hidden"); 
//    });
//    
//    $("a").on('click',function(){
////             alert ("sdjshfsdf");
//        $("div#uni").addClass("hidden");
//        $("td.redni").click(function(){
//        $("label#ml").text($(this).text());
//        $("div#uni").removeClass("hidden");
//            });
        });
    
   

</script>    