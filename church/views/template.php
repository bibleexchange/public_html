<html>
<head>
<title>$page_title</title>

<link rel="stylesheet" type="text/css" href="/style.css">
<link rel="stylesheet" type="text/css" href="/stream/dynamic_css">

</head>
<body class="holy-grail">

		<!--<header></header>-->

		<div class="holy-grail-body">

			<section class="holy-grail-content">
				      $body
			</section>

			<div class="holy-grail-sidebar-1 hg-sidebar">
					$main_sidebar
			</div>

			<div class="holy-grail-sidebar-2 hg-sidebar">

				<form action="https://www.paypal.com/cgi-bin/webscr" method="post">
            		<input name="cmd" type="hidden" value="_s-xclick">
            		<input name="hosted_button_id" type="hidden" value="MNDYCC59PET5A">		
            	</form>

            	$announcements

				<button name="submit" class="btn btn-default circle">donate</button>
			</div>

		</div>

		<!--<footer>
			<p></p>
		</footer>-->

<script
  src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>

		<!--Start of Zopim Live Chat Script-->
		<script type="text/javascript">
		window.$zopim||(function(d,s){var z=$zopim=function(c){z._.push(c)},$=z.s=
		d.createElement(s),e=d.getElementsByTagName(s)[0];z.set=function(o){z.set.
		_.push(o)};z._=[];z.set._=[];$.async=!0;$.setAttribute('charset','utf-8');
		$.src='//v2.zopim.com/?2nMTEqj7SKXalM4FGLK1HM1RULsUaa9f';z.t=+new Date;$.
		type='text/javascript';e.parentNode.insertBefore($,e)})(document,'script');
		</script>
		<!--End of Zopim Live Chat Script-->
		
        
<script>

$(document).ready(function(){
//10714
	$.getJSON(
	'http://api.mixlr.com/users/10714',
	function(jsonData) {
	  console.log(jsonData);
	  sendMessage(jsonData);
	});
});

function sendMessage(data){



 if(data.is_live === true){
	var element = document.getElementById("message-board");
	element.style.display = "block";

  }else {

  }

}


</script>

</body>
</html>