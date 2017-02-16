var obj = {};


$('tr #ta1').each(function () 
{
    var novi =  $(this).closest("tr").index();
    var kolona = document.getElementById('tablica').rows[novi].cells[0].innerHTML;
			//	console.log(novi);
if($(this).text()){	
    if($(this).text() in obj ){
//obj[$(this).text()]={};
	
	   if (kolona in obj[$(this).text()]){
	       obj[$(this).text()][kolona]+=1;
	           }
        else{
		obj[$(this).text()][kolona]={};
		obj[$(this).text()][kolona]=+1;
	       }
	
	
       } 
    else{
	obj[$(this).text()]={};
	obj[$(this).text()][kolona]=+1;}
				
				
}
				
});
//console.log(obj);
					 
	 var x = document.createElement("TABLE");
     x.setAttribute("id", "myTable1");
     document.getElementById("tabela").appendChild(x);
var pocetak = new Date(document.getElementById("poc").value); 
    
//pocetak = document.getElementById("poc").value;
var kraj=new Date( document.getElementById("kraj").value) ;
var mili=((kraj.getTime()-pocetak.getTime())/(1000*3600*24))+1;
//var razlika =Math.ceil( (kraj - pocetak)/(1000*3600*24));
//console.log (razlika);
console.log(mili);

//while (pocetak<=kraj){}



/*var i = 0;
		 
var s = 0;	
for (var key in obj) {
	//var duz = Object.keys(obj[key]).length;	
   
				 console.log(duz);
			
	   var y = document.createElement("TR");
    y.setAttribute("id", "myTra"+i);
	y.setAttribute("class", "no");
    document.getElementById("myTable1").appendChild(y);
	
	napraviel("td",key,"rowspan",duz,"myTra"+i);	
	 */
////console.log(key);
//	console.log(Object.keys(obj[key]).length);
   /*  var ys = document.createElement("TR");
    ys.setAttribute("id", "myTra");
    document.getElementById("myTable1").appendChild(ys);
    
 napraviel("td",Object.keys(obj[key]),"rowspan",obj[key][key1],"myTra");
	for  (var key1 in obj[key]) {
        console.log(obj[key][key1]);
      var ys = document.createElement("TR");
    ys.setAttribute("id", "myTra");
    document.getElementById("myTable1").appendChild(ys);*/
       // napraviel("td",Object.keys(obj[key]),"rowspan",obj[key][key1],"myTra");
/*	
if (!document.getElementById("myTra"+i)){ 
	var ys = document.createElement("TR");
    ys.setAttribute("id", "myTra"+i);
    document.getElementById("myTable1").appendChild(ys);}
	
	//napraviel("td",obj[key],"rowspan",obj[key][key1],"myTra"+i);	
		
	//napraviel("td",obj[key][key1],"rowspan","num3"+s,"myTra"+i);	
		
	i++; 
		}
	//console.log(key1);
//			console.log(obj[key][key1]);
	
	var total3=0;
				  
        $(".num3"+s).each(function(){        
            total3+=parseInt( $(this).html());
        });
       
	s++;
	napraviel("td",total3,"class","total3","myTra"+(i-1));*/
	

				/* var totals3=0;
				  
        $("#myTable1 .total3").each(function(){        
            totals3+=parseInt( $(this).html());
        });
 console.log(totals3);
				 
	var ys = document.createElement("TR");
    ys.setAttribute("id", "myTra"+i);
    document.getElementById("myTable1").appendChild(ys);

		
napraviel("td","Ukupno","colspan","2","myTra"+i);		 


napraviel("td",totals3,"class","totals3","myTra"+i);	*/
				 

				  