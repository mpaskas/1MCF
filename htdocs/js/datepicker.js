 $( function() {

    $( "#datepicker1" ).datepicker({
		defaultDate:"-1W",
		dateFormat: "dd.mm.yy"
//		minDate:"28.02.2017",
			
		});
	  
	  $( "#datepicker2" ).datepicker({
			  minDate:"-1W",
		dateFormat: "dd.mm.yy"
		});
	  
	  $('#datepicker1').datepicker('setDate', "-1w");
	  $('#datepicker2').datepicker('setDate', new Date());
	 
	   $('#datepicker1').on("change",function(){
		   $('#datepicker2').datepicker("option","minDate",(this.value));
		  
		  $('#datepicker2').on("change",function(){
		   $('#datepicker1').datepicker("option","maxDate",(this.value));
	   });
	 
	   });

 });