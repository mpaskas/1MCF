		var x='';

	x=$("#posaobr").text();
	$(" h1 > div").each(function(){
			x+=(" " + $(this).text());
				});
		x=x.trim();
//		alert (x);

		$("a").each(function(){
			if($(this).text()==x){
//				alert("NASaaaaaooooo!!!!!!!!");
				 $("a").removeClass('selected');
				$(this).addClass('selected');
				$(this).animate({left: '3px',fontSize:'18px'}, "slow");
			}
//			alert ($(this).text());
		});
		
