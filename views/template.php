<html>
<head>
<title>$page_title</title>

<link rel="stylesheet" type="text/css" href="/style.css">
</head>
<body class="holy-grail">

		<header>
			
		</header>

		<div class="holy-grail-body">

			<section class="holy-grail-content">
				      $body
			</section>

			<div class="holy-grail-sidebar-1 hg-sidebar">
				<a href="/"><img id="logo" src="/img/logo.jpg" /></a>
				<h1>$business_name </h1>
				
				<div class="mixlr"></div>

				<div id="message-board" style="display:none">
					<iframe name="mixlr-player" src="http://mixlr.com/v2/embed/deliverance-center?width=640" scrolling="no" frameborder="no" height="150" width="100%"></iframe>
				</div>	

				

				<p>930 Old Post Rd Arundle, Maine 04046</p>
				<p>Call or Text: (207) 774-8192</p>

				<a>Links</h2>

				<ul>
					<a href="/">Home</a>
					<li><a href="/blog">Blog</a></li>
					<li><a href="http://mixlr.com/deliverance-center">Live Services Audio Stream</a></li>
					<li><a href="http://mixlr.com/deliverance-center/show-reel">Archive Service Recordings on Mixlr</a></li>
					<li><a href="https://www.facebook.com/pg/deliverancecenter">Facebook</a></li>
				</ul>

				

				

			</div>

			<div class="holy-grail-sidebar-2 hg-sidebar">

				<form action="https://www.paypal.com/cgi-bin/webscr" method="post">
            				<input name="cmd" type="hidden" value="_s-xclick">
            				<input name="hosted_button_id" type="hidden" value="MNDYCC59PET5A">            				
            				
            				
            			</form>

				<h2>Special Services</h2>

				<p>Revival with the Blythe Family and Sister Rita</p>

				<ul>
					<li>Sunday June 9, 11 am</li>
					<li>Sunday June 9, 4:30 pm</li>
					<li>Monday June 10, 6 pm</li>
					<li>Tuesday June 11, 6 pm</li>
				</ul>

				<h2>Regular Services</h2>

				<ul>
					<li>Sunday School 10 am</li>
					<li>Sunday Morning 11 am</li>
					<li>Sunday Night 4:30 pm</li>
					<li>Tuesday Bible Study & Prayer Meeting 6 pm</li>
				</ul>

				<button name="submit" class="btn btn-default circle">donate</button>
			</div>

		</div>

		<footer>
			<p></p>
		</footer>

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